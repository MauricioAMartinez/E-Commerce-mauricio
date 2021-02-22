<?php

session_start();
ob_start();


$username= "productos";
$producto1= $_POST['redprinted1'];
$producto2= $_POST['redprinted2'];
$producto3= $_POST['redprinted3'];

$baseUsuarios = fopen("Productos/$username.txt",'a+');
fwrite($baseUsuarios,$producto1."\n");
fwrite($baseUsuarios,$producto2."\n");
fwrite($baseUsuarios,$producto3."\n");
fclose($baseUsuarios);

if ($baseUsuarios==true){

    $listaArchivos=array();
    $lineas=file_get_contents("Productos/$username.txt");
    $listaArchivos[] = explode("\n",$lineas);
    foreach ($listaArchivos as $datos) {
        $compra1 = $datos[0];
        $compra2 =$datos[1];
        $compra3 = $datos[2];
    } 
}
else {
    header('location:cart.php');
}
$total= number_format(($compra1+$compra2+$compra3)*50000);
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
            <a href="index.html">
              <img src="images/logo.png" alt="" width="125px"
            /></a>
          </div>
          <nav>
            <ul id="MenuItems">
              <li><a href="index.php">Home</a></li>
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
            <img src="images/image5.png" width="100%" />
          </div>
          <form action="checkout.php" method="post">
            <p>Confirm your purchase <?php  echo $_SESSION['usuario'] ?> </p>
          <input name="nombre"type="text"value="Name">
          <input name="apellido"type="text"value="Surname" >
          <input name="documento"type="num"value="document" >
          <input name="email"type="email"value="email" >
          <p>Red Printed T-shirt = <?php echo "$compra1 * $5000"?> </p>
          <p>Blue Printed T-shirt = <?php echo "$compra2 * $5000" ?></p>
          <p>Black Printed T-shirt= <?php echo "$compra3 * $5000" ?></p>
          <p>Total= <?php echo "$ $total" ?></p>
          <input type="submit" value="Purchase" >
          </form>
              

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



