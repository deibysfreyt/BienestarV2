<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Inicio de Sesion</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />    
    <!-- Bootstrap core CSS     -->
    <link href="publica/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="publica/css/material-dashboard.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="publica/css/font-awesome.css" rel="stylesheet" />
    <link href="publica/css/google-roboto-300-700.css" rel="stylesheet" />
</head>
<body>

    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="publica/img/login.jpg">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form method="post" id="entrar">
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="orange">
                                        <h4 class="card-title">Inicio de Sesión</h4>
                                    </div>
                                    <p class="category text-center">
                                        Fundación de Niño
                                    </p>
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Usuario</label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Nombre de Usuario" required>
                                            </div>
                                        </div>                                        
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Contraseña</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="******" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" value="Enviar" class="btn btn-rose btn-simple btn-wd btn-lg" id="botonEnviar">Vamos a Comenzar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>


<!--   Core JS Files   -->
<script src="publica/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="publica/js/demo.js"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>
  <!--    <script type="text/javascript" src="publica/js/scripts/ajax_login.js"></script>   -->

<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:19 GMT -->
</html>