<?php
session_start();
 include('C:/xampp/htdocs/Blog/app/controllers/post.php');
 adminOnly();

 if(isset($_POST["limit-records"])){
    $value =$_POST["limit-records"];

    setcookie("page_limit", $value, time() + (86400 * 30) );
    
    //dd2($_COOKIE["page_limit$limit"]);

    $limit = $_COOKIE["page_limit"] ;
 }else{
    $limit=1000;
 
 }


 if(isset($_GET['page'])){
    $limit = $_COOKIE["page_limit"] ;
    $page = $_GET['page'];
 }else{
    $page =1;
 }

 //dd2($page);
 $start = ($page - 1) * $limit  ;
 //dd2($start);

 $posts = getPublishedPost2($start ,$limit );

 $total = getPublishedPost21();//get total number of records

 //dd2($total);
 $pages = ceil( $total /$limit);
 //dd2($pages);

 $Previous = max($page - 1, 1);
 $Next = min($page + 1, $pages);

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
	<script type="text/javascript" src="../library/js/jquery-3.2.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="../library/css/bootstrap.min.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- admin header -->
<?php include("../../app/include/adminHeader.php"); ?>

<div class=" text-center">
    <a href="create.php" class=" btn btn-primary center">Add post</a>
    <a href="index2.php" class="btn btn-primary">Manage post</a>
</div>

<h2 class=" text-center page-title">Manage posts</h2>

<div class="container well">

		<div class="row">
			<div class="col-md-10">
				<nav aria-label="Page navigation">
					<ul class="pagination ">

				    <li class="page-item disabled">
				      <a href="index2.php?page=<?= $Previous; ?>" aria-label="Previous">
				        <span class="page-link"  aria-hidden="true">&laquo; Previous</span>
				      </a>

				    </li>

                    <?php for($i = 1; $i<= $pages; $i++) : ?>
                        
                        <li class="page-item ">
                        <?php echo "<a class=\"page-link\" href='index2.php?page=".$i."'>".$i."</a>"; ?>
                        </li>

                        <?php endfor; ?>

				    <li class="page-item disabled">
				      <a href="index2.php?page=<?= $Next; ?>" aria-label="Next">
				        <span class="page-link" aria-hidden="true">Next &raquo;</span>
				      </a>

				    </li>
				  </ul>
				</nav>
                
			</div>
            <div class="text-right" style="margin-top: 20px; " class="col-md-2">
				<form method="post" action="index2.php">
						<select name="limit-records" id="limit-records">
							<option disabled="disabled" selected="selected">---Limit Records---</option>
							<?php foreach([5,10,15,25,100] as $limit): ?>
								<option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
							<?php endforeach; ?>
						</select>
					</form>
				</div>
		</div>

		<div style="height: 600px; overflow-y: auto;">
			<table id="" class="table table-striped table-bordered">
	        	<thead>
	                <tr>
                    <th>N</th>
                    <th>Title</th>
                    <th>Authors</th>
                     <th colspan="3">Action</th>
	              	</tr>
	          	</thead>
	        	<tbody>
                <?php foreach($posts as $key => $post): ?>

<tr> 

    <td><?php echo $post['id']; ?></td>
    <td><?php echo $post['title']; ?></td>
    <td> <?php echo  $post['username'] ?> </td>
    <td><a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-success">edit</a></td>
    <td><a href="index2.php?del_id=<?php echo $post['id']; ?>" class="btn btn-danger">delete</a></td>


<?php if($post['published']): ?> <!-- result will be 0 or 1 -->
 <td> <a href="edit.php?published=0&p_id=<?php echo $post['id'] ?>" class="btn btn-warning">Unpublish</a></td>

<?php else:?>
    <td><a href="edit.php?published=1&p_id=<?php echo $post['id'] ?>" class="btn btn-success">Publish</a></td>
<?php endif; ?>

</tr>

<?php endforeach;?>
	        	</tbody>
      		</table>
      		
		</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.min.js" integrity="sha512-fYjSocDD6ctuQ1QGIo9+Nn9Oc4mfau2IiE8Ki1FyMV4OcESUt81FMqmhsZe9zWZ6g6NdczrEMAos1GlLLAipWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="../../asset/js/script.js"></script>
    
    <script type="text/javascript">

	$(document).ready(function(){
		$("#limit-records").change(function(){
			$('form').submit();
		})
	})
</script>
</body>
</html>
