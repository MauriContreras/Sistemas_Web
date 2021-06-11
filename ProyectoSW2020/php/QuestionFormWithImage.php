<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include '../php/DbConfig.php' ?>
  <style type="text/css">
    table.form{width:100%;border-collapse: collapse;}
    td.label{width:150px;white-space:nowrap;}
    td input{width:100%;}
    .styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
    }
</style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <?php
      $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
      if(!$mysqli){
        die('Fallo al conectar a MySQL: ' .mysqli_connect_error());
      } else {
        echo 'Connection OK';
        echo '<br>';
      }
      $sql = 'select * from quiz';
      $resultado = mysqli_qeury($mysqli, $sql);
      while($row = mysqli_fetch_array($resultado)){
        '<tr style="background-color: #91baed;border-bottom: 1px solid #19ffff"><td>' . $row['Mail'] . '</td><td>' . $row['Statement'] . '</td><td>' . $row['Correct'] . '</td><td>' . $row['Incorrect1'] . '</td><td>' .
         $row['Incorrect2'] . '</td><td>' . $row['Incorrect3'] . '</td><td>' . $row['Complexity'] .  '</td><td>' . $row['Subject'] . '</td></tr>';
      }
      echo '</table>';
      mysqli_close($mysqli);
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
