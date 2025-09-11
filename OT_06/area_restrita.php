<?php
session_start();

//verifica se esta logado 
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true ){
    header ('Location: login.php');
    exit;
} 

//Processa logout 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Àrea Restrita</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
    <p>Esta é uma área restrita acessível apenas para usuários logados.</p>
    <form method="post">
        <button type="submit" name="logout">Sair</button>
    </form>
</body>
</html>