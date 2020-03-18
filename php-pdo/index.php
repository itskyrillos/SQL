<?php

require 'sqlconnect.php';

$result = $pdo->query('SELECT * FROM Météo');

$arrMeteo = $result->fetchAll();

$result->closeCursor();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table>
        <?php

        foreach ($arrMeteo as $key => $value) { ?>
            <tr>
                <td> <?= $value['ville'] ?> </td>
                <td> <?= $value['haut'] ?> </td>
                <td> <?= $value['bas'] ?> </td>
                <td>
                    <form action="delete.php" method="POST">
                        <input type="checkbox" name="delete" value="<?= $value["id"] ?>">
                        <label for="delete">Delete</label>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

    <form method="POST" action="send.php">
        <div>
            <label for="ville">Ville</label>
            <input type="text" name="ville" required />
        </div>
        <div>
            <label for="haut">Haut</label>
            <input type="number" name="haut" required />
        </div>
        <div>
            <label for="bas">Bas</label>
            <input type="number" name="bas" required />
        </div>
        <input type="submit" name="send" value="Send">
    </form>


</body>

</html>