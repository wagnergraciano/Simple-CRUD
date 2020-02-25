<?php
//Recebendo os dados
$nome = $_GET['c_nome'];
$dataNasc = $_GET['c_dataNasc'];
date_default_timezone_set("America/Sao_Paulo");
$dataGrav = date('Y-m-d H:i:s');

include_once("./classes/pessoa.class.php");
$pessoa = new Pessoa($nome,$dataNasc,$dataGrav);
include_once("./dao/pessoaDAO.class.php");
$pessoaDAO = new PessoaDAO();
$pessoaDAO->cadastrar($pessoa);
?>
<script>
    alert('Pessoa cadastrada com sucesso!');
    window.location='../Frontend/index.php';
</script>