<?php
interface iPessoaDAO{
    public function cadastrar($pessoa);
}

class PessoaDAO implements iPessoaDAO{
    public function cadastrar($pessoa){
        // connect
        include_once("../Backend/dao/connectdb.class.php");
        try{
        $instance = ConnectDb::getInstance();
        $conn = $instance->getConnection();

        //insert de user
        $sql = "INSERT INTO pessoa (NOME, DATA_NASC, DATA_GRAV) VALUES (?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$pessoa->getNome(), $pessoa->getDataNasc(), $pessoa->getDataGrav()]);
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
?>