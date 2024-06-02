<?php 
  $host=getenv("MYSQL_HOST", true) ?: "localhost";
  $db=getenv("MYSQL_DB", true) ?: "mysqldb";
  $username=getenv("MYSQL_USER", true) ?: 'root';
  $password=getenv('MYSQL_PASSWORD', true) ?: '';
  $port=getenv("MYSQL_PORT", true)  ?: '3306';

  $conn=new mysqli($host,$username,$password,$db,$port);
  if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
  }