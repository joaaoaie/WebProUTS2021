<?php
session_start();

$host = "localhost";

//Ini adalah user yang digunakan untuk login ke dalam module mysql / mariadb
$username = "root";

//Ini adalah nama database yang digunakan dalam praktikum ini 
$dbname = "webuts";

//Ini adalah password yang untuk autentikasi user
$password = "";

$base_url = 'http://localhost/lab/UTS%20PEMWEB/';

$db = new PDO("mysql:host=$host;dbname=$dbname;port=3306", $username, $password);