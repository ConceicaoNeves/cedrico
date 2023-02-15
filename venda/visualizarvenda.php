<?php

$sql = "SELECT * FROM livro_venda INNER JOIN livro WHERE livro_venda.idLivro = 28";
$result = mysqli_query($connect, $sql);
while ($venda = mysqli_fetch_row($result)) {
    echo $livro[0];
}

?>