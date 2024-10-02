<?php include APPPATH . "views/useccion/header.php"; ?>  


<!--=== Content Part ===-->
<div class="container content profile">
    <div class="row">
        <div class="col-md-4">
            <div class="shadow-wrapper">        
                <div class="margin-top-20"><h2 style="color:#AA1916;"><b>Atención al ciudadano</b></h2></div>
                <?php include APPPATH . "views/universidad/menu.php"; ?> 
            </div>
            <!-- fin menu de Información --->
        </div><!--/col-md-3-->
        <div class="col-md-8 mb-margin-bottom-30">
            <?php if($fecha): ?>
                <small class="pull-right" style="color:#aa1916;"><i
                        class="fa fa-calendar"></i> <?php setlocale(LC_ALL, "Spanish_Colombia"); ?>
                    <?php echo utf8_encode(strftime("%A", strtotime($fecha->ultima))); ?>
                    ,
                    <?php echo strftime("%d", strtotime($fecha->ultima)); ?>
                    <?php echo strftime("%B", strtotime($fecha->ultima)); ?>
                    <?php echo strftime("%Y", strtotime($fecha->ultima)); ?></small>
            <?php endif; ?>
            <div class="margin-top-40 margin-bottom-40">
                  <div class="shadow-wrapper">        
                            <blockquote class="tag-box tag-box-v4 margin-bottom-40">
                                <h4>Siguiendo las disposiciones de la Ley 1712 del 6 de marzo de 2014 , la Universidad Francisco de Paula Santander, UFPS, adopta el siguiente esquema de publicación que queda a disposición de la ciudadanía en nuestro sitio web:</h4>
                            </blockquote>
                        </div>
                <?php if(isset($titransparencia)): ?>
                <div class="row">
                        <?php $numFilas = count($titransparencia); ?>
                        <?php for ($i = 0; $i < $numFilas; $i++): ?>
                            <div class="col-md-12 margin-bottom-30">
                                <h2><b><?php echo ((isset($titransparencia[$i]->descripcion)) ? $titransparencia[$i]->descripcion : ""); ?></b></h2>
                                <?php $numFi = count($contrasparencia); ?>
                                <?php for ($j = 0; $j < $numFi; $j++): ?>
                                    <?php if ($titransparencia[$i]->id_transparencia == $contrasparencia[$j]->id_transparencia): ?>

                                        <h4><a href="transparencia/<?php echo ((isset($contrasparencia[$j]->id_contenido)) ? $contrasparencia[$j]->id_contenido : ""); ?>" class="opcaccessinv">
                                                <?php if ((!strpos($contrasparencia[$j]->enlace, ".pdf")) && (!strpos($contrasparencia[$j]->enlace, ".PDF"))): ?>
                                                    <i class="fa fa-link" aria-hidden="true" target= "blank"></i>
                                                <?php else: ?>
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true" ></i>
                                                <?php endif; ?>
                                                <?php echo ((isset($contrasparencia[$j]->descripcion)) ? $contrasparencia[$j]->descripcion : ""); ?></a></h4>

                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        <?php endfor; ?>
                </div>
                <?php endif; ?>


                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getLink'): ?>
                    <?php
                    header('Location: ' . $contenido[0]['enlace']);
                    ?>
                <?php endif; ?>

                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getLinkInt'): ?>
                    <?php
                    header('Location: ' . $contenido[0]['enlace']);
                    ?>
                <?php endif; ?>

                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getDirectorio'): ?>
                    <?php
               //    echo $directorio[0]->NOMBRES;
                    ?>
                    
                    <div class="box-body table-responsive no-padding margin-top-30">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            
                                <th style="text-align: center;">Funcionario</th>
                                <?php if ($idcont == '240'){ ?>
                                    <th style="text-align: center;">Tipo de Vinculación</th>
                                <?php }elseif($idcont == '137'){?>
                                    <th style="text-align: center; display:none">Tipo de Vinculación</th>
                                <?php }?>
                                <!--<th style="text-align: center;">Cargo u Oficio</th>-->
                                <th style="text-align: center;">Dependencia</th>
                                <th style="text-align: center;">Correo</th>
                                <?php if(isset($directorio[0]->EXT)): ?>
                                <th style="text-align: center;">Extensión</th>
                                <?php endif;?>
                                <?php if ($idcont == '240'){ ?>
                                    <th style="text-align: center; display:none">ID</th>
                                <?php }elseif($idcont == '137'){?>
                                    <th style="text-align: center; display:none">Tipo Nomina/th>
                                <?php }?>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($directorio as $row): ?>
                                    <tr>
                                        <td>
                                            <?php echo((isset($row->NOMBRES)) ? $row->NOMBRES : ""); ?></br>
                                            <?php if($idcont == '137') {?>
                                                <strong><?php echo((isset($row->NOM_CARGO)) ? $row->NOM_CARGO : ""); ?> <?php echo((isset($row->TIPO_CARGO) && $row->TIPO_CARGO == 'ENCARGO') ? "(E)" : ""); ?></strong>
                                                <?php }elseif($idcont == '240'){?>
                                                    <strong><?php echo((isset($row->CARGO)) ? $row->CARGO : ""); ?></strong>
                                                <?php }?>
                                        </td>
                                        <?php if ($idcont == '240'){ ?>
                                            <td style="text-align: center;"><?php echo((isset($row->TIPO_VINCULACION)) ? $row->TIPO_VINCULACION : ""); ?></td>
                                        <?php }elseif($idcont == '137'){?>
                                            <td style="text-align: center; display:none"><?php echo((isset($row->TIPO_VINCULACION)) ? $row->TIPO_VINCULACION : ""); ?></td>
                                        <?php }?>
                                        <!--<td><?php echo((isset($row->NOM_CARGO)) ? $row->NOM_CARGO : ""); ?> <?php echo((isset($row->TIPO_CARGO) && $row->TIPO_CARGO == 'ENCARGO') ? "(E)" : ""); ?><br></td>-->
                                        <?php if ($idcont == '137'){ ?>
                                            <td style="text-align: center;"><?php echo((isset($row->NOM_DEPENDENCIA)) ? $row->NOM_DEPENDENCIA : ""); ?></td>
                                        <?php }elseif($idcont == '240'){?>
                                            <td style="text-align: center;"><?php echo((isset($row->DEPENDENCIA)) ? $row->DEPENDENCIA : ""); ?></td>
                                        <?php }?>
                                        <?php if ($idcont == '137'){ ?>
                                            <td style="text-align: center;"><?php echo((isset($row->EMAIL)) ? $row->EMAIL : ""); ?></td>
                                        <?php }elseif($idcont == '240'){?>
                                            <td style="text-align: center;"><?php echo((isset($row->CORREO)) ? $row->CORREO : ""); ?></td>
                                        <?php }?>
                                        <?php if(isset($directorio[0]->EXT)): ?>
                                        <td style="text-align: center;"><?php echo((isset($row->EXT)) ? $row->EXT : ""); ?></td>
                                        <?php endif;?>
                                        <?php if ($idcont == '137'){ ?>
                                            <td style="display:none" style="text-align: center;"><?php echo((isset($row->CODTIPONOMINA)) ? $row->CODTIPONOMINA : ""); ?></td>
                                        <?php }elseif($idcont == '240'){?>
                                            <td style="display:none" style="text-align: center;"><?php echo((isset($row->N)) ? $row->N: ""); ?></td>
                                        <?php }?>
                                    </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                   
                <?php endif; ?>

                <!----------------------- Visualizar el documento de reglamentación ----------------->
                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getArchivoPdfRegla'): ?>
                    <iframe src="https://docs.google.com/gview?url=<?php echo $contenido[0]['enlace']; ?> &embedded=true" style="width:100%; height:730px;" frameborder="0"></iframe>
                    <p style="text-align:center;"><h5>Si no puede visualizar el archivo podrá descargarlo. <b><a href="<?php echo $contenido[0]['enlace']; ?>"  data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Descargar el Archivo" target="_blank">Descargar Archivo</a></b></h5></p>
                <?php endif; ?>

                <!----------------------- Visualizar el documento de la Sesión --------------------->
                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getArchivoPdf'): ?>
                    <iframe src="https://docs.google.com/gview?url=<?php echo $contenido[0]['enlace']; ?> &embedded=true" style="width:100%; height:730px;" frameborder="0"></iframe>
                    <p style="text-align:center;"><h5>Si no puede visualizar el archivo podrá descargarlo. <b><a href="<?php echo $contenido[0]['enlace']; ?>"  data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Descargar el Archivo" target="_blank">Descargar Archivo</a></b></h5></p>
                <?php endif; ?>


                <?php if (isset($contenido[0][0]->id_contenido)): ?>
                    <div class="headline margin-bottom-30"><h1><?php echo ((isset($contenido[0][0]->nombre_contenido)) ? $contenido[0][0]->nombre_contenido : "-"); ?></h1></div>
                    <h5><?php echo ((isset($contenido[0][0]->desc_contenido)) ? $contenido[0][0]->desc_contenido : " "); ?></h5>
                <?php endif; ?>






            </div>
        </div><!--/col-md-8-->
    </div><!--/row-->


</div><!--/container-->
<!--=== End Content Part ===-->






