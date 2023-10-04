function confirmForm(value) {
  switch (value) {
    case "cadastrar":
      return confirm("Tem certeza que deseja cadastrar este usuário?");
    case "excluir":
      return confirm("Tem certeza que deseja excluir os dados deste usuário?");
    case "atualizar":
      return confirm("Tem certeza que deseja atualizar os dados deste usuário?");
    default:
      return false;
  }
};
