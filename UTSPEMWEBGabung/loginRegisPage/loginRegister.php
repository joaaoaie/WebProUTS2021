<?php include '../connect_db.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <script type="text/javascript"> 
            $(document).ready(function(){
                $('#myModal').modal({
                    keyboard: false,
                    show: true,
                    backdrop: 'static'
                });
            });
        </script>
    </head>
    <body>
        <?php
            if(!isset($_SESSION['id_user']))
                include './loginUser.php';
            else{
                if($_SESSION['admin']){
                    $id = $_GET['id'];
                    header("location: $base_url/index.php?id={$id}"); //Admin View - CRUD
                }
                else{
                    $id = $_GET['id'];
                    header("location: $base_url/index.php?id={$id}"); //User View - View Only
                }
            }
        ?>
    </body>
</html>