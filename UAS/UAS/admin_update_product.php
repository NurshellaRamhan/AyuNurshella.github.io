<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['update_destination'])){

   $update_id = $_POST['update_id'];
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $details = mysqli_real_escape_string($conn, $_POST['details']);
   $description = mysqli_real_escape_string($conn, $_POST['description']);

   // Update data kecuali gambar
   mysqli_query($conn, "UPDATE `destinations` SET name = '$name', details = '$details', description = '$description' WHERE id = '$update_id'") or die('query failed');

   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;
   $old_image = $_POST['update_image'];

   if(!empty($image)){
      if($image_size > 2000000){
         $message[] = 'Image file size is too large!';
      }else{
         // Update gambar jika ada gambar baru
         mysqli_query($conn, "UPDATE `destinations` SET image = '$image' WHERE id = '$update_id'") or die('query failed');
         move_uploaded_file($image_tmp_name, $image_folder);
         unlink('uploaded_img/'.$old_image);
         $message[] = 'Image updated successfully!';
      }
   }

   $message[] = 'Destination updated successfully!';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Destination</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="update-product">

<?php
if(isset($_GET['update'])){
   $update_id = $_GET['update'];
   $select_destinations = mysqli_query($conn, "SELECT * FROM `destinations` WHERE id = '$update_id'") or die('query failed');
   if(mysqli_num_rows($select_destinations) > 0){
      while($fetch_destinations = mysqli_fetch_assoc($select_destinations)){
?>

<form action="" method="post" enctype="multipart/form-data">
   <img src="uploaded_img/<?php echo $fetch_destinations['image']; ?>" class="image" alt="">
   <input type="hidden" value="<?php echo $fetch_destinations['id']; ?>" name="update_id">
   <input type="hidden" value="<?php echo $fetch_destinations['image']; ?>" name="update_image">
   <input type="text" class="box" value="<?php echo $fetch_destinations['name']; ?>" required placeholder="Update destination name" name="name">
   <input type="text" class="box" value="<?php echo $fetch_destinations['details']; ?>" required placeholder="Update destination details" name="details">
   <textarea name="description" class="box" required placeholder="Update destination description" cols="30" rows="10"><?php echo $fetch_destinations['description']; ?></textarea>
   <input type="file" accept="image/jpg, image/jpeg, image/png" class="box" name="image">
   <input type="submit" value="Update Destination" name="update_destination" class="btn">
   <a href="admin_destinations.php" class="option-btn">Go back</a>
</form>

<?php
      }
   } else {
      echo '<p class="empty">No destination found with the given ID</p>';
   }
} else {
   echo '<p class="empty">No destination selected for update</p>';
}
?>

</section>

<script src="js/admin_script.js"></script>

</body>
</html>
