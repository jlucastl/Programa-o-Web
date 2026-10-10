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

_(responda aqui)_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 Saída de `curl.exe -i http://localhost:8000/q08-content-type/dados.php` com o header **comentado****

```text
(cole aqui a saída do terminal)
```

**Explicação linha por linha:**

_(responda aqui)_

**2.2 Saída do mesmo comando com o header **descomentado****

```text
(cole aqui a saída do terminal)
```

**Explicação linha por linha:**

_(responda aqui)_

## 3. Perguntas

**3.1 Compare o cabeçalho `Content-Type` nas duas saídas. O que mudou?**

_(responda aqui)_

**3.2 O corpo da resposta mudou? O que isso mostra sobre quem decide como o conteúdo é interpretado?**

_(responda aqui)_

**3.3 Retire o `JSON_UNESCAPED_UNICODE`, rode o curl de novo e explique o que aconteceu com "Programação".**

_(responda aqui)_
