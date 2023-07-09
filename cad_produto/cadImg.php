<?php
// include_once('dadosCad.php');




// // if(isset($_FILES) && count($_FILES) > 0){
// //     var_dump($_FILES);
// //     die();
// // }
// if(isset($_GET['deletar'])){
//     $id = intval($_GET['deletar']);
//     $sql_query = mysqli_query($conexao, "SELECT * FROM arquivos WHERE id = '$id'") or die ($mysqli->error);
//     $arquivo = $sql_query->fetch_assoc();
    

//     if(unlink($arquivo['path'])){
//        $certo =  $sql_queryDel = mysqli_query($conexao, "DELETE FROM arquivos WHERE id = '$id'") or die ($mysqli->error);
//         if($certo){
//             echo "Arquivo excluído com sucesso!";
//         }
//     }


    
// }
// function enviarArquivo($error, $size, $name, $tmp_name){
//     $dbHost = 'Localhost';
//     $dbUsername = 'root';
//     $dbPassword = '';
//     $dbName = 'formulario-gustavo';

//     $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//     if($error){
//         die("Falha ao enviar arquivo");
//     }
//     if($size > 10485760){
//         die("Arquivo muito grande! Max: 10MB.");
//     }

//     if(isset($_POST['titulo'])){
//         $titulo = $_POST['titulo'];
//         $texto = $_POST['texto'];
//         $departamento = $_POST['departamentos'];
//         $preco = $_POST['preco'];
    
    
//     }
    

//     $pasta = "arquivos/";
//     $nomeDoArquivo = $name;
//     $novoNomeDoArquivo = uniqid();
//     $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
//     if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png' && $extensao != 'webp'){
//         die("Tipo de arquivo incompatível");
//     }
//     $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
//     $certo = move_uploaded_file($tmp_name, $path);
    
//     if($certo){
//         $query = mysqli_query($conexao, "INSERT INTO arquivos (nome, path, data_upload, administrador, titulo, texto, departamento, preco) VALUES('$nomeDoArquivo', '$path', NOW(), '', '$titulo', '$texto', '$departamento', '$preco')") or die("AAAAAAA");
//         // echo "Arquivo enviado com sucesso!";
//         return true;
//     }
//     else return false;
// }
// if(isset($_FILES['arquivo'])){
//     $arquivo = $_FILES['arquivo'];

//     $tudo_certo = true;

//     foreach($arquivo['name'] as $index => $arq){
//         $certo = enviarArquivo($arquivo['error'][$index], $arquivo['size'][$index], $arquivo['name'][$index], $arquivo['tmp_name'][$index]);
//         if(!$certo){
//             $tudo_certo = false;
//         }
//     }
    
//     if($tudo_certo){
//         echo "Todos os arquivos foram enviado com sucesso"; 
//     }
//     else echo "Falha ao enviar os arquivos";
// }

// $sql_query = mysqli_query($conexao, "SELECT * FROM arquivos") or die ($mysqli->error)
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data" action="consultaImg.php">
        <label for="titulo">Título (nome do produto)</label>
        <br>
        <input type="text" name="titulo" id="">
        <br>
        <br>
        <label for="text">Texto para o card (100 caracteres)</label>
        <br>
        <input type="text" name="texto-card" id="">
        <br>
        <br>
        <label for="texto">Insira o texto</label>
        <br>
        <textarea name="texto" id="" cols="30" rows="10"></textarea>
        <br>
        <br>
        <label for="departamentos">Escolha o departamento</label>
        <br>
                <select id="departamentos" name="departamentos">
                <option value="computadores">Computadores</option>
                <option value="perifericos">Periféricos</option>
                <option value="monitores">Monitores</option>
                <option value="licencas_windows">Licenças Windows</option>
            </select>
        <br>
        <br>
        <label for="preco">Preço</label>
        <br>
        <input type="number" name="preco" step="0.01" id="">
        <br>
        <br>
        <label for="">Selecione o arquivo</label>
        <br>
        <input name="arquivo[]" type="file" name="" id=""></p>
        <button name="upload" type="submit">Enviar arquivo</button>
    </form>

</body>
</html>