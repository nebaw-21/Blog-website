<?php
@session_start();
require('connect.php');

function dd2($value)//to be deleted
{ 
echo "<pre>", print_r($value, true),"<pre>";
die(); 
}

function executeQuery2($sql, $data){

    global $conn;
    $stmt =$conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);// to avoid direct sql injection
    $stmt->execute();
    return $stmt;
}

function selectAll2($table , $conditions = []){
    global $conn;
    $sql = "SELECT* FROM $table";
if(empty($conditions)){

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}else{
    $i =0;
foreach($conditions as $key => $value){
    if($i===0){
        $sql = $sql . " WHERE  $key=?";
        
    } else{
        $sql = $sql . " AND $key = ?";
    }
$i++;
}
$stmt = executeQuery2($sql , $conditions);
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;
}

}

function selectOne2($table , $conditions){
    global $conn;
    $sql = "SELECT* FROM $table";

    $i =0;
foreach($conditions as $key => $value){
    if($i===0){
        $sql = $sql . " WHERE  $key=?";
        
    } else{
        $sql = $sql . " AND $key = ?";
    }
$i++;
}
$sql = $sql . " LIMIT 1";
$stmt =  executeQuery2($sql , $conditions);
$records = $stmt->get_result()->fetch_assoc();
return $records;

}

function create2($table , $data){
    global $conn;
//$sql = "insert into user set username=? , admin=? , email=? , password=?";

$sql = "INSERT INTO $table SET";

$i=0;
foreach($data as $key => $value){
        if($i===0){
            $sql = $sql . "  $key=?";
            
        } else{
            $sql = $sql . ", $key = ?";
        }
    $i++;
    }

    $stmt = executeQuery2($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}

function update2($table ,$id, $data){

    global $conn;
    
//$sql = "UPDATE into user set username=? , admin=? , email=? , password=?" WHERE ID =?;

$sql = "UPDATE  $table SET";

$i=0;
foreach($data as $key => $value){
        if($i===0){
            $sql = $sql . "  $key= ?";
            
        } else{
            $sql = $sql . ", $key = ?";
        }
    $i++;
    }
    $sql = $sql . " WHERE id=?";
    $data['id']= $id;

    $stmt = executeQuery2($sql, $data);
  
    return $stmt->affected_rows;

}

function delete2($table , $id){
    global $conn;
//$sql = "DELETE  user set username=? , admin=? , email=? , password=? WHERE ID=?";

$sql = "DELETE FROM $table  WHERE id=?";


$stmt = executeQuery2($sql, ['id'=>$id]);
  
return $stmt->affected_rows;


}
function  getPublishedPost(){//display recent posts
    global $conn;
    $sql = "SELECT p.*, u.username 
    FROM post AS p 
    JOIN user AS u ON p.user_id = u.id 
    WHERE p.published = ?
    ORDER BY  DATE( p.created_at) DESC LIMIT 4";
    
    $stmt = executeQuery2($sql , ['published' => 1] );
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;
}

function getPublishedPost2($start, $limit ) { //display posts by pagination
    global $conn;

    $values = [0, 1];
    $sql = "SELECT p.*, u.username FROM post AS p JOIN user AS u ON p.user_id = u.id WHERE p.published IN (?, ?)  LIMIT $start, $limit";
    $stmt = executeQuery2($sql, $values);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getPublishedPost21() {//count the number of posts in the database
    global $conn;
    $sql = "SELECT COUNT(*) as count FROM post WHERE published IN (?, ?) ";

    $values = [0, 1];
    $stmt = executeQuery2($sql,$values );
    $result = $stmt->get_result()->fetch_assoc();
    $count = $result['count'];

    return $count;
}

function  getPublishedPost3(){//select published posts
    global $conn;
    $sql = "SELECT p.*, u.username 
    FROM post AS p 
    JOIN user AS u ON p.user_id = u.id 
    WHERE p.published = ? ";
    
    $stmt = executeQuery2($sql , ['published' => 1] );
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;
}

function  getMostNumberOfPublishedPost(){
    global $conn;
    $sql = "SELECT post.*, user.username, view_count.NumberOfViews
    FROM post
    INNER JOIN user ON post.user_id = user.id 
    INNER JOIN view_count ON post.id = view_count.post_id
    WHERE post.published = ?
    ORDER BY view_count.NumberOfViews DESC LIMIT 4;";

    $stmt = executeQuery2($sql , ['published' => 1] );
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;

}

function getPostTitleAndNumberOfView(){
    global $conn;
$sql = "SELECT post.*, view_count.NumberOfViews FROM Post
INNER JOIN view_count ON post.id = view_count.post_id
WHERE post.published = ?
    ORDER BY view_count.NumberOfViews DESC LIMIT 5;";

$stmt = executeQuery2($sql , ['published' => 1] );
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;

}



function getNumberOfLikes( $post_id){

    global $conn;
    $sql = "SELECT COUNT(*) as count FROM like_table WHERE post_id =? "; 
    
    $stmt = executeQuery2($sql , ['post_id' => $post_id] );
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;
}

function getPostTitleAndNumberOfLikes(){
    global $conn;
$sql ="SELECT post.title, COUNT(like_table.post_id) as count FROM Post
INNER JOIN like_table ON post.id = like_table.post_id
WHERE post.published = ?
ORDER BY count DESC LIMIT 5;";

$stmt = executeQuery2($sql , ['published' => 1] );
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;

}



function getNumberOfViews( $post_id){

    global $conn;
    $sql = "SELECT NumberOfViews FROM view_count WHERE post_id =? "; 
    
    $stmt = executeQuery2($sql , ['post_id' => $post_id] );
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;
}

function getNumberOfComments($post_id){

    global $conn;
    $sql = "SELECT COUNT(*) as count FROM commet WHERE post_id =? "; 
 $stmt = executeQuery2($sql , ['post_id' => $post_id] );
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;
}

function  getTopicId ($topic_id){//to display related posts
    global $conn;
    $sql = "SELECT p.* ,u.username FROM post AS p JOIN user AS u ON p.user_id=u.id WHERE p.published=? AND topic_id=?";
    
    $stmt = executeQuery2($sql , ['published' => 1,'topic_id' => $topic_id ]);
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;
}

function   getUserNameForComment($post_id){
    global $conn;
    $sql = "SELECT c.* ,u.username FROM commet AS c JOIN user AS u ON c.user_id=u.id WHERE c.post_id=?";
    
    $stmt = executeQuery2($sql , ['post_id'=>$post_id ]);
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;
}

function  searchPost($term){

$match ='%' . $term . '%';

    global $conn;
    $sql = 
    "SELECT p.* ,u.username 
    FROM post AS p 
    JOIN user AS u
    ON p.user_id=u.id 
   WHERE p.published=?
   AND p.title LIKE ? 
   OR p.body LIKE ? ";
    
    $stmt = executeQuery2($sql , ['published' => 1, 'title'=>$match, 'body'=>$match] );
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;
}

function NumberOfPosts(){
    global $conn;
$sql ="SELECT user.*, COUNT(post.user_id) as count FROM Post
INNER JOIN user ON post.user_id = user.id
WHERE post.published = ?
ORDER BY count DESC LIMIT 5;";

$stmt = executeQuery2($sql , ['published' => 1] );
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;

}




?>