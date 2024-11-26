<style>
        .container {
            padding-top: 20px;
        }

        .day-button {
            margin-right: 10px;
        }

        .day-button.active {
            background-color: #f05050;
            color: white;
        }

        .program-info {
            padding: 20px;
        }

        .program-info img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .program-info h3 {
            margin-top: 0;
        }

        .program-info p {
            margin-top: 5px;
        }
</style>
<style>
        .custom-container {
            margin-top: 50px;
            background-color: white; /* Fondo blanco para el contenedor */
            border-radius: 5px; /* Bordes redondeados */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
            padding: 20px; /* Espaciado interno */
        }
        .custom-title {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;

        }

        .custom-title:after {
            content: "";
            display: block;
            width: 130px;
            height: 2.5px;
            background-color: red;
            margin-top: 10px;
            margin: 10px auto 0 auto;
        }
        .nav-tabs {
            border: none; /* Sin borde */
            margin-bottom: 20px; /* Espaciado inferior */
        }
        .nav-tabs > li {
            margin-right: 5px; /* Espaciado entre botones */
        }
        .nav-tabs > li > a {
            background-color: red; /* Color de fondo rojo */
            color: white; /* Color de texto blanco */
            border-radius: 5px; /* Bordes redondeados */
            padding: 10px 15px; /* Espaciado interno */
            transition: background-color 0.3s, transform 0.3s; /* Transiciones suaves */
            font-weight: bold; /* Texto en negrita */
        }
        .nav-tabs > li > a:hover {
            background-color: red; /* Color de fondo al pasar el mouse */
            transform: scale(1.08); /* Efecto de aumento al pasar el mouse */
        }
        .nav-tabs > li.active > a {
            background-color: darkred !important; /* Color de fondo para la pestaña activa */
            color: white !important; /* Color de texto blanco para la pestaña activa */
        }
        .card {
            margin: 20px 0; /* Espaciado entre tarjetas */
            border: 1px solid #ddd;
            border-radius: 15px; /* Bordes redondeados */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .card-img-top {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .card-footer {
            background-color: #f7f7f7;
            border-top: 1px solid #ddd;
        }
        .card-title a {
            color: #333; /* Color del título */
            text-decoration: none; /* Sin subrayado */
            transition: color 0.2s; /* Transición suave para el color */
            font-size: 20px;
        }
        .card-title a:hover {
            color: red; /* Color del título al pasar el mouse */
        }
        .texto-truncado {
            display: -webkit-box;          /* Usar un contenedor flexible */
            -webkit-box-orient: vertical; /* Orientar el contenedor en vertical */
            -webkit-line-clamp: 2;        /* Limitar a 2 líneas */
            max-width: 100%;
            word-wrap: break-word;
            overflow: hidden;              /* Ocultar el desbordamiento */
            text-overflow: ellipsis;      /* Mostrar "..." al final */
            max-height: 4em;              /* Altura máxima para 2 líneas (ajustar según la fuente) */
        }
        .centrado {
            display: flex;
            justify-content: center; /* Centra horizontalmente */
            align-items: center;
            }
            @media (max-width: 900px) {
                .card-img-top {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
        }
            }
            @media (max-width: 680px) {
                .card-img-top {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
            }
            @media (max-width: 550px) {
                .card-img-top {
            width: 88px;
            height: 88px;
            border-radius: 50%;
            object-fit: cover;
        }
            }
            .ul-responsivo {
                display: flex; 
                flex-wrap: wrap; 
                justify-content: center; 
                margin-top:20px;
            }
</style>

<div class="container custom-container">
    <h2 class="text-center custom-title">Programacion</h2>
    <div class="text-center ">
        <ul class="nav nav-tabs ul-responsivo">
            <?php $isFirst = true; // Variable para identificar la primera iteración
                foreach ($dias as $dia): ?>
                    <li class="<?php echo $isFirst ? 'active' : ''; ?>" style="margin-top:10px;">
                        <a data-toggle="tab" href="#programacion<?php echo $dia; ?>"><?php echo $dia; ?></a>
                    </li>
                <?php $isFirst = false; // Cambiar a false después de la primera iteración ?>
            <?php endforeach; ?>
        </ul>
    </div>
    
   <div class="tab-content">
       <?php $isFirst = true; foreach ($programacion as $key => $value): ?>
            <div class="tab-pane fade <?php echo $isFirst ? "in active" : "" ?> " id="programacion<?php echo $key; ?>">
                    
                        <?php foreach ($value as $programacion): 
                            $colectivo=$colectivos[$programacion->colectivo_id];?>
                            <div class="card">
                                <div class="row">
                                        
                                        <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3 centrado">
                                            <img class="card-img-top" src="<?php echo base_url("public/imagenes/radio/colectivos/" . $colectivo->foto); ?>" alt="Imagen_programacion">
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="<?php echo base_url("radiocontenido/colectivo_radial/" . $colectivo->id); ?>"><?php echo $colectivo->titulo; ?></a></h5>
                                            <h4><b>
                                             <?php 
                                                    // Convertir hora_inicio a formato 12H
                                                    $hora_inicio = date("g:i A", strtotime($programacion->hora_inicio));
                                                    // Convertir hora_fin a formato 12H
                                                    $hora_fin = date("g:i A", strtotime($programacion->hora_fin));
                                                    
                                                    echo $hora_inicio; ?> - <?php echo $hora_fin; ?>
                                            </b>
                                            </h4>
                                            <p class="texto-truncado"><?php echo $colectivo->descripcion; ?></p>                                    
                                        </div>
                                        <div class="card-footer text-muted">
                                            Presentado por: <strong><?php echo $colectivo->director; ?></strong>
                                        </div>
                                        </div>

                                </div>

                            </div>
                        <?php endforeach; ?>  
            </div>
            <?php $isFirst = false; ?>
        <?php endforeach; ?>
            
    </div>
    
</div>

        