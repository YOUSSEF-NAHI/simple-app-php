<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$prenom1 = $prenom2 = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $prenom1 = trim($_POST["prenom1"]);
    $prenom2 = trim($_POST["prenom2"]);

    // Check input errors before inserting in database
    if (!empty($prenom1) && !empty($prenom2)) {
        // Prepare an insert statement
        $sql = "INSERT INTO binomes (prenom1, prenom2) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_prenom1, $param_prenom2);

            // Set parameters
            $param_prenom1 = $prenom1;
            $param_prenom2 = $prenom2;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
header("location: index.php");
?>