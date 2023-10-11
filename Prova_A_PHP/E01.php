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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 01</title>
</head>
<body>

    <form action="E01.php" method="post">
        <input type="number" name="numero_usuario" id="numUser">;
        <input type="submit" name="submit" value="Enviar">;
    </form>

    <!-- Problema: Números pares decrescente
    Peça para o usuário inserir um número inteiro e positivo.
    Imprima na tela todos os números, um por linha, desde o número que o usuário informou até o número 0. -->

    <script>
        let num = Number(prompt(`Informe um número inteiro e positivo`));

if (Number.isInteger(num) === true && Math.sign(num) === 1) {
    for (let c = 0; c < num; c++) {
        document.write(`<p>${num - c}</p>`);
    }
} else {
    for (let c = 1; c <= 4; c++) {
        if (c === 4) {
            alert(`Erro: Você não informou um número inteiro e positivo durante 3 tentativas, recarregue a página e tente novamente!`);
            break;
        }
        num = Number(prompt(`Informe um número novamente!`));
    }
}
    </script>
</body>
</html>