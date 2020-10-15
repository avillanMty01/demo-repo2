<?php

  function createDatabase(){
    // svr params
    $servername = "localhost";
    $username = "root";
    $password = "avillanDB2";
    $dbname = "bookstore";

    // use mysqli library
    // create connection
    $con = mysqli_connect($servername, $username, $password);

    // check connection
    if(!$con){
      die("connection failed!" . mysqli_connect_error());
    }
    // create create the database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if(mysqli_query($con, $sql)){
      $con = mysqli_connect($servername, $username, $password, $dbname);

      //create table
      $sql = "
        CREATE TABLE IF NOT EXISTS books(
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        book_name VARCHAR(60) NOT NULL,
        book_publisher VARCHAR(60),
        book_price FLOAT
        );
      ";

      if(mysqli_query($con, $sql)){
        return $con;
      } else {
        echo("cannot create table");
      }

    } else {
      echo("Error while creating db " . mysqli_connect_error($conn));
    }
  } // end function


 ?>
