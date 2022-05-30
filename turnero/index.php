<!DOCTYPE html>
<html>
    <head>
        <title>TURNERO</title>
        <meta charset = "UTF-8"/>
        <link href = "styles.css" rel = "stylesheet"/>
    </head>
    <body>
        <form method = "POST" action = "reservation.php" >
        <ul>
            <li> <input  name = "dni" type="number" placeholder = "DNI" required></li>
            <li> <input  name = "nombre" type="text" placeholder = "nombre" maxlength = "20" required></li>
            <li> <input  name = "apellido" type="text" placeholder = "apellido" maxlength = "30" required></li>
            <li> <input  name = "fecha" type="date"  required></li>
            <li> <input  type="submit"  value = "reservar" required></li>
        </ul>

        </form>
    </body>
</html>