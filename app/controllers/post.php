<?php 
require('C:/xampp/htdocs/Blog/app/database/db2.php');

//include("C:/xampp/htdocs/Blog/app/include/middleware.php"); 
$table = 'post';

$topics = selectAll2('topics');
$posts = selectAll2($table);
$title_err = '';
$body_err = '';
$image_err = '';
$topic_err = '';

$id ='';
$title='';
$body = '';
$topic_id = '';
$published ='';

@$authores = selectOne2('user' , ['id' =>  $_SESSION['id']] );
//dd2($authores);




if(isset($_POST['add_posts'])){
    //adminOnly();

    $title_already = selectOne2($table, ['title' => $_POST["title"]]);

    unset($_POST['add_posts']);

    $_POST['user_id'] =  $_SESSION['id'];

    $_POST['published'] = isset($_POST['published']) ? 1 : 0;

    if(empty($_POST["title"])){
        $title_err = "title is required!!!";  
        
        }
        elseif(empty($_POST["body"])){
            $body_err = "Description is required!!!";  
            
        }
        elseif (isset($title_already)){

                $title_err = "title already exist";      
    
            }

        elseif(empty($_POST["topic_id"])){
    $topic_err = "topic is required!!!";  
    
}

elseif(empty($_FILES['image']['name'])){
    $image_err = "image required!";
}else{
    
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = 'C:/xampp/htdocs/Blog/asset/image/' . $image_name;
        $result = move_uploaded_file($_FILES['image']['tmp_name'] , $destination);
    
    
        $_POST['image'] =$image_name;
    
    
        $_POST['body'] =  htmlentities($_POST['body']);
    
            $post_id  = create2($table , $_POST);
            header('Location: ../../admin/post/index2.php');    

}
       
    }

if(isset($_GET['id'])){

$post = selectOne2($table, ['id' => $_GET['id']]);

$id = $post['id'];
$title= $post['title'] ;
$body =  $post['body'];
$topic_id =$post['topic_id'] ;
$published = $post['published'];

}


if(isset($_POST['update_post'])){
    //adminOnly();
    
    $id = $_POST['id'];
    
    $title_already = selectOne2($table, ['title' => $_POST["title"]]);
    
    $_POST['published'] = isset($_POST['published']) ? 1 : 0;


    //unset($_POST['update_post'], $_POST['id'] );

    $_POST['user_id'] =  $_SESSION['id'];
    
    if(empty($_POST["title"])){
        $title_err = "title is required!!!";  
        
        }

elseif ( $title_already['id'] != $id) {

    $title_err = "title already exist";      
}

    
     elseif(empty($_POST["body"])){
                $body_err = "body is required!!!";  
                
      }

elseif(empty($_POST["topic_id"])){
    $topic_err = "topic is required!!!";  
    
}

elseif(empty($_FILES['image']['name'])){
    $image_err = "image required!";
}else{
    unset($_POST['update_post'], $_POST['id'] );

    $image_name = time() . '_' . $_FILES['image']['name'];
    $destination = 'C:/xampp/htdocs/Blog/asset/image/' . $image_name;
    $result = move_uploaded_file($_FILES['image']['tmp_name'] , $destination);
    
    $_POST['image'] =$image_name;
    
    $_POST['body'] =  htmlentities($_POST['body']);
    
    
    $post_id = update2($table , $id, $_POST);
          
    header('Location: ../../admin/post/index2.php');
      
    exit();

}
      }

if(isset($_GET['del_id'])){
    //adminOnly();
        $id = $_GET['del_id'];
       $delete = delete2($table, $id);

    header('Location: ../../admin/post/index2.php');
    exit();
    
    }

if(isset($_GET['published']) && isset($_GET['p_id'])){
$published = $_GET['published'];
$p_id = $_GET['p_id'];

$update = update2($table , $p_id, ['published' => $published]);

header('Location: ../../admin/post/index2.php');   
exit();
}



    ?>