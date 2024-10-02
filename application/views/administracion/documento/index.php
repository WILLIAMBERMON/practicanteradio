<div class="col-md-9">
    <h2>Documentos Adjuntos - <?php echo $contenido->nombre; ?></h2>

    <?php if (!empty($documentos)): ?>
        <table id="table_datatable" class="table table-striped table-hover table-bordered text-center">
            <thead>
            <tr>
                <td>
                    <strong>Nombre</strong>
                </td>
                <td>
                    <strong>Estado</strong>
                </td>
                <td>
                    <strong>Editar</strong>
                </td>
                <td>
                    <strong>Borrar</strong>
                </td>
            </tr>
            </thead>
            <?php foreach ($documentos as $key => $documento): ?>
                <tr class="<? echo ($documento->estado == '1') ? 'success' : (($documento->estado == '2') ? 'warning' : ''); ?>">
                    <td>
                        <?php echo $documento->nombre; ?>
                    </td>
                    <td>
                        <?php echo $documento->estado == 1 ? 'Visible' : 'Oculto'; ?>
                    </td>
                    <td>
                        <?php echo form_open(site_url('administracion/editar_documento'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_documento' => $documento->id]); ?>
                        <button style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" type="submit">
                            <i class="fa fa-pencil-square-o"></i></button>
                        <?php echo form_close(); ?>
                    </td>
                    <td>
                        <?php echo form_open(site_url('administracion/borrar_documento'), ['class' => '', 'id' => 'form', 'role' => 'form'], ['id_documento' => $documento->id]); ?>
                        <a style="padding: 0px;" class="btn btn-link btn-lg hvr-grow" data-toggle="modal"
                           data-target="#myModalBorrarDocumento<?php echo $key;?>">
                            <i class="fa fa-trash"></i>
                        </a>

                        <!-- Modal -->
                        <div class="modal modal-warning fade" id="myModalBorrarDocumento<?php echo $key;?>" tabindex="-1" role="dialog"
                             aria-labelledby="Recibo de Liquidación">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">
                                            <i class="fa fa-exclamation-triangle"></i> Advertencia
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-justify">
                                            ¿Esta seguro de borrar el documento seleccionado?. Una vez confirme esta
                                            operación no le será posible recuperarlo.
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">
                                            Cerrar
                                        </button>
                                        <button type="submit"
                                                class="btn btn-outline pull-right">
                                            <i class="fa fa-trash"></i> Borrar Documento
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Aun no ha registrado ningun documento para este elemento de contenido.</p>
    <?php endif; ?>
    <?php if ($userdata->rol == 'admin'): ?>
        <div class="clearfix">
            <hr>
            <a class="btn btn-primary pull-right" href="<?= site_url('administracion/contenido'); ?>"
               style="margin-left:10px;">
                <i class="fa fa-backward"></i> Regresar
            </a>
            <a class="btn btn-primary pull-right" href="<?php echo site_url('administracion/agregar_documento'); ?>">
                <i class="fa fa-plus-circle"></i> Añadir Documento
            </a>
        </div>
    <?php endif; ?>
</div>