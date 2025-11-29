<?php 
session_start();


if(isset($_SESSION['error'])){
  echo $_SESSION['error'];
}
$_SESSION['login_jarayoni'] = true;

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta/>

    <title>Boboyev Asliddin web sayti</title>

    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    
    
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
   
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
  </head>

  <body>
   

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
         
          <div class="card">
            <div class="card-body">
              
             
              <div class="app-brand justify-content-center">
              <span class="app-brand-text demo text-body fw-bolder" style="text-transform: none;">Kirish sahifasi</span>

              </div>
              
              <h4 class="mb-2">Asliddin web saytiga xush kelibsiz</h4>
              <p class="mb-4">Iltimos, saytga kirish uchun ro'yxatdan o'ting!</p>

              <form id="formAuthentication" class="mb-3" action="login_controller.php" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Email </label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Email kiriting"
                    autofocus
                    required
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Parol</label>
                   
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
               
               
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Kirish</button>
                </div>
              </form>

              <p class="text-center">
                <a href="find_user.php">
                  <span>parolni unutdingizmi?</span><br>
                </a>
                <a href="register.php">
                  <span>Yangi akkaunt yaratish</span>
                </a>
              </p>
            </div>
          </div>
          
        </div>
      </div>
    </div>

   
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/alerts.js"></script>
  </body>
</html>
<?php

if ( $_SESSION['error']=="xato"): ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
    icon: 'error',
    text: 'Login yoki parol xato!',
});
</script>
  <?php
  unset($_SESSION['error']);
  endif;



  if ( $_SESSION['status']=="malumot saqlandi"): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
  Swal.fire({
      icon: 'success',
      text: 'Registartsiya qilindi!',
  });
  </script>
    <?php
    unset($_SESSION['status']);
    endif;
?>
