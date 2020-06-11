<?php
// Datos para conectar a la base de datos.
$servername = "localhost";
$database = "admin";
$username = "root";
$password = "root";

// Create connection
$db = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
echo 'Se ha conectado a la bd'; 
echo '<br>';
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'movie':
        $query = 'INSERT INTO
            musica
                (nombre, fecha, genero, artista,
                productor)
            VALUES
                ("' . $_POST['nombre'] . '",
                 ' . $_POST['fecha'] . ',
                 ' . $_POST['genero'] . ',
                 ' . $_POST['artista'] . ',
                 ' . $_POST['productor'] . ')';
        break;
    case 'people':
        $query = 'INSERT INTO
            persona
                (nombre_completo, pais, productor)
            VALUES
                ("' . $_POST['nombre_completo'] . '",
                 ' . $_POST['pais'] . ',
                 ' . $_POST['productor'] . ')';
        break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'movie':
        $query = 'UPDATE musica SET
                nombre = "' . $_POST['nombre'] . '",
                fecha = ' . $_POST['fecha'] . ',
                genero = ' . $_POST['genero'] . ',
                artista = ' . $_POST['artista'] . ',
                productor = ' . $_POST['productor'] . '
            WHERE
                id = ' . $_POST['id'];
        break;
    case 'people':
    $query = 'UPDATE persona SET
            nombre_completo = "' . $_POST['nombre_completo'] . '",
            pais = ' . $_POST['pais'] . ',
            productor = ' . $_POST['productor'] . '
        WHERE
            id = ' . $_POST['id'];
        break;  
    }
    

    break;
}
if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
  <p>Done!</p>
 </body>
</html>
