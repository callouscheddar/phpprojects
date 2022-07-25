<?php

/*
 * The EmployeeController handles operations on the data, so it can
 * be processed to the pages (views).
 */

namespace Controller;

use Database\Employees;
require_once 'Employees.php';

class EmployeeController
{
    static function validateForm(): array|string
    {
        // Define variables and initialize with empty values
        $errors = [
            'error' => '',
            'name' => '',
            'email' => '',
            'salary' => ''
        ];

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['salary'])) {
                // Validate our inputs
                $name = preg_match("/^[a-zA-Z-' ]*$/", $_POST['name']);
                $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $salary = filter_var($_POST['salary'], FILTER_VALIDATE_INT);

                if ($name || $email || $salary) {
                    // Insert data into database
                    Employees::insert([$name, $email, $salary]);
                } else {
                    // Error
                    $errors['error'] = 'There was an error submitting your form.';
                }
            } else {
                // Fill our error keys w/ values if they don't exist
                $errors['name'] = empty($_POST['name']) ? '* Your forgot to enter a name.' : '';
                $errors['email'] = empty($_POST['email']) ? '* Your forgot to enter a email.' : '';
                $errors['salary'] = empty($_POST['salary']) ? '* Your forgot to enter a salary.' : '';
            }
            return $errors;
        }
        return '';
    }

    static function stickyInput($input): string
    {
        if (!empty($_POST["$input"])) {
            return htmlspecialchars($_POST["$input"]);
        }
        return '';
    }
}