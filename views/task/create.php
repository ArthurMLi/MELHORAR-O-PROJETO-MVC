<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criando nova Tarefa</title>
</head>
<body>
    <h1>Criando nova Tarefa</h1>
    <form action="index.php?action=createT" method="post">
        <label for="name">Tarefa:</label>
        <input type="text" id="tarefa" name="tarefa" required>
        <br>
        <label for="name">prazo:</label>
        <input type="text" id="prazo" name="prazo" required>
        <br>
        <input type="submit" value="Create">
    </form>
    <a href="index.php">Voltar para lista de Tarefas</a>
</body>
</html>
