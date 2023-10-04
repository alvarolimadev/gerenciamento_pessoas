<?php
require_once '../assets/database/database.php';
require_once '../classes/person.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Instância da conexão com o banco de dados
    $db = new Database();

    // Instância da classe Person
    $person = new Person($db);

    $id = $_GET["id"];

    // Exclui os dados do usuário escolhido
    if ($person->deletePerson($id)) {
        echo "Usuário e endereços excluídos com sucesso!";
    } else {
        echo "Erro ao excluir usuário e endereços.";
    }
}
