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
        $birthdate = $_POST['birthdate'];
        $address = $_POST['address'];

        $insert_sql = "INSERT INTO Student (first_name, last_name, birthdate, address) VALUES ('$first_name', '$last_name', '$birthdate', '$address')";
        $connection->query($insert_sql);
    }
}

// Read
$select_sql = "SELECT * FROM Student";
$result = $connection->query($select_sql);

// Update Student
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update-student'])) {
       
        $updateStudentId = $_POST['update-student-id'];
        $newFirstName = $_POST['update-first-name'];
        $newLastName = $_POST['update-last-name'];
        $newBirthdate = $_POST['update-birthdate'];
        $newAddress = $_POST['update-address'];

        $update_student_sql = "UPDATE Student SET first_name='$newFirstName', last_name='$newLastName', birthdate='$newBirthdate', address='$newAddress' WHERE id='$updateStudentId'";
        $connection->query($update_student_sql);
    }
}

// Delete Student
if (isset($_GET['delete-student'])) {
    $deleteStudentId = $_GET['delete-student'];

    $delete_student_sql = "DELETE FROM Student WHERE id='$deleteStudentId'";
    $connection->query($delete_student_sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/student.css">
</head>
<body>
<div class="container mt-5">
<a href="index.html" class="btn btn-primary mb-3">Home</a>
    <h2>Student Management</h2>
    <form method="post" action="">
        <h3>Create Student</h3>
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate:</label>
            <input type="date" name="birthdate" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <button type="submit" name="create" class="btn btn-primary">Create Student</button>
    </form>
    
    <hr>

    <!-- Display Students -->
<h3>Students</h3>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Birthdate</th>
        <th>Address</th>
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
                <td>{$row['birthdate']}</td>
                <td>{$row['address']}</td>
                <td>
                    <a href='student.php?delete-student={$row['id']}' class='btn btn-danger'>Delete</a>
                </td>
              </tr>";
    }
    ?>
    </tbody>
</table>

<h3>Update Student</h3>
<form method="post" action="">
    <div class="form-group">
        <label for="update-student-id">Student ID:</label>
        <input type="text" name="update-student-id" class="form-control" required>
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
        <label for="update-birthdate">New Birthdate:</label>
        <input type="date" name="update-birthdate" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="update-address">New Address:</label>
        <input type="text" name="update-address" class="form-control" required>
    </div>
    <button type="submit" name="update-student" class="btn btn-warning">Update Student</button>
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
