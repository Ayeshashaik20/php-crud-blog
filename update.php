<?php

require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            header("Location: index.php"); // Redirect back to the user list
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid user ID.";
    }

    mysqli_close($conn);
} else {
    // If someone tries to access this page directly without submitting the form
    header("Location: index.php");
    exit();
}

?>