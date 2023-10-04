<?php

require_once '../assets/database/database.php';
require_once '../classes/person.php';

// Verifica o tipo da requisição
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Instância da classe Database
    $db = new Database();

    // Instância da classe Person
    $person = new Person($db);

    $data_cadastro = date('d/m/Y');
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $sexo = $_POST['sexo'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];

    // Cadastra os dados do usuário
    if ($person->insertPerson($data_cadastro, $nome, $cpf, $sexo, $cep, $logradouro, $bairro)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $con->error;
    }
}
