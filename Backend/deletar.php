<?php
//Recebendo os dados
$id = $_GET['c_id'];

include_once("./dao/pessoaDAO.class.php");
$pessoaDAO = new PessoaDAO();
$pessoaDAO->deletar($id);
?>
<script>
    alert('Pessoa deletada com sucesso!');
    window.location='../Frontend/index.php';
</script>