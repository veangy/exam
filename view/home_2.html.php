<?php require_once 'header.html.php';
?>
<?php foreach ($results as $player) : ?>
    <table>
        <thead>
        <tr>
            <th colspan="2"><?= $player->getNickname() ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?= $player->getEmail() ?></td>
        </tr>
        </tbody>
    </table>

<?php endforeach; ?>

<?php foreach ($resultsg as $game) : ?>
    <table>
        <thead>
        <tr>
            <th colspan="2"><?= $game->getTitle() ?></th>
        </tr>
        </thead>
        <tbody>

        </tr>
        </tbody>
    </table>

<?php endforeach; ?>


<?php require_once 'footer.html.php' ?>