<?php
include 'database.php';
?>

<!DOCTYPE html>
<html>
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

<section class="sub-header">
    <nav>
        <a href="index.php"><img src="images/logo.png"></a>
        <div class="nav-links">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="services.php">SERVICES</a></li>
                <li><a href="data.php">DATA</a></li>
            </ul>
        </div>
    </nav>
    <h1>Data</h1>
</section>    

<!--Data-->
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

        if (isset($_POST["submit"])) {
            $date = $_POST["date"];
            $location = $_POST["location"];
            $waterlevel = $_POST["waterlevel"];
            $rainintensity = $_POST["rainintensity"];
            $temperature = $_POST["temperature"];
            $flow = $_POST["flow"];

            $errors = array();
            
            // Check for validation errors (example checks)
            if (empty($date)) {
                $errors[] = "Date is required.";
            }
            if (empty($location)) {
                $errors[] = "Location is required.";
            }
            // Add more validation checks as necessary

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO crud (date, location, waterlevel, rainintensity, temperature, flow) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "ssssss", $date, $location, $waterlevel, $rainintensity, $temperature, $flow);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>Data submitted successfully</div>";
                } else {
                    echo "<div class='alert alert-danger'>Something went wrong</div>";
                }
            }
        }

        // Close the connection
        mysqli_close($conn);
    ?>
     <form method="post">
        <div class="form-group">
            <label>Date</label>
            <input type="text" class="form-control" placeholder="Enter date (mm/dd/yy):" name="date" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Location</label>
            <input type="text" class="form-control" placeholder="Enter location:" name="location" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Water Level</label>
            <input type="text" class="form-control" placeholder="Enter water level" name="waterlevel" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Rain intensity</label>
            <input type="text" class="form-control" placeholder="Enter rain intensity (LOW, MID, HIGH):" name="rainintensity" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Temperature</label>
            <input type="text" class="form-control" placeholder="Enter Temperature:" name="temperature" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Flow Rate</label>
            <input type="text" class="form-control" placeholder="Enter Flow rate:" name="flow" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
     </form>
    </div>
</section>

<div class="container2">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Date</th>
                <th scope="col">Location</th>
                <th scope="col">Water Level(cm)</th>
                <th scope="col">Rainfall intensity</th>
                <th scope="col">Temperature(°C)</th>
                <th scope="col">Flow Rate (mm/hr)</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Re-establish the connection to the database for fetching data
            $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
            $sql = "SELECT * FROM crud";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $date = $row['date'];
                    $location = $row['location'];
                    $waterlevel = $row['waterlevel'];
                    $rainintensity = $row['rainintensity'];
                    $temperature = $row['temperature'];
                    $flow = $row["flow"];
                    echo '
                        <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $date . '</td>
                            <td>' . $location . '</td>
                            <td>' . $waterlevel . '</td>
                            <td>' . $rainintensity . '</td>
                            <td>' . $temperature . '</td>
                            <td>' . $flow . '</td>
                            <td>
                                <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '" class="text-light">Update</a></button>
                                <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
                            </td>
                        </tr>';
                }
            }
            // Close the connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>  
</div>

<section class="footer">
    <h4>About Us</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

    <div class="icons">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-square-instagram"></i>   
    </div>
</section>

</body>
</html>
