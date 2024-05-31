<?php
include('db_connect.php');
include('navbar.php');

//data per page
$records_per_page = 5;

//get current page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

//off set for sql query
$offset = ($current_page - 1) * $records_per_page;

//display with limit per page
$query = "SELECT id, namep, petp FROM datap LIMIT $offset, $records_per_page";
$result = mysqli_query($db_connect, $query);

//total data
$total_records_query = mysqli_query($db_connect, "SELECT COUNT(*) as total FROM datap");
$total_records = mysqli_fetch_assoc($total_records_query)['total'];

//total page
$total_pages = ceil($total_records / $records_per_page);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSC Project 1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table-outline {
            border: 1px solid #dee2e6;
            border-right: 1px solid #dee2e6;
        }
        .table-outline th {
            background-color: #343a40;
            color: white;
        }
        .table-outline th, .table-outline td {
            border-right: 1px solid #dee2e6;
        }
    </style>
</head>
<body class="p-0 mx-0">
    <div class="container mt-5">
        <div class="row pt-5">
            <div class="col-sm-12">
                <h1>CSC Project 1</h1>
                <h2>Muhammad Bryan</h2>
            </div>
        </div>

        <h4 class="text-center font-weight-bold mb-4 py-4">Data Pep</h4>

        <div class="row">
            <div class="col-sm-12 text-left mb-3">
                <a href="add.php" class="btn btn-primary">Add Data</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-outline">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Pet</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($datap = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= htmlspecialchars($datap['id']); ?></td>
                            <td><?= htmlspecialchars($datap['namep']); ?></td>
                            <td><?= htmlspecialchars($datap['petp']); ?></td>
                            <td>
                                <a href="edit.php?id=<?= htmlspecialchars($datap['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete.php?id=<?= htmlspecialchars($datap['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                    <li class="page-item <?= ($i == $current_page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>
