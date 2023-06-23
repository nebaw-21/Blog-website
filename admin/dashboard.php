<?php
include('C:/xampp/htdocs/Blog/app/controllers/post.php');
adminOnly();

// Retrieve most viewed posts from the database
$MostViewedPosts = getPostTitleAndNumberOfView();
$MostLikedPosts= getPostTitleAndNumberOfLikes();
$NumberOfPosts = NumberOfPosts();



// Extract the post titles and view counts into separate arrays
$mostViewedLabels = array();
$mostViewedData = array();
foreach ($MostViewedPosts as $post) {
    $mostViewedLabels[] = $post['title'];
    $mostViewedData[] = $post['NumberOfViews'];
}

// Set up data for most liked posts (placeholder data for now)
$mostLikedLabels  = array();
$mostLikedData  = array();
foreach ($MostLikedPosts as $post) {
    $mostLikedLabels[] = "All post";
    $mostLikedData[] = $post['count'];
}

$NumberOfPostslables= array();
$NumberOfPostsData  = array();
foreach ($NumberOfPosts as $post) {
    $NumberOfPostslables[] = "All post";
    $NumberOfPostsData[] = $post['count'];
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_section_Dashboard</title>

    <!--font Awsome-->
    <link rel="stylesheet" href="../asset/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/admin.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  
<!-- admin header -->
<?php include("C:/xampp/htdocs/Blog/app/include/adminHeader2.php"); ?>

 <!-- Admin page wrapper-->
<div class="admin-wrapper">

<!--left side bar-->
<?php include("C:/xampp/htdocs/Blog/app/include/adminSideBar2.php"); ?>
<!--left side bar-->


<!--admin content-->
<div class="admin-content">

 
<div class="content">
    <h2 class="page-title">Dashboard page</h2>


    <div class="row">
    <div class="col-md-6">
        <h3>Most Viewed Posts</h3>
        <canvas id="mostViewedChart"></canvas>
    </div>
    <div class="col-md-6">
        <h3>Number of likes</h3>
        <canvas id="mostLikedChart"></canvas>
    </div>
</div>

<div class="col-md-6">
        <h3>Number of Posts</h3>
        <canvas id="NumberOfChart"></canvas>
    </div>
</div>


</div>

</div>

<!--admin content-->

</div>
 <!-- Admin page wrapper-->
<script>
// Create the most viewed posts chart
var mostViewedCtx = document.getElementById('mostViewedChart').getContext('2d');
var mostViewedChart = new Chart(mostViewedCtx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($mostViewedLabels); ?>,
        datasets: [{
            label: 'Most Viewed Posts',
            data: <?php echo json_encode($mostViewedData); ?>,
            backgroundColor: '#007bff'
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

// Create the most liked posts chart
var mostLikedCtx = document.getElementById('mostLikedChart').getContext('2d');
var mostLikedChart = new Chart(mostLikedCtx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($mostLikedLabels); ?>,
        datasets: [{
            label: 'Number of likes',
            data: <?php echo json_encode($mostLikedData); ?>,
            backgroundColor: '#ff6b6b'
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});



var mostLikedCtx = document.getElementById('NumberOfChart').getContext('2d');
var mostLikedChart = new Chart(mostLikedCtx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($NumberOfPosts); ?>,
        datasets: [{
            label: 'Number of posts',
            data: <?php echo json_encode($NumberOfPostsData); ?>,
            backgroundColor: '#ff6b6b'
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});



</script>

 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.min.js" integrity="sha512-fYjSocDD6ctuQ1QGIo9+Nn9Oc4mfau2IiE8Ki1FyMV4OcESUt81FMqmhsZe9zWZ6g6NdczrEMAos1GlLLAipWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
 
 <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
 
 
 <script src="../asset/js/script.js"></script>

</body>
</html>