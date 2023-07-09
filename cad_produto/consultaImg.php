<?php
include_once('../conexao/conexao.php');



// if(isset($_POST['titulo'])){
//     $titulo = $_POST['titulo'];
//     $texto = $_POST['texto'];
//     $departamento = $_POST['departamentos'];
//     $preco = $_POST['preco'];
// }





if(isset($_GET['deletar'])){
    $id = intval($_GET['deletar']);
    $sql_query = mysqli_query($conexao, "SELECT * FROM arquivos WHERE id = '$id'") or die ($mysqli->error);
    $arquivo = $sql_query->fetch_assoc();
    

    if(unlink($arquivo['path'])){
       $certo =  $sql_queryDel = mysqli_query($conexao, "DELETE FROM arquivos WHERE id = '$id'") or die ($mysqli->error);
        if($certo){
            echo "Arquivo excluído com sucesso!";
        }
    }


    
}
function enviarArquivo($error, $size, $name, $tmp_name){
    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'formulario-gustavo';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if($error){
        die("Falha ao enviar arquivo");
    }
    if($size > 19000000){
        die("Arquivo muito grande! Max: 19MB.");
    }

    if(isset($_POST['titulo'])){
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $departamento = $_POST['departamentos'];
        $preco = $_POST['preco'];
        $textoCard = $_POST['texto-card'];
    
    }else header('Location: cad_produto/cadImg.php');

    $pasta = "../arquivos/";
    $nomeDoArquivo = $name;
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
    if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png'){
        die("Tipo de arquivo incompatível");
    }
    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $certo = move_uploaded_file($tmp_name, $path);
    
    $textoEscapado = mysqli_real_escape_string($conexao, $texto);
    if($certo){
        $query = mysqli_query($conexao, "INSERT INTO arquivos (nome, path, data_upload, administrador, titulo, texto, texto_card, departamento, preco) VALUES('$nomeDoArquivo', '$path', NOW(), '', '$titulo', '$textoEscapado', '$textoCard', '$departamento', '$preco')") or die(mysqli_error($conexao));
        // echo "Arquivo enviado com sucesso!";
        return true;
    }
    else return false;
}
if(isset($_FILES['arquivo'])){
    $arquivo = $_FILES['arquivo'];

    $tudo_certo = true;

    foreach($arquivo['name'] as $index => $arq){
        $certo = enviarArquivo($arquivo['error'][$index], $arquivo['size'][$index], $arquivo['name'][$index], $arquivo['tmp_name'][$index]);
        if(!$certo){
            $tudo_certo = false;
        }
    }
    
    if($tudo_certo){
        echo "Todos os arquivos foram enviado com sucesso"; 
    }
    else echo "Falha ao enviar os arquivos";
}

$sql_query = mysqli_query($conexao, "SELECT * FROM arquivos") or die ($mysqli->error);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <table border="1" cellpadding="10">
        <thead>
            <th>Título</th>
            <th>Texto</th>
            <th>Texto card</th>
            <th>Departamento</th>
            <th>Preço</th>
            <th>Preview</th>
            <th>Arquivo</th>
            <th>Data de envio</th>
            <th></th>
        </thead>
        <tbody>
        <?php
    while($arquivo = $sql_query->fetch_assoc()){
?>
            <tr>
                <td><?php echo $arquivo['titulo'];?></td>
                <td><?php echo $arquivo['texto'];?></td>
                <td><?php echo $arquivo['texto_card'];?></td>
                <td><?php echo $arquivo['departamento'];?></td>
                <td><?php echo $arquivo['preco'];?></td>
                <td><img height="50" src="<?php echo $arquivo['path'];?>" alt="" srcset=""></td>
                <td> <a target="_blank" href="<?php echo $arquivo['path'];?>"> <?php echo $arquivo['nome']?> </a> </td>
                <td><?php echo date("d/m/Y H:i", strtotime($arquivo['data_upload']));?></td>
                <th><a href="consultaImg.php?deletar=<?php echo $arquivo['id'];?>">Deletar</a></th>
            </tr>
            <?php
    }
    ?>
        </tbody>
    </table>

    <a href="cadImg.php"><button>voltar</button></a>
    <a href="../index/index.php"><button>index</button></a>
</body>
</html>