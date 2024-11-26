
<style>
       .colectivo-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
            background-color: #f9f9f9;
            transition: box-shadow 0.3s;
        }

        .colectivo-card:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        .colectivo-image {
            max-width: 50%;
            border-radius: 5px;
            margin-bottom: 15px;
            width: 45%; /* Mantén el ancho de la imagen */
            height: auto; /* Mantén la proporción */
        }

        .director {
            font-weight: bold;
            color: #ff5757;
        }

        .programacion-list {
            list-style: none;
            padding: 0;
        }

        .programacion-list li {
            background-color: #e9ecef;
            margin: 5px 0;
            padding: 10px;
            border-radius: 3px;
        }

        .custom-title {
            font-size: 50px;
            font-weight: bold;
            margin-bottom: 10px;
            margin-top: 10px;
            text-align: center;
        }

        .custom-title:after {
            content: "";
            display: block;
            width: 130px;
            height: 2.5px;
            background-color: red;
            margin-top: 15px;
            margin: 15px auto 70px auto;
        }

        .colectivo-content {
            display: flex;
            align-items: flex-start; /* Centra verticalmente */
        }

        .colectivo-description {
            margin-left: 20px;
            max-width: 55%;
        }
        @media (max-width: 768px) {
        .colectivo-content {
            display: block;
            align-items: flex-start; /* Centra verticalmente */
        }
        .colectivo-image {
            max-width: 100%;
            border-radius: 5px;
            margin-bottom: 15px;
            width: 100%; /* Mantén el ancho de la imagen */
            height: auto; /* Mantén la proporción */
        }
        .colectivo-description {
            margin-left: 20px;
            max-width: 100%;
        }
        .custom-title {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 10px;
            margin-top: 10px;
            text-align: center;
        }

        .custom-title:after {
            content: "";
            display: block;
            width: 130px;
            height: 2.5px;
            background-color: red;
            margin-top: 15px;
            margin: 15px auto 70px auto;
        }
             
}
    </style>

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="colectivo-card">
                <h5 class="custom-title"><?php echo $colectivo->titulo; ?></h5>
                <div class="colectivo-content">
                    <img src="<?php echo base_url("public/imagenes/radio/colectivos/" . $colectivo->foto); ?>" alt="<?php echo $colectivo->titulo; ?>" class="colectivo-image" >
                    <div class="colectivo-description">
                        <p><?php  echo nl2br( $colectivo->descripcion); ?></p>
                        <div>
                            <b>Presentado por:</b> <span class="director"><?php echo $colectivo->director; ?></span>
                        </div>
                    </div>
                </div>
                <h6><b>Días y Horarios de transmisión:</b></h6>
                <ul class="programacion-list">
                    <?php foreach ($programacion as $date): ?>
                        <li>
                            <?php echo $date->dia; ?>: 
                            <?php 
                                // Convertir hora_inicio a formato 12H
                                $hora_inicio = date("g:i A", strtotime($date->hora_inicio));
                                // Convertir hora_fin a formato 12H
                                $hora_fin = date("g:i A", strtotime($date->hora_fin));
                                
                                echo $hora_inicio; ?> - <?php echo $hora_fin; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>