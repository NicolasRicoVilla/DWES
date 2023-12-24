
<?php



if(isset($_POST["lenguaje"])){
    $seleccionLenguaje = $_POST["lenguaje"];
    setcookie("prefered_language",$seleccionLenguaje, time()+(86400*30), "/");
}else{
    if(isset($_COOKIE["prefered_language"])){
        $seleccionLenguaje = $_COOKIE["prefered_language"];

    }else{
        $seleccionLenguaje = "es";
    }
}



function mostrarContenido($lang){
    if($lang === "en"){
        echo"Hello! this page is display in English";
    }else{
        echo"¡Hola!, esta pagina se muestra en Español";
     
    }


    
}

?>



<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="formulario.php" method="post">
            <label>Idioma</label><br><br>


            <input type="checkbox" name="lenguaje" value="in">
            <label for="lenguaje">Ingles</label><br><br>


            <input type="checkbox" name="lenguaje" value="es">
            <label for="lenguaje">Español</label><br><br>
            
            <input type="submit" value="Guardar">
        </form>
        <div>
            <?php
            echo mostrarContenido($seleccionLenguaje);
            ?>
        </div>
    </body>
</html>