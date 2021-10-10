<?php
    if(!isset($_SESSION)){ 
        session_start();
    };

    $host = "localhost";
    $username = "root";
    $dbname = "id17737508_web_uts";
    $password = "";

    $base_url = 'http://localhost/UTSPEMWEBGabung';
    $db = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
?>

<!-- Ini yang untuk hostingan -->
<?php
//     if(!isset($_SESSION)){ 
//         session_start();
//     };

//     $host = "localhost";
//     $username = "id17737508_webuts";
//     $dbname = "id17737508_web_uts";
//     $password = "p*<3xe)2#s@GSs\u";

//     $base_url = 'https://closest-streets.000webhostapp.com/UTSPEMWEBGabung';
//     $db = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
?>
