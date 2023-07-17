<?php 
session_start();
ob_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Dashmix - Bootstrap 5 Admin Template &amp; UI Framework</title>

    <meta name="description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"> -->
    <link rel="stylesheet" id="css-main" href="assets/css/dashmix.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    <!-- END Stylesheets -->
  </head>
  <body>
    <div id="page-container">

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image" style="background-image: url('assets/img/background.jpg');">
          <div class="row g-0 justify-content-center bg-black-15">
            <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
              <!-- Sign Up Block -->
              <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                <div class="block-content block-content-full px-xl-6 bg-body-extra-light">
                  <!-- Header -->
                  <div class="mb-2 text-center">
                    <a class="link-fx fw-bold fs-1" href="index.html">
                      <img src="assets/img/logotipo-maxportas.png" alt="logotipo-maxportas">
                    </a>
                    <p class="text-uppercase fw-bold fs-sm text-muted">Iniciar Sessão</p>
                  </div>
                  <form class="js-validation-signup" action="#" method="POST">
                    <div class="mb-4">
                      <div class="input-group input-group-lg">
                        <input type="email" class="form-control" id="signup-username" name="email" required placeholder="Digite seu e-mail">
                        <span class="input-group-text">
                          <i class="fa fa-user-circle"></i>
                        </span>
                      </div>
                    </div>
                    <div class="mb-4">
                      <div class="input-group input-group-lg">
                        <input type="password" class="form-control" id="signup-email" name="senha" required placeholder="Digite sua senha">
                        <span class="input-group-text">
                          <i class="fa fa-envelope-open"></i>
                        </span>
                      </div>
                    </div>
                    <div class="text-center mb-4">
                      <button type="submit" name="btn_iniciarSessao" class="btn btn-hero btn-primary">
                        <i class="fa fa-fw fa-plus opacity-50 me-1"></i>Entrar
                      </button>
                    </div>
                    <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                        <!-- <a href="recuperar-senha.php" class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1">
                            <i class="fa fa-exclamation-triangle opacity-50 me-1"></i> Recuperar Senha
                        </a> -->
                        <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="criar-conta.php">
                        <i class="fa fa-plus opacity-50 me-1"></i> Cadastrar-se
                        </a>
                    </p>
                    
                  </form>
                    <div style="display: flex; justify-content: right;">
                      <img width="100px" src="assets/img/LogoRTOColor.png" alt="LogoRTOColor">
                    </div>
                  <!-- END Sign Up Form -->
                </div>
              </div>
            </div>
            <!-- END Sign Up Block -->
          </div>         
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
    </div>
    <script src="assets/js/dashmix.app.min.js"></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="assets/js/lib/jquery.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="assets/js/pages/op_auth_signup.min.js"></script>
  </body>
</html>

<?php
    // define('HOST', 'localhost');
    // define('USER', 'root');
    // define('PASS', '');
    // define('BD', 'maxportas');
    // $connection = 'mysql:host='.HOST.';dbname='.BD;
    // try{ $connect = new PDO($connection, USER, PASS);
    //      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // }catch(PDOException $erro){
    //     echo "ERROR na connection "; }
    if(isset($_POST['btn_iniciarSessao']))
    {
      include "conexao-bd.php";
      $email = $_POST['email'];
      $senha = $_POST['senha'];    
      $selet = $conn->prepare("SELECT * FROM logado WHERE email = :email AND senha = :senha");
          $selet->bindParam(':email', $email);
          $selet->bindParam(':senha', $senha);
          $selet->execute();
          $num = $selet->rowCount();

          if($num > 0):
              $sel_ver = $conn->prepare("SELECT * FROM logado");
              //$num = mysqli_num_rows();
              $sel_ver->execute();
              //$row = mysqli_fetch_assoc();
              while($row = $sel_ver->fetch(PDO::FETCH_ASSOC)):

                  if($row['email'] == $email):
                      session_start();
                      $_SESSION['email'] = $email;
                      $_SESSION['senha'] = $senha;

                      $nivel = $row['nivel'];
                      switch($nivel):
                          case 'adm':
                              header('Location: adm.php');
                          break;
                          case 'user':
                              header('Location: user.php');
                          break;
                          default:
                              header('Location: login.php');
                          break;            
                      endswitch;

                  endif;

              endwhile;
          endif;
  }
  
?>
