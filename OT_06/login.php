<?php 
session_start();

//Usuário e senha fixos (simulando autenticação)
$usuario_valido = 'admin';
$senha_valida = '123456';
$mensagem = '';

//Processa login
if ($_SERVER ['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST ['senha'] ?? '';

    if ($usuario === $usuario_valido && $senha === $senha_valida){
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $usuario;
        header('Location: area_restrita.php');
        exit;
    } else {
        $mensagem = 'Usuário ou senha inválidos!';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if ($mensagem): ?>
        <p style="color: red;"><?php echo htmlspecialchars ($mensagem); ?></p>
    <?php endif; ?>
    <form method="post">
        <label>Usuário: <input type="text" name="usuario" required></label><br>
        <label>Senha: <input type="password" name="senha" required></label><br>
        <button type="submit" name="login">Entrar</button>
    </form>   
</body>
</html>