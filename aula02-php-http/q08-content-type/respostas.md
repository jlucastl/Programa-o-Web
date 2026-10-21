# Questão 08: O que o navegador entende? (Content-Type)

**Nível:** 🟡 Intermediário

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `dados.php` | Código fornecido. No item 2.2 você vai descomentar a linha do header |
| `prints/devtools-html.png` | DevTools com o Content-Type antes de descomentar |
| `prints/devtools-json.png` | DevTools com o Content-Type depois de descomentar |

## 1. Análise do código

**1.1 Explique o que fazem `json_encode`, `JSON_PRETTY_PRINT` e `JSON_UNESCAPED_UNICODE`.**

_
json_encode()
    É uma função que converte dados PHP (como arrays e objetos) em uma string JSON.

JSON_PRETTY_PRINT
    É uma constante que faz o JSON ficar mais organizado e legível, adicionando indentação e quebras de linha.

JSON_UNESCAPED_UNICODE
    É uma constante que permite manter caracteres Unicode, como letras acentuadas, sem convertê-los em sequências de escape.
_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 Saída de `curl.exe -i http://localhost:8000/q08-content-type/dados.php` com o header **comentado****

```text
HTTP/1.1 200 OK
Host: localhost:8000
Date: Tue, 20 Oct 2026 22:51:39 GMT
Connection: close
X-Powered-By: PHP/8.5.11
Content-type: text/html; charset=UTF-8

{
    "disciplina": "Programação Web I",
    "status": "Ativo",
    "alunos": 30
}
```

**Explicação linha por linha:**

_
1. HTTP/1.1: versão do protocolo HTTP utilizada na resposta.
200: código de status que indica que a requisição foi processada com sucesso.
OK: descrição textual do código 200.

2. Host: identifica o endereço e a porta do servidor.
localhost: representa o próprio computador.
8000: porta utilizada pelo servidor PHP.

3. Indica a data e a hora em que o servidor gerou a resposta.
Tue: terça-feira.
20 Oct 2026: 20 de outubro de 2026.
22:51:39: horário da resposta.
GMT: horário de referência equivalente ao UTC.

4. Connection: close
Indica que a conexão TCP será encerrada após o envio da resposta HTTP, em vez de permanecer aberta para outras requisições.

5. X-Powered-By: PHP/8.5.11
Informa que o servidor está utilizando o PHP na versão 8.5.11.

6. Content-type: identifica o formato do conteúdo.
text/html: informa que o conteúdo é HTML.
charset=UTF-8: define a codificação dos caracteres, permitindo representar corretamente letras acentuadas.

    EXPLICAÇÃO DO CORPO

7. "disciplina": "Programação Web I" Define a propriedade disciplina com um valor do tipo string.

8. "status": "Ativo" Define a propriedade status com um valor do tipo string.

9. "alunos": 30	Define a propriedade alunos com um valor numérico inteiro.
_

**2.2 Saída do mesmo comando com o header **descomentado****

```text
HTTP/1.1 200 OK
Host: localhost:8000
Date: Tue, 20 Oct 2026 23:00:00 GMT
Connection: close
X-Powered-By: PHP/8.5.11
Content-Type: application/json; charset=utf-8

{
    "disciplina": "Programação Web I",
    "status": "Ativo",
    "alunos": 30
}
```

**Explicação linha por linha:**

_
1. HTTP/1.1: versão do protocolo HTTP utilizada na resposta.
200: código de status que indica que a requisição foi processada com sucesso.
OK: descrição textual do código 200.

2. Host: identifica o endereço e a porta do servidor.
localhost: representa o próprio computador.
8000: porta utilizada pelo servidor PHP.

3. Indica a data e a hora em que o servidor gerou a resposta.
Tue: terça-feira.
20 Oct 2026: 20 de outubro de 2026.
22:51:39: horário da resposta.
GMT: horário de referência equivalente ao UTC.

4. Connection: close
Indica que a conexão TCP será encerrada após o envio da resposta HTTP, em vez de permanecer aberta para outras requisições.

5. X-Powered-By: PHP/8.5.11
Informa que o servidor está utilizando o PHP na versão 8.5.11.

6. Content-type: identifica o formato do conteúdo.
application/json: informa que o conteúdo é JSON.
charset=UTF-8: define a codificação dos caracteres, permitindo representar corretamente letras acentuadas.

    EXPLICAÇÃO DO CORPO

7. "disciplina": "Programação Web I" Define a propriedade disciplina com um valor do tipo string.

8. "status": "Ativo" Define a propriedade status com um valor do tipo string.

9. "alunos": 30	Define a propriedade alunos com um valor numérico inteiro.
_

## 3. Perguntas

**3.1 Compare o cabeçalho `Content-Type` nas duas saídas. O que mudou?**

_O content-type na primeira saida era text/html que é o padrão do php. Na segunda saída o content-type se tornou application/json simbolizando que seu tipo de conteúdo é JSON_

**3.2 O corpo da resposta mudou? O que isso mostra sobre quem decide como o conteúdo é interpretado?**

_Não, o corpo da resposta não mudou. Os dados JSON permaneceram exatamente iguais. A única alteração ocorreu no cabeçalho Content-Type, que passou de text/html para application/json.

Isso demonstra que o servidor informa o tipo de conteúdo por meio do cabeçalho HTTP, enquanto o cliente (navegador ou aplicação) utiliza essa informação para decidir como interpretar os dados recebidos.

Portanto, o mesmo conteúdo pode ser interpretado de maneiras diferentes dependendo do Content-Type informado pelo servidor e do comportamento do cliente._

**3.3 Retire o `JSON_UNESCAPED_UNICODE`, rode o curl de novo e explique o que aconteceu com "Programação".**

_Ao retirar o JSON_UNESCAPED_UNICODE da função json_encode(), a palavra "Programação" passa a ser representada assim: "disciplina": "Programa\u00e7\u00e3o Web I. 

Isso acontece porque, por padrão, o json_encode() converte caracteres Unicode não ASCII em sequências de escape_
