<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/stylelogg.css">
    <title>Loja</title>
</head>
<body>
    
    <!--Navbar-->
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
        <a  href="../index.php">Home</a>
      <a class="active" href="login.php">Entrar <i class="fa-solid fa-user"></i></a>
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
    <!--End Navbar-->

    <div class="main-login">
        <div class="left-login">
            <img src="../shark.svg" class="left-login-image" alt="" srcset="">
        </div>
        <div class="right-login">
            <div class="card-login">
          <div class="main">
          <h1 class="formulario">LOGIN</h1>
          <form action="testLogin.php" class="form" method="POST">
              <label for="username">Nome de usuário</label>
                <input type="text" class="input" name="username" placeholder="Nome de usuário" aria-label="Nome de usuário" aria-describedby="addon-wrapping" required>
              <label for="senha">Senha</label>
                <input type="password" class="input" name="senha" id="senha" placeholder="Senha" aria-label="Senha" aria-describedby="addon-wrapping" required>
              <div class="buttons">
                <button type="submit" class="form-control" name="submit" id="btnS">Fazer login</button>
              </div>
          </form>
          <button id="btnR" onclick="btnClick()"><span class="seeText">Ver senha</span>  <i class="fa-solid fa-eye"></i></button>
        </div>
            <br>
          <h4>Ou, <a href="../cad_usuario/cadastro.php">cadastre-se</a></h4>
        </div>
        </div>
    </div>
    <a href="../cad_produto/cadImg.php">cadastrar produto</a>
        <br>
        <a href="../cad_produto/consultaImg.php">Consultar</a>
    <script src="https://kit.fontawesome.com/5dfb4ac132.js" crossorigin="anonymous"></script>
    <script src="../js/scriptt.js"></script>
</body>
</html>