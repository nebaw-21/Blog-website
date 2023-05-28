<?php
function userOnly($redirect ='index.php'){ 
if(empty($_SESSION['id'])){
    header('location:'. $redirect );
    $_SESSION['message']='you need to login first';
    $_SESSION['type']='error';
        exit(0);
}

}

function adminOnly($redirect = '../../index.php'){
    if(empty($_SESSION['id']) && empty($_SESSION['admin'])){
        $_SESSION['message'] ='you are not authorized';
        $_SESSION['type']='error';
       
        header('location:'. $redirect );
        exit(0);
    }
    
    }
    function gustOnly(){
        if(isset($_SESSION['id'])){
            header('location: ../../index.php');
            exit(0);
        }
        
        }






















?>