# Questão 07: O dado pode não vir, o dado pode ser perigoso

**Nível:** 🟡 Intermediário

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `saudacao.php` | Código fornecido, que você vai corrigir no item 1.2 |

## 1. Análise do código

**1.1 Quais são os dois problemas deste código?**

_(responda aqui)_

**1.2 Corrija o código usando `??` (valor padrão "Visitante") e `htmlspecialchars`. Faça um commit **antes** e outro **depois** da correção. Cole o código corrigido e explique.**

_(responda aqui)_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 **Antes da correção**: log do servidor ao abrir `saudacao.php` sem parâmetro**

```text
(cole aqui a saída do terminal)
```

**Explicação linha por linha:**

_(responda aqui)_

**2.2 **Antes da correção**: saída de `curl.exe -s "http://localhost:8000/q07-tratamento/saudacao.php?nome=<b>Oi</b>"`**

```text
(cole aqui a saída do terminal)
```

**Explicação linha por linha:**

_(responda aqui)_

**2.3 **Depois da correção**: saída do mesmo comando do item 2.2**

```text
(cole aqui a saída do terminal)
```

**Explicação linha por linha:**

_(responda aqui)_

## 3. Perguntas

**3.1 Qual aviso apareceu no item 2.1? O que ele significa?**

_(responda aqui)_

**3.2 Compare o corpo da resposta em 2.2 e 2.3. O que o `htmlspecialchars` fez com `<b>`?**

_(responda aqui)_

**3.3 Teste no navegador `?nome=<script>alert('Ataque')</script>` antes e depois da correção. Explique o que aconteceu e por que isso é perigoso (XSS).**

_(responda aqui)_
