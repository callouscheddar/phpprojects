<?php
include __DIR__ . '/includes/header.php';
require_once __DIR__ . '/EmployeeController.php';

use Controller\EmployeeController as Control;
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
                <td>Delete</td>
                <td>Edit</td>
            </tr>
            </thead>
            <tbody>
                <?= Control::renderEmployeeTable() ?>
            </tbody>
        </table>
    </div>
</div>
<?php include __DIR__ . '/includes/footer.php' ?>