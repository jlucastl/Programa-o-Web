# Questão 04: Tipos e conversões

**Nível:** 🟢 Básico

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `tipos.php` | Código fornecido (no item 3.3 você vai acrescentar linhas) |

## 1. Análise do código

**1.1 **Antes de executar**, preencha a coluna "Minha previsão" com o tipo e o valor de cada linha.

| Linha | Minha previsão | Resultado real |
|---|---|---|
| `"10" + 5` | | |
| `"10" . 5` | | |
| `7 / 2` | | |
| `7 % 2` | | |
| `(int) "3.9 kg"` | | |
| `(bool) "0"` | | |
| `(bool) "false"` | | |
| `0.1 + 0.2 == 0.3` | | |**

_
1. Tipo: int, valor: NAN
2. Tipo: string, valor: "105"
3. Tipo: float, valor: 3.5
4. Tipo: int, valor: 1
5. Tipo: int, valor: 3
6. Tipo: bool, valor: false
7. Tipo: bool, valor: true
8. Tipo: bool, valor: false
_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 Saída de `curl.exe -s http://localhost:8000/q04-tipos/tipos.php`**

```text
HTTP/1.1 200 OK
Host: localhost:8000
Date: Mon, 12 Oct 2026 13:35:09 GMT
Connection: close
X-Powered-By: PHP/8.5.10
Content-type: text/html; charset=UTF-8

<pre>int(15)
string(3) "105"
float(3.5)
int(1)
int(3)
bool(false)
bool(true)
bool(false)
</pre>
```

**Explicação linha por linha:**

_
1. O operador de adição (+) força a conversão da string "10" para número inteiro antes de somar.
2. O operador ponto (.) é exclusivo de concatenação de texto, convertendo o inteiro 5 para a string "5".
3. A divisão comum (/) em PHP retorna um ponto flutuante quando o resultado não é exato.
4. O operador de módulo (%) retorna o resto da divisão inteira de 7 por 2.
5. Ao fazer o cast explícito para inteiro (int), o PHP lê os dígitos numéricos iniciais da string e descarta tudo o que vem depois do ponto ou dos caracteres não numéricos.
6. Em PHP, a string "0" é uma exceção especial e é considerada falsa ao ser convertida para booleano.
7. Qualquer string preenchida e diferente de "0" (mesmo que seja a palavra texto "false") é avaliada como verdadeira.
8. Devido à representação em ponto flutuante binário, 0.1 + 0.2 resulta em 0.30000000000000004, o que não é exatamente igual a 0.3.
_

## 3. Perguntas

**3.1 Explique a diferença entre `"10" + 5` e `"10" . 5`.**

_
O "10" + 5 retorna int pois o sinal "+" é um sinal matématico, e a razão por ele não retornar NAN é por que o php faz a conversão de string para int automáticamente

Já o "10" . 5 retorna string pois o sinal "." é um sinal de concatenação. Acontece a mesma conversão da explicação anterior só que dessa vez em string. O 5 é traduzido para string e o operador "." faz a junção das duas strings
_

**3.2 Por que `(bool) "0"` é `false`, mas `(bool) "false"` é `true`?**

_Isso acontece por que o php interpreta um bool para false apenas caso tenha uma string vazia ou caso a string contenha o número 0. O PHP trata "0" como false para manter a coerência em operações lógicas e formulários HTML. O php interpreta a palavra false como true justamente pela explicação anterior, o php interpreta como falso caso receba 0 ou uma string vazia, como esta recebendo uma palavra não vazia e que não seja apenas o número 0, o php por natureza interpreta como true._

**3.3 Acrescente ao arquivo duas linhas `var_dump` criadas por você, com resultados que te surpreenderam ou que você achou interessantes. Explique cada uma.**

_
Foram adicionados as linhas 11 e 12.

    var_dump("20" + "20" + "20" + 7);
    var_dump("10" + "10" . 5);

achei interessante a conversão automática do php, que diferente de outras linguagens é nescessário utilizar algum comando de conversão manual
_
