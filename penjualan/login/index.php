<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Inventory UMPalembang</title>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <script src="js/prefixfree.min.js"></script>
  </head>
  <body>
    <div id="logo"> 
	<img src="LogoUMPcopy.png" alt="" width="200" height="170">
      <h1><span><b>Sistem Informasi Manajemen Aset (SIMAS) </b></span></h1>
	  <h1><span><b>Universitas Muhammadiyah Palembang</b></span></h1>
    </div> 
  <section class="stark-login">
    <form method="POST">	
      <div id="fade-box">
        <input type="text" name="username" id="username" placeholder="Masukan Email" required>
        <input type="password" name="password" placeholder="Masukan Password" required>
        <button name="login">Log In SIMAS</button> 
      </div>
    </form>
        <div class="hexagons">
        </div>      
  </section> 
  <div id="circle1">
    <div id="inner-cirlce1">
      <h1></h1>
    </div>
  </div>
    <script src="js/index.js"></script>
	<div id="footer"><p>Copyright &copy; 2018 - Universitas Muhammadiyah Palembang</p></div>
</div>
  </body>
  

</html>
<?php  
include "../class/class.php";
  if (isset($_POST['login'])) {
    $cek = $admin->login_admin($_POST['username'],$_POST['password']);
    if ($cek == true) {
      echo "<script>window.location='../index.php';</script>";
    }//jika salah atau tidak benar maka login ulang
    else{
      echo "<script>alert('Login Gagal, Password / Email Salah!');</script>";
    }
  }
?>
