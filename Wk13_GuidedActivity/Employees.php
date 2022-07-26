<?php

/*
 * This is the employees class which handles all
 * the database operations.
 */

namespace Database;

class Employees
{

    public function __construct()
    {
        // Get database connection

    }

    static function getConnection()
    {
        require_once __DIR__ . '/myConnection.php';
        return $link;
    }

    /*
     * Fetches all records from the database and returns it
     * as an associative array.
     */
    static function all(): array
    {
        $link = self::getConnection();
        $employees = [];
        // Attempt select query execution
        $sql = "SELECT * FROM employees;";
        $result = mysqli_query($link, $sql);
        // Create a loop to store records in assoc array
        while ($row = mysqli_fetch_assoc($result)) {
            $employees[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'email' => $row['email'],
                'salary' => $row['salary'],
            ];
        }
        return $employees;
    }

    public static function insert(array $data): void
    {
        $link = self::getConnection();
        $sql = "INSERT INTO employees (name, email, salary) VALUES (?, ?, ?)";
        // Prepare an insert statement
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $data[0], $data[1], $data[2]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                self::closeConnection();
                mysqli_stmt_close($stmt);
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    static function delete($id): bool
    {
        $link = self::getConnection();
        $sql = "DELETE FROM employees WHERE id = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $id);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records deleted successfully. Redirect to home page
                header("location: ../index.php");
                mysqli_stmt_close($stmt);
                self::closeConnection();
                exit();
            } else {
                // Error in deletion.
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
        self::closeConnection();
    }

    static function closeConnection(): void
    {
        // Close connection
        $link = self::getConnection();
        mysqli_close($link);
    }
}