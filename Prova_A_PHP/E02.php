<!DOCTYPE html>
<html lang="en">
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
    </style>
    <title>Document</title>
</head>
<body>
    <form action="E02.php" method="post">
        <?php
        $listaPedidos = ["Bloco A", "Bloco B", "Bloco C", "Bloco D", "Bloco E"];
        $antigos = [];
        $novos = [];
        $varredor;
        foreach ($listaPedidos as $varredor) {
            echo "<label> O ";
            echo $varredor;
            echo " é novo ou antigo? </label>";
            echo "<input type='text' name='resposta[]'>";
            echo "<br>";
        }

        echo "<input type='submit' name='submit'>";

        if (isset($_POST['submit'])) {
            $respostas = $_POST['resposta'];
            foreach ($listaPedidos as $index => $varredor) {
                $resposta = strtoupper($respostas[$index]);
                    if ($resposta === "N") {
                        array_push($novos, $varredor);
                    } else {
                        array_push($antigos, $varredor);
                    }
            }
        }
        ?>
    </form>

    <?php
    echo "<p>Blocos Novos:";
    echo join(", ", $novos);
    echo "</p>";

    echo "<p>Blocos Antigos:";
    echo join(", ", $antigos);
    echo "</p>"
    ?>
</body>
</html>