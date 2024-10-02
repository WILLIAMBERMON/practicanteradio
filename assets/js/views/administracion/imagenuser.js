function infousuario(codigo, origen, destino)
{
    //var text = '<br><br><div id="imagen"><input type="hidden" id="scaleY" value="1"><input type="hidden" id="scaleX" value="1"><input type="hidden" name="codigo" id="codigo" value="' + codigo + '"><input type="hidden" id="destino" name="destino" value="' + destino + '"><input type="hidden" id="origen" name="origen" value="' + origen + '"><label for="exampleInputEmail1"><b>Foto ' + codigo + '</b></label></div><div class="row"><div class="col-md-5"><p><input type="file" onchange="activar_recorte(' + "'" + codigo + "'" + ')" id="file' + codigo + '" name="imagen" accept="image/*" class="form-control" aria-describedby="Imagén" placeholder="Imagén de la Noticia" /></p><div id="imagen_cargada' + codigo + '"></div></div><div class="col-md-7"><div class="btn-group" style="margin:0px 5px 0px 0px"><button type="button" class="btn btn-primary" onclick="recortar(' + "'" + codigo + "'" + ')">Recortar</button><button type="button" class="btn btn-primary" onclick="restaurar(' + "'" + codigo + "'" + ')">Restaurar</button></div><div class="btn-group" style="margin:0px 5px 0px 0px"><button type="button" class="btn btn-primary" onclick="$(' + "'#canvas" + codigo + "'" + ').cropper(' + "'rotate','-45'" + ')"><i class="fa fa-undo-alt"></i></button><button type="button" class="btn btn-primary" onclick="$(' + "'#canvas" + codigo + "'" + ').cropper(' + "'rotate','45'" + ')"><i class="fa fa-redo-alt"></i></button></div><div class="btn-group" style="margin:0px 5px 0px 0px"><button type="button" class="btn btn-primary" onclick="$(' + "'#canvas" + codigo + "'" + ').cropper(' + "'move','-10','0'" + ')"><i class="fa fa-arrow-left"></i></button><button type="button" class="btn btn-primary" onclick="$(' + "'#canvas" + codigo + "'" + ').cropper(' + "'move','10','0'" + ')"><i class="fa fa-arrow-right"></i></button><button type="button" class="btn btn-primary" onclick="$(' + "'#canvas" + codigo + "'" + ').cropper(' + "'move','0','-10'" + ')"><i class="fa fa-arrow-up"></i></button><button type="button" class="btn btn-primary" onclick="$(' + "'#canvas" + codigo + "'" + ').cropper(' + "'move','0','10'" + ')"><i class="fa fa-arrow-down"></i></button></div><div class="btn-group" style="margin:0px 5px 0px 0px"><button type="button" class="btn btn-primary" onclick="mover(' + "'" + codigo + "','scaleX'" + ');"><i class="fa fa-arrows-alt-h"></i></button><button type="button" class="btn btn-primary" onclick="mover(' + "'" + codigo + "','scaleY'" + ');"><i class="fa fa-arrows-alt-v"></i></button></div></div></div><div id="divimagen' + codigo + '"  class="row"><div class="col-xs-6 col-sm-6" id="tamañoimagen"><canvas style="display: none" id="canvas' + codigo + '">Your browser does not support the HTML5 canvas element.</canvas></div><div class="col-xs-6 col-sm-6" id="result' + codigo + '"></div></div></div>';
    //$('#fotocargada').html(text);
    $('#footer_newpage').hide();
    var host = window.location.protocol + "//" + window.location.host + "/";
    $.post(host + 'Index/infouser',
    {
        codigo: codigo,
        origen: origen,
        destino: destino
    }, function (datos)
    {
        if (datos.carga)
        {
            $('#infouser').html(datos.archivo);
        }
    }, 'json');
    setTimeout(function ()
    {
        activarrecorte(codigo);
    }, 1000)
    $('#observainfo').show();
}


function mover(tipo)
{
    var scala = (($('#' + tipo).val()) == '1') ? '-1' : '1';
    $('#' + tipo).val(scala);
    $("#canvas").cropper(tipo, scala);
    //console.log(scala + '*---*' + tipo);
}

function observa()
{
    $('#rechazarw').show();
}

function rechazar()
{
    if ($('#observacion').val().length)
    {
        $('#observanoti').html('<input type="hidden" name="rechazarw" value="1">');
        $('#form_page_new').submit();
    }
    else
    {
        var algo = '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Error, es necesario que escriba una Observación.</strong> </div>';
        $('#observanoti').html(algo)
    }
}

function girar(mover)
{
    var canvas = $("#canvas");
    context = canvas.get(0).getContext("2d");
    canvas.cropper("rotate", mover);
}

/*
function activarrecorte()
{
    const imgw = new Image();
    imgw.onload = function ()
    {
        var max = (this.height < 600) ? (this.height) : '600';
        $('#tamañoimagen').height(max);
    }
    imgw.src = $('#base').val();

    var canvas = $("#canvas"),
        context = canvas.get(0).getContext("2d"),
        $result = $('#result');
    canvas.cropper("destroy");
    var parts = [
        new Blob(['you construct a file...'],
        {
            type: 'text/plain'
        }),
        ' Same way as you do with blob',
        new Uint16Array([33])
    ];
    var archivo = new File(parts, 'sample.jpeg',
    {
        lastModified: new Date(0), // optional - default = now
        type: "image/jpeg" // optional - default = ''
    });
    var base = $('#base').val();
    if (archivo)
    {
        if (archivo.type.match(/^image\//))
        {
            $('#divimagen').show();
            var reader = new FileReader();
            reader.onload = function (evt)
            {
                var img = new Image();
                img.onload = function ()
                {
                    context.canvas.height = img.height;
                    context.canvas.width = img.width;
                    context.drawImage(img, 0, 0);
                    var cropper = canvas.cropper(
                    {
                        aspectRatio: 1280 / 1706
                    });
                };
                img.src = base;
            };
            reader.readAsDataURL(archivo);
            $('#canvas').show();
        }
        else
        {
            alert("Archivo invalido, solo es posible visualizar imagenes.");
        }
    }
    else
    {
        alert('No se ha seleccionado un archivo.');
    }
}
*/
function activar_recorte(archivo)
{
    const imgw = new Image();
    imgw.onload = function ()
    {
        var max = (this.height < 600) ? (this.height) : '600';
        $('#tamañoimagen').height(max);
    }
    //imgw.src = $('#base').val();

    var canvas = $("#canvas"),
        context = canvas.get(0).getContext("2d"),
        $result = $('#result');
    canvas.cropper("destroy");
    //var archivo = $("#upload3").prop('files')[0];
    //console.log(archivo.type);return;


    if (archivo)
    {
        if (archivo.type.match(/^image\//))
        {
            //console.log('nombre archivo');
            //console.log(archivo.name);
            $('#hidden_nombre_archivo').val(archivo.name);
            $('#divimagen').show();
            var reader = new FileReader();
            reader.onload = function (evt)
            {
                var img = new Image();
                img.onload = function ()
                {
                    context.canvas.height = img.height;
                    context.canvas.width = img.width;
                    context.drawImage(img, 0, 0);

                    var cropper = canvas.cropper(
                    {
                        aspectRatio: 750 / 281,
                        //cropBoxRedimensionable:false
                    });

                };
                img.src = evt.target.result;
            };
            reader.readAsDataURL(archivo);
            $('#canvas').show();
        }
        else
        {
            alert("Archivo invalido, solo es posible visualizar imagenes.");
        }
    }
    else
    {
        alert('No se ha seleccionado un archivo.');
    }
}


function recortar()
{
    var canvas = $("#canvas"),
        context = canvas.get(0).getContext("2d"),
        $result = $('#result');
    $result.html('');
    $('#recomendacion').hide();
    $('#padre').show();    
    // Get a string base 64 data url
    var croppedImageDataURL = canvas.cropper('getCroppedCanvas').toDataURL("image/png");
    //console.log(croppedImageDataURL);
    $result.append($('<img>').attr('src', croppedImageDataURL).css('max-width', '270px'));
    var imagen = $result.children()[0];
    //console.log(croppedImageDataURL);

    var base64Image = croppedImageDataURL; // Tu cadena Base64
    var img = new Image();
    img.src = base64Image;

    img.onload = function ()
    {
        $('#info_imagen').html(`Resolución del recorte: ${img.width} x ${img.height} píxeles`);
        $('#hidden_ancho').val(img.width);
        $('#hidden_alto').val(img.height);
    };


    $('#file').attr('src', croppedImageDataURL)
    $('#imagen_cargada').html('<input type="hidden" name="imagenw" id="imagenw' + '" value="' + croppedImageDataURL + '">')
    $('#nueva').removeAttr('disabled');
    $('#footer_newpage').show();
    $('#recomendacion').css('color', '#2e6da4');


}

function restaurar()
{
    var canvas = $("#canvas"),
        context = canvas.get(0).getContext("2d"),
        $result = $('#result');
    $("#imagenw").val('');
    canvas.cropper('reset');
    $result.empty();
    $('#recomendacion').hide();
}

function limpiar()
{
    $('#fotocargada').html('');
    $('#infouser').html('');
    $('#footer_newpage').hide();
}

function guardar()
{
    //valida si 
    if ($('#hidden_ancho').val() === '' || $('#hidden_alto').val() === '' || $('#result').is(':empty'))
    {
        $('#recomendacion').show();
        $('#recomendacion').css('color', 'red');
    }
    else
    {
        //console.log("Entra por aqui");
        //console.log();
        //console.log("nombre del ultimo archivo seleccionado para el recorte");
        //console.log(archivo_actual);
        //span_recortar = document.getElementsByClassName(archivo_actual);
        //console.log("span recortar");
        //console.log(span_recortar);
        //span_recortar[0].style.display = "none";

        //Obtiene el div donde dice Cargado
        //console.log("div");
        //consulta el div por su data-id
        //const div = document.querySelector('div[data-id="'+archivo_actual+'"]');
        //le agrega la clase fileup-success
        //div.classList.add('fileup-success');
        // Agregar o modificar el texto del div
        //div.textContent = 'Cargado';

        //const div2 = document.querySelector('div[data-progress="'+archivo_actual+'"]');
        //div2.style.width = '100%';
        //console.log(div);
        
        
        //console.log('instancia');
        //console.log(instancia);

        /*
        $.each(instancia.getFiles(), function (i, file)
        {
            console.log("file:");
            console.log(file);


        });
        */
        /*
        let arr = [1, 2, 3]; 
        arr.forEach((element, index) => {  
            arr[index] = element + 10;  
        }); 
        console.log(arr);
        */

        //var img = new Image();
        var base64 = $('#result').children().attr('src'); //Obtiene el src de la imagen en base64
        const imagen = document.querySelector('img[data-image="'+archivo_actual+'"]');
        imagen.src = base64;

        const zoom = document.querySelector('img[data-image2="'+archivo_actual+'"]');
        zoom.src = base64;
        //console.log(imagen);
        $('#myModal').modal('hide');
        //imagen.attr("src", base64);
        
        /*

        img.src = base64;
        img.onload = function ()
        { //carga la imagen en memoria

            var canvas = document.createElement('canvas'); //crea un nuevo objeto canvas
            canvas.width = img.width; //le asigna el ancho de la imagen al canvas
            canvas.height = img.height; //le asigna el alto de la imagen al canvas

            var ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0); //pinta la imagen en formato canvas en memoria

            canvas.toBlob(function (blob)
            { //convierte el canvas en un objeto Blob de Javascript
                var file = new File([blob], 'nombre_de_archivo.jpg',
                {
                    type: 'image/jpeg'
                }); //crea un nuevo objeto File

                let formData = new FormData();
                formData.append('imagen_banner', file);

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

                        //limpia la cadena que devuelve
                        data = data.split("{");
                        //console.log("{"+data[1]);return;
                        //var myArray = JSON.parse(data);
                        var datos = JSON.parse("{"+data[1]);
                        console.log(datos);
                        //return;

                        if (datos.estado == "success")
                        {
                            //console.log(datos.nombre_imagen);
                            $('#myModal').modal('hide');
                            
                        }
                        else
                        {

                        }

                    }
                })


                //console.log(file);
            }, 'image/jpeg');

            // En este punto, la imagen está dibujada en el canvas


        };


        /*

        $.each(instancia.getFiles(), function (i, file)
        {
            console.log(file);


        });
        */


    }

}