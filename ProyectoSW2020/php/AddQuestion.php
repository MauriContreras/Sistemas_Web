<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include '../php/DbConfig.php'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

	  <?php
      function alert($msg) {
      echo "<script type='text/javascript'>alert('$msg');</script>";
      }
      $email = $_REQUEST['email'];
      $enunciado = $_REQUEST['enunciado'];
      $correcta = $_REQUEST['correcta'];
      $incorrecta1 = $_REQUEST['incorrecta1'];
      $incorrecta2 = $_REQUEST['incorrecta2'];
      $incorrecta3 = $_REQUEST['incorrecta3'];
      $dificultad = $_REQUEST['dificultad'];
      $tema = $_REQUEST['tema'];
      $regex_atlest10="/(\w{10,}|(\w+\s){1,}\w+)/";
      $regex_pusers= "/^([a-zA-Z]+[0-9]{3}@ikasle\.ehu\.(eus|es)|[a-zA-Z]+(\.[a-zA-Z]+)?@ehu\.(eus|es))$/";
      if (!isset($email, $enunciado, $correcta, $incorrecta1, $incorrecta2, $incorrecta3, $dificultad, $tema)) {
        echo 'Todas las variables han de ser defininas';
      } elseif (empty($email)|empty($enunciado)|empty($correcta)|empty($incorrecta1)|empty($incorrecta2)|empty($incorrecta3)|empty($dificultad)|empty($tema)){
        echo 'Las variables no pueden tener valores nulos/vacíos';
      } elseif(!preg_match($regex_atlest10,$enunciado)) {
        echo 'La pregunta ha de tener al menos 10 caracteres';
      }  elseif(!preg_match($regex_pusers,$email)) {
        echo 'El correo no corresponde con un alumno/profesor de la UPV/EHU';
      } else {
        $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
        if(!$mysqli){
          die('Fallo al conectar a MySQL: ' .mysqli_connect_error());
        } else {
          alert("Conexión con la base de datos: correcta");
          echo '<br>';
        }  
      $sql = "insert into quiz (Mail, Statement, Correct, Incorrect1, Incorrect2, Incorrect3, Complexity, Subject) values ('".$_POST['email']."','".$_POST['enunciado']."','".$_POST['correcta']."','".$_POST['incorrecta1']."','".$_POST['incorrecta2']."','".$_POST['incorrecta3']."','".$_POST['dificultad']."','".$_POST['tema']."')";
      if(!mysqli_query($mysqli,$sql)){
        die('Error: ' .mysqli_error($mysqli));
      } else {
        alert("Los datos se han insertado correctamente en la BD");
        echo '<br>';
      }
      $xml = simplexml_load_file('../xml/Questions.xml');
	  if (!$xml) die("Error: Fallo al entrar en la carpeta xml");
	      $assessmentItem = $xml->addChild('assessmentItem');
		  $assessmentItem -> addAttribute('subject', $_REQUEST['tema']);
		  $assessmentItem -> addAttribute('author', $_REQUEST['email']);
		  $itemBody = $assessmentItem->addChild('itemBody'); 
		  $itemBody->addChild('p',$_REQUEST['enunciado']);
		  $correctResponse = $assessmentItem->addChild('correctResponse');
		  $correctResponse->addChild('value',$_REQUEST['correcta']);
		  $incorrectResponses = $assessmentItem->addChild('incorrectResponses');
		  $incorrectResponses->addChild('value',$_REQUEST['incorrecta1']);
		  $incorrectResponses->addChild('value',$_REQUEST['incorrecta2']);
		  $incorrectResponses->addChild('value',$_REQUEST['incorrecta3']);
		  $xml->asXML();
		  $xml->asXML('../xml/Questions.xml');
		  echo 'Los datos se han introducido correctamente en el documento xml';
      mysqli_close($mysqli);
      echo "<a href='../php/ShowQuestions.php'>Para ver los datos introducidos, pincha aquí</a>";
      }
      ?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
