<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$name = $email = $salary = "";
$name_err = $email_err = $salary_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate name
    
    
    // Validate email
   
    
    // Validate salary
    
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($email_err) && empty($salary_err))
	{
        // Prepare an insert statement
        $sql = "INSERT INTO employees (name, email, salary) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql))
		{
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_salary);
            
            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_salary = $salary;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
			{
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } 
				else
			{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper
		{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header">
<h2>Create Record</h2>
</div>

<p>Please fill this form and submit to add employee record to the database.</p>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<!--the $_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing scropt-->
<!--the form data is sent to the page itself so that the user will receive error messages on the same page as the form-->
<!--the htmlspecialchars()function converts special characters to HTML entities. For example < and > will be replaced with &lt; and &gt;-->
<!--using the htmlspecialchars prevents attachers from exploiting the code by injecting HTML or JS code in forms.-->

<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
<label>Name</label>
<input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
<span class="help-block"><?php echo $name_err;?></span>
</div>
<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
<label>email</label>
<textarea name="email" class="form-control"><?php echo $email; ?></textarea>
<span class="help-block"><?php echo $email_err;?></span>
</div>
<div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
<label>Salary</label>
<input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
<span class="help-block"><?php echo $salary_err;?></span>
</div>
<input type="submit" class="btn btn-primary" value="Submit">
<a href="index.php" class="btn btn-default">Cancel</a>
</form>
</div>
</div>        
</div>
</div>
</body></html>