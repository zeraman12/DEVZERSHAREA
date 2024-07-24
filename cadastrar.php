<?php
include('conexao.php');

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['senha'])) {
    $username = $mysqli->real_escape_string($_POST['username']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    // Verifica se o email já está cadastrado
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $error = "Este email já está cadastrado!";
    } else {
        // Insere os dados no banco
        $sql = "INSERT INTO usuarios (username, email, senha) VALUES ('$username', '$email', '$senha')";
        if ($mysqli->query($sql)) {
            $success = "Usuário cadastrado com sucesso!";
        } else {
            $error = "Erro ao cadastrar usuário: " . $mysqli->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="Pt-br">
<head>
       <link rel="icon" href="Icone-dev-zersh.ico" type="image/x-icon">
    <link rel="stylesheet" href="Cadastrar.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Denk+One&display=swap" rel="stylesheet">
</head>
<body>
    <div class="Principal">
        <form action="cadastrar.php" method="POST">
            <h1>Cadastro</h1>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <?php if (isset($success)): ?>
                <p style="color: green;"><?php echo $success; ?></p>
            <?php endif; ?>
            <div class="Input-box">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="Input-box">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="Input-box">
                <input type="password" name="senha" placeholder="Senha" required>
            </div>
            <div class="Botao">
                <input type="submit" value="Cadastrar">
            </div>
            <div>
                <p>Já tem uma conta? <a href="index.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
