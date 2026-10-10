# Atividade 06: Desafio (opcional, ponto extra)

## Evidências esperadas nesta pasta

| Arquivo | O que contém |
|---|---|
| `prints/webhook-recebido.png` | Tela do webhook.site mostrando a requisição recebida |
| `comando.txt` | O comando curl usado, com a sua URL trocada por `URL-DO-WEBHOOK` |

## Tarefa

1. Acesse https://webhook.site e copie a URL única que ele gera para você.
2. Edite o `corpo.json` desta pasta e envie para essa URL um **POST em JSON** com o cabeçalho `X-Turma: ADS`.
3. Veja, no webhook.site, a requisição chegando do ponto de vista do servidor.

## Perguntas

**6.1** Quais cabeçalhos o webhook.site mostrou? Algum deles você não enviou de propósito? De onde ele veio?

_(opcional)_

**6.2** Se qualquer pessoa pode montar uma requisição assim, o que isso significa para quem programa o servidor?

_(opcional)_
