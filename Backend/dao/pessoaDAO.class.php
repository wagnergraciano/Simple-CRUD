<?php
interface iPessoaDAO{
    public function cadastrar($pessoa);
    public function retornarTodos();
    public function deletar($id);
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
        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function retornarTodos(){
        // connect
        include_once("../Backend/dao/connectdb.class.php");
        try{
            $instance = ConnectDb::getInstance();
            $conn = $instance->getConnection();

            //select de user
            $sql = "SELECT * FROM pessoa";
            $stmt= $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return($result);
        }
        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function deletar($id){
        // connect
        include_once("../Backend/dao/connectdb.class.php");
        try{
            $instance = ConnectDb::getInstance();
            $conn = $instance->getConnection();

            //insert de user
            $sql = "DELETE FROM pessoa WHERE ID = :id";
            $stmt= $conn->prepare($sql);
            $stmt->bindValue(':id',$id);
            $stmt->execute();
        }
        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
?>