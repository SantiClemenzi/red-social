    <?php
    $resultado = false;
    if (isset($_POST['numero1']) && isset($_POST['numero2'])) {
        if (isset($_POST['sumar'])) {
            $resultado = ($_POST['numero1'] + $_POST['numero2']);
        }

        if (isset($_POST['restar'])) {
            $resultado = ($_POST['numero1'] - $_POST['numero2']);
        }

        if (isset($_POST['producto'])) {
            $resultado = ($_POST['numero1'] * $_POST['numero2']);
        }

        if (isset($_POST['division'])) {
            $resultado = ($_POST['numero1'] / $_POST['numero2']);
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calculadora con inputs</title>
    </head>

    <body>
        <h1>Calculadora</h1>
        <form action="" method="POST">
            <ul>
                <li><input type="number" name="numero1" required></li>
                <li><input type="number" name="numero2" required></li>
                </br>
                <li><input type="submit" value="sumar" name="sumar"><input type="submit" value="restar" name="restar"><input type="submit" value="multiplicar" name="producto"><input type="submit" value="dividir" name="division"></li>
            </ul>
        </form>
        <h2>RESULTADO: <?php if ($resultado != false) {
                            echo $resultado;
                        } ?>
        </h2>
    </body>

    </html>