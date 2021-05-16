var message = $('#message').val();
if (message == 'create') {
    toastr.success('Nuevo Administrador registrado con exito.', '¡Correcto!', {
        positionClass: 'toastr toast-top-right',
        containerId: 'toast-top-right'
    });
    message.val('');
}else if (message == 'update'){
    toastr.info(' La información del Administrador fue actualizada correctamente.', '¡Aviso!', {
        positionClass: 'toastr toast-top-right',
        containerId: 'toast-top-right'
    });
    message.val('');
}else if (message == 'repeat'){
    toastr.error('El número de usuario ingresado ya está en uso, intente con otro número.', '¡Alerta!', {
        positionClass: 'toastr toast-top-right',
        containerId: 'toast-top-right'
    });
    message.val('');
}