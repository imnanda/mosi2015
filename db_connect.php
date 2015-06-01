<?php
/**
 * Created by PhpStorm.
 * User: asmunanda
 * Date: 6/2/2015
 * Time: 5:43 AM
 */
$servername = "localhost";
$username = "root";
$password = "asdasd150494";
$dbname = "mosi";
$conn = mysqli_connect($servername, $username, $password,$dbname);
if (! $conn) {
    die("Connection failed: ");
}
