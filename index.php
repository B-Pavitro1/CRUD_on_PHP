<?php 
include("connection.php"); 

// Fetch data when editing
if(isset($_GET['id'])) {
    $query = mysqli_query($conn, "SELECT * FROM studentdata WHERE id='" . $_GET['id'] . "'");
    $fetch = mysqli_fetch_assoc($query);
}

// Delete user
if(isset($_GET['delid'])) {
    mysqli_query($conn, "DELETE FROM studentdata WHERE id='" . $_GET['delid'] . "'");
}

// Image upload and form submission
if (isset($_POST['submit']) || isset($_POST['update'])) {
    $imagePath = '';

    // Handle file upload if image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageSize = $_FILES['image']['size'];
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        if (in_array($imageExt, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif', 'jfif']) && $imageSize < 5000000) {
            $imagePath = 'uploads/' . uniqid('', true) . '.' . $imageExt;
            move_uploaded_file($imageTmpName, $imagePath);
        } else {
            echo "Invalid file type or file too large.";
            exit;
        }
    }

    // Insert or Update user data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $classname = $_POST['classname'];
    $rollno = $_POST['rollno'];
    $school = $_POST['school'];
    $gender = $_POST['gender'];

    if (isset($_POST['update'])) {
        // Update user data (include image if uploaded)
        $query = "UPDATE studentdata SET name='$name', email='$email', phone='$phone', classname='$classname', rollno='$rollno', school='$school', gender='$gender'";
        if ($imagePath) $query .= ", image='$imagePath'";
        $query .= " WHERE id='" . $_POST['id'] . "'";
    } else {
        // Insert new user data (include image)
        $query = "INSERT INTO studentdata (image, name, email, phone, classname, rollno, school, gender, created_at) VALUES ('$imagePath', '$name', '$email', '$phone', '$classname', '$rollno', '$school', '$gender', now())";
    }

    if (mysqli_query($conn, $query)) {
        echo "User data saved successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form - 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="container mt-4">
        <h2>Student Form</h2>
        <form method="post" enctype="multipart/form-data">
            <!-- User Image -->
            <div class="mb-3">
                <label for="image" class="form-label">User Image</label>
                <?php if (isset($fetch['image']) && !empty($fetch['image'])): ?>
                <img src="<?php echo $fetch['image']; ?>" width="100" height="100" alt="Current Image">
                <?php endif; ?>
                <input type="file" class="form-control" name="image">
            </div>
            <!-- User Info -->
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $fetch['name'] ?? ''; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" value="<?php echo $fetch['email'] ?? ''; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone" value="<?php echo $fetch['phone'] ?? ''; ?>"
                    pattern="^[6-9][0-9]{9}$" required>
            </div>
            <div class="mb-3">
                <label for="classname" class="form-label">Class</label>
                <input type="text" class="form-control" name="classname"
                    value="<?php echo $fetch['classname'] ?? ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="rollno" class="form-label">Roll Number</label>
                <input type="text" class="form-control" name="rollno" value="<?php echo $fetch['rollno'] ?? ''; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="school" class="form-label">School</label>
                <input type="text" class="form-control" name="school" value="<?php echo $fetch['school'] ?? ''; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label><br>
                <input type="radio" name="gender" value="Male" <?php if (isset($fetch['gender']) &&
                    $fetch['gender']=="Male" ) echo "checked" ; ?>> Male
                <input type="radio" name="gender" value="Female" <?php if (isset($fetch['gender']) &&
                    $fetch['gender']=="Female" ) echo "checked" ; ?>> Female
            </div>
            <div class="mb-3">
                <?php if (isset($fetch['id'])): ?>
                <input type="hidden" name="id" value="<?php echo $fetch['id']; ?>">
                <button class="btn btn-primary" type="submit" name="update">Update</button>
                <?php else: ?>
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <div class="container mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Class</th>
                    <th>Roll No.</th>
                    <th>School</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM studentdata");
                    while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                    <td><img src="<?php echo $row['image']; ?>" width="100" height="100" alt="Image"></td>
                    <td>
                        <?php echo $row['name']; ?>
                    </td>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                    <td>
                        <?php echo $row['phone']; ?>
                    </td>
                    <td>
                        <?php echo $row['classname']; ?>
                    </td>
                    <td>
                        <?php echo $row['rollno']; ?>
                    </td>
                    <td>
                        <?php echo $row['school']; ?>
                    </td>
                    <td>
                        <?php echo $row['gender']; ?>
                    </td>
                    <td>
                        <a href="?id=<?php echo $row['id']; ?>"><i class="far fa-edit"></i></a>
                        <a href="?delid=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                        <a href="student_card.php?viewcardid=<?php echo $row['id'] ?>"><i class="far fa-eye"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
