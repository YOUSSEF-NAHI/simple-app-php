<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>

    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <span width="30" height="24" class="d-inline-block align-text-top">&#129409;</span>
                Youssef Nahi
            </a>
        </div>
    </nav>

    <div class="container mt-5">
        <form class="" method="POST" action="/store.php">
            <div class="row">
                <div class="col-md-4">
                    <label for="prenom1" class="form-label">Prenom1</label>
                    <input type="text" class="form-control" id="prenom1" name="prenom1">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="prenom2" class="form-label">Prenom2</label>
                    <input type="text" class="form-control" id="prenom2" name="prenom2">
                </div>
            </div>

            <div class="col-12 mt-1">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>

        <div class="mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Binomes Details</h2>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM binomes";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Prenom1</th>";
                            echo "<th>Prenom2</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['prenom1'] . "</td>";
                                echo "<td>" . $row['prenom2'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>

    </div>



</body>

</html>