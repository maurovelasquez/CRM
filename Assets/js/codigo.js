window.setInterval(function() {
    $('#recarga').load(location.href + " #recarga");
    $('#recargaReport').load(location.href + " #recargaReport");
}, 500)

function insertar(e) {
    e.preventDefault();
    const usuario = document.getElementById('usuario').value;
    const contra = document.getElementById('password').value;
    if (usuario != " " && contra != " ") {
        var form = $('#formLogin');
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: 'Home/validar',
            data: form.serialize(),
            success: function(data) {
                // console.log(data);
                const res = JSON.parse(data);
                if (res == "ok") {
                    window.location.href = "Principal";
                } else {
                    Swal.fire({
                        type: 'error',
                        title: '¡Usuario y/o password inválidos!',
                        confirmButtonColor: 'red',
                        confirmButtonText: 'Aceptar'
                    });
                }
            }
        });
    } else {
        Swal.fire({
            type: 'warning',
            title: 'Debe ingresar un usuario y/o password'
        });
        return false;
    }
}

function InsertarUsu(e) {
    e.preventDefault();
    const Recibido = document.getElementById('txtRecibido').value;
    const Cierre = document.getElementById('txtCierre').value;
    const Dias = document.getElementById('txtDias').value;
    const Estado = document.getElementById('txtEstado').value;
    const Observaciones = document.getElementById('txtObservaciones').value;

    if (Recibido != " " || Cierre != " " || Dias != " " || Estado != " " || Observaciones != " ") {
        var form = $('#frmRegistrarU');
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: 'DashBoard/InsertarU',
            data: form.serialize(),
            success: function(data) {
                console.log(data);
                const res = JSON.parse(data);
                if (res == "si") {
                    Swal.fire({
                        type: 'success',
                        title: '¡Registro realizado con éxito!',
                        confirmButtonText: 'Aceptar'

                    });
                    document.getElementById("txtRecibido").value = "";
                    document.getElementById("txtCierre").value = "";
                    document.getElementById("txtDias").value = "";
                    document.getElementById("txtEstado").value = "";
                    document.getElementById("txtObservaciones").value = "";
                } else {
                    Swal.fire({
                        type: 'error',
                        title: '¡Hubo un error al registrar!',
                        confirmButtonColor: 'red',
                        confirmButtonText: 'Aceptar'
                    });
                }
            }
        });
    } else {
        Swal.fire({
            type: 'warning',
            title: 'Todos los campos son obligatorios'
        });
        return false;
    }

}

function EliminarU(id) {
    var form = $('#frmTabla');
    var url = form.attr('action');
    $.ajax({
        type: "POST",
        url: 'DashBoard/eliminar/' + id,
        data: form.serialize(),
        success: function(data) {
            console.log(data);
            const res = JSON.parse(data);
            if (res == "si") {
                Swal.fire({
                    type: 'success',
                    title: '¡Registro eliminado con éxito!',
                    confirmButtonText: 'Aceptar'
                });
            } else {
                Swal.fire({
                    type: 'error',
                    title: '¡Hubo un error al eliminar!',
                    confirmButtonColor: 'red',
                    confirmButtonText: 'Aceptar'
                });
            }
        }
    });

}

function EditarU(id) {
    console.log(id);
    document.getElementById('ID').value = id;
    document.getElementById('IDPost').value = id;
    document.getElementById('Insertar').style.display = 'none'; // hide
    document.getElementById('Actualizar').style.display = '';

    var form = $('#frmTabla');
    var url = form.attr('action');
    $.ajax({
        type: "POST",
        url: 'DashBoard/editar/' + id,
        data: form.serialize(),
        success: function(data) {
            console.log(data);
            const res = JSON.parse(data);
            document.getElementById("txtRecibidoU").value = res.recibido;
            document.getElementById("txtCierreU").value = res.cierre;
            document.getElementById("txtDiasU").value = res.dias;
            document.getElementById("txtEstadoU").value = res.estado;
            document.getElementById("txtObservacionesU").value = res.observaciones;
        }
    });

}

function cancelar(e) {
    e.preventDefault();
    document.getElementById('Insertar').style.display = '';
    document.getElementById('Actualizar').style.display = 'none';
}

function ActualizarU(e) {
    e.preventDefault();
    var form = $('#frmActual');
    var url = form.attr('action');
    $.ajax({
        type: "POST",
        url: 'DashBoard/ActualizarU',
        data: form.serialize(),
        success: function(data) {
            console.log(data);
            const res = JSON.parse(data);
            if (res == "si") {
                Swal.fire({
                    type: 'success',
                    title: '¡Registro actualizado con éxito!',
                    confirmButtonText: 'Aceptar'

                });
                document.getElementById('Insertar').style.display = '';
                document.getElementById('Actualizar').style.display = 'none';
            } else {
                Swal.fire({
                    type: 'danger',
                    title: '¡Ocurrió un error!',
                    confirmButtonText: 'Aceptar'
                });
            }
        }
    })
}

function excelPersonas(e) {
    e.preventDefault();
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Reporte de personas generado con éxito',
        showConfirmButton: false,
        timer: 2000
    })
    window.location = "DashBoard/excel";
}

function InsertarReport(e) {
    e.preventDefault();
    const Reporte = document.getElementById('Reportetxt').value;

    if (Reporte != " ") {
        var form = $('#frmReport');
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: 'Blank/InsertarReport',
            data: form.serialize(),
            success: function(data) {
                console.log(data);
                const res = JSON.parse(data);
                if (res == "si") {
                    Swal.fire({
                        type: 'success',
                        title: '¡Reporte realizado con éxito!',
                        confirmButtonText: 'Aceptar'

                    });
                    document.getElementById("Reportetxt").value = " ";

                } else {
                    Swal.fire({
                        type: 'error',
                        title: '¡Hubo un error al registrar!',
                        confirmButtonColor: 'red',
                        confirmButtonText: 'Aceptar'
                    });
                }
            }
        });
    } else {
        Swal.fire({
            type: 'warning',
            title: '¡Debe escribir un reporte!'
        });
        return false;
    }
}

function EliminarReport(ID) {
    var form = $('#frmTabla');
    var url = form.attr('action');
    $.ajax({
        type: "POST",
        url: 'Blank/eliminar/' + ID,
        data: form.serialize(),
        success: function(data) {
            console.log(data);
            const res = JSON.parse(data);
            if (res == "si") {
                Swal.fire({
                    type: 'success',
                    title: '¡Registro eliminado con éxito!',
                    confirmButtonText: 'Aceptar'
                });
            } else {
                Swal.fire({
                    type: 'error',
                    title: '¡Hubo un error al eliminar!',
                    confirmButtonColor: 'red',
                    confirmButtonText: 'Aceptar'
                });
            }
        }
    });

}

function EditarReport(ID) {
    console.log(ID);
    document.getElementById('ID').value = ID;
    document.getElementById('IDPost').value = ID;
    document.getElementById('Reporte').style.display = 'none'; // hide
    document.getElementById('ReporteEdit').style.display = '';

    var form = $('#frmReportEdit');
    var url = form.attr('action');
    $.ajax({
        type: "POST",
        url: 'Blank/editar/' + ID,
        data: form.serialize(),
        success: function(data) {
            console.log(data);
            const res = JSON.parse(data);
            document.getElementById("ReportetxtE").value = res.reporte;
            document.getElementById("fechaEdit").value = res.Dia_reporte;
        }
    });

}

function cancelarReport(e) {
    e.preventDefault();
    document.getElementById('Reporte').style.display = '';
    document.getElementById('ReporteEdit').style.display = 'none';
}

function ActualizarReport(e) {
    e.preventDefault();
    var form = $('#frmReportEdit');
    var url = form.attr('action');
    $.ajax({
        type: "POST",
        url: 'Blank/ActualizarReport',
        data: form.serialize(),
        success: function(data) {
            console.log(data);
            const res = JSON.parse(data);
            if (res == "si") {
                Swal.fire({
                    type: 'success',
                    title: '¡Registro actualizado con éxito!',
                    confirmButtonText: 'Aceptar'

                });
                document.getElementById('Reporte').style.display = '';
                document.getElementById('ReporteEdit').style.display = 'none';
            } else {
                Swal.fire({
                    type: 'danger',
                    title: '¡Ocurrió un error!',
                    confirmButtonText: 'Aceptar'
                });
            }
        }
    })
}

function Responder(ID) {


    console.log(ID);
    document.getElementById('IDR').value = ID;
    document.getElementById('IDPostR').value = ID;
    document.getElementById('Respuesta').style.display = '';

    var form = $('#frmResponder');
    var url = form.attr('action');
    $.ajax({
        type: "POST",
        url: 'Blank/editar/' + ID,
        data: form.serialize(),
        success: function(data) {
            console.log(data);
            const res = JSON.parse(data);
            document.getElementById("ReportetxtR").value = res.reporte;
            document.getElementById("fechaEditR").value = res.Dia_reporte;
            document.getElementById("Reportado").value = res.reporte_hecho_por;
        }
    });

}

function cancelarR(e) {
    e.preventDefault();
    document.getElementById('Respuesta').style.display = 'none';
}

function ResponderR(e) {
    e.preventDefault();
    const Res = document.getElementById('RespuestaRe').value;
    if (Res != "") {
        e.preventDefault();
        var form = $('#frmResponder');
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: 'Blank/Responder',
            data: form.serialize(),
            success: function(data) {
                console.log(data);
                const res = JSON.parse(data);
                if (res == "si") {
                    Swal.fire({
                        type: 'success',
                        title: '¡Respuesta generada con éxito!',
                        confirmButtonText: 'Aceptar'
                    });
                    document.getElementById('Respuesta').style.display = 'none';
                    document.getElementById('RespuestaRe').value = '';
                } else {
                    Swal.fire({
                        type: 'danger',
                        title: '¡Ocurrió un error!',
                        confirmButtonText: 'Aceptar'
                    });
                }
            }
        });
    } else {
        Swal.fire({
            type: 'warning',
            title: '¡Todos los campos son obligatorios!',
            confirmButtonText: 'Aceptar'
        });
        return false;
    }
}

function EditarRespuesta(ID) {
    console.log(ID);
    document.getElementById('IDRE').value = ID;
    document.getElementById('IDPostRE').value = ID;
    document.getElementById('RespuestaE').style.display = '';
    document.getElementById('Respuesta').style.display = 'none';

    var form = $('#frmResponderE');
    var url = form.attr('action');
    $.ajax({
        type: "POST",
        url: 'Blank/editar/' + ID,
        data: form.serialize(),
        success: function(data) {
            console.log(data);
            const res = JSON.parse(data);
            document.getElementById("ReportetxtRE").value = res.reporte;
            document.getElementById("ReportadoRE").value = res.reporte_hecho_por;
            document.getElementById("fechaEditRE").value = res.Dia_reporte;
            document.getElementById("RespuestaEDIT").value = res.respuesta;
            document.getElementById("RespondidoRE").value = res.respuesta_hecha_por;
            document.getElementById("ResFecha").value = res.Dia_respuesta;
        }
    });

}

function ResponderEdit(e) {
    e.preventDefault();
    var form = $('#frmResponderE');
    var url = form.attr('action');
    $.ajax({
        type: "POST",
        url: 'Blank/ActualizarRespuesta',
        data: form.serialize(),
        success: function(data) {
            console.log(data);
            const res = JSON.parse(data);
            if (res == "si") {
                Swal.fire({
                    type: 'success',
                    title: '¡Registro actualizado con éxito!',
                    confirmButtonText: 'Aceptar'

                });
                document.getElementById('RespuestaE').style.display = 'none';
            } else {
                Swal.fire({
                    type: 'danger',
                    title: '¡Ocurrió un error!',
                    confirmButtonText: 'Aceptar'
                });
            }
        }
    })
}

function cancelarRE(e) {
    e.preventDefault();
    document.getElementById('RespuestaE').style.display = 'none';
}


function EliminarRes(ID) {
    var form = $('#frmTabla');
    var url = form.attr('action');
    $.ajax({
        type: "POST",
        url: 'Blank/eliminarRes/' + ID,
        data: form.serialize(),
        success: function(data) {
            console.log(data);
            const res = JSON.parse(data);
            if (res == "si") {
                Swal.fire({
                    type: 'success',
                    title: '¡Registro eliminado con éxito!',
                    confirmButtonText: 'Aceptar'
                });
            } else {
                Swal.fire({
                    type: 'error',
                    title: '¡Hubo un error al eliminar!',
                    confirmButtonColor: 'red',
                    confirmButtonText: 'Aceptar'
                });
            }
        }
    });

}

function excelReport(ID) {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Reporte generado con éxito',
        showConfirmButton: false,
        timer: 2000
    })
    window.location = "Blank/excel/" + ID;
}

function excelGeneral(e) {
    e.preventDefault();
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Reporte generado con éxito',
        showConfirmButton: false,
        timer: 2000
    })
    window.location = "Blank/excelGeneral";
}