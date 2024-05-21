<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartFlood System</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section class="data">
    <div class="container my-3">
    <?php
        $dbHost = 'localhost';
        $dbUser = 'root';
        $dbPass = '';
        $dbName = 'login_register'; // Replace with your actual database name

        // Establish a connection to the database
        $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

        // Check if the connection was successful
        if (!$conn) {
            die("<div class='alert alert-danger'>Connection failed: " . mysqli_connect_error() . "</div>");
        }

        $id = $_GET['updateid'];

        // Retrieve existing data
        $sql = "SELECT * FROM crud WHERE id=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        // Close the statement
        mysqli_stmt_close($stmt);

        // Set default values to form fields
        $date = $row['date'];
        $location = $row['location'];
        $waterlevel = $row['waterlevel'];
        $rainintensity = $row['rainintensity'];
        $temperature = $row['temperature'];
        $flow = $row['flow']; // Fixed missing semicolon

        if (isset($_POST["submit"])) {
            $date = $_POST["date"];
            $location = $_POST["location"];
            $waterlevel = $_POST["waterlevel"];
            $rainintensity = $_POST["rainintensity"];
            $temperature = $_POST["temperature"];
            $flow = $_POST["flow"];

            // Prepare the SQL statement
            $sql = "UPDATE crud SET date=?, location=?, waterlevel=?, rainintensity=?, temperature=?, flow=? WHERE id=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 'ssssssi', $date, $location, $waterlevel, $rainintensity, $temperature, $flow, $id);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                header("Location: data.php");
                exit(); // Ensure no further code is executed
            } else {
                die("<div class='alert alert-danger'>" . mysqli_error($conn) . "</div>");
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        }

        // Close the connection
        mysqli_close($conn);
    ?>
     <form method="post">
        <div class="form-group">
            <label>Date</label>
            <input type="text" class="form-control" placeholder="Enter date (mm/dd/yy):" name="date" value="<?php echo htmlspecialchars($date); ?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Location</label>
            <input type="text" class="form-control" placeholder="Enter location:" name="location" value="<?php echo htmlspecialchars($location); ?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Water Level</label>
            <input type="text" class="form-control" placeholder="Enter water level" name="waterlevel" value="<?php echo htmlspecialchars($waterlevel); ?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Rain intensity</label>
            <input type="text" class="form-control" placeholder="Enter rain intensity (LOW, MID, HIGH):" name="rainintensity" value="<?php echo htmlspecialchars($rainintensity); ?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Temperature</label>
            <input type="text" class="form-control" placeholder="Enter Temperature:" name="temperature" value="<?php echo htmlspecialchars($temperature); ?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Flow Rate</label>
            <input type="text" class="form-control" placeholder="Enter Flow rate:" name="flow" value="<?php echo htmlspecialchars($flow); ?>" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
     </form>
    </div>
</section>
</body>
</html>
