<?php
  include('../conexao/conexao.php');
  session_start();
  // print_r($_SESSION);

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
  <link rel="stylesheet" href="../css/style_pg_prod.css">
  <title>Document</title>
</head>
<body>
  <!--NAVBAR-->
  <header class="header">
    <div class="departamentos"> <p class="p">Departamentos</p><i id="departs" class="fa-solid fa-bars"></i></div> 
    <div class="logoInp">
        <a class="logo" href="index.php"><img src="../img/crocodilo2-removebg-preview.png" alt="" srcset=""></a> 
      <form action="">
        <input class="barra" type="text" placeholder="Pesquise">
        <button class="btnEnvio" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
    </div>
    <div class="menu"> <p class="p">Menu </p><i id="hamb" class="fa-solid fa-bars"></i></div> 
  
   <nav class="navbar">
    <a href="index.php">Home</a>
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
        <?php
        if(isset($_GET['id']))
          {
            $id = $_GET['id'];
          }
          else header('Location: index.php');
          
          $query = mysqli_query($conexao, "SELECT * from arquivos where id = $id");
          
          $arquivos=mysqli_fetch_array($query);
	
           if (empty($arquivos['path'])){
               $imagem = 'SemImagem.png';
           }else{
              $imagem = $arquivos['path'];
            }
          // echo "<img src='$imagem' >";
          // echo "</td><td width='400px'>";
          // echo "<b>Data: </b>".substr($arquivos['data_upload'], 8, 2).'/'.substr($arquivos['data_upload'], 5, 2).'/'.substr($arquivos['data_upload'], 0, 4)."<br><br>";	
          // echo "<b>Produto: </b>".$arquivos['titulo']."<br>";	
          // echo "<b>Descrição: </b>".$arquivos['texto']."<br>";	
          // echo "<b>Valor: </b> R$ ".$arquivos['preco']."<br>";
          // echo "</td></tr></table>";
        ?>
        <!-- <div class="produto"> -->
            <img src="<?php echo $imagem?>" alt="" srcset="">

              <h1><?php echo $arquivos['titulo']?></h1>

              <p class="text"><?php echo $arquivos['texto']?></p>
            
              <div class="preco">
                <h3>R$<?php echo $arquivos['preco']?></h3>
                <p>Postagem: <?php echo substr($arquivos['data_upload'], 8, 2).'/'.substr($arquivos['data_upload'], 5, 2).'/'.substr($arquivos['data_upload'], 0, 4)?></p>
              </div>
              
                  <div class="buttons">
                    <a href="#"><button class="carrinho">Carrinho <i class="fa-solid fa-bag-shopping"></i></button></a>
                    <a href="#"><button class="favorito">Favoritos <i class="fa-solid fa-heart"></i></button></a>
                  </div>
        <!-- </div> -->
      </div>
    </div>

  <script src="../js/scriptt.js"></script>
  <script src="https://kit.fontawesome.com/5dfb4ac132.js" crossorigin="anonymous"></script>

</body>
</html>