<?php
// Create employees object
include __DIR__ . '/includes/header.php';
require_once __DIR__ . '/Employees.php';

use Database\Employees;
?>

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
            <?php foreach (Employees::all() as $employee): ?>
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
<?php include __DIR__ . '/includes/footer.php' ?>