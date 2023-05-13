<?php
/*function userOnly(){ //use this functionality when comment is nessessary!
if(empty($_SESSION['id'])){
    $_SESSION['message']='you need to login first';
    $_SESSION['type']='error';
    header('location: ../../index.php');
        exit(0);
}

}*/

function adminOnly(){
    if(empty($_SESSION['id']) || empty($_SESSION['admin'])){
        $_SESSION['message']='you are not authorized';
        $_SESSION['type']='error';
        header('location: ../../index.php');
        exit(0);
    }
    
    }
    function gustOnly(){
        if(empty($_SESSION['id'])){
            header('location: ../../index.php');
            exit(0);
        }
        
        }






















?>