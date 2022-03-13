<?php
//Recibe datos ingresados
$codigo = $_POST["codigo"];
$password = $_POST["password"];

//Iniciamos la sesión
session_start();
//Se le asigna el nombre obtenido anteriormente
$_SESSION["UserName"] = $codigo;
//Incluimos la conexion a la bd
$conexion = msqli_connect("localhost", "root", "", "parkin40");

$consulta = "SELECT * FROM USUARIOS WHERE codigo='$codigo' and contra='$password'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado); //hace la validacion 

if($filas){
    header("location:paginas/usuario.html");
}else{
    ?>
    <?php
    include("index.html");
    ?>
    <h1>Error en la autenticacion</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
