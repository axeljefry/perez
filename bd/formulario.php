<?php 
    include ("bd.php");
    
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    

    //PROCEDEMOS A HACER UNA CONSULTA
    

   $sql = "INSERT INTO `formulario` (`id`, `Nombre`, `Correo`, `Asunto`, `Mensaje`) VALUES (NULL, '$nombre', '$correo', '$asunto', '$mensaje')";
   $resultado = mysqli_query($conexion, $sql);

   if($resultado){
    $url = "http://".$_SERVER['HTTP_HOST']."/NUEVAPAGINAWEB";
    header("Location:" .$url);
   }
   
?>