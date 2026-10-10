# Questão 05: Média com dados da URL

**Nível:** 🟡 Intermediário

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `media.php` | Código fornecido, que você vai modificar no item 1.2 |

## 1. Análise do código

**1.1 Explique o código original: o que fazem `const`, os parênteses no cálculo e o operador `? :`?**

_(responda aqui)_

**1.2 Modifique o código para receber as notas pela URL (`?n1=...&n2=...`), usando `??` com valor padrão `0` e convertendo para `float`. Cole aqui o trecho que você alterou e explique.**

_(responda aqui)_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 Saída de `curl.exe -s "http://localhost:8000/q05-media/media.php?n1=5&n2=6"`**

```text
(cole aqui a saída do terminal)
```

**Explicação linha por linha:**

_(responda aqui)_

**2.2 Saída de `curl.exe -s "http://localhost:8000/q05-media/media.php?n1=9"`**

```text
(cole aqui a saída do terminal)
```

**Explicação linha por linha:**

_(responda aqui)_

**2.3 Log do servidor das duas requisições acima**

```text
(cole aqui a saída do terminal)
```

**Explicação linha por linha:**

_(responda aqui)_

## 3. Perguntas

**3.1 No log, onde aparecem os valores das notas? Que parte da URL é essa?**

_(responda aqui)_

**3.2 Na requisição 2.2, a nota 2 não foi enviada. Qual valor o código usou? Qual operador garantiu isso?**

_(responda aqui)_

**3.3 O que acontece com `?n1=abc&n2=10`? Explique o papel do `(float)`.**

_(responda aqui)_
