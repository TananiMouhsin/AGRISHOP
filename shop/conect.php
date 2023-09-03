<?php

    $dbserver = "localhost";
    $dbuser = "root" ; 
    $dbname = "shop" ;
    $dbpass = ""; 
    $conn = " "; 

    $conn = mysqli_connect($dbserver, $dbuser,$dbpass,$dbname);

    if($conn){
        echo "you are connected" ; 
    }else{
        echo "could'nt connnect" ;
    }
?> 