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

        </div>
        <div>
            <?php
            echo "<script> alert(\"¡Adiioss!\"); document.location.href='Layout.php'; </script>";
            ?>
        </div>
    </section>
</body>
<?php include '../html/Footer.html' ?>
</body>