<?php
$host     = 'localhost';
$user     = 'root'; 
$password = '';  
$db       = 'unsika1'; 
  
$con = mysqli_connect($host, $user, $password, $db);
if(!$con){
die("Gagal Terkoneksi");
}