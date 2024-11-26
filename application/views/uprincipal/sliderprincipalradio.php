<?php 
// Obtén la instancia del cargador
$CI =& get_instance();

// Cargar el modelo
$CI->load->model('contenido_model'); 

// Obtener los contenidos
$contenidos = $CI->contenido_model->get_all_contenido(195);
$array_contenido = [];

foreach ($contenidos as $contenido) {
    $array_contenido[$contenido->nombre_contenido] = $contenido->desc_contenido;
}

// Asegúrate de que $colectivo esté definido o pasa los datos necesarios
if (isset($array_contenido["imagen_principal_index_radio"])) : ?>

    <div class="row no-margin">
        <div class="col-md-12 no-padding">
            <img style="width: 100%;" src="<?php echo base_url("public/imagenes/radio/imagen_principal/" . $array_contenido["imagen_principal_index_radio"]); ?>" alt="<?php echo isset($colectivo->titulo) ? $colectivo->titulo : 'Imagen-principal'; ?>">
        </div>
    </div>

<?php endif; ?>