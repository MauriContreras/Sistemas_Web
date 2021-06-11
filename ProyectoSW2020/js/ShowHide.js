function showOnLogIn() {
    $('#registro').hide();
    $('#login').hide();
    $('#logout').show();
    $('#inicio').show();
    $('#insertar').show();
    $('#creditos').show();
    $('#verBD').show();
    $('#verXML').show();
    $('#ajax').show();
}

function showOnNotLogIn() {
    $('#registro').show();
    $('#login').show();
    $('#logout').hide();
    $('#inicio').show();
    $('#insertar').hide();
    $('#creditos').show();
    $('#verBD').hide();
    $('#verXML').hide();
    $('#ajax').hide();
}


$(document).ready(function () {

})