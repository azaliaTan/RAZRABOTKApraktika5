<?php 
include('assets/connect.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>5пр</title>
</head>
<body>
<div class="container">
<?php 


include('assets/header.php');

if(isset($_GET['page'])){
    $page=$_GET['page'];


    if($page=='add'){
        include('pages/add.php');
    }
}else {
    include('start.php');
}

include('assets/footer.php');

?>

</div>

    
</body>
</html>