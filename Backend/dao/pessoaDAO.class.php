<?php
interface iPessoaDAO{
    public function cadastrar($nome,$data_nasc,$data_grav);
}

class PessoaDAO implements iPessoaDAO{
    public function cadastrar($nome,$data_nasc,$data_grav){
        // connect
        include_once("../Backend/dao/connectdb.class.php");
        try{
        $instance = ConnectDb::getInstance();
        $conn = $instance->getConnection();

        //insert de user
        $sql = "INSERT INTO pessoa (NOME, DATA_NASC, DATA_GRAV) VALUES (?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$nome, $data_nasc, $data_grav]);
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
?>