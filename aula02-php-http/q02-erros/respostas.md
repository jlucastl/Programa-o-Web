# Questão 02: Lendo mensagens de erro

**Nível:** 🟢 Básico

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `erro.php` | Código fornecido com um erro proposital (corrija no item 3.3) |

## 1. Análise do código

**1.1 Antes de executar: qual é o erro do código? Em que linha ele está?**

_O erro em si está na linha 2. O erro é a simples ausência de um ";". O php interpreta o fim de cada comando através do ";" como não tem o php interpreta a linha 2 e a linha 3 como uma só, gerando erro_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 Log do servidor ao abrir a página com `display_errors=1`**

```text
[Sun Oct 11 23:25:05 2026] [::1]:38212 Accepted
[Sun Oct 11 23:25:05 2026] PHP Parse error:  syntax error, unexpected token "echo" in /home/joao/Documentos/Programação Web/aula02-php-http/q02-erros/erro.php on line 3
[Sun Oct 11 23:25:05 2026] [::1]:38212 [200]: GET /q02-erros/erro.php - syntax error, unexpected token "echo" in /home/joao/Documentos/Programação Web/aula02-php-http/q02-erros/erro.php on line 3
[Sun Oct 11 23:25:05 2026] [::1]:38212 Closing
[Sun Oct 11 23:25:05 2026] [::1]:38220 Accepted
[Sun Oct 11 23:25:05 2026] [::1]:38220 [404]: GET /favicon.ico - No such file or directory
[Sun Oct 11 23:25:05 2026] [::1]:38220 Closing
```

**Explicação linha por linha:**

_
1. O servidor PHP aceitou uma nova conexão vinda do seu navegador (pelo protocolo IPv6 ::1 na porta temporária 38212)
2. Erro de sintaxe (Parse Error). O PHP tentou interpretar o arquivo erro.php, mas encontrou a palavra echo na linha 3 em um lugar onde não esperava (provavelmente faltou um ponto e vírgula ; no final da linha 2)
3. Log de acesso da requisição HTTP GET. Mesmo ocorrendo um erro de código no PHP, o servidor respondeu com status 200 (entregando a página com a mensagem de erro na tela) e registrou o erro no log.
4. O servidor encerrou a conexão HTTP referente a essa primeira requisição do arquivo erro.php.
5. O navegador abriu uma segunda conexão (porta 38220), disparada automaticamente logo após carregar a página.
6. O navegador tentou buscar automaticamente o ícone da aba da página (favicon.ico). Como o arquivo não existe na pasta do seu projeto, o servidor respondeu com status 404 (Não Encontrado).
7. O servidor encerrou a conexão HTTP referente à busca do ícone.
_

**2.2 Log do servidor ao abrir a página com `display_errors=0`**

```text
[Sun Oct 11 23:24:55 2026] [::1]:44626 Accepted
[Sun Oct 11 23:24:55 2026] PHP Parse error:  syntax error, unexpected token "echo" in /home/joao/Documentos/Programação Web/aula02-php-http/q02-erros/erro.php on line 3
[Sun Oct 11 23:24:55 2026] [::1]:44626 [500]: GET /q02-erros/erro.php - syntax error, unexpected token "echo" in /home/joao/Documentos/Programação Web/aula02-php-http/q02-erros/erro.php on line 3
[Sun Oct 11 23:24:55 2026] [::1]:44626 Closing
```

**Explicação linha por linha:**

_
1. O servidor PHP aceitou a conexão de rede vinda do seu navegador (via IPv6 ::1 na porta temporária 44626).
2. O interpretador do PHP registrou no log interno que o código possui um erro de sintaxe (Parse Error) na linha 3 do arquivo erro.php.
3. Diferente da execução anterior, desta vez o servidor respondeu com status HTTP 500 (Internal Server Error). Como foi desativado a exibição de erros na tela (display_errors=0), o PHP impediu que os detalhes do erro fossem enviados como HTML (status 200). Em vez disso, retornou uma resposta em branco de erro interno do servidor e registrou a falha no log.
4. O servidor PHP encerrou a conexão HTTP referente a essa requisição.
_

## 3. Perguntas

**3.1 A mensagem diz que o erro está em qual linha? Por que não é a linha onde falta o `;`?**

_O erro indica a linha 3 porque o PHP só descobre que há um problema quando tenta ler a instrução seguinte e percebe que ela não faz sentido no contexto._

**3.2 Compare o status registrado no log nas duas execuções (`[200]` e `[500]`). Por que eles são diferentes? Qual dos dois é o correto do ponto de vista do HTTP?**

_
A diferença entre os status ocorre devido ao parâmetro display_errors, e o status 500 é o correto do ponto de vista do protocolo HTTP.

Status [200] (com display_errors=1):

    O que aconteceu: O PHP tratou o erro de sintaxe gerando um texto explicativo em HTML e o enviou no corpo da resposta.

    Por que ocorreu 200? Como o servidor enviou uma resposta com corpo em HTML para o navegador (mesmo contendo a mensagem de erro visível), o servidor web considerou que a entrega da página foi realizada com sucesso (200 OK).

Status [500] (com display_errors=0):

    O que aconteceu: Como a exibição de erros na tela estava desativada, o PHP não gerou nenhum HTML para o cliente e informou diretamente ao servidor que o script falhou.

    Por que ocorreu 500? O servidor reconheceu a falha de execução e retornou um código formal de erro interno do servidor (500 Internal Server Error).
_

**3.3 Corrija o código, faça um commit e cole aqui o log da execução corrigida.**

_
[Sun Oct 11 23:40:18 2026] [::1]:35132 Accepted
[Sun Oct 11 23:40:18 2026] [::1]:35132 [200]: GET /q02-erros/erro.php
[Sun Oct 11 23:40:18 2026] [::1]:35132 Closing
_
