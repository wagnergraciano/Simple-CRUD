<?php
//Recebendo os dados
$id = $_GET['c_id'];
$nome = $_GET['c_nome'];
$dataNasc = $_GET['c_dataNasc'];

include_once("./dao/pessoaDAO.class.php");
$pessoaDAO = new PessoaDAO();
$pessoaDAO->alterar($id,$nome,$dataNasc);
?>
<script>
    alert('Alteração realizada com sucesso!');
    window.location='../Frontend/index.php';
</script>