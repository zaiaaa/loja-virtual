<?php
    
    session_start();
    include('../conexao/conexao.php');
    print_r($_REQUEST);
    if(isset($_POST['username'])){
        //acessa
        
        $email = $_POST['username'];
        $senha = $_POST['senha'];

        //print_r($email);
        //print_r($senha);

        $sql = "SELECT * FROM users WHERE nomeDeUsuario = '$email' and senha = '$senha'";

        $result = $conexao->query($sql);

        // print_r($sql);
        // print_r($result);

        if(mysqli_num_rows($result) < 1){
            unset($_SESSION['username']);
            unset($_SESSION['senha']);
            echo('Nome de usuário ou senha inválidos');
        }
        else
        {
            $_SESSION['username'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: ../index/index.php');
        }
    }
    else{
        header('Location: login.php');
        //não acessa
    }
?>