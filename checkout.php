<?php
session_start();
ob_start();
unlink("productos/productos.txt");

$nombre=$_POST['nombre'];
$apelido=$_POST['apellido'];
$documento=$_POST['documento'];
$email=$_POST['email'];

$asunto="Hola gracias por tu compra";
$mensaje="Este es un mensaje de confirmacion de tu compra hecha";
$enviarCorreo = mail($email,$asunto,$mensaje); //enviar el correo atravez de mail

/*
if ($enviarCorreo){
  echo "mensaje enviado<br>";
  }else {
      echo "mensaje no enviado<br>";
  }*/
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Products - Red store</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <div class="header">
      <div class="container">
        <div class="navbar">
          <div class="logo">
            <a href="index2.php">
              <img src="images/logo.png" alt="" width="125px"
            /></a>
          </div>
          <nav>
            <ul id="MenuItems">
              <li><a href="index2.php">Home</a></li>
              <li><a href="products.php">Products</a></li>
              <li><a href="">About</a></li>
              <li><a href="">Contact</a></li>
              <li><a href="account.php"><?php echo 'Hi! '. $_SESSION['usuario'] ?></a></li>
              <li><a href="logout.php">Give up</a></li>
              
              <!-- TODo: 22:20 -->
            </ul>
          </nav>
          <a href="cart.php"
            ><img src="images/cart.png" alt="" width="30px" height="30px"
          /></a>
          <img
            src="images/menu.png"
            alt=""
            class="menu-icon"
            onclick="menutoggle()"
          />
        </div>
      </div>
    </div>
    <!-- Navigation ends here -->
    <!-- Account Page -->

    <div class="account-page">
      <div class="container">
        <div class="row">
          <div class="col-2">
            <img src="images/image6.png" width="70%" />
          </div>
          <h1>Congratulations we have sent you an email with the details of the purchase <?php echo $_SESSION['usuario'] ?> !!</h1>
              

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col-1">
            <h3>Download Our App</h3>
            <p>
              Download App for Android <br />
              and ios mobile phone
            </p>
            <div class="app-logo">
              <img src="images/play-store.png" alt="" />
              <img src="images/app-store.png" alt="" />
            </div>
          </div>
          <div class="footer-col-2">
            <img src="images/logo-white.png" alt="" />
            <p>
              Lorem, ipsum dolor sit amet consectetur <br />adipisicing elit.
              Porro, eum?
            </p>
          </div>
          <div class="footer-col-3">
            <h3>Useful Links</h3>
            <ul>
              <li>Coupons</li>
              <li>Blog Post</li>
              <li>Return Policy</li>
              <li>Join Affiliate</li>
            </ul>
          </div>

          <div class="footer-col-4">
            <h3>Follow us</h3>
            <ul>
              <li>Facebook</li>
              <li>Twitter</li>
              <li>Instagram</li>
              <li>YouTube</li>
            </ul>
          </div>
        </div>
        <hr />
        <p class="copyright">Copyright 2020 - introidx</p>
      </div>
    </div>
    <!-- JS for Toggle menu -->
    <script>
      var MenuItems = document.getElementById("MenuItems");

      MenuItems.style.maxHeight = "0px";

      function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
          MenuItems.style.maxHeight = "200px";
        } else {
          MenuItems.style.maxHeight = "0px";
        }
      }
    </script>
    <!-- 
js for toggle form -->
    <script>
      var LoginForm = document.getElementById("LoginForm");
      var RegForm = document.getElementById("RegForm");
      var indicator = document.getElementById("indicator");

      function register() {
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        indicator.style.transform = "translateX(100px)";
      }

      function login() {
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        indicator.style.transform = "translateX(0px)";
      }
    </script>
  </body>
</html>
