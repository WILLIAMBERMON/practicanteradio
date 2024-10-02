<?php include APPPATH . "views/useccion/header.php"; ?>  


<!--=== Content Part ===-->
<div class="container content profile">
    <div class="row">
        <div class="col-md-12 mb-margin-bottom-30">
            <?php if(!empty($fecha_real)): ?>
                <small class="pull-right" style="color:#aa1916;"><i
                        class="fa fa-calendar"></i> <?php setlocale(LC_ALL, "Spanish_Colombia"); ?>
                    <?php echo utf8_encode(strftime("%A", strtotime($fecha_real))); ?>
                    ,
                    <?php echo strftime("%d", strtotime($fecha_real)); ?>
                    <?php echo strftime("%B", strtotime($fecha_real)); ?>
                    <?php echo strftime("%Y", strtotime($fecha_real)); ?></small>
            <?php endif; ?>
            <div class="margin-bottom-40 fadeInUp animated">
                        <div class="shadow-wrapper margin-top-30">        
                            <blockquote class="tag-box tag-box-v4 margin-bottom-40">
                                <h5>En este espacio encontrará el Calendario Académico General de la Universidad Francisco de Paula Santander, además de las programaciones de los previos en orden cronológico elaboradas y suministradas por las Direcciones de Programa respectivas.</h5>
                            </blockquote>
                        </div>


                <?php if (isset($reglamentos)): ?>
                <ul class="l_pdf">
                <?php foreach ($reglamentos as $reglamento): ?>
                    <li><a href="../<?php echo PATH_PDF_DOCUMENTO_CALENDARIO . ((isset($reglamento->archivo)) ? $reglamento->archivo : ""); ?>" target="_blank"><?php echo $reglamento->nombre; ?></a></li>
                <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>

                
                    <div class="box-body table-responsive no-padding margin-top-30">
                        <table id="table_calendario" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: center;">Programa</th>
                                <th style="text-align: center;">1er Previo</th>
                                <th style="text-align: center;">2do Previo</th>
                                <th style="text-align: center;">Exámen</th>
                                <th style="text-align: center;">Habilitación</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($programas as $programa): ?>
                                <tr>
                                    <td><?php if($programa->JORNADA=='D'){echo $programa->NOMBRE;}else{echo $programa->NOMBRE." - NOCTURNA";} ?></td>
                                    <td style="text-align: center;">
                                        <?php 
                                         $key="18@";
                                         $car = $this->encrypt_decrypt('encrypt',$programa->COD_CARRERA,$key);
                                         $tipo1 = $this->encrypt_decrypt('encrypt','1',$key);
                                         $tipo2 = $this->encrypt_decrypt('encrypt','2',$key);
                                         $tipo3 = $this->encrypt_decrypt('encrypt','3',$key);
                                         $tipo4 = $this->encrypt_decrypt('encrypt','4',$key);
                                         $base = 'https://divisist2.ufps.edu.co/visualizar_previo/'.$car.'/';
                                        ?>
                                        <?php if(!empty($programa->P1)):?>
                                            <a href="<?php echo $base.$tipo1; ?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                        <?php endif; ?>
                                        </td>
                                    <td style="text-align: center;">
                                        <?php if(!empty($programa->P2)):?>
                                            <a href="<?php echo $base.$tipo2; ?> " target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                        <?php endif; ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php if(!empty($programa->EX)):?>
                                            <a href="<?php echo $base.$tipo3; ?> " target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                        <?php endif; ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php if(!empty($programa->HB)): ?>
                                            <a href="<?php echo $base.$tipo4; ?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                

            </div>
        </div><!--/col-md-8-->
    </div><!--/row-->

    <?php include APPPATH . "views/unoticia/noticias_recientes.php"; ?>

</div><!--/container-->
<!--=== End Content Part ===-->






