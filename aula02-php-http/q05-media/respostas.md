# Questão 05: Média com dados da URL

**Nível:** 🟡 Intermediário

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `media.php` | Código fornecido, que você vai modificar no item 1.2 |

## 1. Análise do código

**1.1 Explique o código original: o que fazem `const`, os parênteses no cálculo e o operador `? :`?**

_Const é uma variável constante cujo valor não pode ser alterado, os parênteses no cálculo são para que a operação que esteja dentro dos parênteses tenha prioridade e seja calculado primeiro. O operador ? é uma versão abreviada do if else_

**1.2 Modifique o código para receber as notas pela URL (`?n1=...&n2=...`), usando `??` com valor padrão `0` e convertendo para `float`. Cole aqui o trecho que você alterou e explique.**

_
Linha 4 e 5.

$n1 = (float) ($_GET['n1'] ?? 0);
$n2 = (float) ($_GET['n2'] ?? 0);

O array superglobal $_GET é utilizado para capturar os parâmetros enviados através da URL (Query String), como por exemplo ?n1=8&n2=6 na URL. 

É utilizado ?? para verificar se foi passado valores na URL, caso não os valores são preenchidos com 0.

E também ocorre a conversão para float, os valores da URL chegam como string e conversão garante que sejam tratados como números e não como texto.
_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 Saída de `curl.exe -s "http://localhost:8000/q05-media/media.php?n1=5&n2=6"`**

```text
HTTP/1.1 200 OK
Host: localhost:8000
Date: Mon, 12 Oct 2026 14:26:49 GMT
Connection: close
X-Powered-By: PHP/8.5.10
Content-type: text/html; charset=UTF-8

<p>Notas: 5 e 6</p>
<p>Média: 5.5</p>
<p>Situação: Em recuperação</p>
```

**Explicação linha por linha:**

_
1. Notas que são enviadas pela URL "?n1=5&n2=6"
2. Média dos valores fornecidos calculada 
3. Situação em que o aluno se encontra
_

**2.2 Saída de `curl.exe -s "http://localhost:8000/q05-media/media.php?n1=9"`**

```text
HTTP/1.1 200 OK
Host: localhost:8000
Date: Mon, 12 Oct 2026 14:29:14 GMT
Connection: close
X-Powered-By: PHP/8.5.10
Content-type: text/html; charset=UTF-8

<p>Notas: 9 e 0</p>
<p>Média: 4.5</p>
<p>Situação: Em recuperação</p>
```

**Explicação linha por linha:**

_
1. São os valores enviados pela URL, como o valor de n2 não foi enviado, ela é preenchida por 0 graças ao "?? 0"
2. Média calculada
3. Situação do aluno
_

**2.3 Log do servidor das duas requisições acima**

```text
Log da pŕimeira requisição (http://localhost:8000/q05-media/media.php?n1=5&n2=6):

    [Mon Oct 12 11:32:38 2026] [::1]:35736 Accepted
    [Mon Oct 12 11:32:38 2026] [::1]:35736 [200]: GET /q05-media/media.php?n1=5&n2=6
    [Mon Oct 12 11:32:38 2026] [::1]:35736 Closing

Log da segunda requisição (http://localhost:8000/q05-media/media.php?n1=9): 

    [Mon Oct 12 11:31:22 2026] [::1]:57436 Accepted
    [Mon Oct 12 11:31:22 2026] [::1]:57436 [200]: GET /q05-media/media.php?n1=9
    [Mon Oct 12 11:31:22 2026] [::1]:57436 Closing
```

**Explicação linha por linha:**

_
Explicação do primeiro log:
    1. O servidor PHP recebeu e aceitou uma conexão de rede vinda do seu navegador através do endereço IPv6 local (::1) na porta temporária 35736
    2. O servidor processou com sucesso (código HTTP 200) a requisição do arquivo media.php, recebendo os dois parâmetros via URL (n1=5 e n2=6)
    3. O PHP enviou a resposta HTML final de volta ao navegador e encerrou a conexão de rede da porta 35736.
Explicação do segundo log:
    1. O servidor aceitou uma nova conexão do navegador, desta vez atribuindo uma nova porta temporária de origem (57436).
    2. O servidor processou com sucesso (código HTTP 200) a requisição do mesmo script, mas enviando apenas o parâmetro n1=9. Graças ao operador ?? 0, o PHP usou 0 para a nota n2 sem gerar avisos de erro.
    3. O PHP enviou a resposta HTML e finalizou a conexão da porta 57436.
_

## 3. Perguntas

**3.1 No log, onde aparecem os valores das notas? Que parte da URL é essa?**

_Os valores das notas aparecem após o ponto de interrogação, essa parte da URL é chamada de Query String_

**3.2 Na requisição 2.2, a nota 2 não foi enviada. Qual valor o código usou? Qual operador garantiu isso?**

_Foi utilizado o Valor 0, O operador "?? 0"_

**3.3 O que acontece com `?n1=abc&n2=10`? Explique o papel do `(float)`.**

_O valor é trasformado em 0.0 graças ao operador ??. E o papel do float é converter string que são enviadas pelo URL e transformar em um número de fato._
