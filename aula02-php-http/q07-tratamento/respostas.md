# Questão 07: O dado pode não vir, o dado pode ser perigoso

**Nível:** 🟡 Intermediário

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `saudacao.php` | Código fornecido, que você vai corrigir no item 1.2 |

## 1. Análise do código

**1.1 Quais são os dois problemas deste código?**

_
Problema 1 — Ausência de parâmetros

O código acessa diretamente $_GET['nome'], sem verificar se o parâmetro nome foi enviado na URL.

Problema 2 — Vulnerabilidade XSS

O código exibe diretamente o valor recebido pela URL, sem tratar caracteres HTML.

Isso permite que um usuário insira código HTML ou JavaScript, que poderá ser interpretado pelo navegador, causando uma vulnerabilidade conhecida como XSS (Cross-Site Scripting).
_

**1.2 Corrija o código usando `??` (valor padrão "Visitante") e `htmlspecialchars`. Faça um commit **antes** e outro **depois** da correção. Cole o código corrigido e explique.**

_$nome = $_GET['nome'] ?? "Visitante"; echo "Olá, " . htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');

Operador ?? (Null Coalescing) resolve o aviso de erro. Se o utilizador não enviar o parâmetro ?nome=, a variável $nome recebe o valor padrão "Visitante". A função htmlspecialchars() resolve a vulnerabilidade XSS. Ela converte caracteres especiais do HTML, como < e >, em entidades seguras, como &lt; e &gt;, impedindo que o navegador os interprete como código._

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 **Antes da correção**: log do servidor ao abrir `saudacao.php` sem parâmetro**

```text
<br />
<b>Warning</b>:  Undefined array key "nome" in <b>/home/joao/Documentos/Programação Web/aula02-php-http/q07-tratamento/saudacao.php</b> on line <b>2</b><br />
Olá,
```

**Explicação linha por linha:**

_o PHP tenta acessar uma posição inexistente do array $_GET. Isso gera um aviso e deixa a variável $nome sem um valor definido.

O aviso aparecerá se a exibição de erros estiver habilitada._

**2.2 **Antes da correção**: saída de `curl.exe -s "http://localhost:8000/q07-tratamento/saudacao.php?nome=<b>Oi</b>"`**

```text
Olá, <b>Oi</b>
```

**Explicação linha por linha:**

_o PHP retorna a tag <b> sem qualquer tratamento. Se a resposta for interpretada como HTML pelo navegador, a palavra Oi aparecerá em negrito.

Isso demonstra que o usuário consegue inserir elementos HTML na página._

**2.3 **Depois da correção**: saída do mesmo comando do item 2.2**

```text
Olá, &lt;b&gt;Oi&lt;/b&gt;
```

**Explicação linha por linha:**

_Depois da correção, o PHP encontra o parâmetro `nome`, aplica `htmlspecialchars` e devolve o texto com as tags convertidas para entidades HTML. O navegador mostra `<b>Oi</b>` como texto normal, sem aplicar negrito._

## 3. Perguntas

**3.1 Qual aviso apareceu no item 2.1? O que ele significa?**

_Apareceu `PHP Warning: Undefined array key "nome"`. Isso significa que o código tentou acessar `$_GET['nome']`, mas a URL não tinha o parâmetro `nome`. O operador `?? "Visitante"` evita esse aviso ao fornecer um valor padrão quando a chave não existe._

**3.2 Compare o corpo da resposta em 2.2 e 2.3. O que o `htmlspecialchars` fez com `<b>`?**

_No item 2.2, a resposta apresentada é `404 Not Found`, portanto o PHP não foi executado e não há corpo de resposta da saudação para comparar. Na resposta esperada do item 2.3, `htmlspecialchars` converte `<b>` em `&lt;b&gt;` e `</b>` em `&lt;/b&gt;`. Assim, o navegador exibe as tags literalmente e não as interpreta como HTML._

**3.3 Teste no navegador `?nome=<script>alert('Ataque')</script>` antes e depois da correção. Explique o que aconteceu e por que isso é perigoso (XSS).**

_Antes da correção, o conteúdo enviado na URL era inserido diretamente na página. Por isso, o navegador interpretava a tag `script` e executava `alert('Ataque')`. Depois da correção, `htmlspecialchars` transforma os caracteres `<` e `>` em entidades HTML, fazendo com que o trecho seja mostrado como texto e impedindo a execução do JavaScript. Isso é perigoso porque um ataque XSS pode executar código no navegador de outra pessoa, alterar a página, capturar dados da sessão ou induzir o utilizador a realizar ações indesejadas._
