# Questão 01: O primeiro script e o log do servidor

**Nível:** 🟢 Básico

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `ola.php` | Código fornecido (não altere) |

## 1. Análise do código

**1.1 O arquivo mistura HTML e PHP. Indique quais linhas são HTML e quais são PHP.**

_As linhas de 1 a 8 são linhas do HTML, as linhas 9 e 10 são linhas do PHP. A linha imprime na tela a mensagem "Este texto foi escrito pelo PHP." através do comando <?php echo "" ?>

**1.2 Qual a diferença entre `<?php echo ... ?>` e `<?= ... ?>`?**

_"<?php echo ?>" é o comando de impressão de texto padrão do php. o "<?= ?>" é a versão abreviada do php echo. A versão abreviada é geralmente utlizada para deixar o código mais limpo e legível_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 Log do servidor (as linhas que apareceram no terminal do `php -S` ao abrir a página no navegador)**

```text
[Sun Oct 11 19:39:17 2026] [::1]:45466 Accepted
[Sun Oct 11 19:39:17 2026] [::1]:45466 [200]: GET /q01-primeiro-script/ola.php
[Sun Oct 11 19:39:17 2026] [::1]:45466 Closing
```

**Explicação linha por linha:**

_[Sun Oct 11 19:42:11 2026] é a data e horas em que o servidor receberam o pedido. [::1] é equivalente ao 127.0.0.1 (localhost) :45466 é a porta de origem que o navegador abriu para se comunicar com o php

1. "Accepted" O servidor aceitou a conexão com o navegador
2. [200] é um código de status HTTP que significa que a conexão foi um sucesso. "GET" é o metodo HTTP para pedir a página para o navegador. o que vem a seguir é o caminho do arquivo que o php executou
3. "Closing" Significa que o servidor enviou a resposta HTML e terminou a conexão TCP_

**2.2 Saída de `curl.exe -i http://localhost:8000/q01-primeiro-script/ola.php`**

```text
HTTP/1.1 200 OK
Host: localhost:8000
Date: Sun, 11 Oct 2026 22:42:11 GMT
Connection: close
X-Powered-By: PHP/8.5.10
Content-type: text/html; charset=UTF-8

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Questão 01</title>
</head>
<body>
  <h1>Olá, turma!</h1>
  <p>Este texto foi escrito pelo PHP.</p>
  <p>Hora no servidor: 22:42:11</p>
</body>
</html>
```

**Explicação linha por linha:**

_
1. Fala a versão do protocolo HTTP utilizada, 200 o código de status HTTP informando que a conexão está OK
2. O endereço e a porta do servidor para onde a requisição foi enviada
3. A data e a hora exatas do envio da resposta
4. Informa que a conexão será TCP será fechada imediatamente após a entrega desta resposta
5. Cabeçalho informativo que revela a linguagem e a versão do PHP
6. Informa o conteúdo (HTML) define a codificação de caracteres como UTF-8
7-16. O código dado pelo professor.
17. A função de data/hora do PHP "<?php echo '' ?>" foi processada no servidor e inserida como texto puro dentro da tag HTML antes de enviar a resposta ao curl
_

## 3. Perguntas

**3.1 Aperte F5 três vezes. O que muda na página e no log? Por quê?**

_
1. A data e hora (principalmente a hora). 
2. A porta utilizada, A porta é temporaria e se modifica a cada execução do código
_

**3.2 No "Exibir código-fonte" (Ctrl+U), aparece alguma linha de PHP? Explique.**

_Não. O servidor envia para o seu navegador apenas o resultado final limpo em HTML. As tags e instruções do PHP são consumidas durante o processamento no servidor e destruídas antes de qualquer dado sair da sua máquina. _

**3.3 Na saída do curl, o que indicam a primeira linha, o cabeçalho `Content-type` e o cabeçalho `X-Powered-By`?**

_X-Powered-By: O cabeçalho informativo que revela a linguagem e a versão do PHP (PHP/8.5.10)
Content-type: Informa o conteúdo (HTML) define a codificação de caracteres como UTF-8_
