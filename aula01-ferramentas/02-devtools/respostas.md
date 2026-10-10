# Atividade 02: DevTools, a anatomia de uma página

## Evidências esperadas nesta pasta

| Arquivo | Conteúdo |
|---|---|
| `prints/01-network-geral.png` | Aba Network após carregar o site do IFCE, com o rodapé mostrando o total de requisições |
| `prints/02-redirecionamento.png` | Headers da requisição que respondeu com 301 |
| `prints/03-timing.png` | Aba Timing da requisição Doc da página final |

> Antes de salvar os prints, confira se nenhum cookie aparece na imagem. Se aparecer, recorte a imagem.

## Tabela de observações

| Item | Seu resultado |
|---|---|
| Total de requisições | |
| Total transferido | |
| Quantas requisições aparecem no filtro Doc | |
| Status da requisição para `https://ifce.edu.br/` | |
| Valor do cabeçalho `Location` | |
| Remote Address (IP e porta) | |
| Protocolo (h2 ou http/1.1) | |
| Tempo de DNS Lookup (aba Timing) | |
| Tempo de Waiting for server response | |

## Perguntas

**2.1** Por que uma única página gera tantas requisições? Cite três tipos de arquivo diferentes que você encontrou.

_(responda aqui)_

**2.2** O IP do Remote Address é o mesmo que você encontrou na Atividade 01? O que significa o número depois dos dois-pontos?

_(responda aqui)_

**2.3** Explique, com suas palavras, o que o navegador fez ao receber o status 301.

_(responda aqui)_

**2.4** Ao digitar `http://ifce.edu.br` (sem o "s"), o DevTools mostrou a requisição em HTTP? Explique o que aconteceu.

_(responda aqui)_
