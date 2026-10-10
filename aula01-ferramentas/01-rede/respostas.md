# Atividade 01: Rede (ping, nslookup e tracert)

## Evidências esperadas nesta pasta

| Arquivo | Comando que gera |
|---|---|
| `ping-ifce.txt` | `ping ifce.edu.br` (Windows) ou `ping -c 4 ifce.edu.br` (Linux/macOS) |
| `nslookup-ifce.txt` | `nslookup ifce.edu.br` |
| `tracert-ifce.txt` | `tracert ifce.edu.br` (Windows) ou `traceroute ifce.edu.br` |
| `nslookup-outro.txt` | `nslookup` para um domínio à sua escolha |
| `tracert-outro.txt` | `tracert` para o mesmo domínio escolhido |

## Perguntas

**1.1** Qual IP foi retornado para `ifce.edu.br`? É o mesmo no `ping` e no `nslookup`?

_(responda aqui)_

**1.2** Qual servidor DNS respondeu a sua consulta (linhas `Servidor`/`Address` do nslookup)? Por que a resposta aparece como "não autoritativa"?

_(responda aqui)_

**1.3** Quantos saltos o `tracert` mostrou até o IFCE? Qual foi o primeiro salto e o que ele representa?

_(responda aqui)_

**1.4** Algum salto mostrou `* * *`? O que isso significa?

_(responda aqui)_

**1.5** Qual domínio você escolheu para comparar? O caminho foi maior ou menor que o do IFCE? Por que você acha que isso aconteceu?

_(responda aqui)_

## Diagrama da rota até o IFCE

Complete o diagrama com os saltos que você encontrou (IP ou nome de cada um). O GitHub desenha o diagrama automaticamente.

```mermaid
flowchart LR
    A[Meu computador] --> B[Salto 1]
    B --> C[...]
    C --> D[ifce.edu.br]
```
