<?php include APPPATH . "views/useccion/header.php"; ?>  


<!--=== Content Part ===-->
<div class="container content profile">
    <div class="row">
        <div class="col-md-4 team-v1">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow-wrapper">        
                        <div class="margin-top-20"><h2 style="color:#AA1916;"><b>Menú de Información</b></h2></div>
                        <?php include APPPATH . "views/universidad/menu.php"; ?> 
                    </div>
                </div>
            </div>
        </div><!--/col-md-3-->
        <div class="col-md-8 mb-margin-bottom-30">
            <?php if(!empty($contenido[0][0]->fecha_actualizacion_contenido)): ?>
                <small class="pull-right" style="color:#aa1916;"><i
                        class="fa fa-calendar"></i> <?php setlocale(LC_ALL, "Spanish_Colombia"); ?>
                    <?php echo utf8_encode(strftime("%A", strtotime($contenido[0][0]->fecha_actualizacion_contenido))); ?>
                    ,
                    <?php echo strftime("%d", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?>
                    <?php echo strftime("%B", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?>
                    <?php echo strftime("%Y", strtotime($contenido[0][0]->fecha_actualizacion_contenido)); ?></small>
            <?php endif; ?>
            <div class="margin-bottom-40  fadeInUp animated">                     
                <?php if (isset($contenido[0][0]->id_contenido)): ?>
                    <div class="headline margin-bottom-30"><h1><?php echo ((isset($contenido[0][0]->nombre_contenido)) ? $contenido[0][0]->nombre_contenido : "-"); ?></h1></div>             
                    <h5><?php echo ((isset($contenido[0][0]->desc_contenido)) ? $contenido[0][0]->desc_contenido : " "); ?></h5>
                    <!---------------------- subcontenido de la tabla de equipo de trabajo ----------->                  
                <?php endif; ?>
                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getLink'): ?>
                    <?php
                    header('Location: ' . $contenido[0]['enlace']);
                    ?>
                <?php endif; ?>

                <?php if (isset($contenido[0]['funcion']) && $contenido[0]['funcion'] == 'getArchivoPdf'): ?>
                    <iframe src="https://docs.google.com/gview?url=<?php echo $contenido[0]['enlace']; ?> &embedded=true" style="width:100%; height:730px;" frameborder="0"></iframe>
                    <p style="text-align:center;"><h5>Si no puedes visualizar el archivo podrá descargarlo. <b><a href="<?php echo $contenido[0]['enlace']; ?>"  data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Descargar el Archivo">Descargar Archivo</a></b></h5></p>
                <?php endif; ?>  

                <?php if (isset($subcontenido[0]->idlici)): ?>
                    <?php $numFilas = count($subcontenido); ?>
                    <?php $grupo = 0; ?>
                    <?php for ($i = 0; $i < $numFilas; $i++): ?>
                        <?php if ($subcontenido[$i]->grupo != $grupo): ?>
                            <?php $grupo = $subcontenido[$i]->grupo; ?>
                            <hr class="devider devider-dotted">
                            <ul class="l_pdf">
                            <?php endif; ?>
                            <li><a href="/ufpsnuevo/menu/pdf/<?php echo ((isset($subcontenido[$i]->enlace)) ? $subcontenido[$i]->enlace : ""); ?>">
                                    <?php echo ((isset($subcontenido[$i]->titulo)) ? $subcontenido[$i]->titulo : ""); ?> 
                                    No. <?php echo ((isset($subcontenido[$i]->grupo)) ? $subcontenido[$i]->grupo : ""); ?> 
                                    (Publicado <?php echo ((isset($subcontenido[$i]->fechapublicado)) ? $subcontenido[$i]->fechapublicado : ""); ?>)
                                </a></li>
                            <?php if ($i + 1 == $numFilas || $subcontenido[$i + 1]->grupo != $grupo): ?>
                            </ul>
                        <?php endif; ?>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>

        </div><!--/col-md-8-->
    </div><!--/row-->


</div><!--/container-->
<!--=== End Content Part ===-->



