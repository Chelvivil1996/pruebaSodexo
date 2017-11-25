  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Laravel | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="css/login2.css">
  </head>
  <body class="">
    <div class="container">
      <div class="row login_box">
       <div class="col-md-12 col-xs-12" align="center">
        <br>
        <div class="wrapper"><img src="imagenes/logo/Logo_login.png" class="img-circle"/></div>   
        <h1>Horarios Digitales</h1>
        <span></span>
      </div>
      <div class="col-md-12 col-xs-12 login_control">
        <form action="login" method="post">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">


          <div class="control has-feedback">
            <div class="label">Email Address</div><span class="glyphicon glyphicon-envelope form-control-feedback "></span>
            <input type="email" class="form-control" name="email" >
          </div>

          <div class="control">
           <div class="label">Password</div>
           <input type="password" class="form-control" name="password">
         </div>

         <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div><!-- /.col -->

      </form>
    </div><!--fin del login_control--> 
  </div><!--fin del row-->
  </div><!--Fin del contenedor-->


  <!-- jQuery 2.1.4 -->
  <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="../../plugins/iCheck/icheck.min.js"></script>
  </body>
  </html>
