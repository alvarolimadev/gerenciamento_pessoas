<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/CRUD_PHP/assets/css/styles.css">
  <script src="/CRUD_PHP/assets/utils/scripts.js"></script>

  <title>Cadastro de Pessoas</title>
</head>
<body>
  <h1>Cadastro de Pessoas</h1>
  <form action="/CRUD_PHP/services/register.php" method="POST">
    <div>
      <div>
        <label>Nome</label>
      </div>
      <div>
        <input type="text" name="nome" placeholder="Pedro dos Anjos" required>
      </div>
    </div></br>

    <div>
      <div>
        <label>CPF</label>
      </div>
      <div>
        <input type="text" name="cpf" placeholder="Apenas números" minlength="11" maxlength="11" required>
      </div>
    </div></br>

    <div>
      <div>
        <label>Sexo</label>
      </div>
      <div>
        <select aria-label="label for the select" name="sexo" required>
            <option value="" disabled selected>Selecione</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outro">Outro</option>
        </select>
      </div>
    </div></br>

    <div>
      <div>
        <label>CEP</label>
      </div>
      <div>
        <input type="text" name="cep" placeholder="Apenas números" minlength="8" maxlength="8" required><br><br>
      </div>
    </div></br>

    <div>
      <div>
        <label>Logradouro</label>
      </div>
      <div>
        <input type="text" name="logradouro" placeholder="Rua Arthur Barbosa" required><br><br>
      </div>
    </div></br>

    <div>
      <div>
        <label>Bairro</label>
      </div>
      <div>
        <input type="text" name="bairro" placeholder="Itinga" required><br><br>
      </div>
    </div></br>

    <input type="submit" onclick="return confirmForm('cadastrar')" value="Cadastrar">
  </form>

  <h1>Lista de Usuários Cadastrados</h1>
    
  <?php
  require_once 'assets/database/database.php';
  require_once 'classes/person.php';

  // Instancie a classe Database
  $db = new Database();

  // Instancie a classe Person e passe a conexão como parâmetro
  $person = new Person($db);

  // Obtenha a lista de pessoas
  $people = $person->getAllPeople();

  if (!empty($people)) {
      echo "<table border='1'>";
      echo "<tr>
              <th>Data de Cadastro</th>
              <th>Nome</th>
              <th>CPF</th>
              <th>Sexo</th>
              <th>CEP</th>
              <th>Logradouro</th>
              <th>Bairro</th>
            </tr>";

      foreach ($people as $person) {
          echo "<tr>";
          echo "<td>" . $person["data_cadastro"] . "</td>";
          echo "<td>" . $person["nome"] . "</td>";
          echo "<td>" . $person["cpf"] . "</td>";
          echo "<td>" . $person["sexo"] . "</td>";
          echo "<td>" . $person["cep"] . "</td>";
          echo "<td>" . $person["logradouro"] . "</td>";
          echo "<td>" . $person["bairro"] . "</td>";
          echo "<td>
                  <a href='/CRUD_PHP/services/delete.php?id=" . $person["id"] . "' onclick='return confirmForm(`excluir`)'>Excluir</a>
                </td>";
          echo "<td>
                  <a href='/CRUD_PHP/views/update.php?id=" . $person["id"] . "'>Editar</a>
                </td>";
          echo "</tr>";
      }

      echo "</table>";
  } else {
      echo "Nenhum usuário cadastrado.";
  }
  ?>
</body>
</html>