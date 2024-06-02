<?php
include("functions.php");
include("db.php");

// Check if we're loading an existing record for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT title, description FROM mytable WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $description = $row['description'];
    } else {
        echo "Record not found.";
        exit();
    }
}

// Check if the form is being submitted
if (isset($_POST['title']) && isset($_POST['description'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    if (isset($_POST['id'])) {
        // Update existing record
        $id = $_POST['id'];
        $sql = "UPDATE mytable SET title='$title', description='$description' WHERE id=$id";
    } else {
        // Insert new record
        $sql = "INSERT INTO mytable(title, description) VALUES ('$title', '$description')";
    }

    $result = $conn->query($sql);

    if ($result) {
        header("Location: index.php");
        exit(); // Stop further execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// PHP goes here!
?>

<!-- Header section  -->
<?php include("header.php") ?>

<!-- Main section  -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="edit.php" method="post">
                <?php if (isset($id)): ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php endif; ?>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($title) ? $title : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" rows="5" id="description" name="description"><?php echo isset($description) ? $description : ''; ?></textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- Footer section  -->
<?php include("footer.php") ?>
