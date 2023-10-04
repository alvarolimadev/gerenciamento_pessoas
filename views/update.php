<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/CRUD_PHP/assets/utils/scripts.js"></script>

    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>

    <?php
    require_once '../assets/database/database.php';
    require_once '../classes/person.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        // Instância da conexão com o banco de dados
        $db = new Database();

        // Instância da classe Person
        $person = new Person($db);

        $id = $_GET["id"];

        // Recupere os dados do usuário com base no ID
        $person = $person->getPersonById($id);

        if (!$person) {
            echo "Usuário não encontrado.";
        } else {
    ?>
      <form action="/CRUD_PHP/views/update.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $person['id']; ?>">

          <input type="hidden" name="data_cadastro" value="<?php echo $person['data_cadastro']; ?>" >

          <div>
              <div>
                  <label>Nome</label>
              </div>
              <div>
                <input type="text" name="nome" value="<?php echo $person['nome']; ?>">
              </div>
          </div>
          </br>

          <div>
            <div>
              <label>CPF</label>
            </div>
            <div>
              <input type="text" name="cpf" value="<?php echo $person['cpf']; ?>">
            </div>
          </div>
          </br>

          <div>
            <div>
              <label>Sexo</label>
            </div>
            <div>
              <select aria-label="label for the select" name="sexo" required>
                <option value="" disabled selected><?php echo $person['sexo']; ?></option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Outro">Outro</option>
              </select>
            </div>
          </div>
          </br>

          <div>
            <div>
              <label>CEP</label>
            </div>
            <div>
              <input type="text" name="cep" value="<?php echo $person['cep']; ?>">
            </div>
          </div>
          </br>

          <div>
            <div>
              <label>Logradouro</label>
            </div>
            <div>
              <input type="text" name="logradouro" value="<?php echo $person['logradouro']; ?>">
            </div>
          </div>
          </br>

          <div>
            <div>
              <label>Bairro</label>
            </div>
            <div>
              <input type="text" name="bairro" value="<?php echo $person['bairro']; ?>">
            </div>
          </div>
          </br>

          <input type="submit" onclick="return confirmForm('atualizar')" value="Atualizar">
      </form>
    <?php
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
        // Instância da conexão com o banco de dados
        $db = new Database();

        // Instância da classe Person
        $person = new Person($db);

        $id = $_POST["id"];
        $data_cadastro = $_POST['data_cadastro'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $sexo = $_POST['sexo'];
        $cep = $_POST['cep'];
        $logradouro = $_POST['logradouro'];
        $bairro = $_POST['bairro'];

        // Atualize os dados do usuário
        if ($person->updatePerson($id, $data_cadastro, $nome, $cpf, $sexo, $cep, $logradouro, $bairro)) {
            echo "Dados do usuário atualizados com sucesso!";
        } else {
            echo "Erro ao atualizar os dados do usuário.";
        }
    }
    ?>
</body>
</html>
