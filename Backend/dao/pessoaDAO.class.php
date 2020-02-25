<?php
interface iPessoaDAO{
    public function cadastrar($pessoa);
    public function retornarTodos();
    public function deletar($id);
    public function alterar($id,$nome,$dataNasc);
    public function procurarId($id);
}

class PessoaDAO implements iPessoaDAO{
    public function cadastrar($pessoa){
        // connect
        include_once("../Backend/dao/connectdb.class.php");
        try{
            $instance = ConnectDb::getInstance();
            $conn = $instance->getConnection();

            //insert the user
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

            //select the user
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

            //delete the user
            $sql = "DELETE FROM pessoa WHERE ID = :id";
            $stmt= $conn->prepare($sql);
            $stmt->bindValue(':id',$id);
            $stmt->execute();
        }
        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function alterar($id,$nome,$dataNasc){
        // connect
        include_once("../Backend/dao/connectdb.class.php");
        try{
            $instance = ConnectDb::getInstance();
            $conn = $instance->getConnection();

            //update the user
            $sql = "UPDATE pessoa SET NOME = :nome,DATA_NASC = :data_nasc WHERE ID = :id";
            $stmt= $conn->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':data_nasc', $dataNasc);
            $stmt->execute();
        }
        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function procurarId($id){
        // connect
        include_once("../Backend/dao/connectdb.class.php");
        try{
            $instance = ConnectDb::getInstance();
            $conn = $instance->getConnection();

            //select the user
            $sql = "SELECT * FROM pessoa WHERE ID = :id";
            $stmt= $conn->prepare($sql);
            $stmt->bindValue(':id',$id);
            $stmt->execute();
            $row = $stmt->fetch();

        }
        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
?>