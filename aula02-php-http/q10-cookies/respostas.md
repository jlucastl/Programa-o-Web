# Questão 10: Cookies e a ordem da resposta HTTP

**Nível:** 🔴 Avançado

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `contador.php` | Parte A: criado por você |
| `login.php` | Parte B: código fornecido com erro (corrija no item 1.2) |
| `dashboard.php` | Parte B: criado por você |
| `prints/cookies-application.png` | DevTools, aba Application > Cookies, mostrando o cookie do contador |

> O arquivo `cookies.txt` criado pelo curl **não** deve ser enviado ao GitHub (ele já está no `.gitignore`).

## 1. Análise do código

**1.1 **Parte A:** cole o código do `contador.php` e explique como ele lê e grava o cookie.**

_(responda aqui)_

**1.2 **Parte B:** cole o `login.php` corrigido e o `dashboard.php`, e explique a correção.**

_(responda aqui)_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 **Parte A:** saída de `curl.exe -i http://localhost:8000/q10-cookies/contador.php`**

```text
(cole aqui a saída do terminal)
```

**Explicação linha por linha:**

_(responda aqui)_

**2.2 **Parte A:** saída de `curl.exe -i -c cookies.txt -b cookies.txt http://localhost:8000/q10-cookies/contador.php`, executado **três vezes** (cole a terceira)**

```text
(cole aqui a saída do terminal)
```

**Explicação linha por linha:**

_(responda aqui)_

**2.3 **Parte B, antes da correção:** saída de `curl.exe -i http://localhost:8000/q10-cookies/login.php`**

```text
(cole aqui a saída do terminal)
```

**Explicação linha por linha:**

_(responda aqui)_

**2.4 **Parte B, depois da correção:** saída de `curl.exe -i http://localhost:8000/q10-cookies/login.php`**

```text
(cole aqui a saída do terminal)
```

**Explicação linha por linha:**

_(responda aqui)_

## 3. Perguntas

**3.1 No item 2.1, qual cabeçalho da resposta grava o cookie? E por que o contador não passa de 1 se você repetir o comando sem `-c` e `-b`?**

_(responda aqui)_

**3.2 No item 2.2, o que fazem as opções `-c` e `-b`? O que isso prova sobre quem "lembra" do usuário no HTTP?**

_(responda aqui)_

**3.3 No item 2.3, qual aviso apareceu e por que o redirecionamento não aconteceu?**

_(responda aqui)_

**3.4 No item 2.4, explique o status, o cabeçalho `Location` e o cabeçalho `Set-Cookie`. Por que `setcookie()` e `header()` precisam vir antes de qualquer `echo`?**

_(responda aqui)_
