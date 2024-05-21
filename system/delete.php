<?php
include 'database.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Prepare the SQL statement with a placeholder (?)
    $sql = "DELETE FROM crud WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        // Bind the parameter ($id) to the placeholder (?)
        // 'i' indicates that the bound parameter is an integer
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Check if the deletion was successful
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header('Location: data.php'); // Redirect to data.php after successful deletion
        } else {
            echo "No record found with the given ID"; // Handle case where no record was deleted
        }
    } else {
        die("Failed to prepare the SQL statement: " . mysqli_error($conn));
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>
