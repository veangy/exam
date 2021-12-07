<?php require_once 'header.html.php'; ?>


    <form action="" method="post">
        <label for="title">title</label>
        <input type="text" name="title" id="title" required>

        <label for="minplayers">min players </label>
        <input type="number" name="minplayers" id="minplayers" required>

        <label for="maxplayers">max players </label>
        <input type="number" name="maxplayers" id="maxplayers" required>

        <button type="submit">Envoyer</button>
    </form>
<?php require_once 'footer.html.php'; ?>