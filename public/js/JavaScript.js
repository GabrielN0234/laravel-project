//  funcion para ejercicio #4 
function setButtons(){
    var id1 = '#button1';
    var id2 = '#button2';

    var clases = ($(id2).attr('class').split(' ').length)-1;
    var claseB1 = $(id1).attr('class').split(' ')[clases];
    var claseB2 = $(id2).attr('class').split(' ')[clases];
    var textB1 = $(id1).text();
    var textB2 = $(id2).text();
    
    $(id2).text(textB1);
    $(id1).text(textB2);
    $(id2).removeClass(claseB2);
    $(id2).addClass(claseB1);
    $(id1).removeClass(claseB1);
    $(id1).addClass(claseB2);
}

const getInputText = () => {
    var cadena = document.getElementById('inputEjercicio5').value;
    juegoDeLetras(cadena)
}

//  funcion para ejercicio #5 
function juegoDeLetras(cadena){
    var newCadena ='';
    var length = cadena.length;
    var cambio = false;
    for (let index = 0; index < length; index++) {
        if(cadena.charAt(index) != ' '){
            if(!cambio){
                newCadena = newCadena+cadena.charAt(index).toUpperCase();
                var cambio = true;
            }else{
                newCadena = newCadena+cadena.charAt(index).toLowerCase();
                var cambio = false;
            }
        }else{
            newCadena = newCadena+' ';
            if(!cambio){
                var cambio = false;
            }else{
                var cambio = true;
            }
        }
    }
    console.log('Nueva cadena: '+newCadena);
    console.log('La longitud de la cadena se de '+length+' caracteres.');
    swal("Abrir terminal", "El resultado se ha imprimido en la terminal", "success");
}

// declaracion de variables globales
var campoNombre = $('#clienteNombre');
var spanNombre = $('#validacionNombre');
var campoTelefono = $('#clienteTelefono');
var spanTelefono = $('#validacionTelefono');
var campoContacto = $('#clienteContacto');
var spanContacto = $('#validacionContacto');
var campoDireccion = $('#direccionNodo0');
var spanDireccion = $('#validacionDireccion');
var x = 0; //contador de campos dinámicos


$(document).ready(function(){
    //ocultar span de validaciones
    spanNombre.hide();
    spanTelefono.hide();
    spanContacto.hide();
    spanDireccion.hide();

    //creacion dinámica de los campos direccion
    var maxField = 4;
    var addButton = $('#addButton');
    var removeButton = $('#deleteButton');
    var wrapper = $('#contenedor');
    var fieldHTML = '';
    $(removeButton).hide();
    $(addButton).click(function(){ 
        if(x <= maxField-1){
            x++;
            fieldHTML = '<div class="form-group col-md-12"><input id="direccionNodo'+x+'" name="'+x+'" class="dark border-0 form-control text-light" placeholder="Dirección" /><input type="hidden" id="hiddenIdDir" name="'+x+''+x+'" /></div>';
            $(wrapper).append(fieldHTML);
            if(x>0){
                $(removeButton).hide();
            }else{
                $(removeButton).show();
            }
            
            if(x == maxField-1){
                $(addButton).hide();
            }
        }
    });

    $(removeButton).click(function(){ 
        if(x >= 0){
            field = document.getElementById('direccionNodo'+x);
            parent = field.parentNode;
            parent.remove();
            x--;
            $(addButton).show();
            if(x == 0){
                $(removeButton).hide();
            }
        }
    });

    //Actualizaciones visuales de validaciones en tiempo real 
    // focus in
    campoNombre.focus(function(){ 
        spanNombre.hide();
        $(this).css("box-shadow", "none");
        $(this).css("background-color", "#212529");
    });
    campoTelefono.focus(function(){ 
        spanTelefono.hide();
        $(this).css("box-shadow", "none");
        $(this).css("background-color", "#212529");
    });
    campoContacto.focus(function(){ 
        spanContacto.hide();
        $(this).css("box-shadow", "none");
        $(this).css("background-color", "#212529");
    });
    campoDireccion.focus(function(){ 
        spanDireccion.hide();
        $(this).css("box-shadow", "none");
        $(this).css("background-color", "#212529");
    });

    // focus out
    campoNombre.focusout(function(){ 
        if($(this).val().length == 0){
            spanNombre.show();
            $(this).css("box-shadow", "0px 0px 9px .2px red");
        }
    });
    campoTelefono.focusout(function(){ 
        if($(this).val().length == 0){
            spanTelefono.show();
            $(this).css("box-shadow", "0px 0px 9px .2px red");
        }
    });
    campoContacto.focusout(function(){ 
        if($(this).val().length == 0){
            spanContacto.show();
            $(this).css("box-shadow", "0px 0px 9px .2px red");
        }
    });
    campoDireccion.focusout(function(){ 
        if($(this).val().length == 0){
            spanDireccion.show();
            $(this).css("box-shadow", "0px 0px 9px .2px red");
        }
    });

});

// Metodo llamado desde el form valida todos los campos
function validacion() {
    var validate = 0;
    var campos = 4;

    //Retorna 1 si es es válido, retorna 0 si no
    //todos deben retornar 1 para que la validacion sea aprobada

    validate += validarComponente($(campoNombre), $(spanNombre));
    validate += validarComponente($(campoTelefono), $(spanTelefono));
    validate += validarComponente($(campoContacto), $(spanContacto));
    validate += validarComponente($(campoDireccion), $(spanDireccion));

    if(validate == campos){
        return true;
    }else{
        return false;
    }
  }

  //valida cada campo y actualiza visualmente
function validarComponente(campo,validacion){
    if (campo.val().length == 0) {
        validacion.show();
        campo.css("box-shadow", "0px 0px 9px .2px red");
        return 0
    }else{
        validacion.hide();
        campo.css("box-shadow", "none")
        return 1;
    }
  }

  // reinicia los valores del formulario
function limpiarFormulario(){
    campoNombre.val('');
    campoTelefono.val('');
    campoContacto.val('');
    campoDireccion.val('');
    $('#hiddenId').val('0');
    $('#addButton').show();
    $('#deleteButton').hide();

    $('#bdelete').remove();
    while(x > 0){
        field = document.getElementById('direccionNodo'+x);
        parent = field.parentNode;
        parent.remove();
        x--;
    }
}


// para rellenar el formulario de actualizar
function editar(url){
    limpiarFormulario();
    var wrapper = $('#contenedor');
    $.ajax({
        url: url
    }).done(function (data) {
        $('#hiddenId').val(data["id"]);
        campoNombre.val(data["nombre"]);
        campoTelefono.val(data["telefono"]);
        campoContacto.val(data["contacto"]);
        campoDireccion.val(data['direcciones'][0]['descripcion']);
        $('#hiddenIdDir').val(data['direcciones'][0]['id']);
        wrapper.append('<button type="button" id="bdelete" onclick="borrarDir('+data['direcciones'][0]['id']+');" class="btn btn-danger text-light shadow">Eliminar</button>');
        //wrapper.appendTo('#del');
        for (let i = 1; i < data["direcciones"].length; i++) {
            fieldHTML = '<div class="form-group col-md-12"><input id="direccionNodo'+i+'" name="'+i+'" class="dark border-0 form-control text-light col-md-12" placeholder="Dirección" value="'+data['direcciones'][i]['descripcion']+'" /><input type="hidden" value="'+data['direcciones'][i]['id']+'" id="hiddenIdDir" name="'+i+''+i+'" /><button type="button" onclick="borrarDir('+data['direcciones'][i]['id']+');" class="btn btn-danger text-light shadow">Eliminar</button> </div>';
            $(wrapper).append(fieldHTML);
            x = i;
            if(x == 3){
                $('#addButton').hide();
            }
        }
    }).fail(function () {
        alert("Error al recuperar el cliente");
    }).always(function () {
    });

}

//para eliminar clientes
function Delete(url){
    swal({
        title: "Está seguro que desea elimiar este cliente",
        text: "Este registro no podrá ser recuperado",
        icon: "warning",
        buttons: true
    }).then((borrar) => {
        if (borrar) {
            $.ajax({
                type: "GET",
                url: url,
                success: function (data) {
                    location.reload()
                }
            });
        }
    })
}
function borrarDir(id){
    var url = "direccion/eliminar/"+id;
    swal({
        title: "Está seguro que desea elimiar esta direccion",
        text: "Este registro no podrá ser recuperado",
        icon: "warning",
        buttons: true
    }).then((borrar) => {
        if (borrar) {
            $.ajax({
                type: "GET",
                url: url,
                success: function (data) {
                    location.reload()
                }
            });
        }
    })
}