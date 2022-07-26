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
                $name = htmlspecialchars($_POST['name']);
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

    static function renderEmployeeTable(): void
    {
        foreach (Employees::all() as $employee) {
            echo '<tr>
                <td>' . $employee['name'] . '</td>
                <td>' . $employee['email'] . '</td>
                <td>' . $employee['salary'] . '</td>
                <td><a href="delete.php/?id=' . $employee['id'] . '">Delete</a></td>
                <td><a href="edit.php/?id=' . $employee['id'] . '">Edit</a></td>
            </tr>';
        }
    }

    static function deleteEmployee(): void
    {
        if (isset($_POST["id"]) && !empty($_POST["id"]))
        {
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
            Employees::delete($id);
        }

        if(empty(trim($_GET["id"]))){
            // URL doesn't contain id parameter. Redirect back to home page
            header("location: ../index.php");
            exit();
        }
    }

    static function stickyInput($input): string
    {
        if (!empty($_POST["$input"])) {
            return htmlspecialchars($_POST["$input"]);
        }
        return '';
    }
}