<?php
session_start();
//if(isset($_SESSION['user_id'])) {
 //   header("Location: views/home.php");
   // exit;
//}

include_once 'config/database.php';
$database = new Database();
$pdo = $database->getConnection();

$message = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Função para verificar o registro no do banco de dados
    $sql = "SELECT * FROM users WHERE email = :email AND senha = :senha";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    // Verifica se há um registro correspondente
    if ($stmt->rowCount() > 0) {
        // O login foi bem-sucedido, redireciona para a página de boas-vindas
        $_SESSION['user_id'] = 1;
        header('Location: views/home.php');
        exit();
    } else {
        // O login falhou, exibe uma mensagem de erro
        $message = 'Nome de usuário ou senha incorretos';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Adicione os links para os arquivos CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     <!-- Exibe mensagens de erro, se houver -->
     <?php if (isset($message)) : ?>
        <p style="color: red;"><?php echo $message; ?></p>
    <?php endif; ?> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mt-5">Login</h2>
                <form method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                    <button type="reset" class="btn btn-secondary">Limpar</button>
                </form>
                <p class="mt-3 text-danger"><?php echo $message; ?></p>
            </div>
        </div>
    </div>
</body>
</html>