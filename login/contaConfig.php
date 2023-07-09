<?php
  session_start();
  print_r($_SESSION);

  //É uma ferramenta de segurança para que algum esperto não acesse o sistema apenas pelo link. não será usado agora pq estamos no index.

  // if(!isset($_SESSION['username']) == true and (!isset($_SESSION['senha']) == true)){
  //   unset($_SESSION['username']);
  //   unset($_SESSION['senha']);
  //   header('Location: login.php');
  // }

  $logado = $_SESSION['username'];

  if(isset($_GET['logout'])){
    unset($_SESSION['username']);
    session_destroy();
    header('Location: ../index/index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/styleConfig.css">
  <title>Document</title>
</head>
<body>
  <!--NAVBAR-->
  <header class="header">
    <div class="departamentos"> <p class="p">Departamentos</p><i id="departs" class="fa-solid fa-bars"></i></div> 
    <div class="logoInp">
        <a class="logo" href="index.html"><img src="../img/crocodilo2-removebg-preview.png" alt="" srcset=""></a> 
      <form action="">
        <input class="barra" type="text" placeholder="Pesquise">
        <button class="btnEnvio" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
    </div>
    <div class="menu"> <p class="p">Menu </p><i id="hamb" class="fa-solid fa-bars"></i></div> 
  
   <nav class="navbar">
    <a class="active" href="#">Home</a>
      <a href="<?php
      if(isset($_SESSION['username'])){
      echo 'login/contaConfig.php';
      }
      else echo '../login.php';
      ?>"> 
      <?php 
      if(isset($_SESSION['username'])){
        
        echo 'Olá '. $logado. '! ';
      }
      else echo 'Entrar'
      ?><i class="fa-solid fa-user"></i></a>
      <a href="#">Carrinho <i class="fa-solid fa-cart-shopping"></i></a>
      <a href="#">Favoritos <i class="fa-solid fa-heart"></i></a>
   </nav>
</header>

<div class="barraDeparts">
  <ul>
    <a href=""><li class="item-depart">Computadores</li></a>
    <a href=""><li class="item-depart">Periféricos</li></a>
    <a href=""><li class="item-depart">Monitores</li></a> 
    <a href=""><li class="item-depart">Licenças windows</li></a> 
  </ul>
</div>

<div class="home">
    <div class="home-content">
        <ul>
        <li><a href="?logout">Sair da conta</a></li> 

        <li><a href="">a</a></li>
        
        <li><a href="">a</a></li>
        
        <li><a href="">a</a></li>
        
        <li><a href="">a</a></li>
        </ul>
    </div>
</div>

  

  <script src="js/scriptt.js"></script>
  <script src="https://kit.fontawesome.com/5dfb4ac132.js" crossorigin="anonymous"></script>

</body>
</html>