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
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            width: 100%;
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
        .ul-responsivo{
            display: flex; 
            flex-wrap: wrap; 
            justify-content: center; 
            margin-top:20px;
        }
</style>

<div class="container custom-container">
    <h2 class="text-center custom-title">Colectivos Radiales</h2>
    <div class="text-center">
        <ul class="nav nav-tabs ul-responsivo" >
            <?php $isFirst = true; // Variable para identificar la primera iteración
                foreach ($categorias as $key => $value): ?>
                    <li class="<?php echo $isFirst ? 'active' : ''; ?>">
                        <a data-toggle="tab" href="#categoria<?php echo $key; ?>"><?php echo $value; ?></a>
                    </li>
                <?php $isFirst = false; // Cambiar a false después de la primera iteración ?>
            <?php endforeach; ?>
        </ul>
    </div>
    
   <div class="tab-content">
       <?php $isFirst = true; foreach ($colectivos as $key => $value): ?>
            <div class="tab-pane fade <?php echo $isFirst ? "in active" : "" ?> " id="categoria<?php echo $key; ?>">
                    <div class="row">
                        <?php foreach ($value as $colectivo): ?>

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo base_url("public/imagenes/radio/colectivos/" . $colectivo->foto); ?>" alt="Imagen_colectivo">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="<?php echo base_url("radiocontenido/colectivo_radial/" . $colectivo->id); ?>"><?php echo $colectivo->titulo; ?></a></h5>
                                        <p class="texto-truncado"><?php echo $colectivo->descripcion; ?></p>                                    </div>
                                    <div class="card-footer text-muted">
                                        Presentado por: <strong><?php echo $colectivo->director; ?></strong>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>  
                    </div>
            </div>
            <?php $isFirst = false; ?>
        <?php endforeach; ?>
            
    </div>
    
</div>
