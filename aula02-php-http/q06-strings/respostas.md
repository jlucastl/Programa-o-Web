# Questão 06: Strings e acentuação

**Nível:** 🟡 Intermediário

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `palavra.php` | Código fornecido, que você vai completar no item 1.2 |

> Se aparecer `Call to undefined function mb_strlen()`, ative a linha `extension=mbstring` no seu `php.ini` e reinicie o servidor. Registre isso na resposta 3.3.

## 1. Análise do código

**1.1 Explique o código original linha por linha.**

_(responda aqui)_

**1.2 Complete o código para mostrar também: `mb_strlen`, `strtoupper`, `mb_strtoupper` e uma classificação com `if`: "palavra curta" (até 5 letras) ou "palavra longa". Use `mb_strlen` na classificação. Cole o código e explique.**

_(responda aqui)_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 Saída de `curl.exe -s "http://localhost:8000/q06-strings/palavra.php?palavra=Ceara"`**

```text
(cole aqui a saída do terminal)
```

**Explicação linha por linha:**

_(responda aqui)_

**2.2 Abra no navegador `palavra.php?palavra=Ceará` e cole a linha do log do servidor**

```text
(cole aqui a saída do terminal)
```

**Explicação linha por linha:**

_(responda aqui)_

## 3. Perguntas

**3.1 Compare o `strlen` de "Ceara" e de "Ceará". Por que o acento muda o resultado?**

_(responda aqui)_

**3.2 No log, a palavra aparece como `Cear%C3%A1`. O que é isso? Por que o navegador transformou o "á"?**

_(responda aqui)_

**3.3 Qual a diferença entre `strtoupper` e `mb_strtoupper` com a palavra "Ceará"?**

_(responda aqui)_
