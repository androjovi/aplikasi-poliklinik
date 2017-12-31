<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE 2 | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/square/blue.css') ?>" rel="stylesheet" type="text/css" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <script>
            function login_admin(){
                var link_t = "<?php echo site_url('auth/login_admin'); ?>"
                
                $("#action").attr('action',link_t);
                $("#input_username").attr('placeholder','Username akun admin anda');
                
            }
            
            function login_apoteker(){
                var link_t = "<?php echo site_url('auth/login_apoteker'); ?>"
                
                $("#action").attr('action',link_t);
                $("#input_username").attr('placeholder','Username akun apoteker anda');
		
            }
            
            function login_dokter(){
                var link_t = "<?php echo site_url('auth/login'); ?>"
                
                $("#action").attr('action',link_t);
                
                $("#input_username").attr('placeholder','Username akun dokter anda');
		
            }
        </script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.1.0/particles.min.js"></script>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script>
        /*
        function login_now(){
          var pass = $("#input_password").val();
          $.ajax({
            url : "<?php echo site_url('auth/login'); ?>",
            type : "POST",
            data : {password : pass},
            success:function(data){
              if (data == 0){
                $("#pesan").html("Password tidak teraftar");
              }else{
                window.location.href='<?php echo site_url('dashboard'); ?>';
              }
            }
          })

        }
        */
        </script>
    </head>
    <body class="login-page">
<div id="particles-js"></div>

      <?php $pass="admin"; $password_h = password_hash($pass,PASSWORD_BCRYPT);
      echo $password_h;
       ?>
       
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Poliklinik </b>LTE</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p id="titel" class="login-box-msg">Sign in to start your session</p>
                <div id="titel_crek"></div>
                <form id="action" action="<?php echo site_url('auth/login'); ?>" method="post">
                  <div class="form-group has-feedback">
                      <input type="text" id="input_username" name="nameuser" class="form-control" placeholder="Username"/>
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                    <div class="form-group has-feedback">
                        <input type="password" id="input_password" name="wordpass" class="form-control" placeholder="Password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div id="pesan" style="font-size:15px;color:red;"></div>
                    <div class="row">
                        <div class="col-xs-8">

                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" onClick="login_now()" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div><!-- /.col -->
                    </div>
                </form>



                <a href="javascript:void(0)" onClick="alert('Hubungi administrator setempat')" class="text-center">Register a new membership</a><br>
                <a href="javascript:void(0)" onClick="login_admin()" class="text-center">Login sebagai admin</a><br>
                <a href="javascript:void(0)" onClick="login_apoteker()" class="text-center">Login sebagai apoteker</a><br>
                <a href="javascript:void(0)" onClick="login_dokter()" class="text-center">Login sebagai dokter</a>
                <p>&copy;Jovv</p>
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
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
