<?php 
include('C:/xampp/htdocs/Blog/app/database/db.php');
include("C:/xampp/htdocs/Blog/app/include/middleware.php"); 

global $conn;
    $name_err = $email_err = $password_err = "";
    $name =  $email = $Password = $id = "";

$table ='user';

$admin_users = selectAll($table );


 function loginUser($user){
    $_SESSION['id']= $user['id'] ;
    $_SESSION['username']= $user['username'];
    $_SESSION['admin']= $user['admin'];
    $_SESSION['type']= 'success';
    $_SESSION['message']= 'you are now logged in';

    if($_SESSION['admin']){
        header('location: ../Blog/admin/dashboard.php');
    }else{
        header('location: ../Blog/index.php');
    }
    exit();
 }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    
    if(isset($_POST['register-btn']) || isset($_POST['create_admin'])){
        
        @$id = $_POST['id'];
        
        $email_already = selectOne($table, ['email' => $_POST["email"]]);
    
    if(empty($_POST["username"])){
    $name_err = "Name is required!!!";  
    
    }
    
    elseif (is_numeric($_POST["username"])){
    $name_err = "Name cannot be number!!!";
    }
       
    elseif ($email_already['id'] != $id){
    $email_err = "Email already exist";      
    }
             
    elseif(empty($_POST["password"])){//password validation
    $password_err = "password is required!!!";  
    
    }
    elseif(strlen($_POST["password"]) < 8 ){
    $password_err = "password must be at least 8 characters";    
    }
    elseif(! preg_match("/[a-z]/i" , $_POST["password"])){
    
    $password_err = "password must contain at least one letter";
    
    }
    
    elseif(! preg_match("/[0-9]/" , $_POST["password"])){
    
    $password_err = "password must contain at least one number";
    }
    elseif($_POST["password"] !== $_POST["confirmPassword"]){
    
    $password_err = "passwords must much!";
    }
    
    else{
     $name = test_input($_POST["username"]);
    $Password = test_input($_POST["password"]);
    $email = test_input($_POST["email"]);
    }
    
    
    if( $name !== "" &&  $email !== "" && $Password!== ""){
    
        unset($_POST['confirmPassword'], $_POST['register-btn'], $_POST['create_admin'] );
        $_POST['password']= password_hash($_POST['password'], PASSWORD_DEFAULT);


if(isset($_POST['admin'])){
    $_POST['admin']=1;
    $user_id = create($table, $_POST);
    header('Location: ../../admin/user/index2.php');
}else{

    $_POST['admin']=0;
    $user_id = create($table, $_POST);
    $user = selectOne($table, ['id' => $user_id]);
 
    //dd($user);
    loginUser($user);
}

        
       //log user in

    }  
    
    
}
elseif(isset($_POST['login-btn'])){
    
    if(empty($_POST["login_username"])){
    $name_err = "Name is required!!!";  
    
    }
        elseif(empty($_POST["login_password"])){//password validation
            $password_err = "password is required!!!";  
            
            }

if ($_POST["login_username"] && $_POST["login_password"] !=='' ){

    $user = selectOne($table , ['username' => $_POST["login_username"]]);

 if($user && password_verify($_POST["login_password"], $user["password"] ) ){
    loginUser($user);

 }else{
    $password_err = "wrong Credential!"; 
 }
    
}

}

if(isset($_GET['del_id'])){
    adminOnly();
    $id = $_GET['del_id'];
   $delete = delete($table, $id);

header('Location: ../../admin/user/index2.php');
exit();

}

if(isset($_GET['id'])){

    $user = selectOne($table, ['id' => $_GET['id']]);
    
    $id = $user['id'];
    $name= $user['username'] ;
    $email =  $user['email'];
    $password =$user['password'] ;
    

    }

if(isset($_POST['update_user'])){//update edit part
    adminOnly();
    
    $id = $_POST['id'];
    $email_already = selectOne($table, ['email' => $_POST["email"]]);
    
if(empty($_POST["username"])){
$name_err = "Name is required!!!";  

}

elseif (is_numeric($_POST["username"])){
$name_err = "Name cannot be number!!!";
}
   
elseif ($email_already['id'] != $id){
$email_err = "Email already exist";      
}
         
elseif(empty($_POST["password"])){//password validation
$password_err = "password is required!!!";  

}
elseif(strlen($_POST["password"]) < 8 ){
    $password_err = "password must be at least 8 characters";    
}
elseif(! preg_match("/[a-z]/i" , $_POST["password"])){

    $password_err = "password must contain at least one letter";

}

elseif(! preg_match("/[0-9]/" , $_POST["password"])){
    
    $password_err = "password must contain at least one number";
}
elseif($_POST["password"] !== $_POST["confirmPassword"]){
    
    $password_err = "passwords must much!";
}else{
    
    

    $_POST['admin']= isset($_POST['admin']) ? 1: 0;
    unset($_POST['confirmPassword'], $_POST['update_user'],$_POST['id']);
    
    $_POST['password']= password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    
    $user_id = update($table , $id, $_POST);
    
    header('Location: ../../admin/user/index2.php');
    
    exit();
}


}
   


?>


