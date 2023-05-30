<?php
@session_start();
require('connect.php');

function dd($value)//to be deleted
{ 
echo "<pre>", print_r($value, true),"<pre>";
die(); 
}

function executeQuery($sql, $data){

    global $conn;
    $stmt =$conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);// to avoid direct sql injection
    $stmt->execute();
    return $stmt;

}

function selectAll($table , $conditions = []){
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
$stmt = executeQuery($sql , $conditions);
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
return $records;
}

}

function selectOne($table , $conditions){
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
$stmt =  executeQuery($sql , $conditions);
$records = $stmt->get_result()->fetch_assoc();
return $records;

}

function create($table , $data){
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

    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}

function update($table ,$id, $data){

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

    $stmt = executeQuery($sql, $data);
  
    return $stmt->affected_rows;


}

function delete($table , $id){
    global $conn;
//$sql = "DELETE  user set username=? , admin=? , email=? , password=? WHERE ID=?";

$sql = "DELETE FROM $table  WHERE id=?";


$stmt = executeQuery($sql, ['id'=>$id]);
  
return $stmt->affected_rows;


}

function getAllUser($start, $limit){
    global $conn;

    $sql = "SELECT *  FROM user  LIMIT ?, ?";
    $stmt = executeQuery($sql, [$start, $limit]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function countUser() {
    global $conn;
    $sql = "SELECT COUNT(*) as count FROM user WHERE admin IN (?, ?)";

    $values = [0, 1];
    $stmt = executeQuery($sql, $values);
    $result = $stmt->get_result()->fetch_assoc();
    $count = $result['count'];

    return $count;
}




$conditions =[
    'admin' => 0,
    'username' => 'kumsa',
    'email' => 'janjawid@gmail.com',
    'password' => '4321'
];


//$users = create('user' , $conditions);
//$users = delete('user' , 5 );
//dd($users);

?>