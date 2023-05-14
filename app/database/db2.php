<?php
session_start();
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

function  getPublishedPost(){
    global $conn;
    $sql = "SELECT p.* ,u.username FROM post AS p JOIN user AS u ON p.user_id=u.id WHERE p.published=? ";
    
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



function  getTopicId ($topic_id){
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




?>