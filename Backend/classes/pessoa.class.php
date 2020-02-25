<?php
class Pessoa {
    private $id;
    private $nome;
    private $data_nasc;
    private $data_grav;

    public function getId() {
        return $this->id;
    }     
    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }     
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDataNasc() {
        $date = new DateTime($this->data_nasc);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }     
    public function setDataNasc($dataNasc) {
        $this->data_nasc = $dataNasc;
    }

    public function getDataGrav() {
        return $this->data_grav;
    }     
    public function setDataGrav($dataGrav) {
        $this->data_grav = $dataGrav;
    }
}
?>