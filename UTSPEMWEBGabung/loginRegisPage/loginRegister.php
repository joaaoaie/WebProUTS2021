<?php include '../connect_db.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <body>
        <?php
            if(!isset($_SESSION['id_user']))
                include './signInUp.php';
        ?>
    </body>
</html>
