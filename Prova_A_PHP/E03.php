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
            margin-bottom: 20px;
        }

        #aparecer {
            display: none;
        }
    </style>
    <title>Ex 03</title>
</head>
<body>
    <form action="E03.php" method="post">
        <input type="text" name="qtdNotas" id="qtdNotas">
        <input type="submit" name="submit_qtd" id="submit_qtd" value="Enviar">
    </form>

    <?php
    $qtdNotas = 0;
    $listaNotas = [];
    if (isset($_POST['submit_qtd'])) {
        $qtdNotas = $_POST['qtdNotas'];
        $qtdNotas = intval($qtdNotas);
    } 
    ?>

    <form action="E03.php" method="post">
        <?php
        for ($c = 1; $c <= $qtdNotas; $c++) {
            echo "<label>Qual foi a nota do aluno $c?</label>";
            echo "<input type='text' name='resposta[]'>";
            echo "<br>";
        }
        
        echo "<div id='aparecer'><label>Enviar notas</input> <input type='submit' name='submit_resposta'></div>";

        if (isset($_POST['submit_resposta'])) {
            $respostas = $_POST['resposta'];

            foreach($respostas as $index => $varredor) {
                $resposta = $respostas[$index];

                array_push($listaNotas, $resposta);
            }
            usort($listaNotas, function($a, $b) {
                return $b - $a;
            });
    
            echo "<p>A média das notas foi de " . array_reduce($listaNotas, function($soma, $valor) {
                return $soma + $valor;
            }, 0) / 2 . "</p>";
    
            echo "<p> A maior nota foi " . $listaNotas[0] . "</p>";
    
            echo "<p> A menor nota foi " . $listaNotas[count($listaNotas) - 1] . "</p>";
        }
        ?>
    </form>
</body>
</html>