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
    <section class="main" id="s1"> <!-- pq es necesario esto y el div para q me muestre bien el recuadro en la pagina? -->
        <div>
            <form action='SignUp.php' id='register' name='register' method='post'>
            <label for='tipouser'>Tipo de usuario: </label>
            <select id='tipouser' name='tipouser'>
                <option value='Profesor'>Profesor</option>
                <option value='Estudiante'>Estudiante</option>
            </select> <br>
            <label for='email'>Email: </label>
            <input type='text' id='email' name='email'>
            <br>
            <label for='nombres'>Nombre y Apellido(s): </label>
            <input type='text' id='nombres' name='nombres'>
            <br>
            <label for='contrasena'>contrasena: </label>
            <input type='text' id='contrasena' name='contrasena'>
            <br>
            <label for='contrasena2'>Repetir contrasena: </label>
            <input type='text' id='contrasena2' name='contrasena2'>
            <br>
            <input type='submit' name='submit' id='submit' value='Registrarse'>
            </form>
        </div>
        <div>
        <?php
        if (isset($_REQUEST['email'])) {
            $tipouser=$_REQUEST['tipouser'];
            $email=$_REQUEST['email'];
            $nombres=$_REQUEST['nombres'];
            $contrasena=$_REQUEST['contrasena'];
            $contrasena2=$_REQUEST['contrasena2'];
            $regex_usuarios= "/^([a-zA-Z]+[0-9]{3}@ikasle\.ehu\.(eus|es)|[a-zA-Z]+(\.[a-zA-Z]+)?@ehu\.(eus|es))$/";
            $regex_atlest6="/^(\w{6,})/";
            $regexStudent="/^[a-zA-Z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/";
            $regexTeacher="/^[a-zA-Z]+(\.[a-zA-Z]+)?@ehu\.(eus|es)$/";
            $regexatleast2words="/(\w+\s){1,}\w+/";
            if (!isset($tipouser, $email, $nombres, $contrasena, $contrasena2)) {
                echo 'Error: Es requisito indispensable para continuar que todas las variables esten definidas';
                echo "<br><a href='javascript:history.back()'>back to SingUp</a>";
            } elseif (empty($tipouser)|empty($email)|empty($nombres)|empty($contrasena)|empty($contrasena2)) {
                echo 'Error: Es requisito indispensable para continuar que todas las variables tengan contenido';
                echo "<br><a href='javascript:history.back()'>back to SignUP</a>";
            } elseif (!preg_match($regex_usuarios, $email)) {
                echo 'El correo no corresponde a un Profesor/alumno de la UPV/EHU';
                echo "<br><a href='javascript:history.back()'>back to SignUP</a>";
            } else if ( preg_match($regexStudent, $email) && $tipouser!='Estudiante' || preg_match($regexTeacher, $email) && $tipouser!='Profesor')  {
                echo 'El correo introducido debe corresponder con el tipo de usuario introducido';
                echo "<br><a href='javascript:history.back()'>back to SignUP</a>";
            } elseif ( !preg_match($regexatleast2words, $nombres)) {
                echo 'Es necesario introducir al menos dos palabras en el campo Nombre y Apellidos';
                echo "<br><a href='javascript:history.back()'>back to SignUP</a>";;
            } elseif ( !preg_match($regex_atlest6, $contrasena)) {
                echo 'La contrasena ha de tener al menos 6 caracteres';
                echo "<br><a href='javascript:history.back()'>back to SignUP</a>";
            } elseif ( $contrasena!=$contrasena2) {
                echo 'Las contrasenas introducidas no coinciden';
                echo "<br><a href='javascript:history.back()'>back to SignUP</a>";
            } else {
                $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
                if(!$mysqli) {
                    die('Fallo al conectar a MySQL: ' .mysqli_connect_error());
                } else {
                    $sql = "insert into user (UserType, Email, NomSur, Password) values ('$tipouser','$email','$nombres','$contrasena');";
                    if(!mysqli_query($mysqli, $sql)) {
                        die("Fallo al insertar en la BD: " . mysqli_error($mysqli));
                        echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
                    } else {
                        echo "<script> alert(\"Se ha registrado con éxito\"); document.location.href='LogIn.php'; </script>";
                    }
                    mysqli_close($mysqli);
                }
            }
            
            
        
        }
        ?>
        </div>
    </section>
</body>
<?php include '../html/Footer.html' ?>
</html>