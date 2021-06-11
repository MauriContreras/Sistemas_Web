<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include '../php/DbConfig.php' ?>
  
</style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <?php
      function alert($msg) {
      echo "<script type='text/javascript'>alert('$msg');</script>";
      }
      
      $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
      if(!$mysqli){
        die('Fallo al conectar a MySQL: ' .mysqli_connect_error());
      } else {
        alert("Se ha realizado la conexión con la BD con éxito");
        echo '<br>';
      }
      $sql = 'select * from quiz';
      $resultado = mysqli_query($mysqli, $sql);
      echo '<h3>Preguntas almacenadas en la BD</h3>';
      //Table row = fila de tabla //Table Header = encabezado de tabla //Table Division = division de tabla
      //En estas primeras ponemos th para que salga en negrita y centrado.
      echo '<table border=2 bordercolor="black" style="color: #000000;text-align: center;background-color: #ffffff;border-collapse: collapse;box-shadow: 0 0 20px rgba(0, 0, 0, 0.15)"> <tr> <th>Email</th> <th>Enunciado</th> <th>Respuesta Correcta</th> <th>Respuesta Incorrecta (1)</th> <th>Respuesta Incorrecta (2)</th> <th>Respuesta Incorrecta (3)</th> <th>Dificultad</th> <th>Tema</th> </tr>';
      $i=1;
      while($row = mysqli_fetch_array($resultado)){
        if($i & 1){
        echo '<tr style="background-color: #e0e0e0"><td>' . $row['Mail'] . '</td><td>' . $row['Statement'] . '</td><td>' . $row['Correct'] . '</td><td>' . $row['Incorrect1'] . '</td><td>' .
         $row['Incorrect2'] . '</td><td>' . $row['Incorrect3'] . '</td><td>' . $row['Complexity'] .  '</td><td>' . $row['Subject'] . '</td></tr>';
        } else {
        echo '<tr style="background-color: #ffffff"><td>' . $row['Mail'] . '</td><td>' . $row['Statement'] . '</td><td>' . $row['Correct'] . '</td><td>' . $row['Incorrect1'] . '</td><td>' .
         $row['Incorrect2'] . '</td><td>' . $row['Incorrect3'] . '</td><td>' . $row['Complexity'] .  '</td><td>' . $row['Subject'] . '</td></tr>';
        }
        $i++;
      }
      echo '</table>';
      mysqli_close($mysqli);
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
