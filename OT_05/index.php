<?php
// Inicializa array de tarefas 
session_start();

// Usar sessão para persistir os dados entre requisições
if (!isset($_SESSION['tarefas'])) {
    $_SESSION['tarefas'] = [];
}

$tarefas = &$_SESSION['tarefas'];
$erro = '';

// Adiciona nova tarefa 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nova_tarefa'])) {
    $nova_tarefa = trim($_POST['nova_tarefa']);
    if (!empty($nova_tarefa)) {
        $tarefas[] = htmlspecialchars($nova_tarefa);
    }
}

// Remove tarefa 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remover'])) {
    $indice = filter_input(INPUT_POST, 'remover', FILTER_VALIDATE_INT);
    if ($indice !== false && isset($tarefas[$indice])) {
        unset($tarefas[$indice]);
        $tarefas = array_values($tarefas); // Reindexa o array
    }    
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"] {
            width: calc(100% - 100px);
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 3px;
            cursor: pointer;
        }
        button[name="remover"] {
            background-color: #f44336;
            margin-left: 10px;
            font-size: 12px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: white;
            padding: 10px 15px;
            margin-bottom: 10px;
            border-radius: 3px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .empty-message {
            text-align: center;
            color: #777;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Lista de Tarefas</h1>
    
    <form method="post">
        <label for="nova_tarefa">Nova Tarefa:</label>
        <div style="display: flex;">
            <input type="text" id="nova_tarefa" name="nova_tarefa" placeholder="Digite uma nova tarefa">
            <button type="submit">Adicionar</button>
        </div>
    </form>

    <?php if (empty($tarefas)): ?>
        <p class="empty-message">Nenhuma tarefa adicionada.</p>    
    <?php else: ?>
        <ul>
            <?php foreach ($tarefas as $indice => $tarefa): ?>
                <li>
                    <span><?php echo $tarefa; ?></span>
                    <form method="post" style="display: inline;">
                        <input type="hidden" name="remover" value="<?php echo $indice; ?>">
                        <button type="submit">Remover</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>