<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TANQUEIOT </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; ISO-8859-1">
  <META NAME="DC.Language" SCHEME="RFC1766" CONTENT="Spanish">
  <META NAME="AUTHOR" CONTENT="CubaElectronica">
  <META NAME="REPLY-TO" CONTENT="admin@cubaelectronica.com">
  <LINK REV="made" href="mailto:admin@cubaelectronica.com">
  <META NAME="DESCRIPTION" CONTENT="Curso de IOT con ESP_32 by CubaElectronica, www.cubaelectronica.com, sígannos en Youtube para enterarte de que se trata">
  <META NAME="KEYWORDS" CONTENT="ESP32,IOT,programación,MQTT,cursos,cubaelectronica,internet,de,las,cosas,Ardiono,Youtube">
  <META NAME="Resource-type" CONTENT="HOWTO">
  <META NAME="DateCreated" CONTENT="Wed, 1 April 2020 00:00:00 GMT-4">
  <META NAME="Revisit-after" CONTENT="1 days">
  <META NAME="robots" content="ALL">
  <!-- Favicon icon icono que sale en la web-->
  <link rel="icon" href="<?php echo base_url();?>dist/img/logoWEB.png" type="image/x-icon">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-164044733-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-164044733-1');
    </script>
    
</head>
<body class="hold-transition login-page">
  <div class="login-box">
      <div class="brand-link" align="center">
        <a href="" class="logo pull-left">
          <img src="<?php echo base_url(); ?>dist/img/logoCEIOT.png" height="54" alt="TANQUEIOT" />
        </a>
      </div>
    <div class="login-logo">
      <a href="#"><b>TANQUEIOT</b>-IOT</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Inicia sesión</p>
          <!-- /.para mostrar cartel rojo de error -->
          <?php if($this->session->flashdata("error")): ?>
          <div class="alert alert-danger background-danger">
              <p><?php echo $this->session->flashdata("error")?></p>
          </div>
        <?php endif; ?>

        <form action="<?php echo base_url();?>auth/login" method="post">
          <div class="input-group mb-3">
            <input type="email" name="correo" class="form-control" placeholder="Correo" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Login</button>
                                  
            </div>
          <!-- /.col -->
          </div>
        </form>

            <br>
            <div class="row">
              <span><strong> Correo:</strong> admin@seciot.tk</span>
            </div>
            <div class="row">
              <span><strong>Contraseña:</strong> demo</span>
            </div>
            <br>

            
                      
            <div class="row">
              <a href="https://sebaiot.000webhostapp.com/"><b>Powered by </b> TANQUEIOT  <b>Server</b></a>
            </div>
      </div>
      <!-- /.login-card-body -->

      <!-- Main content -->

     
          <!-- /.card-body -->
    </div>
  </div>
  <!-- /.login-box -->



  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>

</body>
</html>