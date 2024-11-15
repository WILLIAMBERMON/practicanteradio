<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<h1>Programacion Colectivos</h1>
<h1><?= ($item_sidebar_active) ?></h1>

<a href="<?php echo site_url('administracion/crear_programacion_radio'); ?>" class="btn btn-primary">Crear Nueva programacion</a>


<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Colectivo</th>
            <th>dia</th>
            <th>Hora inicio</th>
            <th>Hora fin</th>
            <th>Foto</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($programacion as $prog): ?>
        <tr>
            <td><?php if (isset($colectivos[$prog->colectivo_id])) {
                    echo $colectivos[$prog->colectivo_id][0];
                        } else {
                    echo "sin Colectivo";
                } ?>
            </td>
            <td><?php echo $prog->dia; ?></td>
            <td><?php echo $prog->hora_inicio; ?></td>
            <td><?php echo $prog->hora_fin; ?></td>
           
            <td>
                <img src="<?php echo base_url("public/imagenes/radio/colectivos/" . isset($colectivos[$prog->colectivo_id]) ? $colectivos[$prog->colectivo_id][1]:"sin foto"); ?>" alt="Foto del colectivo" style="width: 100px;"></td>
            <td>
                <a href="<?php echo site_url('administracion/editar_colectivo_vista/'.$colectivo->id); ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Editar</a>
                <a href="<?php echo site_url('administracion/delete_colectivo/'.$colectivo->id); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>