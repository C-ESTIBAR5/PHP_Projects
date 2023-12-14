<?php
$database_name = 'estibar';
$connection = new mysqli('localhost', 'root', '', $database_name);

if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
}

// Create
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
      
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];

        $insert_sql = "INSERT INTO Instructor (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
        $connection->query($insert_sql);
    }
}

// Read
$select_sql = "SELECT * FROM Instructor";
$result = $connection->query($select_sql);

// Update Instructor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update-instructor'])) {
       
        $updateInstructorId = $_POST['update-instructor-id'];
        $newFirstName = $_POST['update-first-name'];
        $newLastName = $_POST['update-last-name'];
        $newEmail = $_POST['update-email'];

        $update_instructor_sql = "UPDATE Instructor SET first_name='$newFirstName', last_name='$newLastName', email='$newEmail' WHERE id='$updateInstructorId'";
        $connection->query($update_instructor_sql);
    }
}

// Delete Instructor
if (isset($_GET['delete-instructor'])) {
    $deleteInstructorId = $_GET['delete-instructor'];

    $delete_instructor_sql = "DELETE FROM Instructor WHERE id='$deleteInstructorId'";
    $connection->query($delete_instructor_sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/instructor.css">
</head>
<body>

<div class="container mt-5">
<a href="index.html" class="btn btn-primary mb-3">Home</a>
    <h2>Instructor Management</h2>
    <form method="post" action="">
        <h3>Create Instructor</h3>
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" name="create" class="btn btn-primary">Create Instructor</button>
    </form>

    <hr>

    <!-- Display Instructors -->
<h3>Instructors</h3>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['first_name']}</td>
                <td>{$row['last_name']}</td>
                <td>{$row['email']}</td>
                <td>
                    <a href='instructor.php?delete-instructor={$row['id']}' class='btn btn-danger'>Delete</a>
                </td>
              </tr>";
    }
    ?>
    </tbody>
</table>

<h3>Update Instructor</h3>
<form method="post" action="">
    <div class="form-group">
        <label for="update-instructor-id">Instructor ID:</label>
        <input type="text" name="update-instructor-id" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="update-first-name">New First Name:</label>
        <input type="text" name="update-first-name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="update-last-name">New Last Name:</label>
        <input type="text" name="update-last-name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="update-email">New Email:</label>
        <input type="email" name="update-email" class="form-control" required>
    </div>
    <button type="submit" name="update-instructor" class="btn btn-warning">Update Instructor</button>
</form>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>

<?php
$connection->close();
?>
