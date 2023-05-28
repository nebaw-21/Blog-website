<?php 

require('C:/xampp/htdocs/Blog/app/database/db2.php');
include("C:/xampp/htdocs/Blog/app/include/middleware.php"); 
$table = 'topics';

$id= '';
$name='';
$description = '';
$description_err= '';
$name_err = '';

$topics = selectAll2($table);

if(isset($_POST["add_topic"])){
    adminOnly();

  $topic_already = selectOne2($table, ['name' => $_POST["name"]]);

    unset($_POST["add_topic"]);

    if(empty($_POST["name"])){
        $name_err = "Topic name is required!!!";  
        
        }
     elseif(empty($_POST["Description"])){//password validation
                $description_err = "Description is required!!!";  
                
      }
      
      elseif (isset($topic_already)){
        $name_err = "topic already exist";      
        }

      elseif ($_POST["name"] && $_POST["Description"] !=='' ){

    $topic_id = create2($table , $_POST);
                    
    header('Location: ../../admin/topic/index2.php');
                    
   exit();
     
      }
}
 
if(isset($_GET['id'])){
    $id = $_GET['id'];
   $topic = selectOne2($table, ['id' => $id]);
   $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];

}

if(isset($_GET['del_id'])){
  adminOnly();
    $id = $_GET['del_id'];
   $delete = delete2($table, $id);
   $_SESSION['type']= 'success';
$_SESSION['message']= 'you are delete successfully';
header('Location: ../../admin/topic/index2.php');
exit();

}

if(isset($_POST['update_topic'])){
  adminOnly();

  $topic_already = selectOne2($table, ['name' => $_POST["name"]]);

$id = $_POST['id'];
unset($_POST['update_topic'], $_POST['id'] );

if(empty($_POST["name"])){
    $name_err = "Topic name is required!!!";  
    
    }
    elseif ($topic_already['id'] != $id){
      $name_err = "topic already exist";      
      }
 elseif(empty($_POST["Description"])){
            $description_err = "Description is required!!!";  
            
  }
  elseif ($_POST["name"] && $_POST["Description"] !=='' ){
  
      $topic_id = update2($table , $id, $_POST);
      
      $_SESSION['type']= 'success';
      $_SESSION['message']= 'you are update successfully';
      header('Location: ../../admin/topic/index2.php');
  
exit();
  }
}



?>