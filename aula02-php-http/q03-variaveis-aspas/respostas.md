# Questão 03: Variáveis, aspas e concatenação

**Nível:** 🟢 Básico

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `aspas.php` | Código fornecido (não altere) |

## 1. Análise do código

**1.1 **Antes de executar**, preencha a coluna "Minha previsão" com o que cada linha vai mostrar.

| Linha | Minha previsão | Resultado real |
|---|---|---|
| `"Aluna: " . $nome` | | |
| `"Aluna: $nome"` | | |
| `'Aluna: $nome'` | | |
| `"Cursa o {$semestre}º semestre de $curso"` | | |
| `$nome . $curso` | | |
| `<?= $nome ?>` | | |**

_
1. "Aluna: Maria"
2. "Aluna: Maria"
3. "Aluna: Maria"
4. "Cursa o 2º semestre de ADS
5. "MariaADS"
6. "Atalho: Maria"
_

**1.2 Para que servem as chaves `{}` em `{$semestre}`?**

_
Para isolar a variável do "º", pois se estivessem juntas assim: $semestreº 
Daria erro pois o php interpretaria como o nome de uma variável que não existe
Existe "$semestre" e não "$semestreº"
_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 Saída de `curl.exe -s http://localhost:8000/q03-variaveis-aspas/aspas.php`**

```text
HTTP/1.1 200 OK
Host: localhost:8000
Date: Mon, 12 Oct 2026 12:52:01 GMT
Connection: close
X-Powered-By: PHP/8.5.10
Content-type: text/html; charset=UTF-8

<p>Aluna: Maria</p>
<p>Aluna: Maria</p>
<p>Aluna: $nome</p>
<p>Cursa o 2º semestre de ADS</p>
<p>MariaADS</p>
<p>Atalho: Maria</p>
```

**Explicação linha por linha:**

_
1. Junta a string literal "Aluna: " com o valor da variável $nome utilizando a concatenação com o operador .
2. As aspas duplas interpretam variáveis, o PHP procura por variáveis dentro da string e substitui $nome pelo seu valor real (Maria).
3. Diferente das aspas duplas, as aspas simples não interpretam variáveis, elas leem como texto literal. Então é visto $nome dentro da aspas simples, e é lido como $nome
4. As chaves funcionam como um isolante. O php lê a variavel que está dentro das chaves sem se importar com o que tem na frente ou atrás
5. Une os valores contidos em duas variáveis distintas usando o operador de concatenação "." Não há texto adicional nem necessidade de aspas.
6. Sintaxe abreviada <?= ?> para imprimir o valor de $nome diretamente no HTML, sem precisar da palavra echo.
_

## 3. Perguntas

**3.1 Em quais linhas sua previsão errou? Explique o motivo.**

_Na linha 3, não sabia a difenrença da aspas duplas para a aspas simples_

**3.2 Por que `$nome . $curso` aparece sem espaço entre as palavras? Como corrigir?**

_
O operador "." serve para concatenar texto exatamente do jeito que eles estão, sem adicionar nenhum caractere extra por conta própria.

Abaixo está um exemplo de como corrigir a falta de espaço:
<?php echo $nome . ' ' . $curso; ?>
_
