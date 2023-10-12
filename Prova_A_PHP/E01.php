<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        label {
            display: block;
        }
    </style>
    <title>Ex 01</title>
</head>
<body>

    <form action="E01.php" method="post">
        <label for="">Informe um número inteiro e positivo</label>
        <input type="number" name="numero_usuario" id="numUser">
        <input type="submit" name="submit" value="Enviar">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $numUsuario = $_POST['numero_usuario'];
        $num = intval($numUsuario);

        if ($num % 1 === 0 && $num > 1) {
            for ($c = 0; $c < $num; $c++) {
                echo "<p>";
                echo $num - $c;
                echo "</p>";
            }   
        }
    }
?>

    <!-- Problema: Números pares decrescente
    Peça para o usuário inserir um número inteiro e positivo.
    Imprima na tela todos os números, um por linha, desde o número que o usuário informou até o número 0. -->
</body>
</html>