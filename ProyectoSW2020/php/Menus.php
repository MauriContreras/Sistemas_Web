<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src ="../js/ShowHide.js"></script>
<style>
input[type=text] {
width: 40%;
padding: 6px 12px;
margin: 8px 0;
box-sizing: border-box;
}
</style>
<div id='page-wrap'>
<header class='main' id='h1'>
  <span id='registro'><a href="../php/SignUp.php">Registro</a></span>
  <span id='login'><a href="../php/LogIn.php">Login</a></span>
  <span id='logout'><a href="../php/LogOut.php">Logout</a></span>

</header>
<nav class='main' id='n1' role='navigation'>
<?php
    if(isset($_REQUEST['logInMail'])) {
      $logInMail = $_REQUEST['logInMail'];
      echo "<span id='inicio'><a id='ini' href='Layout.php?logInMail=$logInMail'>Inicio</a></span>";
      echo "<span id='insertar'><a id='ins' href='QuestionForm.php?logInMail=$logInMail'>Insertar pregunta</a></span>";
      echo "<span id='creditos'> <a id='cre' href='Credits.php?logInMail=$logInMail'> Creditos </a> </span>";
      echo "<span id='verBD'> <a id='ver' href='ShowQuestions.php?logInMail=$logInMail'> Ver preguntas BD </a> </span>";
      echo "<span id='verXML'> <a id='xml' href='ShowXmlQuestions.php?logInMail=$logInMail'> Ver preguntas Xml </a> </span>";
      echo "<span id='ajax'> <a id='ajax' href='HandlingQuizesAjax.php?logInMail=$logInMail'> Ver preguntas Ajax </a> </span>";
      echo "<script> $(\"#h1\").append(\"<p>$logInMail</p>\"); </script>";
      
      echo "<script> showOnLogIn(); </script>";
    } else {
      echo "<span id='inicio'><a id='ini' href='Layout.php'>Inicio</a></span>";
      echo "<span id='insertar'><a id='ins' href='QuestionForm.php'>Insertar pregunta</a></span>";
      echo "<span id='creditos'> <a id='cre' href='Credits.php'> Creditos </a> </span>";
      echo "<span id='verBD'> <a id='ver' href='ShowQuestions.php'> Ver preguntas BD </a> </span>";
      echo "<span id='verXML'> <a id='ver' href='ShowXmlQuestions.php'> Ver preguntas Xml </a> </span>";
      echo "<span id='ajax'> <a id='ajax' href='HandlingQuizesAjax.php'> Ver preguntas Ajax </a> </span>";
      echo "<script> showOnNotLogIn(); </script>";
    }
  ?>
</nav>

