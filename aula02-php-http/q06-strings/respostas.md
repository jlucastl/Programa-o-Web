# Questão 06: Strings e acentuação

**Nível:** 🟡 Intermediário

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `palavra.php` | Código fornecido, que você vai completar no item 1.2 |

> Se aparecer `Call to undefined function mb_strlen()`, ative a linha `extension=mbstring` no seu `php.ini` e reinicie o servidor. Registre isso na resposta 3.3.

## 1. Análise do código

**1.1 Explique o código original linha por linha.**

_
1. Tenta capturar o valor enviado pelo parâmetro palavra na URL. Utiliza o operadorn ??. Se o parâmetro palavra não for passado na URL, o PHP atribui a string "Ceara" como valor padrão à variável $palavra.
2. Imprime um parágrafo HTML contendo o valor da variável $palavra.
3. A função strlen() calcula a quantidade de bytes (que em caracteres ASCII padrão equivale à quantidade de letras) da string armazenada em $palavra. O operador de ponto (.) concatena as tags HTML <p>, </p> e o texto "strlen: " com o resultado numérico retornado por strlen($palavra).
_

**1.2 Complete o código para mostrar também: `mb_strlen`, `strtoupper`, `mb_strtoupper` e uma classificação com `if`: "palavra curta" (até 5 letras) ou "palavra longa". Use `mb_strlen` na classificação. Cole o código e explique.**

_
mb_strlen($palavra):
    Diferente do strlen (que conta o número de bytes), a função mb_strlen conta a quantidade real de caracteres multibyte. Em palavras acentuadas como "Ceará", strlen retorna 6 (pois o á ocupa 2 bytes), enquanto mb_strlen retorna 5.

strtoupper($palavra) e mb_strtoupper($palavra):
    strtoupper: Converte apenas caracteres ASCII simples para maiúsculas. Ele falha em converter caracteres acentuados, transformando "ceará" em "CEARá".

    mb_strtoupper: Leva em consideração a tabela Unicode e os acentos, convertendo corretamente "ceará" em "CEARÁ".

Classificação com if / operador ternário:
Armazenamos o resultado de mb_strlen($palavra) na variável $tamanho e usamos essa contagem exata para avaliar a condição <= 5:

    Se for menor ou igual a 5 caracteres (como "Ceará" com 5), a classificação será "Palavra curta".

    Se for maior que 5 (como "Programação" com 11), a classificação será "Palavra longa".
_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 Saída de `curl.exe -s "http://localhost:8000/q06-strings/palavra.php?palavra=Ceara"`**

```text
<p>Palavra: Ceara</p>
<p>strlen: 5</p>
<p>mb_strlen: 5</p>
<p>strtoupper: CEARA</p>
<p>mb_strtoupper: CEARA</p>
<p>Classificação: Palavra curta</p>
```

**Explicação linha por linha:**

_
1. Valor da variavel palavra enviado pela URL.
2. Total de bytes na palavra
3. A quantidade real do valor de bytes
4. Converte as letra minúsculas em maiúsculas sem levar em consideração palavras acentuadas
5. Converte as letra minúsculas em maiúsculas levando em consideração palavras acentuadas
_

**2.2 Abra no navegador `palavra.php?palavra=Ceará` e cole a linha do log do servidor**

```text
<p>Palavra: Ceará</p>
<p>strlen: 6</p>
<p>mb_strlen: 5</p>
<p>strtoupper: CEARá</p>
<p>mb_strtoupper: CEARÁ</p>
<p>Classificação: Palavra curta</p>
```

**Explicação linha por linha:**

_
1. Valor da variavel palavra enviado pela URL.
2. Total de bytes na palavra
3. A quantidade real do valor de bytes
4. Converte as letra minúsculas em maiúsculas sem levar em consideração palavras acentuadas, a palavra á que esta acentuada não foi convertida
5. Converte as letra minúsculas em maiúsculas lenvando em consideração palavras acentuadas, aqui sim foi convertida
_

## 3. Perguntas

**3.1 Compare o `strlen` de "Ceara" e de "Ceará". Por que o acento muda o resultado?**

_Pois com o acento a vogal a tem uma quantidade maior de bytes_

**3.2 No log, a palavra aparece como `Cear%C3%A1`. O que é isso? Por que o navegador transformou o "á"?**

_A especificação original das URLs foi projetada para aceitar apenas um conjunto limitado de caracteres ASCII não formatados, caracteres como acentos não foram projetadas para serem aceitas._

**3.3 Qual a diferença entre `strtoupper` e `mb_strtoupper` com a palavra "Ceará"?**

_ 
strtoupper:
    Converte as letra minúsculas em maiúsculas sem levar em consideração palavras acentuadas.
    
mb_strtoupper:
    Converte as letra minúsculas em maiúsculas levando em consideração palavras acentuadas.
_
