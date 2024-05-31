<?php
include('db_connect.php');
include('navbar.php');

//get id
$id = $_GET['id'];

//display current id data
$query = "SELECT id, namep, petp FROM datap WHERE id = '$id'";
$result = mysqli_query($db_connect, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($db_connect));
}

$datap = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namep = $_POST['namep'];
    $petp = $_POST['petp'];

    //update database
    $update_query = "UPDATE datap SET namep = '$namep', petp = '$petp' WHERE id = '$id'";
    $update_result = mysqli_query($db_connect, $update_query);

    if ($update_result) {
        //redirect back
        header("Location: main.php");
    } else {
        die("Update query failed: " . mysqli_error($db_connect));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="p-0 pt-5">
    <div class="container mt-5">
        <h1>Edit Data</h1>
        <form method="post">
            <div class="form-group">
                <label for="namep">Name</label>
                <input type="text" class="form-control" id="namep" name="namep" value="<?= ($datap['namep']); ?>" required>
            </div>
            <div class="form-group">
                <label for="petp">Pet</label>
                <input type="text" class="form-control" id="petp" name="petp" value="<?= ($datap['petp']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="main.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>
