<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir archivos PHP</title>
</head>

<body>
    <h1>Subir archivos con PHP</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <input type="file" name="archivo" />
            </li>
            </br>
            <li>
                <input type="submit" value="cargar" />
            </li>
        </ul>
    </form>
    <h2>Listado de imagenes</h2>
    <?php
        $gestor = opendir('./images');
        if($gestor){
            while(($image = readdir($gestor)) !== false){
                if($image!='.' && $image!='..'){
                    echo "<img src='images/$image' width='200px'/></br>";
                }
            }
        }else{
            echo '<p>No se encontraron imagenes</p>';
        }
    ?>
</body>

</html>