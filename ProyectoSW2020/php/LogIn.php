<!DOCTYPE html>
<html>
<style>
input[type=text] {
width: 40%;
padding: 6px 12px;
margin: 8px 0;
box-sizing: border-box;
}
</style>
<head>
<?php include '../html/Head.html'?>
<?php include '../php/DbConfig.php' ?>
</head>
<body>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
        <div>
            <form id="login" name="login" method="post" action="LogIn.php">
            <h3>Login</h3>
            <label for='email'>Email: </label>
            <input type='text' name='email' id='email'>
            <br>
            <label for='contrasena'>Contraseña: </label>
            <input type='text' name='contrasena' id='contrasena'>
            <br>
            <input type='submit' id='validar' name='validar' value='Registrarse'>
            </form>
        </div>
        <div>
            <?php
            function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
            } 
            if(isset($_REQUEST['email'])){
                $email = $_REQUEST['email'];
                $contrasena = $_REQUEST['contrasena'];
                $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
                if(!$mysqli){
                    die('Fallo al conectar a MySQL: ' .mysqli_connect_error());
                } else {
                  alert("Conexión con la base de datos: correcta");
                  echo '<br>';
                }
                $sql = "SELECT * FROM user WHERE email=\"".$email."\";";
                $resultado = mysqli_query($mysqli, $sql);
                if(!$resultado){
                    die("Error: ".mysqli_error($mysqli));
                }
                $row = mysqli_fetch_array($resultado);
                    if(!empty($row) && $row['Email']==$email && hash_equals($row['Password'], $contrasena)){
                    echo "<script> alert(\"¡Bienvenido!\"); document.location.href='Layout.php?logInMail=$email'; </script>";
                    } else {
                    echo "<p class=\"error\">Datos incorrectos<p><br/>";
                    }
            }
            ?>
        </div>
    </section>
</body>
<?php include '../html/Footer.html' ?>
</body>