var message = $('#message').val();
if (message == 'create') {
    toastr.success('Nuevo Socio registrado con exito.', '¡Correcto!', {
        positionClass: 'toastr toast-top-right',
        containerId: 'toast-top-right'
    });
    message.val('');
}else if (message == 'update'){
    toastr.info('La información del Socio fue actualizada correctamente.', '¡Aviso!', {
        positionClass: 'toastr toast-top-right',
        containerId: 'toast-top-right'
    });
    message.val('');
}