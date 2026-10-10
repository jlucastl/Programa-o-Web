# Atividade 03: curl

## Evidências esperadas nesta pasta

| Arquivo | O que contém |
|---|---|
| `cep.json` | Resposta do ViaCEP para o CEP da **sua cidade** |
| `cabecalhos.txt` | Apenas os cabeçalhos da mesma consulta (`-I`) |
| `redirecionamentos.txt` | Cadeia de redirecionamentos de `http://ifce.edu.br` (`-IL`) |
| `status.txt` | Um código de status por linha, gerados com o httpbin |

Os comandos estão no roteiro. No Windows, use `curl.exe`.

## Parte A: JSON pelo HTTP

**3.1** Qual CEP você consultou e qual cidade o ViaCEP retornou?

_(responda aqui)_

**3.2** Qual o valor do cabeçalho `Content-Type` em `cabecalhos.txt`? O que ele informa ao cliente?

_(responda aqui)_

**3.3** O que significa o cabeçalho `Cache-Control: max-age=3600`?

_(responda aqui)_

**3.4** Consulte um CEP inexistente (`00000000`) e um com letras (`abc`). Qual status e qual conteúdo voltaram em cada caso?

_(responda aqui)_

## Parte B: redirecionamentos

**3.5** Quantas respostas aparecem em `redirecionamentos.txt`? Liste o status e o `location` de cada uma.

_(responda aqui)_

**3.6** Qual o valor do cabeçalho `server` na última resposta? Pesquise o que é esse software e responda: o portal do IFCE é feito em PHP?

_(responda aqui)_

**3.7** No DevTools, ao digitar `http://ifce.edu.br`, o primeiro redirecionamento aparece? Por que o curl mostra algo que o navegador escondeu?

_(responda aqui)_

## Parte C: códigos de status

**3.8** Complete a tabela com os códigos de `status.txt`:

| Endereço | Status obtido | Família | Significado |
|---|---|---|---|
| `/status/200` | | | |
| `/status/201` | | | |
| `/status/302` | | | |
| `/status/404` | | | |
| `/status/405` | | | |
| `/status/500` | | | |

**3.9** Qual a diferença entre um erro 404 e um erro 500? De quem é a "culpa" em cada caso?

_(responda aqui)_
