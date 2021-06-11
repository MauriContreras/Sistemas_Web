$(document).ready(function () {
    $('#validar').click(function () {
        return validarFormulario();
    });
 /*   $('#validar').click(function () {
        return validarEnunciado();
    });
*/
});

function validarFormulario(){
    if($('#email').val() == '') {
        alert('No has introducido un email');
        return false;
    } else if (!validarCorreo($('#email').val())) {
        alert('El correo no corresponde al de un alumno/profesor de la UPV/EHU');
        return false;
    }
    if ($('#enunciado').val() == '') {
        alert('No has rellenado el campo correspondiente al enunciado');
        return false;
    } else if ($('#enunciado').val().length < 10){
        alert('El enunciado ha de tener al menos 10 caractéres');
        return false;
    } else if ($('#correcta').val() == '') {
        alert('No has rellenado el campo correspondiente a la respuesta correcta');
        return false;
    } else if ($('#incorrecta1').val() == '') {
        alert('No has rellenado el campo correspondiente a la respuesta incorrecta 1');
        return false;
    } else if ($('#incorrecta2').val() == '') {
        alert('No has rellenado el campo correspondiente a la respuesta incorrecta 2');
        return false;
    } else if ($('#incorrecta3').val() == '') {
        alert('No has rellenado el campo correspondiente a la respuesta incorrecta 3');
        return false;
    } else if ($('#tema').val() == '') {
        alert('No has rellenado el campo correspondiente al tema');
        return false;
    } else {
        alert('todo ha ido correctamente');
        return true;
    }
}

function validarCorreo(email){
    var alumnoregex = /^[a-zA-Z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/;
    var proferegex =/^[a-zA-Z]+(\.[a-zA-Z]+)?@ehu\.(eus|es)$/;
    if(alumnoregex.test(email)||proferegex.test(email)){
        return true;
    }else{
        return false;
    }
}