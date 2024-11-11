<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add_destination'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $details = mysqli_real_escape_string($conn, $_POST['details']);
   $description = mysqli_real_escape_string($conn, $_POST['description']);
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select_product_name = mysqli_query($conn, "SELECT name FROM `destinations` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'destinatio name already exist!';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `destinations`(name, details, description, image) VALUES('$name', '$details', '$description', '$image')") or die('query failed');

      if($insert_product){
         if($image_size > 2000000){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'product added successfully!';
         }
      }
   }

}
if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];
    $select_delete_image = mysqli_query($conn, "SELECT image FROM `destinations` WHERE id = '$delete_id'") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
    unlink('uploaded_img/'.$fetch_delete_image['image']);
    mysqli_query($conn, "DELETE FROM `destinations` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_destinations.php');
 } 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- tautan file css admin khusus -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="add-products">

    <form action="" method="POST" enctype="multipart/form-data">
      <h3>Add Destination</h3>
      <input type="text" class="box" required placeholder="Add Travel" name="name">
      <input type="text" class="box" required placeholder="Enter Tourist Destination Details" name="details">
      <textarea name="description" class="box" required placeholder="Enter a tourist destination description" cols="30" rows="10"></textarea>
      <input type="file" accept="image/jpg, image/jpeg, image/png" required class="box" name="image">
      <input type="submit" value="Add Destination" name="add_destination" class="btn">
   </form>

</section>

<section class="show-products">

   <div class="box-container">

   <?php
         $select_destinations = mysqli_query($conn, "SELECT * FROM `destinations`") or die('query failed');
         if(mysqli_num_rows($select_destinations) > 0){
            while($fetch_destinations = mysqli_fetch_assoc($select_destinations)){
      ?>
      <div class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_destinations['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_destinations['name']; ?></div>
         <div class="details"><?php echo $fetch_destinations['details']; ?></div>
         <div class="description"><?php echo $fetch_destinations['description']; ?></div>
         <a href="admin_destinations.php?delete=<?php echo $fetch_destinations['id']; ?>" class="delete-btn" onclick="return confirm('Delete this destination?');">Delete</a>
         <a href="admin_update_product.php?update=<?php echo $fetch_destinations['id']; ?>" class="option-btn">Update</a>
      </div>
      <?php
            }
         } else {
            echo '<p class="empty">No destinations added yet!</p>';
         }
      ?>
   </div>
   
</section>

<script src="js/admin_script.js"></script>

</body>
</html>