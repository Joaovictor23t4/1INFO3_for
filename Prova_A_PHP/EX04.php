<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        label {
            display: block;
        }

        input {
            display: block;
            margin-bottom: 20px;
        }
    </style>
    <title>Ex 04</title>
</head>
<body>
    <form action="EX04.php" method="post">
        <label for="">Informe a quantidade de iPhones vendidos:</label>
        <input type="number" name="qtd_Iphones" id="qtd_iPhones">
        <input type="submit" name="submit_qtd" value="Informar quantidade">
    </form>

    <?php
    $qtdIphones = 0;
    $somaCartao = [];
    $somaPix = [];
    $contCartao = 0;
    $contPix = 0;
    if(isset($_POST['submit_qtd'])) {
        $qtdIphones = $_POST['qtd_Iphones'];
        $qtdIphones = intval($qtdIphones);
    }  
    ?>

    <form action="EX04.php" method="post">
        <?php 
        for ($c = 1; $c <= $qtdIphones; $c++) {
            echo "<label>Qual foi o valor do preço final do cliente " . $c . "</label>";
            echo "<input type='number' name='valorFinal[]'></input> Informe a forma de pagamento da pessoa $c. C - Cartão de Crédito || P - Pix <input type='text' name='formaPagamento[]'></input>";
            if ($c === $qtdIphones) {
                echo "<input type='submit' name='submit_resposta'>";
            }
        }


        if (isset($_POST['submit_resposta'])) {
            $precoFinal = $_POST['valorFinal'];
            $formasPagamento = $_POST['formaPagamento'];

            foreach ($formasPagamento as $index => $varredor) {
                if ($formasPagamento[$index] === "C") {
                    array_push($somaCartao, $precoFinal[$index]);
                    $formaPagamento = strtoupper($formasPagamento[$index]);
                    $contCartao++;
                } else if ($formasPagamento[$index] === "P") {
                    array_push($somaPix, $precoFinal[$index]);
                    $formaPagamento = strtoupper($formasPagamento[$index]);
                    $contPix++;
                }
            }

            $resultadoSomaCartao = array_reduce($somaCartao, function($soma, $valor) {
                return $soma + $valor;
            }, 0);
            $resultadoSomaPix = array_reduce($somaPix, function($soma, $valor) {
                return $soma + $valor;
            }, 0);

            echo "<p>Quantidade de vendas em Cartão de Crédito: ". $contCartao . "; Faturamento: R$" . $resultadoSomaCartao . "</p>";
    
            echo "<p>Quantidade de vendas em Pix: " .  $contPix . "; Faturamento: R$" . $resultadoSomaPix . "</p>";
        }
        ?>
    </form>
</body>
</html>