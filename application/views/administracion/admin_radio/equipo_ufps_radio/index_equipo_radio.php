<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<h1>Lista de integrantes del equipo UFPS Radio</h1>

<a href="<?php echo site_url('administracion/equipo_ufps_radio_formulario/crear'); ?>" class="btn btn-primary">Crear Nuevo Integrante</a>


<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Departamento</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($equipo_radio as $integrante): ?>
        <tr>
            
            <td style="max-width: 300px; word-wrap: break-word; overflow: hidden; text-overflow: ellipsis;"><?php echo $integrante["nombre"]; ?></td>
            <td><?php echo $integrante["cargo"]; ?></td>
            <td><?php echo $integrante["departamento"]; ?></td>

            <td><img src="<?php echo base_url("public/imagenes/radio/equipo_radio/" . $integrante["foto"]); ?>" alt="Foto del colectivo" style="width: 100px;"></td>
            <td>
                <a href="<?php echo site_url('administracion/equipo_ufps_radio_formulario/'. $integrante["id"]); ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Editar</a>
                <a href="<?php echo site_url('administracion/equipo_ufps_radio_eliminar/'. $integrante["id"]); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>