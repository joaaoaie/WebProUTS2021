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
                    header("location: $base_url/index.php"); //Admin View - CRUD
                }
                else{
                    header("location: $base_url/index.php"); //User View - View Only
                }
            }
        ?>
    </body>
</html>
