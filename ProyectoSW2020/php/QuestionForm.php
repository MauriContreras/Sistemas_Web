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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src = "../js/ValidateFieldsQuestion.js"></script>
<?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <form id="fquestion" name="fquestion" action="AddQuestion.php" method="post">
        <br>
        <label for="email">Email: </label>
        <input type="text" id="email" name="email" placeholder="example001@ikasle.ehu.eus">
        <br>
        <label for="enunciado">Enunciado de la pregunta: </label>
        <input type="text" id="enunciado" name="enunciado">
        <br>
        <label for="correcta">Respuesta correcta: </label>
        <input type="text" id="correcta" name="correcta">
        <br>
        <label for="incorrecta1">Respuesta incorrecta 1: </label>
        <input type="text" id="incorrecta1" name="incorrecta1">
        <br>
        <label for="incorrecta2">Respuesta incorrecta 2: </label>
        <input type="text" id="incorrecta2" name="incorrecta2">
        <br>
        <label for="incorrecta3">Respuesta incorrecta 3: </label>
        <input type="text" id="incorrecta3" name="incorrecta3">
        <br>
        <label for="dificultad">Complejidad de la pregunta: </label>
        <select name ="dificultad" id="dificultad">
          <option value="baja">Baja</option>
          <option value="media">Media</option>
          <option value="alta">Alta</option>
        </select>
        <br>
        <label for="tema">Tema de la pregunta: </label>
        <input type="text" id="tema" name="tema">
        <br>
        <input type="submit" value="Enviar Solicitud" id="validar" name="validar">
        <input type="reset" id="reset" name="reset" value="Limpiar">

      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
