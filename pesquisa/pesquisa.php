<?php
    include('../conexao/conexao.php');
  
    if(isset($_GET['pesquisa'])){
      $item_pesq = $_GET['pesquisa'];
      }
      
      $pesquisa = mysqli_query($conexao, "SELECT * FROM arquivos WHERE titulo LIKE '%$item_pesq%'");
  
      if (mysqli_num_rows($pesquisa) > 0) {
        // Itens encontrados. Faça algo com os resultados.
        while ($row = mysqli_fetch_assoc($pesquisa)) {
            echo "Nome do Produto: " . $row["titulo"] . "<br>";
        }
    } else {
        echo "Nenhum item encontrado.";
    }


?>