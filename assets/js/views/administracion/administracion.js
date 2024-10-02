let archivo_actual; // el nombre del último archivo seleccionado por el usuario, se guarda para usarlo en el recorte
let instancia;
//let filesArray = [];
let imagenes_cargadas = '';
let tabla_validar_seccion;

jQuery(document).ready(function ()
{

    if ($('#tabla_validar_seccion').length)
    {
        tabla_validar_seccion = $('#tabla_validar_seccion').DataTable(
        {
            "language":
            {
                "url": "/assets/plugins/datatables/lenguaje/spanish.json"
            },
            order: [
                [0, 'desc']
            ],
            "columnDefs": [
                {
                    "width": "10%",
                    "targets": 0,
                    "className": "text-center"
                }, // Columna Tipo centrada
                {
                    "width": "70%",
                    "targets": 1,
                    "className": "text-center"
                }, // Columna Descripción centrada
                {
                    "width": "10%",
                    "targets": 2,
                    "className": "text-center"
                }, // Columna Cantidad Registros centrada
                {
                    "width": "10%",
                    "targets": 3,
                    "className": "text-center"
                } // Columna Eliminar centrada
            ],
            "autoWidth": false,
            drawCallback: function (settings)
            {
                // Añadir código adicional si lo necesitas
            }
        });

    }

    /*******************************/

    if ($('#upload3').length) //solo se activa en la ruta agregar_seccion
    {
        //Si se carga la pantalla de Editar Sección entonces usa un hidden input para traer el id_seccion
        if ($('#id_seccion').length > 0) //si existe el hidden input
        {
            consultar_imagenes_seccion($('#id_seccion').val());


        }
        //console.log(imagenes_cargadas);

        var url = $(location).attr('href');
        url = url.replace('agregar_seccion', 'cargar_banner_seccion'); //Quita esta ruta para que quede como base_url de php

        instancia = fileUp.create(
        {
            url: url,
            input: 'upload3',
            queue: 'upload3-queue',
            autostart: false,
            filesLimit: 6,
            sizeLimit: 2097152, // 2 Mb
            lang: 'es',
            files: imagenes_cargadas,
            templateFile: '<div class="fileup-file [TYPE] mb-2 p-1 d-flex flex-nowrap gap-2 bg-light border border-secondary-subtle rounded rounded-1">' +
                '<div class="imagen-contenedor fileup-preview">' +
                '<img src="[PREVIEW_SRC]" data-image="[NAME]" alt="[NAME]"  class="imagen-pequeña">' +
                '<div class="modal2">' +
                '<img src="[PREVIEW_SRC]" alt="[NAME]" data-image2="[NAME]" class="imagen-grande">' +
                '</div>' +
                '</div>' +
                '<div class="flex-fill">' +
                '<div class="fileup-description">' +
                '<span class="fileup-name"><b>Nombre:</b> [NAME]</span><br>' +
                '<span class="fileup-size text-nowrap text-secondary"><b>Tamaño:</b> [SIZE]</span>' +
                //'<small class="fileup-size text-nowrap text-secondary"> ([SIZE])</small>'+
                '</div>' +
                '<div class="fileup-controls mt-1 d-flex gap-2">' +
                '<span class="fileup-remove" title="[REMOVE]">✕</span>' +
                '<span id="[NAME]" class="fileup-upload btn-link">[UPLOAD] <i class="fa fa-upload" aria-hidden="true"></i></span>' +
                '<span class="btn-link [NAME]" style="display: block;cursor:pointer" class="btn btn-info btn-lg"' +
                'onclick="abrir_ventana_recorte(' + "'[NAME]'" + ')">Recortar <i class="fa fa-scissors" aria-hidden="true"></i></span>' +
                '<span class="fileup-abort btn-link" style="display:none">[ABORT]</span> ' +
                '</div>' +
                '<div class="fileup-result" data-id="[NAME]"></div>' +
                '<div class="fileup-progress progress mt-2 mb-1">' +
                '<div class="fileup-progress-bar progress-bar" data-progress="[NAME]"></div>' +
                '</div>' +

                '</div>',
            onSelect: function (file)
            { //evento al seleccionar una imagen

                //Obtener la resolución de la imagen subida
                const img = new Image();
                img.src = URL.createObjectURL(file);
                img.onload = function ()
                {
                    // Ahora puedes trabajar con el objeto Image
                    //console.log(`Dimensiones de la imagen: ${img.width} x ${img.height} píxeles`);
                    URL.revokeObjectURL(img.src);
                    span_upload = document.getElementById(file.name);
                    span_upload.style.display = "none"; //Oculta el span de Subir Archivo

                    const aspectRatioActual = img.width / img.height;
                    const aspectRatioDeseado = 750 / 281; // Relación de aspecto deseada

                    let actual = aspectRatioActual.toFixed(1);
                    let deseado = aspectRatioDeseado.toFixed(1);

                    if (actual !== deseado) //si no tiene la relación de aspecto requerida
                    {
                        span_recortar = document.getElementsByClassName(file.name);
                        //console.log(span_recortar[0]);
                        span_recortar[0].style.display = "block"; //Muestra el span de Recortar Imagen
                        span_recortar[0].style.cursor = "pointer";

                        //span_recortar = document.getElementsByClassName('zoom-preview');


                        $('#padre').hide();
                        //Llama al otro plugin de recortar imágenes Cropper.js
                        //filesArray.push(file);
                        //console.log(file);
                        activar_recorte(file); //este método está en el archivo imagenuser.js
                    }

                };

            },
            onStart: function (file)
            {
                let formData = new FormData();
                formData.append('imagen_banner', file._file);
                var url = $(location).attr('href');
                url = url.replace('agregar_seccion', 'cargar_banner_seccion'); //Quita esta ruta para que quede como base_url de php

                $.ajax(
                {
                    data: formData,
                    type: 'POST',
                    url: url,
                    contentType: false, // Importante: asegúrate de que no se establezca contentType
                    processData: false, // Importante: asegúrate de que no se procese el FormData
                    success: function (data)
                    {
                        //var myArray = JSON.parse(data);
                        var datos = JSON.parse(data);
                        //console.log(data);
                        //return;

                        if (datos.estado == "success")
                        {
                            //console.log(datos.nombre_imagen);return;
                            //Solo están permitidas 6 imágenes para el banner
                            //entonces recorre los input hidden que contienen los nombres de las imágenes 
                            //que ya están cargadas para comprobar de que ya hay 6 subidas
                            /*
                            for (let i = 1; i <= 6; i++) 
                            {
                                
                                //console.log($('#imagen'+i).val());
                                if ($('#imagen'+i).val().length == 0) 
                                {
                                    $('#imagen'+i).val(datos.nombre_imagen);
                                    console.log($('#imagen'+i).val());
                                }
                            }
                            */

                        }
                        else
                        {

                        }

                    }
                })

            },
            onSuccess: function (file, response)
            {
                //console.log(response);
                //alert('Upload success');
            },
            onError: function (errorType, options)
            {
                //alert('Upload error');
            }
        });


    }


    if ($('.tooltip_datatable').length) //si en algún lugar están llamando este plugin entonces inicialicelo
        $('.tooltip_datatable').tooltip();

    if ($('#descripcion').length) //si en algún lugar están llamando este plugin editor entonces inicialicelo
    {
        $('#descripcion').trumbowyg(
        {
            lang: 'es',
            btns: [
                ['foreColor', 'backColor'],
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['insertImage'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen']
            ],
            autogrow: true
        });

        $('#descripcion').trumbowyg()
            .on('tbwchange', function ()
            {
                //console.log('Change!'); 
                //console.log($('#descripcion').trumbowyg('html'));
                $('#contenido_convocatoria').html($('#descripcion').trumbowyg('html'));

            });


    }

    if ($('#contenido').length) //si en algún lugar están llamando este plugin editor entonces inicialicelo
    {
        $('#contenido').trumbowyg(
        {
            lang: 'es',
            btns: [
                ['foreColor', 'backColor'],
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['insertImage'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen']
            ],
            autogrow: true
        });

    }

    if ($('#CONTENIDO').length) //si en algún lugar están llamando este plugin editor entonces inicialicelo
    {
        $('#CONTENIDO').trumbowyg(
        {
            lang: 'es',
            btns: [
                ['foreColor', 'backColor'],
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['insertImage'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen']
            ],
            autogrow: true
        });

    }


    if ($('.fecha_publicado').length)
    {
        var fecha_publicado = document.querySelector(".fecha_publicado");
        fecha_publicado.addEventListener("change", (event) =>
        {

            //console.log($('.fecha_publicado').val());
            const date = new Date($('.fecha_publicado').val());
            const fecha =
                new Intl.DateTimeFormat('es-CO',
                {
                    dateStyle: 'full',
                    timeStyle: 'medium',
                    timeZone: 'America/Bogota',
                }).format(date);


            $('#fecha_convocatoria').html(fecha);

            //console.log(new Intl.DateTimeFormat ('en-GB').format(date));
        });


    }


    //El evento change de Jquery no está funcionando entonces se usa el evento 
    //de Javascript nativo  
    //console.log("Versión del Jquery");
    //console.log($.fn.jquery);
    var tipo_noticia = document.querySelector(".tipo_noticia");

    if (tipo_noticia)
    {
        tipo_noticia.addEventListener("change", (event) =>
        {
            //console.log("Evento change de javascript");
            //console.log(`You like ${event.target.value}`) ;

            if (`${event.target.value}` == '0') //Cecom
            {
                $('.url_noticia').show(); //Muestra el input de URL
                //$('#imagen_noti_div').attr("accept", "image/*") //Cambia el tipo de archivos permitidos en el input file
                var input_file = document.querySelector(".input_file");
                input_file.setAttribute("accept", "image/*");
                var label = document.querySelector(".label_documento");
                label.innerHTML = "Imagen";
            }
            else //Noticias Prensa
            {
                $('.url_noticia').hide(); //Oculta el input de URL
                //$('#imagen_noti_div').attr("accept", "image/*,.pdf")//Cambia el tipo de archivos permitidos en el input file
                var input_file = document.querySelector(".input_file");
                input_file.setAttribute("accept", "image/*,.pdf");
                var label = document.querySelector(".label_documento");
                label.innerHTML = "PDF/Imagen";


            }


        });

    }

    var select_tipo_noticia = document.querySelector(".select_tipo_noticia");

    if (select_tipo_noticia)
    {

        var dataTable = $('#tabla_noticias_divisist').DataTable(
        {
            "language":
            {
                "url": "/assets/plugins/datatables/lenguaje/spanish.json"
            },
            order: [
                [3, 'desc']
            ],
            drawCallback: function (settings)
            {
                //var api = this.api();

                // Output the data for the visible rows to the browser's console
                //console.log(api.rows({ page: 'current' }).data());
            }
        });


        select_tipo_noticia.addEventListener("change", (event) =>
        {

            var tipo_noticia_index = $('select[name=tipo_noticia_index]').val();
            var url = $(location).attr('href');
            url = url.replace('noticia_divisist', 'getNoticias'); //Quita esta ruta para que quede como base_url de php
            //console.log(url);
            $("#alert_mensaje").html('<div class="alert alert-warning alert-dismissable text-justify">Cargando...<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');

            if (tipo_noticia_index)
            {
                $.ajax(
                {
                    data:
                    {
                        tipo_noticia: tipo_noticia_index,
                    },
                    type: 'POST',
                    url: url,
                    success: function (data)
                    {
                        var datos = JSON.parse(data);

                        if (datos.estado == "success")
                        {
                            //console.log($(location).attr('href'));
                            $("#alert_mensaje").html('<div class="alert alert-success alert-dismissable text-justify">' + datos.mensaje + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');


                            dataTable.clear().draw();
                            var url = $(location).attr('href');
                            url = url.replace('noticia_divisist', 'editar_noticia_divisist'); //Quita esta ruta para que quede como base_url de php


                            $.each(datos.lista_noticias, function (i, item)
                            {
                                var estado = item.ESTADO == 1 ? 'Visible' : 'Oculto';

                                var button_editar = '<form action="' + url + '" class="" id="form" role="form" method="post" accept-charset="utf-8">' +
                                    '<input type="hidden" name="id_noticia" value="' + item.TITULO + '" style="display:none;">' +
                                    '<input type="hidden" name="tipo" value="' + item.TIPO + '" style="display:none;">' +
                                    '<input type="hidden" name="tipo_noticia" value="' + datos.tipo_noticia + '" style="display:none;">' +
                                    '<button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">' +
                                    '<i class="fa fa-pencil-square-o"></i>' +
                                    '</button>' +
                                    '</form>';

                                if (datos.tipo_noticia == "0") //Cecom
                                {
                                    dataTable.row
                                        .add([
                                            item.TITULO,
                                            item.CONTENIDO,
                                            estado,
                                            item.FECHA_CREACION,
                                            item.OBSERVACION,
                                            item.TIPO,
                                            item.FECHA_VENCIMIENTO,
                                            item.URL_IMG,
                                            item.URL,
                                            button_editar
                                        ])
                                        .draw(false);

                                }
                                else
                                {
                                    dataTable.row
                                        .add([
                                            item.TITULO,
                                            item.CONTENIDO,
                                            estado,
                                            item.FECHA_CREACION,
                                            item.OBSERVACION,
                                            item.TIPO,
                                            item.FECHA_VENCIMIENTO,
                                            "",
                                            "",
                                            button_editar
                                        ])
                                        .draw(false);
                                }
                            });
                        }
                        else
                        {
                            dataTable.clear().draw();
                            $("#alert_mensaje").html('<div class="alert alert-info alert-dismissable text-justify">' + datos.mensaje + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                        }
                    }
                })

            }


        });

    }

});

function consultar_imagenes_seccion(id_seccion)
{
    var url = $(location).attr('href');
    url = url.replace('editar_seccion', 'consultar_imagenes_seccion'); //Quita esta ruta para que quede como base_url de php

    $.ajax(
    {
        data:
        {
            id_seccion: $("#id_seccion").val()
        },
        type: 'POST',
        url: url,
        async: false, // Esto hace que la solicitud sea sincrónica
        success: function (data)
        {
            //var myArray = JSON.parse(data);
            var datos = JSON.parse(data);
            //console.log("Ajax");
            //console.log(datos.imagenes);

            if (datos.estado == "success")
                imagenes_cargadas = datos.imagenes;
            else
            {
                //console.log(datos.mensaje);
            }

            return;


            /*
                {
                    name: 'imagen_3.png',  // required
                    size: 1048576,
                    urlPreview: '../../../../public/imagenes/seccion/280/imagen_3.png',
                    urlDownload: 'img/cat.jpg',
                },


            */

            /*
            $.each(datos.imagenes, function(key, value) 
            {
                if(datos.imagenes.img1)
                    associativeArray.push({ key: value });

                
            });


            if(datos.imagenes.img1)
            return false;


            if (datos.estado == "success")
            {
                $("#alert_correo").html('<div class="alert alert-success alert-dismissable text-justify">' + datos.mensaje + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                $("#email_boletin").val('');
            }
            else
                $("#alert_correo").html('<div class="alert alert-info alert-dismissable text-justify">' + datos.mensaje + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');

            */

        }
    }) ///


}


function cargarModal(id_boletin)
{
    //console.log(id_boletin);

    var url = $(location).attr('href');

    url = url.replace('correos_enlace_informativo', 'generarBoletin'); //Quita esta ruta para que quede como base_url de php
    //console.log(url);
    $("#alert_mensaje").html('<div class="alert alert-warning alert-dismissable text-justify">Cargando...<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');

    //Hace scroll hasta este elemento para que el usuario sepa que se está cargando el ajax
    $('html, body').animate(
    {
        scrollTop: $("#alert_mensaje").offset().top
    }, 0);

    $.ajax(
    {
        data:
        {
            id_boletin: id_boletin,
        },
        type: 'POST',
        url: url,
        success: function (data)
        {
            //var myArray = JSON.parse(data);
            var datos = JSON.parse(data);
            //console.log("Ajax");
            //console.log(datos);

            $("#nombre_boletin").html("Boletin Edición " + datos.boletin.EDICION);
            $("#contenido_boletin").html(datos.plantilla);


            if (datos.estado == "success")
            {
                $("#alert_mensaje").html('<div class="alert alert-success alert-dismissable text-justify">' + datos.mensaje + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');

                //Le agrega una tiempo de espera de 1 segundo para que el usuario vea el mensaje de success antes de abrir el modal
                setTimeout(
                    function ()
                    {
                        $("#modal_visualizar_boletin").modal("show");
                    }, 1000);


            }
            else
            {
                $("#alert_mensaje").html('<div class="alert alert-info alert-dismissable text-justify">' + datos.mensaje + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');

            }

            //$('.actos').html(data);
        }
    }) ///

    $('#enviar_correo').click(function ()
    {
        //Valida el formato del correo electrónico antes de enviarlo
        if ($("#email_boletin").val().indexOf('@', 0) == -1 || $("#email_boletin").val().indexOf('.', 0) == -1)
        {
            alert('El correo electrónico introducido no es correcto.');
            return false;
        }
        else
        {
            $("#alert_correo").html('<div class="alert alert-warning alert-dismissable text-justify">Enviando correo, por favor espere...<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
            var url = $(location).attr('href');
            url = url.replace('correos_enlace_informativo', 'enviarBoletinCorreo'); //Quita esta ruta para que quede como base_url de php


            $.ajax(
            {
                data:
                {
                    correo: $("#email_boletin").val(),
                    nombre_boletin: $("#nombre_boletin").html(),
                    contenido_boletin: $("#contenido_boletin").html()
                },
                type: 'POST',
                url: url,
                success: function (data)
                {
                    //var myArray = JSON.parse(data);
                    var datos = JSON.parse(data);
                    //console.log("Ajax");
                    //console.log(datos);


                    if (datos.estado == "success")
                    {
                        $("#alert_correo").html('<div class="alert alert-success alert-dismissable text-justify">' + datos.mensaje + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                        $("#email_boletin").val('');
                    }
                    else
                        $("#alert_correo").html('<div class="alert alert-info alert-dismissable text-justify">' + datos.mensaje + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                }
            }) ///

        }


    });


}

function convertirImagenAFile(imgElement)
{
    const url = imgElement.src;
    //const nombreArchivo = imgElement.data('image');
    const nombreArchivo = imgElement.getAttribute('data-image');

    return fetch(url)
        .then(response =>
        {
            if (!response.ok)
            {
                throw new Error('Error al obtener la imagen');
            }
            return response.blob();
        })
        .then(blob =>
        {
            const file = new File([blob], nombreArchivo,
            {
                type: blob.type
            });
            //console.log('Archivo File:', file);
            return file;
        })
        .catch(error =>
        {
            console.error('Error:', error);
        });
}

async function abrir_ventana_recorte(nombre_imagen)
{
    //console.log(nombre_imagen);
    let file_buscado;
    $.each(instancia.getFiles(), function (i, file)
    {
        //console.log("file:");
        //console.log(file);
        if (file._options.name == nombre_imagen)
        {

            //Los elementos que no tienen objeto File son los que se precargaron al inicio
            //Los elementos que se cargan manualmente si quedan con objeto File
            //para los elementos que no tienen objeto File es necesario crearle uno para poder realizar el recorte
            if (file._file === null)
            {
                //Consulta la imagen usando su data-image
                const imagen = document.querySelector('img[data-image="' + nombre_imagen + '"]');
                //console.log(imagen);return;

                convertirImagenAFile(imagen)
                    .then(file =>
                    {
                        // Aquí puedes trabajar con el archivo una vez que la promesa se resuelva
                        //console.log('Archivo File después de la promesa:', file);
                        file_buscado = file;
                        archivo_actual = nombre_imagen;
                        activar_recorte(file_buscado);
                        $('#result').empty();
                        $('#hidden_ancho').val('');
                        $('#hidden_alto').val('');
                        $('#recomendacion').hide();
                        $('#myModal').modal('show');
                        return;

                    })
                    .catch(error =>
                    {
                        console.error('Error al obtener el archivo:', error);
                    });
            }
            else
            {
                file_buscado = file._file; //son archivos que se cargaron manualmente
                archivo_actual = nombre_imagen;
                activar_recorte(file_buscado);
                $('#result').empty();
                $('#hidden_ancho').val('');
                $('#hidden_alto').val('');
                $('#recomendacion').hide();
                $('#myModal').modal('show');
            }


        }


    });
    //return;
    //const file = filesArray.find(file => file.name === nombre_imagen);


}


$('#button_add').click(function ()
{

    const aspectRatioDeseado = 750 / 281; // Relación de aspecto deseada
    var nombre_imagenes = '';

    $('img[data-image]').each(function ()
    {
        let imagen = $(this);
        let nombre = $(this).data('image'); //obtiene el nombre de la imagen
        //console.log(imagen);

        imagen.on('load', function ()
        {
            const ancho = imagen.prop('naturalWidth');
            const alto = imagen.prop('naturalHeight');
            const aspectRatioActual = ancho / alto;

            let actual = aspectRatioActual.toFixed(1);
            let deseado = aspectRatioDeseado.toFixed(1);


            if (actual === deseado)
            {
                //console.log(`tiene el aspect ratio correcto: 750:281`);
                //console.log("La imagen: " + nombre + ` tiene la Relación de Aspecto correcta, Aspect Ratio Actual: ${ancho}:${alto} (${aspectRatioActual.toFixed(2)})`);                    
            }
            else
            {
                nombre_imagenes += '\n' + nombre;
                //alert("La imagen: " + nombre + ` no tiene la Relación de Aspecto correcta, por favor recorte la imagen antes de subirla`);
            }
        });


        // Si la imagen ya está en caché
        if (imagen.prop('complete'))
        {
            imagen.trigger('load');
        }

    });

    //console.log(nombre_imagenes);
    if (nombre_imagenes !== '')
    {
        alert('Las imágenes: ' + nombre_imagenes + '\nno tienen la relación de aspecto correcta, por favor recorte antes de subir una imagen.');
        return;
    }

    //return;


    const images = document.querySelectorAll('img[data-image]');
    //console.log(images);return;

    const dataTransfer = new DataTransfer(); // Crea un nuevo DataTransfer

    Promise.all(Array.from(images).map((img, index) =>
    {
        return fetch(img.src) // Obtiene la imagen
            .then(response => response.blob()) // Convierte la respuesta a un Blob
            .then(blob =>
            {
                const file = new File([blob], `imagen_${index + 1}.png`,
                {
                    type: blob.type
                }); // Crea un archivo
                dataTransfer.items.add(file); // Agrega el archivo al DataTransfer
            });
    })).then(() =>
    {
        //const inputFile = document.querySelector('input[type="file"]'); // Selecciona el input file
        //const inputFile = document.getElementById('upload3');


        const myForm = document.getElementById('form');
        const inputFile = myForm.querySelector('input[name="imagen_banner[]"]');
        inputFile.files = dataTransfer.files; // Asigna los archivos al input

        // Crea y dispara el evento change
        const changeEvent = new Event('change',
        {
            bubbles: true
        });
        inputFile.dispatchEvent(changeEvent);


        // Evita el envío predeterminado del formulario
        //event.preventDefault();

        // Verifica si el formulario es válido
        if (myForm.checkValidity())
        {
            // Si es válido, envía el formulario
            myForm.submit();

        }
        else
        {
            // Si no es válido, muestra los mensajes de error de validación
            // y evita el envío del formulario
            myForm.reportValidity();
        }


    });

});


function recargar_tabla(lista, id_seccion)
{

    tabla_validar_seccion.clear().draw();

    $.each(lista, function (i, item)
    {
            var tipo;
            var descripcion;

            switch (item.tabla) 
            {
              case "estilo_seccion":
                tipo = "Estilo CSS"
                descripcion = "Configuración de color de la sección";
                break;
              case "p_contenido":
                tipo = "Contenido"
                descripcion = "Contenido de la sección";
                break;
              case "p_documento":
                tipo = "Documento"
                descripcion = "Documentos, acuerdos, resoluciones de la sección";
                break;
              case "p_etrabajo":
                tipo = "Personal"
                descripcion = "Personal Administrativo o Docente de la Universidad relacionado a la sección";
                break;
              case "p_investigacion":
                tipo = "Grupo de investigación"
                descripcion = "Grupo de investigación de la universidad";
                break;
              case "p_noticia":
                tipo = "Noticia"
                descripcion = "Noticia relacionada a la sección";
                break;
              case "p_seccion_img":
                tipo = "Imagen"
                descripcion = "Imágenes del banner de la sección";
                break;
              case "p_tipo_seccion_hija":
                tipo = "Tipo de sección secundaria"
                descripcion = "Tipo de sección que puede estar relacionada a una sección principal";
                break;
              case "p_tipo_seccion_padre":
                tipo = "Tipo de sección principal"
                descripcion = "<b style='color:red'>Se eliminarán las secciones secundarias y sus registros relacionados<b>";
                break;
              case "p_url":
                tipo = "URL"
                descripcion = "Dirección url corta para los links de las secciones";
                break;
              case "p_menu":
                tipo = "Menú"
                descripcion = "Menú de la sección";
                break;
              default:
                console.log("Error en el tipo");
                break;
            }

            var boton_eliminar = '<a style="padding: 0px;" class="btn btn-link btn-lg hvr-grow"' +
            'onclick="borrar_registro_seccion('+ "'" + id_seccion + "'" +','+"'" + tipo + "'" +')">' +
            '<i class="fa fa-trash"></i>' +
            '</a>';



        if (parseInt(item.cantidad) > 0)
        {
            tabla_validar_seccion.row
                .add([
                    tipo,
                    descripcion,
                    item.cantidad,
                    boton_eliminar
                ])
                .draw(false);
        }
    });


}

function validar_seccion(id_seccion)
{
    //console.log(id_boletin);

    var url = $(location).attr('href');

    url = url.replace('seccion', 'validar_seccion'); //Quita esta ruta para que quede como base_url de php
    //console.log(url);
    //$("#alert_mensaje").html('<div class="alert alert-warning alert-dismissable text-justify">Cargando...<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');


    $.ajax(
    {
        data:
        {
            id_seccion: id_seccion,
        },
        type: 'POST',
        url: url,
        success: function (data)
        {
            //var myArray = JSON.parse(data);
            var datos = JSON.parse(data);
            //console.log("Ajax");
            console.log(datos);
            //return;

            if (datos.estado == "success")
            {
                recargar_tabla(datos.resultado,datos.id_seccion);
                $("#button_delete_seccion").val(datos.id_seccion);
                $("#myModalBorrarSeccion").modal("show");
            }
            else
            {
                $.notify("Ocurrió un error al validar la sección", {
                    className: "error",
                    autoHideDelay: 2000  // 2 segundos
                });

            }

            //$('.actos').html(data);
        }
    }) ///
}

function borrar_registro_seccion(id_seccion,tipo_registro)
{
    var url = $(location).attr('href');
    url = url.replace('seccion', 'borrar_registro_seccion'); //Quita esta ruta para que quede como base_url de php

    $.ajax(
    {
        data:
        {
            id_seccion: id_seccion,
            tipo_registro: tipo_registro,
        },
        type: 'POST',
        url: url,
        success: function (data)
        {
            //var myArray = JSON.parse(data);
            var datos = JSON.parse(data);
            //console.log("Ajax");
            console.log(datos);
            //return;

            if (datos.estado == "success")
            {

                recargar_tabla(datos.resultado,datos.id_seccion);
                $.notify("Los registros fueron eliminados correctamente", "success");
            }
            else
            {
                $.notify("Ocurrió un error al intentar borrar los registros", {
                    className: "error",
                    autoHideDelay: 2000  // 2 segundos
                });


            }

            //$('.actos').html(data);
        }
    }); ///

}

$("#button_delete_seccion").click(function() 
{
    var url = $(location).attr('href');
    url = url.replace('seccion', 'delete_seccion'); //Quita esta ruta para que quede como base_url de php

    $.ajax(
    {
        data:
        {
            id_seccion: $(this).val()
        },
        type: 'POST',
        url: url,
        success: function (data)
        {
            //var myArray = JSON.parse(data);
            var datos = JSON.parse(data);
            //console.log("Ajax");
            console.log(datos);
            //return;

            if (datos.estado == "success")
            {
                $.notify("La sección fue eliminada correctamente", {
                    className: "success",
                    autoHideDelay: 2000  // 2 segundos
                });

                // Usar setTimeout para esperar 2 segundos antes de recargar la página
                setTimeout(function() {
                    location.reload();
                }, 2000);  // Espera 2 segundos (2000 milisegundos) antes de recargar

            }
            else
            {
                $.notify("Ocurrió un error al eliminar la sección", {
                    className: "error",
                    autoHideDelay: 2000  // 2 segundos
                });


            }

            //$('.actos').html(data);
        }
    }); ///
});