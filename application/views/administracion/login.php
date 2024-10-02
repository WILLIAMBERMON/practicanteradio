<div class="row no-margin margin-top-40">
<div class="col-md-9">
    <div class="">
        <h1 class="text-justify">Administración del portal</h1>
        <hr style="margin: 30px 0px 30px 0px;">
        <p class="text-info" style="margin: 0px 0px 30px 0px;">
            Inicie sesión en este módulo podra editar la información compartida en el portal.
        </p>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">Inicia Sesión</div>
        <div class="panel-body">
            <?= validation_errors('<div class="alert alert-danger alert-dismissable text-justify">', '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>') ?>

            <div class="">
                <?= form_open('', ['class' => '', 'id' => 'form_login', 'role' => 'form'], ['login' => 1]) ?>
                <div
                    class="form-group <?= (form_error('user') ? 'has-error has-feedback' : '') ?>">
                    <?= form_label('Usuario', 'user', ['class' => 'control-label']) ?>
                    <div class="input-group">
                        <span class="input-group-addon">&nbsp;<i class="fa fa-user"></i>&nbsp;
                        </span>
                        <?= form_input([ 'id' => 'user', 'name' => 'user', 'maxlength' => 30, 'placeholder' => "Usuario", 'class' => 'form-control'], set_value('user'), 'required') ?>
                    </div>
                </div>

                <div
                    class="form-group <?= (form_error('password') ? 'has-error has-feedback' : '') ?>">
                    <?= form_label('Contraseña', 'password', ['class' => 'control-label']) ?>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        <?= form_password([ 'id' => 'password', 'name' => 'password', 'maxlength' => 30, 'placeholder' => "Contraseña", 'class' => 'form-control'], '', 'required') ?>
                    </div>
                </div>

                <div style="margin-bottom: 15px;" class="g-recaptcha" data-sitekey="6LfwQisUAAAAAMWv6c6GA89AWsY4YOMZx50wfr_5"></div>

                <div class="form-group">
                    <?= form_button([ 'content' => '<span class="glyphicon glyphicon-log-in"></span> Acceder', 'type' => 'submit', 'class' => 'btn btn-primary center-block']) ?>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
</div>

<script src='https://www.google.com/recaptcha/api.js'></script>