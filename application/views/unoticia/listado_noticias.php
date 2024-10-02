<?php include APPPATH . "views/useccion/header.php"; ?>


<!--=== Content Part ===-->
<div class="container content profile">
    <div class="row">
        <div class="col-md-9">
            <div class="box-body table-responsive no-padding">

                <table id="table_noticia" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width: 20%">Imagen</th>
                        <th style="width: 10%">Fecha</th>
                        <th>Descripción</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $numFilas = count($listado_noticias);
                    for ($i = 0; $i < $numFilas; $i++):
                        ?>
                        <tr>
                            <td>
                                <img class="img-responsive"
                                     src="<?php echo base_url("public/imagenes/noticia/"); ?>/<?php echo((isset($listado_noticias[$i]->imagen)) ? $listado_noticias[$i]->imagen : "-"); ?>"
                                     alt="">
                            </td>
                            <td>
                                <i style="text-transform: none; color: #AA1916;"><?php echo utf8_encode(strftime("%d/%m/%Y", strtotime($listado_noticias[$i]->fecha))); ?>
                                </i>
                            </td>
                            <td>
                                <h4 style="text-transform: none;"><a
                                        href="/unoticia/<?php echo((isset($listado_noticias[$i]->id_titulo)) ? $listado_noticias[$i]->id_titulo : "-"); ?>"><b><?php echo((isset($listado_noticias[$i]->titulo)) ? $listado_noticias[$i]->titulo : "-"); ?></b></a>
                                </h4>
                            </td>

                        </tr>
                        <?php
                    endfor;
                    ?>
                    </tbody>

                </table>
            </div><!-- /.box-body -->
        </div>
        <div class="col-md-3">
            <?php include APPPATH . "views/useccion/col-der.php"; ?>
        </div>
    </div>


</div><!--/container-->
<!--=== End Content Part ===-->






