<div class="row no-margin margin-top-40">
    <?php include APPPATH . "views/administracion/sidebar.php"; ?>

    <div class="col-md-9">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<h1>Lista de Colectivos</h1>
<h1><?= ($item_sidebar_active) ?></h1>

<a href="<?php echo site_url('administracion/crear_colectivo'); ?>" class="btn btn-primary">Crear Nuevo Colectivo</a>
<a href="<?php echo site_url('administracion/categorias_colectivo'); ?>" class="btn btn-primary">Crear Categoria</a>


<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Categoria</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Foto</th>
            <th>Director</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($colectivos as $colectivo): ?>
        <tr>
            <td><?php if (isset($categorias[$colectivo->categoria_id])) {
                    echo $categorias[$colectivo->categoria_id];
                        } else {
                    echo "Categoría no encontrada";
                } ?>
            </td>
            <td><?php echo $colectivo->titulo; ?></td>
            <td style="max-width: 300px; word-wrap: break-word; overflow: hidden; text-overflow: ellipsis;"><?php echo $colectivo->descripcion; ?></td>
            <td><img src="<?php echo base_url("public/imagenes/radio/colectivos/" . $colectivo->foto); ?>" alt="Foto del colectivo" style="width: 100px;"></td>
            <td><?php echo $colectivo->director; ?></td>
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