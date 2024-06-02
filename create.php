<?php

include("functions.php");

if(isset($_POST['title']) && $_POST['description']) {
  include("db.php");
  $title = $_POST['title'];
  $description = $_POST['description'];
  $sql = "INSERT INTO mytable(title, description) VALUES ('$title', '$description')";
  $result = $conn->query($sql);
  
}
// PHP goes here!

?>

    <!-- Header section  -->
<?php include("header.php") ?>

    <!-- Main section  -->
    <div class="container">
      <div class="row">
        <?php 
          if(isset($result)){
            if ($result) {
              echo "New record created successfully";
              header("Location: /var/www/html/index.php");
            } else {
              echo "Error: ". $sql. "<br>". $conn->error;
            }
          }
        ?>
        <div class="col-md-12">
        <form action="create.php" method="post">
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <textarea type="text" class="form-control" rows=5 id="description" name="description"> </textarea>
          </div>
         
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
        </div>
      </div>
    </div>

    <!-- Footer section  -->
<?php include("footer.php") ?>