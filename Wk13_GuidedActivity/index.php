<?php
// Create employees object
require_once __DIR__ . '/Employees.php';
$employees = new Employees();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <!--include a simple Bootstrap plugin-->
    <!--this is a small pop-up box that appears when the user moves the mouse pointer over an element-->
    <script type="text/javascript">

    </script>
</head>
<body>
<div class="container" style="width: 600px"
">
<div class="col-md-12">
    <div class="mt-4 d-flex justify-content-between align-items-center">
        <h2>Employees Details</h2>
        <a href="create.php" class="btn btn-success p-2">Add New Employee</a>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Salary</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($employees->all() as $employee): ?>
                <tr>
                    <td><?= $employee['name'] ?></td>
                    <td><?= $employee['email'] ?></td>
                    <td><?= $employee['salary'] ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</body>
</html>