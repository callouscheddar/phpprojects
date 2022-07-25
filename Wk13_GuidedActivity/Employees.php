<?php

/*
 * This is the employees class which handles all
 * the database operations.
 */

class Employees
{

    private $link;

    public function __construct()
    {
        // Get database connection
        require_once __DIR__ . '/myConnection.php';
        $this->link = $link;
    }

    public function all() : array
    {
        $employees = [];
        // Attempt select query execution
        $sql = "SELECT * FROM employees;";
        $result = mysqli_query( $this->link, $sql);
        // Create a loop to store records in assoc array
        while ($row = mysqli_fetch_assoc($result)) {
            $employees[] = [
                'name' => $row['name'],
                'email' => $row['email'],
                'salary' => $row['salary'],
            ];
        }
        return $employees;
    }

    private function closeConnection() : void {
        // Close connection
        mysqli_close($this->link);
    }
}