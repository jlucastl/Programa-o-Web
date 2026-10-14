<?php
function e(string $valor): string {
  return htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
}

$perfil = [
  "nome" => "João Lucas",
  "curso" => "Análise e Desenvolvimento de Sistemas",
  "campus" => "IFCE Boa Viagem",
  "cidade" => "Boa Viagem - CE",
  "apresentacao" => 'Sou estudante de Análise e Desenvolvimento de Sistemas no IFCE Campus Boa Viagem, gosto de tecnologia e solução de problemas através da programação. Tenho focado meus estudos no desenvolvimento backend com Django, explorando arquitetura web, protocolo HTTP, consumo/criação de APIs e manipulação de dados. No dia a dia, utilizo ambiente Linux para desenvolvimento e busco sempre aplicar boas práticas de código limpo, organização e segurança.',
  "habilidades" => ["Javascript", "HTML5", "CSS3", "Django", "Python"],
];

$projetos = [
  1 => [
    "titulo" => "Backend do AprendeMais",
    "descricao" => "Banco de Dados do projeto AprendeMais para armazenar dados de componentes de escolas de ensino fundamental",
    "tecnologias" => "Docker, Postgresql, Django",
  ],
  2 => [
    "titulo" => "Lista de Tarefas (To-Do List)",
    "descricao" => "Interface simples para adicionar, marcar e remover tarefas do dia a dia.",
    "tecnologias" => "HTML5, CSS3, JavaScript",
  ],
  3 => [
    "titulo" => "Perfil do Estudante v1",
    "descricao" => "Aplicação Web Front Controller completa com roteamento via Query String, gerenciamento de tema via cookies e API JSON.",
    "tecnologias" => "PHP 8, HTML5, CSS3, Cookies, JSON",
  ]
];

$temaBruto = $_GET['tema'] ?? $_COOKIE['tema'] ?? 'claro';

$tema = in_array($temaBruto, ['claro', 'escuro'], true) ? $temaBruto : 'claro';

if (isset($_GET['tema'])) {
    setcookie('tema', $tema, time() + (86400 * 30), '/');
}

if (($_GET['formato'] ?? '') === 'json') {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'perfil' => $perfil,
        'projetos' => $projetos
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$pagina = $_GET['pagina'] ?? 'inicio';
$statusHttp = 200;
$projetoAtual = null;

if ($pagina === 'inicio') {
    $tituloPagina = "Início - Perfil do Estudante";
} elseif ($pagina === 'habilidades') {
    $tituloPagina = "Habilidades - Perfil do Estudante";
} elseif ($pagina === 'projetos') {
    $tituloPagina = "Projetos - Perfil do Estudante";
} elseif ($pagina === 'projeto') {
    $id = (int) ($_GET['id'] ?? 0);
    if (isset($projetos[$id])) {
        $projetoAtual = $projetos[$id];
        $tituloPagina = $projetoAtual['titulo'] . " - Perfil do Estudante";
    } else {
        $statusHttp = 404;
        $tituloPagina = "Projeto não encontrado";
    }
} else {
    $statusHttp = 404;
    $tituloPagina = "Página não encontrada";
}

http_response_code($statusHttp);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($tituloPagina) ?></title>
  <link rel="stylesheet" href="/estilo.css">
</head>
<body class="tema-<?= e($tema) ?>">

    <header class="cabecalho">
        <div class="container">
            <div class="perfil-topo">
                <h1><?= e($perfil['nome']) ?></h1>
                <p><?= e($perfil['curso']) ?> | <?= e($perfil['campus']) ?></p>
            </div>
            <nav class="menu">
                <a href="?pagina=inicio" class="<?= $pagina === 'inicio' ? 'ativo' : '' ?>">Início</a>
                <a href="?pagina=habilidades" class="<?= $pagina === 'habilidades' ? 'ativo' : '' ?>">Habilidades</a>
                <a href="?pagina=projetos" class="<?= $pagina === 'projetos' || $pagina === 'projeto' ? 'ativo' : '' ?>">Projetos</a>
                
                <?php if ($tema === 'escuro'): ?>
                    <a href="?pagina=<?= e($pagina) ?><?= isset($_GET['id']) ? '&id=' . (int)$_GET['id'] : '' ?>&tema=claro" class="btn-tema">Tema Claro</a>
                <?php else: ?>
                    <a href="?pagina=<?= e($pagina) ?><?= isset($_GET['id']) ? '&id=' . (int)$_GET['id'] : '' ?>&tema=escuro" class="btn-tema">Tema Escuro</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main class="conteudo container">
        <?php if ($statusHttp === 404): ?>
            <section class="card erro-404">
                <h2>404 - <?= e($tituloPagina) ?></h2>
                <p>Desculpe, a rota ou o recurso solicitado não pôde ser encontrado no servidor.</p>
                <a href="?pagina=inicio" class="btn">Voltar para a Página Inicial</a>
            </section>

        <?php elseif ($pagina === 'inicio'): ?>
            <section class="card">
                <div class="conteudo_card">
                    <h2>Sobre Mim</h2>
                    <p><strong>Nome:</strong> <?= e($perfil['nome']) ?></p>
                    <p><strong>Cidade:</strong> <?= e($perfil['cidade']) ?></p>
                </div>
                <div class="apresentacao_card">
                    <h2>Quem sou eu?</h2>
                    <p class="apresentacao"><?= e($perfil['apresentacao']) ?></p>
                </div>
            </section>

        <?php elseif ($pagina === 'habilidades'): ?>
            <section class="card_habilidades">
                <h2>Minhas Habilidades</h2>
                <p class="total-habilidades">Total de habilidades cadastradas: <strong><?= count($perfil['habilidades']) ?></strong></p>
                
                <p><strong>Resumo inline:</strong> <?= e(implode(' • ', $perfil['habilidades'])) ?></p>
                
                <ul class="lista-habilidades">
                    <?php foreach ($perfil['habilidades'] as $habilidade): ?>
                        <li><?= e($habilidade) ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>

        <?php elseif ($pagina === 'projetos'): ?>
            <section class="card_projeto">
                <h2>Projetos Desenvolvidos</h2>
                <div class="grid-projetos">
                    <?php foreach ($projetos as $id => $proj): ?>
                        <article class="card-projeto">
                            <h3><?= e($proj['titulo']) ?></h3>
                            <p><?= e($proj['descricao']) ?></p>
                            <p class="techs"><small><strong>Tecnologias:</strong> <?= e($proj['tecnologias']) ?></small></p>
                            <a href="?pagina=projeto&id=<?= $id ?>" class="btn">Ver Detalhes</a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>

        <?php elseif ($pagina === 'projeto' && $projetoAtual): ?>
            <section class="card_projeto">
                <h3><?= e($projetoAtual['titulo']) ?></h3>
                <p class="descricao"><?= e($projetoAtual['descricao']) ?></p>
                <h4><strong>Tecnologias Utilizadas:</strong> <?= e($projetoAtual['tecnologias']) ?></h4>
                <a href="?pagina=projetos" class="btn">Voltar para a Lista de Projetos</a>
            </section>
        <?php endif; ?>
    </main>

    <footer class="rodape">
        <div class="container">
            <p>
                Tema ativo: <strong><?= e($tema) ?></strong> | 
                <a href="?formato=json" target="_blank">Acessar Versão JSON (API)</a> | 
                &copy; <?= date('Y') ?> - <?= e($perfil['nome']) ?>
            </p>
        </div>
    </footer>

</body>
</html>
