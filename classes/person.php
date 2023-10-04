<?php
class Person {
    private $con;

    public function __construct($db){
        $this->con = $db->getConnection();
    }

    // Função para consultar todas as pessoas cadastradas
    public function getAllPeople() {
        $sql = "SELECT * FROM pessoas";
        $result = $this->con->query($sql);

        $people = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $people[] = $row;
            }
        }

        return $people;
    }

    // Função para cadastrar uma nova pessoa
    public function insertPerson($data_cadastro, $nome, $cpf, $sexo, $cep, $logradouro, $bairro) {
        $sql = "INSERT INTO pessoas (data_cadastro, nome, cpf, sexo, cep, logradouro, bairro) 
                VALUES ('$data_cadastro', '$nome', '$cpf', '$sexo', '$cep', '$logradouro', '$bairro')";

        if ($this->con->query($sql) === true) {
            return true;
        } else {
            return false;
        }
    }

    // Função para excluir pessoa selecionada
    public function deletePerson($id) {
        $sql = "DELETE FROM pessoas WHERE id = $id";

        if ($this->con->query($sql) === true) {
            return true;
        } else {
            return false;
        }
    }

    // Função para atualizar os dados da pessoa cadastrada
    public function updatePerson($id, $data_cadastro, $nome, $cpf, $sexo, $cep, $logradouro, $bairro) {
        $sql = "UPDATE pessoas SET 
                data_cadastro = '$data_cadastro',
                nome = '$nome',
                cpf = '$cpf',
                sexo = '$sexo',
                cep = '$cep',
                logradouro = '$logradouro',
                bairro = '$bairro'
                WHERE id = $id";

        if ($this->con->query($sql) === true) {
            return true;
        } else {
            return false;
        }
    }

    // Função para consultar pessoa por ID
    public function getPersonById($id) {
        $sql = "SELECT * FROM pessoas WHERE id = $id";
        $result = $this->con->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}
