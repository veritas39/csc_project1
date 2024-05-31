<?php
include('db_connect.php');
include('navbar.php');

$namep = $petp = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $namep = $_POST['namep'];
    $petp = $_POST['petp'];

    //input
    $insert_query = "INSERT INTO datap (namep, petp) VALUES ('$namep', '$petp')";
    $insert_result = mysqli_query($db_connect, $insert_query);

    if ($insert_result) {
        //redirect back
        header("Location: main.php");
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($db_connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="p-0 pt-5">
    <div class="container mt-5">
        <h1>Add Data</h1>
        <form method="post">
            <div class="form-group">
                <label for="namep">Name</label>
                <input type="text" class="form-control" id="namep" name="namep" required>
            </div>
            <div class="form-group">
                <label for="petp">Pet</label>
                <input type="text" class="form-control" id="petp" name="petp" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Data</button>
            <a href="main.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>
