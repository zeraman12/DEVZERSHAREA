<?php
session_start();
include('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        header("Location: dashboard.php"); 
        exit();
    } else {
        $error = "Email ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="Pt-br">
<head>
     <link rel="icon" href="Icone-dev-zersh.ico" type="image/x-icon">
    <link rel="stylesheet" href="Login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Denk+One&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <form action="main.html" method="POST">
            <h1>Login</h1>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="senha" placeholder="Senha" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Lembrar</label>
                <a href="#">Esqueceu a senha?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Não tem uma conta? <a href="Cadastrar.php">registre</a></p>
            </div>
        </form>
    </div>
</body>
</html>
