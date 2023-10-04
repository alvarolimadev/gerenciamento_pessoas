<?php
class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "123456";
    private $database = "gerenciamento_pessoas";
    private $con;

    public function __construct()
    {
        $this->con = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->con->connect_error) {
            die("Erro na conexão com o banco de dados: " . $this->con->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->con;
    }
}
