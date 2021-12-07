<?php require_once 'header.html.php'; ?>


    <form action="" method="post">
        <label for="gameid">Game</label>
        <input type="number" name="gameid">

        <label for="startdate">start date </label>
        <input type="date" name="startdate" id="startdate" required>

        <button type="submit">Envoyer</button>
    </form>
<?php require_once 'footer.html.php'; ?>