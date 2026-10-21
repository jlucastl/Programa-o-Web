# Questão 09: Método HTTP e código de status

**Nível:** 🔴 Avançado

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `api.php` | Criado por você, conforme o enunciado |

## 1. Análise do código

**1.1 Cole o código do `api.php` e explique cada parte: a verificação do método, o status, os cabeçalhos e o JSON.**

_
$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo !== 'POST') {
    http_response_code(405);
    header('Allow: POST');

    echo json_encode(
        ['erro' => 'Método não permitido'],
        JSON_UNeSCAPED_UNICODE
    );

    exit;
}

http_response_code(200);

echo json_encode(
    ['sucesso' => 'Dados recebidos'],
    JSON_UNESCAPED_UNICODE
);
_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 Saída de `curl.exe -i http://localhost:8000/q09-somente-post/api.php`**

```text
HTTP/1.1 405 Method Not Allowed
Host: localhost:8000
Date: Tue, 20 Oct 2026 23:47:02 GMT
Connection: close
X-Powered-By: PHP/8.5.11
Allow: POST
Content-type: text/html; charset=UTF-8

{"erro":"Método não permitido"}
```

**Explicação linha por linha:**

_HTTP/1.1 405 Method Not Allowed
    indica que o servidor utiliza HTTP/1.1 e que o método GET não é permitido para esse recurso. O código 405 representa essa restrição.
Host: 
    localhost:8000: identifica o servidor local e a porta 8000. Embora apareça na saída apresentada, Host é normalmente um cabeçalho da requisição, não da resposta.
Date: 
    Tue, 20 Oct 2026 23:43:26 GMT: informa a data e o horário em que a resposta foi gerada, utilizando GMT (UTC).
Connection: close
    indica que a conexão será encerrada depois que o servidor terminar de enviar a resposta.
X-Powered-By: PHP/8.5.11 
    informa que o servidor utiliza PHP na versão 8.5.11.
Content-Type: application/json 
    charset=utf-8: informa que os dados retornados estão no formato JSON e utilizam a codificação UTF-8.
Allow: POST 
    informa ao cliente que o único método HTTP permitido pela API é POST.
{"erro":"Método não permitido"}: 
    objeto JSON contendo uma mensagem que explica por que a requisição foi rejeitada._

**2.2 Saída de `curl.exe -i -X POST http://localhost:8000/q09-somente-post/api.php`**

```text
HTTP/1.1 200 OK
Host: localhost:8000
Date: Tue, 20 Oct 2026 23:50:09 GMT
Connection: close
X-Powered-By: PHP/8.5.11
Content-type: text/html; charset=UTF-8

{"sucesso":"Dados recebidos"}
```

**Explicação linha por linha:**

_
HTTP/1.1 200 OK: 
    informa que a requisição foi processada com sucesso. O código 200 indica que o método utilizado é permitido e que o processamento foi bem-sucedido.
Host: localhost:8000: 
    identifica o endereço local e a porta do servidor, sendo normalmente um cabeçalho de requisição.
Date: Tue, 20 Oct 2026 23:43:30 GMT: 
    registra a data e o horário da resposta.
Connection: close: 
    indica que a conexão será encerrada após o envio da resposta.
X-Powered-By: PHP/8.5.11: 
    informa que o servidor está utilizando PHP 8.5.11.
Content-Type: application/json 
    charset=utf-8: identifica a resposta como JSON codificado em UTF-8.
{"sucesso":"Dados recebidos"}: 
    objeto JSON que confirma que a requisição POST foi aceita pela API. Nesse exemplo, não é necessário enviar dados no corpo da requisição.
_

**2.3 Saída de `curl.exe -i -X PUT http://localhost:8000/q09-somente-post/api.php`**

```text
HTTP/1.1 405 Method Not Allowed
Host: localhost:8000
Date: Tue, 20 Oct 2026 23:53:51 GMT
Connection: close
X-Powered-By: PHP/8.5.11
Allow: POST
Content-type: text/html; charset=UTF-8

{"erro":"Método não permitido"}
```

**Explicação linha por linha:**

_
HTTP/1.1 405 Method Not Allowed: 
    informa que a requisição foi rejeitada porque o método PUT não é permitido pela API.
Host: localhost:8000: 
    identifica o servidor local e a porta utilizada, sendo normalmente enviado pelo cliente na requisição.
Date: Tue, 20 Oct 2026 23:43:35 GMT: 
    indica a data e o horário em que o servidor gerou a resposta.
Connection: close: 
    informa que a conexão será encerrada após o envio da resposta.
X-Powered-By: PHP/8.5.11: 
    identifica a versão do PHP utilizada pelo servidor.
Content-Type: application/json: 
    charset=utf-8: informa que o conteúdo retornado está no formato JSON com codificação UTF-8.
Allow: POST: 
    informa que somente o método POST é aceito pelo recurso solicitado.
{"erro":"Método não permitido"}: 
    objeto JSON que informa que o método utilizado na requisição não é permitido.
_

**2.4 Log do servidor das três requisições**

```text
Requisição 1:
    [Tue Oct 20 20:56:08 2026] [::1]:36876 Accepted
    [Tue Oct 20 20:56:08 2026] [::1]:36876 [405]: GET /q09-somente-post/api.php
    [Tue Oct 20 20:56:08 2026] [::1]:36876 Closing


Requisição 2:
    [Tue Oct 20 20:50:09 2026] [::1]:38654 Accepted
    [Tue Oct 20 20:50:09 2026] [::1]:38654 [200]: POST /q09-somente-post/api.php
    [Tue Oct 20 20:50:09 2026] [::1]:38654 Closing


Requisição 3:

    [Tue Oct 20 20:53:51 2026] [::1]:42620 Accepted
    [Tue Oct 20 20:53:51 2026] [::1]:42620 [405]: PUT /q09-somente-post/api.php
    [Tue Oct 20 20:53:51 2026] [::1]:42620 Closing

```

**Explicação linha por linha:**

_
Todas as requisições tem as seguintes linhas:

[Tue Oct 20 20:56:08 2026]: 
    data e horário em que ocorreu a conexão.
[::1]: 
    endereço IPv6 de loopback, equivalente ao 127.0.0.1 no IPv4, representando o próprio computador.
36876: 
    porta de origem utilizada pelo cliente para estabelecer a conexão.
Accepted: 
    informa que o servidor aceitou a conexão.

Requisição 1:
[405]: 
    código HTTP que indica que o método utilizado não é permitido.
GET: 
    método HTTP utilizado na requisição.
/q09-somente-post/api.php: 
    caminho do arquivo solicitado.

Requisição 2:
[200]:
    código HTTP que indica que a requisição foi processada com sucesso.
POST: 
    método HTTP utilizado na requisição
/q09-somente-post/api.php: 
    caminho do arquivo solicitado.

Requisição 3:
[405]: 
código HTTP indicando que o método utilizado não é permitido.
PUT: 
    método HTTP utilizado na requisição.
/q09-somente-post/api.php: 
    caminho do arquivo solicitado.
_

## 3. Perguntas

**3.1 Que método o navegador usa ao abrir o endereço? Qual status ele recebe?**

_Ao abrir o endereço diretamente no navegador, ele utiliza o método HTTP GET, pois esse é o método padrão para solicitar páginas e recursos pela barra de endereços.

O servidor retorna o status 405 Method Not Allowed, pois a API foi configurada para aceitar apenas requisições POST._

**3.2 Para que serve o cabeçalho `Allow`?**

_O cabeçalho HTTP Allow serve para informar ao cliente (navegador ou aplicação) quais métodos HTTP são permitidos para acessar determinado recurso._

**3.3 No log, onde aparecem o método e o status de cada requisição?**

_Na segunda linha de cada requisição_
