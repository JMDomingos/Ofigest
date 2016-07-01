
var Profile = {
    check: function (id) {
        if ($.trim($("#" + id)[0].value) == '') {
            $("#" + id)[0].focus();
            $("#" + id + "_alert").show();

            return false;
        };

        return true;
    },
    validate: function () {
        if (SignUp.check("name") == false) {
            return false;
        }
        if (SignUp.check("email") == false) {
            return false;
        }
        $("#profileForm")[0].submit();
    }
};

var SignUp = {
    check: function (id) {
        if ($.trim($("#" + id)[0].value) == '') {
            $("#" + id)[0].focus();
            $("#" + id + "_alert").show();

            return false;
        };

        return true;
    },
    validate: function () {
        if (SignUp.check("name") == false) {
            return false;
        }
        if (SignUp.check("username") == false) {
            return false;
        }
        if (SignUp.check("email") == false) {
            return false;
        }
        if (SignUp.check("password") == false) {
            return false;
        }
        if ($("#password")[0].value != $("#repeatPassword")[0].value) {
            $("#repeatPassword")[0].focus();
            $("#repeatPassword_alert").show();

            return false;
        }
        $("#registerForm")[0].submit();
    }
}

$(document).ready(function () {
    $("#registerForm .alert").hide();
    $("div.profile .alert").hide();
});

//Campo Select dos Modelos dinâmico através do campo Marcas
$("#fieldIdMarca").change(function(event){
    var value = $(this).val();
    var getResultsUrl = '/OfiGest/assync/searchModelo'; //FIXME: Colocar URl completo a partir de uma var
    $.ajax({
        type: "POST",
        url: getResultsUrl,
        data: {"id_marca": value},
        success: function(response){
            $("#fieldIdModelo").empty();
            $.each(response, function(){
                $("#fieldIdModelo").append('<option value="'+ this.modeloId +'">'+ this.modeloDesc +'</option>');
            });
        }
    });
});

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});

//função para fazer alert de Obj de Javascript (JSON)
function alertObject(obj){
    for(var key in obj) {
        alert('key: ' + key + '\n' + 'value: ' + obj[key]);
        if( typeof obj[key] === 'object' ) {
            alertObject(obj[key]);
        }
    }
}