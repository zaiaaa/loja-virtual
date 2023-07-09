<?php
    if(isset($_POST['submit'])){
        include_once('../conexao/conexao.php');

        $nome = $_POST['nome'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $datanasc = $_POST['datanasc'];
        $sexo = $_POST['genero'];
        $telefone = $_POST['telefone'];

        $result = mysqli_query($conexao, "INSERT INTO users(nome, nomeDeUsuario, email, senha, data_nasc, sexo, telefone) 
        VALUES('$nome', '$username', '$email', '$senha', '$datanasc', '$sexo', '$telefone')");

        header('Location: ../login/login.php');
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/stylecad.css">
    <title>Cadastro</title>

</head>
<body class="body">
    
    <!--Navbar-->
    <header class="header">
    <div class="departamentos"> <p class="p">Departamentos</p><i id="departs" class="fa-solid fa-bars"></i></div> 
    <div class="logoInp">
        <a class="logo" href="../index.php"><img src="../img/crocodilo2-removebg-preview.png" alt="" srcset=""></a> 
      <form action="">
        <input class="barra" type="text" placeholder="Pesquise">
        <button class="btnEnvio" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
    </div>
    <div class="menu"> <p class="p">Menu </p><i id="hamb" class="fa-solid fa-bars"></i></div> 
  
   <nav class="navbar">
    <a href="../index.php">Home</a>
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
    
    <section class="content">
        <div class="card-login">
          <div class="main">
          <h2 class="formulario">Cadastro</h2>
          
          <form class="form" method="POST" action="cadastro.php">
              <label for="nome">Nome completo</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome" aria-label="Nome" aria-describedby="addon-wrapping" required>
              <label for="username">Nome de usuário</label>
                <input type="text" class="form-control" name="username" placeholder="Nome de usuário" aria-label="Nome de usuário" aria-describedby="addon-wrapping" required>
              <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="addon-wrapping" required>
              <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" aria-label="Senha" aria-describedby="addon-wrapping" required>
                <div id="olho" onclick="showHidden()"><i class="fa-sharp fa-solid fa-eye"></i></div>
                <div id="olhoFechado" onclick="showHidden()"><i class="fa-solid fa-eye-slash"></i></div>

            <label for="datanasc">Data de nascimento</label>
                <input type="date" class="form-control" name="datanasc" required>
                <div class="radio-group">
              <p>Sexo</p>
                    <input type="radio" id="feminino" name="genero" value="feminino" required>
                    <label for="feminino">Feminino</label>
                    <br>
                    <input type="radio" id="masculino" name="genero" value="masculino" required>
                    <label for="masculino">Masculino</label>
                    <br>
                    <input type="radio" id="outro" name="genero" value="outro" required>
                    <label for="outro">Outro</label>
                </div>
              <label for="telefone">Telefone</label>
                <input type="tel" class="form-control" name="telefone" placeholder="ex: (15) 98831-5997" aria-label="Telefone" aria-describedby="addon-wrapping" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" required>
              <div class="buttons">
                <button type="submit" class="form-control" name="submit" id="btnS">Cadastrar</button>
                <button type="reset" class="form-control" id="btnR">Limpar</button>
              </div>
          </form>
          </div>
        </div>
      </section>

      <script>
        const password = document.getElementById('senha')
        const olho = document.getElementById('olho')
        const olhoFechado =document.getElementById('olhoFechado')

        function showHidden (){
            if(password.type === 'password'){
                password.setAttribute('type', 'text');
                olho.classList.remove('show')
                olhoFechado.classList.remove('hide')
                
                olho.classList.add('hide')
                olhoFechado.classList.add('show')
            }
            else{
                password.setAttribute('type', 'password')
                olho.classList.remove('hide')
                olhoFechado.classList.remove('show')
                
                olho.classList.replace('show')
                olhoFechado.classList.replace('hide')
            }
        }

      </script>
<script src="https://kit.fontawesome.com/5dfb4ac132.js" crossorigin="anonymous"></script>
<script src="js/scriptt.js"></script>
</body>
