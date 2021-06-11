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
    } else if (!validarEnunciado($('#enunciado'))){
        return false;
    } else if ($('#enunciado') == '') {
        alert('No has rellenado el campo correspondiente al enunciado');
    } else if ($('#correcta') == '') {
        alert('No has rellenado el campo correspondiente a la respuesta correcta');
    } else if ($('#incorrecta1') == '') {
        alert('No has rellenado el campo correspondiente a la respuesta incorrecta 1');
    } else if ($('#incorrecta2') == '') {
        alert('No has rellenado el campo correspondiente a la respuesta incorrecta 2');
    } else if ($('#incorrecta3') == '') {
        alert('No has rellenado el campo correspondiente a la respuesta incorrecta 3');
    } else if ($('#tema') == '') {
        alert('No has rellenado el campo correspondiente al tema');
    } 
}

function validarEnunciado(){
    if ($('#enunciado').val().length < 10) {
        alert('El enunciado ha de tener al menos 10 caractéres');
        return false;
    }
}

function validarCorreo(){
    var alumnoregex = /^[a-zA-Z]+[0-9]{3}@ikasle.ehu\.(eus|es)$/;
    var proferegex =/^[a-zA-Z]+(\.[a-zA-Z]+)?@ehu\.(eus|es)$/;
    if(alumnoregex.test()||proferegex.test()){
        return true;
    }else{
        return false;
    }
}