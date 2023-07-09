<?php
  


  session_start();

  //É uma ferramenta de segurança para que algum esperto não acesse o sistema apenas pelo link. não será usado agora pq estamos no index.

  // if(!isset($_SESSION['username']) == true and (!isset($_SESSION['senha']) == true)){
  //   unset($_SESSION['username']);
  //   unset($_SESSION['senha']);
  //   header('Location: login.php');
  // }

  $logado = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <!--<link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">-->
  <title>Document</title>
</head>
<body>
  <!--NAVBAR-->
  <header class="header">
    <div class="departamentos"> <p class="p">Departamentos</p><i id="departs" class="fa-solid fa-bars"></i></div> 
    <div class="logoInp">
        <a class="logo" href="index.php"><img src="../img/crocodilo2-removebg-preview.png" alt="" srcset=""></a> 
      <form action="pesquisa/pesquisa.php" method="GET">
        <input class="barra" type="text" name="pesquisa" placeholder="Pesquise">
        <button class="btnEnvio" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
    </div>
    <div class="menu"> <p class="p">Menu </p><i id="hamb" class="fa-solid fa-bars"></i></div> 
  
   <nav class="navbar">
    <a class="active" href="#">Home</a>
      <a href="<?php
      if(isset($_SESSION['username'])){
      echo '../login/contaConfig.php';
      }
      else echo '../login/login.php';
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
    <div class="home">
      <div class="barraDeparts">
        <ul>
          <a href=""><li class="item-depart">Computadores</li></a>
          <a href=""><li class="item-depart">Periféricos</li></a>
          <a href=""><li class="item-depart">Monitores</li></a> 
          <a href=""><li class="item-depart">Licenças windows</li></a> 
        </ul>
    </div>
      <div class="home-content">
        <!--<div class="card" style="width: 20rem;">
          <img src="img/__monitor.webp" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Monitor ASICS</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consect</p>
            <h6>50,00R$</h6>
          </div>
          <div class="card-body">
            <a href="pg_produto.php" class="card-link">Ver mais</a>
            <a href="#" class="card-link">Adicionar ao Carrinho</a>
          </div>
        </div> -->
        <?php include('../conexao/conexao.php');
              $sql_query = mysqli_query($conexao, "SELECT * FROM arquivos") or die ($mysqli->error);
              while($arquivo = $sql_query->fetch_assoc()){
        ?>
          

        <div class="card" style="width: 20rem;">
          <div class="card-img-top">
            <img src="<?php echo $arquivo['path']?>" class="card-img-top">
          </div>
          <div class="card-body">
            <h5 class="card-title"><?php echo $arquivo['titulo']?></h5>
            <p class="card-text"><?php echo $arquivo['texto_card']?></p>
            <div class="pre">
              <h6><?php echo $arquivo['preco']?> R$
              </h6>
              <?php $id = ($arquivo['id']);?>
              <a href="pg_produto.php?id=<?php echo $id?>" class="card-link">Ver mais</a>
            </div>
          </div>
          <div class="card-link">           
            <a href="#" class="card-link">Adicionar ao Carrinho</a>
          </div>
        </div>
        <?php if($arquivo>4){
          echo '<br>';
        }?>
        
        <?php }?>

      </div>
      </div>

  <script src="../js/scriptt.js"></script>
  <script src="https://kit.fontawesome.com/5dfb4ac132.js" crossorigin="anonymous"></script>

</body>
</html>