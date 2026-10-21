# Questão 10: Cookies e a ordem da resposta HTTP

**Nível:** Avançado  
**Atividade:** Aula 02 — PHP e HTTP na prática

> **Observação sobre os testes:** As saídas abaixo foram capturadas em testes reais executados em um servidor PHP de desenvolvimento isolado, com PHP 8.4.24, `display_errors=1` e `output_buffering=0`. O seu ambiente usa outra versão do PHP, por isso data, portas, versão, caminhos de arquivos e alguns cabeçalhos podem ser diferentes. Antes da entrega, substitua as saídas pelas suas, caso o professor exija os registros obtidos no seu computador. A captura do DevTools também precisa ser realizada no seu navegador.

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `contador.php` | Parte A: contador com cookie `visitas` |
| `login.php` | Parte B: versão corrigida do login |
| `login_com_erro.php` | Cópia de referência do código original fornecido com erro |
| `dashboard.php` | Parte B: página de destino do redirecionamento |
| `prints/cookies-application.png` | Print a ser capturado no seu navegador, em Application > Cookies |

**Atenção:** `cookies.txt` é gerado pelo curl e não deve ser enviado ao GitHub. O enunciado informa que a raiz do projeto já possui uma regra no `.gitignore`; o pacote também traz uma regra local para o caso de `cookies.txt` ser criado dentro de `q10-cookies/`.

## 1. Análise do código

### 1.1 Parte A — `contador.php`

```php
<?php
// O cookie da requisição atual é lido antes de escrever o novo valor.
$visitas = isset($_COOKIE['visitas']) ? (int) $_COOKIE['visitas'] : 0;
$visitas++;

// O navegador guardará o valor por 1 hora (3600 segundos).
setcookie('visitas', (string) $visitas, [
    'expires' => time() + 3600,
    'path' => '/q10-cookies/',
    'samesite' => 'Lax',
]);

header('Content-Type: text/html; charset=UTF-8');
echo "Você visitou esta página {$visitas} vez(es).";
```

**Como lê e grava o cookie:**

1. `$_COOKIE['visitas']` procura o cookie enviado pelo cliente na requisição atual. Se ele não existir, começa em `0`.
2. `(int)` converte o valor recebido para inteiro e `++` soma uma visita.
3. `setcookie('visitas', ...)` envia o cabeçalho `Set-Cookie` para solicitar que o cliente salve o novo valor. O vencimento `time() + 3600` corresponde a uma hora a partir da resposta.
4. O atributo `path=/q10-cookies/` limita onde esse cookie será enviado e `SameSite=Lax` define uma política de envio entre sites.
5. `header('Content-Type: text/html; charset=UTF-8')` identifica o tipo de resposta e sua codificação.
6. `echo` exibe a quantidade de visitas no corpo da página.

**Importante:** `setcookie()` não atualiza automaticamente `$_COOKIE` na requisição atual. O novo valor é recebido de volta somente em uma próxima requisição que envie esse cookie.

### 1.2 Parte B — `login.php` corrigido e `dashboard.php`

**Código corrigido — `login.php`:**

```php
<?php
// Os cabeçalhos precisam ser enviados ANTES de qualquer saída no corpo.
setcookie('usuario_logado', 'true', [
    'expires' => time() + 3600,
    'path' => '/q10-cookies/',
    'samesite' => 'Lax',
]);
header('Location: dashboard.php', true, 302);
exit;
```

**Página de destino — `dashboard.php`:**

```php
<?php
// Exemplo didático: a presença do cookie NÃO é autenticação segura.
header('Content-Type: text/html; charset=UTF-8');
$recebeuCookie = ($_COOKIE['usuario_logado'] ?? '') === 'true';

if ($recebeuCookie) {
    echo 'Dashboard: cookie de exemplo recebido.';
} else {
    echo 'Dashboard: cookie de exemplo não recebido.';
}
```

**O que foi corrigido:** no arquivo original, `echo "Carregando a página...";` vinha antes de `setcookie()` e `header()`. Com o `output_buffering=0`, o `echo` inicia o envio do corpo HTTP. Depois disso, já não é possível alterar os cabeçalhos, causando os avisos `Cannot modify header information - headers already sent`. Na versão corrigida, `setcookie()` e `header('Location: dashboard.php', true, 302)` são executados **antes de qualquer `echo`**. `exit` encerra a execução imediatamente após configurar o redirecionamento. O `dashboard.php` apenas demonstra a leitura do cookie; isso **não constitui autenticação real nem segura**.

## 2. Saídas do terminal

**Como executar:** na raiz do projeto `aula02-php-http`, iniciar o servidor com `php -d display_errors=1 -d output_buffering=0 -S localhost:8000`. Em outro terminal, executar os comandos abaixo (em Linux: trocar `curl.exe` por `curl`). Para obter a sequência 1, 2 e 3, use um `cookies.txt` novo: remova antes o arquivo usado em testes anteriores, se existir. Para reproduzir o item 2.3, coloque temporariamente o conteúdo de `login_com_erro.php` em `login.php`; para o item 2.4, restaure a versão corrigida de `login.php`.

### 2.1 Parte A — curl sem armazenar cookies

**Comando:**

```bash
curl.exe -i http://localhost:8000/q10-cookies/contador.php
```

**Saída capturada:**

```text
HTTP/1.1 200 OK
Host: localhost:8000
Date: Wed, 21 Oct 2026 00:08:18 GMT
Connection: close
X-Powered-By: PHP/8.4.24
Set-Cookie: visitas=1; expires=Wed, 21 Oct 2026 01:08:18 GMT; Max-Age=3600; path=/q10-cookies/; SameSite=Lax
Content-Type: text/html; charset=UTF-8

Você visitou esta página 1 vez(es).
```

**Explicação linha por linha:**

- `HTTP/1.1 200 OK`: a requisição foi concluída com sucesso.
- `Host: localhost:8000`: endereço e porta usados na requisição, reproduzidos pela resposta do servidor PHP de desenvolvimento. `Host` é normalmente um cabeçalho enviado pelo cliente.
- `Date: ... GMT`: momento em que o servidor gerou a resposta, em GMT/UTC.
- `Connection: close`: a conexão será fechada após essa resposta.
- `X-Powered-By: PHP/8.4.24`: versão do PHP utilizada no ambiente de teste.
- `Set-Cookie: visitas=1; ...`: solicita ao cliente que armazene `visitas=1`; `expires` define vencimento, `Max-Age=3600` equivale a uma hora, `path` delimita o caminho, e `SameSite=Lax` controla o envio em contextos entre sites.
- `Content-Type: text/html; charset=UTF-8`: o servidor identifica o conteúdo como texto HTML em UTF-8.
- **Linha em branco**: separa os cabeçalhos do corpo da resposta HTTP.
- `Você visitou esta página 1 vez(es).`: corpo produzido pelo `echo` do `contador.php`.

**Por que o contador não passa de 1?** Sem `-c` e `-b`, o curl não conserva e reapresenta o cookie entre essas execuções independentes. Por isso, o servidor encontra `$_COOKIE['visitas']` ausente e reinicia a contagem em 1. Isso foi confirmado repetindo o comando duas vezes.

### 2.2 Parte A — curl com armazenamento e envio de cookies (terceira execução)

**Comando executado três vezes:**

```bash
curl.exe -i -c cookies.txt -b cookies.txt http://localhost:8000/q10-cookies/contador.php
```

**Saída capturada da terceira execução, iniciando com um arquivo de cookies vazio/inexistente:**

```text
HTTP/1.1 200 OK
Host: localhost:8000
Date: Wed, 21 Oct 2026 00:08:18 GMT
Connection: close
X-Powered-By: PHP/8.4.24
Set-Cookie: visitas=3; expires=Wed, 21 Oct 2026 01:08:18 GMT; Max-Age=3600; path=/q10-cookies/; SameSite=Lax
Content-Type: text/html; charset=UTF-8

Você visitou esta página 3 vez(es).
```

**Explicação linha por linha:**

- `HTTP/1.1 200 OK`: a terceira requisição foi processada com sucesso.
- `Host: localhost:8000`: identifica o endereço usado no teste, ecoado pelo servidor de desenvolvimento.
- `Date: ... GMT`: data e hora da resposta.
- `Connection: close`: indica o encerramento da conexão após a resposta.
- `X-Powered-By: PHP/8.4.24`: informa a versão do PHP no ambiente em que os testes foram executados.
- `Set-Cookie: visitas=3; ...`: atualiza o cookie salvo no cliente para `3`, com nova expiração de uma hora; os demais atributos são o caminho e a política `SameSite`.
- `Content-Type: text/html; charset=UTF-8`: define o tipo e a codificação do corpo.
- **Linha em branco**: divide os cabeçalhos e o corpo.
- `Você visitou esta página 3 vez(es).`: o servidor recebeu o valor anterior `2`, somou 1 e exibiu `3`.

**Opções do curl:** `-c cookies.txt` grava/atualiza os cookies recebidos no arquivo indicado. `-b cookies.txt` lê esse arquivo e envia cookies aplicáveis na próxima requisição. Assim, a primeira requisição responde com 1, a segunda com 2 e a terceira com 3. O próprio cliente é quem conserva o valor do cookie entre as chamadas; o PHP somente o lê e solicita sua atualização.

### 2.3 Parte B — `login.php` antes da correção

**Comando:**

```bash
curl.exe -i http://localhost:8000/q10-cookies/login.php
```

**Saída capturada com a versão original fornecida:**

```text
HTTP/1.1 200 OK
Host: localhost:8000
Date: Wed, 21 Oct 2026 00:08:18 GMT
Connection: close
X-Powered-By: PHP/8.4.24
Content-type: text/html; charset=UTF-8

Carregando a página...<br />
<b>Warning</b>:  Cannot modify header information - headers already sent by (output started at /tmp/q10test_8lj06ht5/www/q10-cookies/login.php:2) in <b>/tmp/q10test_8lj06ht5/www/q10-cookies/login.php</b> on line <b>3</b><br />
<br />
<b>Warning</b>:  Cannot modify header information - headers already sent by (output started at /tmp/q10test_8lj06ht5/www/q10-cookies/login.php:2) in <b>/tmp/q10test_8lj06ht5/www/q10-cookies/login.php</b> on line <b>4</b><br />
```

**Explicação linha por linha:**

- `HTTP/1.1 200 OK`: a resposta ficou com status de sucesso padrão, pois o redirecionamento não conseguiu definir seu status 302.
- `Host: localhost:8000`: endereço e porta usados na requisição, refletidos pelo servidor PHP de teste.
- `Date: ... GMT`: data e horário da resposta.
- `Connection: close`: informa que a conexão será encerrada.
- `X-Powered-By: PHP/8.4.24`: versão do PHP do ambiente de testes.
- `Content-type: text/html; charset=UTF-8`: tipo de conteúdo padrão dessa resposta, que inclui texto e avisos formatados em HTML.
- **Linha em branco**: separa cabeçalhos do corpo.
- `Carregando a página...<br />`: texto que o `echo` enviou primeiro; no modo de exibição de erros, o PHP inclui marcação HTML nas mensagens.
- **Primeiro `Warning` (linha 3 do `login.php`)**: `setcookie()` tentou modificar o cabeçalho, mas o corpo já havia começado a ser enviado na linha 2.
- `<br />` isolado: quebra de linha HTML adicionada à saída dos avisos.
- **Segundo `Warning` (linha 4 do `login.php`)**: `header('Location: ...')` também tentou enviar um cabeçalho tarde demais e não conseguiu redirecionar.

**Consequência:** a resposta não contém `Set-Cookie` nem `Location`, pois as chamadas que os enviariam falharam. Os avisos aparecem na resposta quando `display_errors` está habilitado; se estiver desabilitado, podem aparecer somente no log.

### 2.4 Parte B — `login.php` depois da correção

**Comando:**

```bash
curl.exe -i http://localhost:8000/q10-cookies/login.php
```

**Saída capturada:**

```text
HTTP/1.1 302 Found
Host: localhost:8000
Date: Wed, 21 Oct 2026 00:08:18 GMT
Connection: close
X-Powered-By: PHP/8.4.24
Set-Cookie: usuario_logado=true; expires=Wed, 21 Oct 2026 01:08:18 GMT; Max-Age=3600; path=/q10-cookies/; SameSite=Lax
Location: dashboard.php
Content-type: text/html; charset=UTF-8
```

**Explicação linha por linha:**

- `HTTP/1.1 302 Found`: resposta de redirecionamento temporário para outra página.
- `Host: localhost:8000`: endereço da requisição, reproduzido pelo servidor de teste.
- `Date: ... GMT`: data e hora da resposta.
- `Connection: close`: indica que a conexão será encerrada.
- `X-Powered-By: PHP/8.4.24`: versão do PHP do teste.
- `Set-Cookie: usuario_logado=true; ...`: pede ao cliente para guardar o cookie de demonstração `usuario_logado` com valor `true`, válido por uma hora e no caminho indicado.
- `Location: dashboard.php`: informa ao cliente o endereço de destino do redirecionamento, relativo à URL atual.
- `Content-type: text/html; charset=UTF-8`: tipo de conteúdo HTTP definido pelo servidor na ausência de um `Content-Type` explícito no script.
- **Linha em branco**: marca o fim dos cabeçalhos. Não há corpo relevante na resposta, pois o script termina com `exit`.

**Observação:** o `curl -i` mostra a primeira resposta `302`, mas **não segue automaticamente** o redirecionamento. Para conferir o `dashboard.php`, execute `curl.exe -i -L -c cookies.txt -b cookies.txt http://localhost:8000/q10-cookies/login.php`, preferencialmente com um arquivo de cookies separado do contador.

## 3. Perguntas

### 3.1 Qual cabeçalho grava o cookie? Por que o contador não passa de 1 sem `-c` e `-b`?

O cabeçalho é **`Set-Cookie`**, enviado pelo servidor para solicitar que o cliente armazene o cookie. Sem `-c` e `-b`, as execuções independentes do curl não preservam o cookie para a próxima requisição. Assim, `$_COOKIE['visitas']` não contém o valor anterior, e o contador volta a 1.

### 3.2 O que fazem `-c` e `-b`? O que isso prova sobre quem "lembra" do usuário no HTTP?

**`-c cookies.txt`** grava os cookies recebidos em um arquivo. **`-b cookies.txt`** lê os cookies salvos nesse arquivo e os envia ao servidor quando se aplicam à requisição. Isso demonstra que o HTTP é sem estado por padrão: o cliente armazena o identificador ou valor do cookie, e o reenvia para que o servidor consiga reconhecer o estado anterior. Em sistemas reais, o servidor também pode manter dados associados a um identificador de sessão.

### 3.3 Qual aviso apareceu e por que o redirecionamento não aconteceu?

Apareceu o aviso **`Warning: Cannot modify header information - headers already sent`**. O `echo` foi executado antes de `setcookie()` e `header()`, iniciando o corpo da resposta. Com o buffering desabilitado, o servidor não pode modificar os cabeçalhos que já foram enviados; por isso o cabeçalho `Location` não foi emitido e não ocorreu o redirecionamento.

### 3.4 Explique o status, `Location` e `Set-Cookie`. Por que devem vir antes de `echo`?

O status **`302 Found`** informa um redirecionamento temporário. O cabeçalho **`Location: dashboard.php`** informa a página que o cliente deverá solicitar em seguida. O cabeçalho **`Set-Cookie: usuario_logado=true`** solicita que o cliente armazene um cookie por uma hora. `setcookie()` e `header()` precisam vir antes de qualquer `echo` porque modificam os **cabeçalhos HTTP**, que são enviados antes do corpo da resposta. Após iniciar o envio do corpo, os cabeçalhos não podem mais ser alterados sem mecanismos de buffering.

## 4. Captura solicitada no DevTools (pendente)

1. Inicie o servidor na raiz do projeto e abra `http://localhost:8000/q10-cookies/contador.php` em uma aba do navegador.
2. Pressione F5 algumas vezes para aumentar o contador.
3. Abra o DevTools com F12 e vá em **Application > Storage > Cookies > http://localhost:8000** (em alguns navegadores, o caminho é **Aplicativo > Armazenamento > Cookies**).
4. Localize `visitas` e confira **Name**, **Value**, **Domain**, **Path** e **Expires**.
5. Tire uma captura e salve como `q10-cookies/prints/cookies-application.png`.

**Não incluí uma captura fictícia**: essa imagem precisa mostrar os cookies reais do seu navegador.

## 5. Conclusão

A atividade evidencia que o cliente (navegador ou curl com arquivo de cookies) guarda e devolve os cookies para permitir uma contagem entre requisições. Também demonstra que a ordem da resposta HTTP importa: cabeçalhos como `Set-Cookie` e `Location` devem ser definidos antes que o corpo seja enviado.
