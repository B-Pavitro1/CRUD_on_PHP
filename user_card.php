<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <title>User Card</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <?php 
      $query = mysqli_query($conn,"SELECT * FROM userdata WHERE id='".$_GET['viewcardid']."'");
      foreach($query as $card){
      ?>
      <div class="card" style="width: 18rem;">
        <img src="<?php echo $card['image'] ?>" class="card-img-top" alt="user-image">
        <div class="card-body">
          <h5 class="card-title">Name: <?php echo $card['name']; ?></h5>
          <p class="card-text"><b>Email: </b><?php echo $card['email']; ?></p>
          <p class="card-text"><b>Phone: </b><?php echo $card['phone']; ?></p>
          <p class="card-text"><b>School: </b><?php echo $card['school']; ?></p>
          <p class="card-text"><b>Class: </b><?php echo $card['classname']; ?></p>
          <p class="card-text"><b>Rollno: </b><?php echo $card['rollno']; ?></p>
          <p class="card-text"><b>Gender: </b><?php echo $card['gender']; ?></p>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</body>

</html>