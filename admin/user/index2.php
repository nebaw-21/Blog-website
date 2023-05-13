<?php include('C:/xampp/htdocs/Blog/app/controllers/users.php');

 adminOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin section manage-topics</title>

    <!--font Awsome-->
    <link rel="stylesheet" href="../../asset/css/style.css">

<link rel="stylesheet" href="../../asset/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- admin header -->
<?php include("../../app/include/adminHeader.php"); ?>


 <!-- Admin page wrapper-->
<div class="admin-wrapper">

<!--left side bar-->
<?php include("../../app/include/adminSideBar.php"); ?>
<!--left side bar-->



<!--admin content-->
<div class="admin-content">
<div class="button-group">
    <a href="create.php" class="btn btn-big">Add user</a>
    <a href="index2.php" class="btn">Manage user</a>
</div>
 
<div class="content">
    <h2 class="page-title">Manage users</h2>
<table>
    <thead>
        <th>N</th>
        <th>username</th>
        <th>Email</th>
        <th colspan="2">Action</th>
    </thead>
<tbody>

<?php foreach($admin_users as $key => $admin_user): ?>

<tr> 

    <td><?php echo $key +1; ?></td>
    <td><?php echo $admin_user['username']; ?></td>
    <td><?php echo $admin_user['email']; ?></td>
    <td><a href="edit.php?id=<?php echo $admin_user['id']; ?>" class="edit">edit</a></td>
   <td><a href="index2.php?del_id=<?php echo $admin_user['id']; ?>" class="delete">delete</a></td>
   
</tr>

<?php endforeach; ?>





</tbody>

</table>


</div>


</div>

<!--admin content-->

</div>
 <!-- Admin page wrapper-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.min.js" integrity="sha512-fYjSocDD6ctuQ1QGIo9+Nn9Oc4mfau2IiE8Ki1FyMV4OcESUt81FMqmhsZe9zWZ6g6NdczrEMAos1GlLLAipWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
 
    <script src="../../asset/js/script.js"></script>
</body>
</html>