# Atividade 04: GET e POST

## Evidências esperadas nesta pasta

| Arquivo | Como gerar |
|---|---|
| `get.txt` | curl com GET e query string (ver roteiro) |
| `post-form.txt` | curl com POST de formulário (ver roteiro) |
| `post-json.txt` | curl com POST em JSON, usando o arquivo `corpo.json` desta pasta (edite com seus dados) |
| `prints/payload-get.png` | Aba Payload do DevTools mostrando Query String Parameters |
| `prints/payload-post.png` | Aba Payload do DevTools mostrando Form Data |

> **Privacidade:** antes do commit, abra os três `.txt` e troque o valor do campo `"origin"` por `"(removido)"`. Ele contém o IP público da sua conexão.

## Tabela comparativa (preencha com base nas SUAS evidências)

| Observação | GET | POST |
|---|---|---|
| Onde os dados apareceram na resposta do httpbin (`args` ou `form`)? | | |
| Os dados apareceram na barra de endereços? | | |
| Qual seção da aba Payload mostrou os dados? | | |
| A requisição tinha `Content-Type`? Qual? | | |
| O que aconteceu ao apertar F5 na página de resposta? | | |

## Perguntas

**4.1** No `post-json.txt`, em qual campo da resposta os dados apareceram: `form` ou `json`? Por que foi diferente do `post-form.txt`?

_(responda aqui)_

**4.2** Dê um exemplo de situação real em que você usaria GET e outro em que usaria POST. Justifique.

_(responda aqui)_

**4.3** "Como o POST não mostra os dados na URL, ele é seguro para enviar senhas mesmo sem HTTPS." Essa frase está certa? Explique.

_(responda aqui)_
