<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>UFPS - DIVISIÓN DE SISTEMAS</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <!--<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
        <!-- Font Awesome Icons -->
        <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
        <!-- Theme style -->
        <!--<link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />-->
        <!-- iCheck -->
        <!--<link href="../../plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <?= $_css ?>
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="">DIVISIST <strong style="color: #cc0033;">2.0</strong></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">

                <div id="template_alerts">
                    <?php foreach ($_warning as $_msj): ?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-exclamation-triangle"></i>&nbsp;
                            <?= $_msj ?>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach ($_success as $_msj): ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-check-circle"></i>&nbsp;
                            <?= $_msj ?>
                        </div>
                    <?php endforeach; ?> 
                    <?php foreach ($_error as $_msj): ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-times-circle"></i>&nbsp;
                            <?= $_msj ?>
                        </div>
                    <?php endforeach; ?> 
                    <?php foreach ($_info as $_msj): ?>
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-info-circle"></i>&nbsp;
                            <?= $_msj ?>
                        </div>
                    <?php endforeach; ?>                     
                </div>
                <?php foreach ($_content as $_view): ?>
                    <?php include $_view; ?>
                <?php endforeach; ?>
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <!--<script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>-->
        <!-- Bootstrap 3.3.2 JS -->
        <!--<script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <!--<script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>-->
        <?= $_js ?>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>     
    </body>
</html>