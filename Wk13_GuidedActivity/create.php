<?php
include __DIR__ . '/includes/header.php';
require_once __DIR__ . '/EmployeeController.php';

use Controller\EmployeeController as Control;

$errors = Control::validateForm();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2>Create Record</h2>
            </div>
            <p>Please fill this form and submit to add employee record to the database.</p>
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <!--the $_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing scropt-->
                <!--the form data is sent to the page itself so that the user will receive error messages on the same page as the form-->
                <!--the htmlspecialchars()function converts special characters to HTML entities. For example < and > will be replaced with &lt; and &gt;-->
                <!--using the htmlspecialchars prevents attachers from exploiting the code by injecting HTML or JS code in forms.-->

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control"
                           value="<?= Control::stickyInput('name') ?>">
                    <span class="text-error"><?= $errors['name'] ?? '' ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email"
                           class="form-control"><?= Control::stickyInput('email') ?>
                    <span class="text-error"><?= $errors['email'] ?? '' ?></span>
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number" id="salary" name="salary" class="form-control"
                           value="<?= Control::stickyInput('salary') ?>">
                    <span class="text-error"><?= $errors['salary'] ?? '' ?></span>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="index.php" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php include __DIR__ . '/includes/footer.php' ?>


