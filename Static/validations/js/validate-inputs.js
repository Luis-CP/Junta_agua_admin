///VALIDACIONES
function validar_caracteres(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8 || tecla == 32 || tecla == 46 || tecla == 44 || tecla == 59) { //los valores a los que se iguala la variable tecla son del codigo ascii
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9á-úÁ-Ü]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function validar_email(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8 || tecla == 46 || tecla == 45 || tecla == 64 || tecla == 95) { //los valores a los que se iguala la variable tecla son del codigo ascii
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function validar_letras(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8 || tecla == 32) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-zá-úÁ-Ü]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function validar_numeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function validar_float(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8 || tecla == 46 || tecla == 44) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


function aMayusculas(obj, id) {
    obj = obj.toUpperCase(); //todas las letras mayusculas
    //obj = obj.replace(/\b\w/g, l => l.toUpperCase()); //la primera letra de una palabra en mayuscula
    document.getElementById(id).value = obj;
}


/// BUSCAR AGREGAR
$(document).ready(function () {
    search = $('#tr_search');
    add = $('#tr_add');
    search_add = $('#btn_search_add');
    add.addClass("my-hide");
    $(search_add).click(function () {
        if (add.hasClass("my-hide")) {
            search_add.html("<i class='mdi mdi-magnify'></i> Buscar")
                .removeClass('btn-add')
                .addClass('btn-search');
            search.addClass("my-hide");
            add.removeClass("my-hide");
        } else {
            search_add.html("<i class='mdi mdi-plus'></i> Agregar")
                .removeClass('btn-search')
                .addClass('btn-add');
            add.addClass("my-hide");
            search.removeClass("my-hide");
        }
    });
});


