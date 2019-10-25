<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <style>
    .error {font-weight: bold; color:red;}
    .mensaje {color:#030;}
    .listadoImagenes img {float:left;border:1px solid #ccc; padding:2px;margin:2px;}
    </style>
    <link rel="stylesheet" type="text/css" href="./estilos.css">
    <script type="text/javascript" src="./services/javascript.js"></script>
</head>
<body>
    <div style="text-align: right;">
        <?php
        include "./header.php";
        ?>  
    </div>

    <div id="top">
        <h1 id="titulo_formu">Galeria personal de:  
            <?php 
            echo $_SESSION['nombre'];
            ?>    
        </h1>

    <form enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" onsubmit="return validacionSubidaImgs()">
        <input type="text" name="titulo" placeholder="Titulo de la imagen..." id="titulo2"><br><br>
        <input name="userfile" type="file" id="userfile2"><br><br>
        <input class="button" type="submit" value="Guardar Imagen">
    </form>

<?php
//Usamos $_FILES solo para los parametros de la imagen, $_REQUEST para el texto por ejemplo
//echo $_REQUEST["titulo"];
# Conectamos con MySQL
include "./services/connection.php";
$idfk=$_SESSION['id'];
$mysqli=new mysqli("localhost","root","","imagenes");
if (mysqli_connect_errno()) {
    die("Error al conectar: ".mysqli_connect_error());
}
 
# Comprovamos que se haya subido un fichero
// Si FILE ya esta configurado, haz todo lo siguiente
if (isset($_FILES["userfile"]))
{
    # verificamos el formato de la imagen
    if ($_FILES["userfile"]["type"]=="image/jpeg" || $_FILES["userfile"]["type"]=="image/png")
    {
        # Cogemos la anchura y altura de la imagen
        $info=getimagesize($_FILES["userfile"]["tmp_name"]);
 
        # Escapa caracteres especiales
        $imagenEscapes=$mysqli->real_escape_string(file_get_contents($_FILES["userfile"]["tmp_name"]));
        
        # Agregamos la imagen a la base de datos
        $sql="INSERT INTO `imagephp` (nombre_img,anchura,altura,tipo,imagen,id_usuario) VALUES ('".$_REQUEST["titulo"]."',".$info[0].",".$info[1].",'".$_FILES["userfile"]["type"]."','".$imagenEscapes."','$idfk')";
        $mysqli->query($sql);
 
        # Cogemos el identificador con que se ha guardado la imagen
        $id=$mysqli->insert_id;
        #Limpiamos el formulario
        header('Location: ./misitio.php');
        # Mostramos la imagen agregada
    }else{
        echo "<div class='error'><p style='text-align: center; font-family: calibri'>Error: El formato de archivo tiene que ser JPG o PNG.</p></div>";
    }
}

?>

 
<h2 style="margin-top: 20px; text-align: center; font-family: calibri">Listado de las imagenes añadidas a la base de datos</h2>

    <div class="listadoImagenes" style="margin: 0 auto; width: 500px">
        <?php
        $idfk=$_SESSION['id'];
        //echo $idfk;
        $result=mysqli_query($conn,"SELECT * FROM imagephp WHERE id_usuario LIKE '$idfk' ORDER BY id DESC");
        //Printa por pantalla el resultado del array, muestra las imágenes
        if($result)
        {
            while($row=$result->fetch_array(MYSQLI_ASSOC))
            {
                echo "<img style='margin: 0 auto
                ' src='imagen_mostrar.php?id=".$row["id"]."' width='100%".$row["anchura"]."' height='100%".$row["altura"]."'>";
            }
        }
        ?>
    </div>
</body>
</html>
</body>
</html>