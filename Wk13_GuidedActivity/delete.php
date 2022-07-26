<?php
include __DIR__ . '/includes/header.php';
require_once __DIR__ . '/EmployeeController.php';

use Controller\EmployeeController as Control;

// Our controller handles and checks for form
Control::deleteEmployee();

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="page-header">
                    <h1>Delete Record</h1>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="border border-1 rounded p-3">
                        <input type="hidden" name="id" value="<?= trim($_GET["id"])?>"/>
                        <p>Are you sure you want to delete this record?</p>
                        <input type="submit" value="Yes" class="btn btn-danger">
                        <a href="../index.php" class="btn btn-secondary">No</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include __DIR__ . '/includes/footer.php' ?>