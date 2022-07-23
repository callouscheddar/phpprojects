<?php
/*
    Anthony Bonsilao
    7/22/2022
    3:31 PM
    OOP Form Widget
*/

// Composer Autoloader
require_once __DIR__ . '/vendor/autoload.php';

use Html as App;

/*
 * Create a form object w/ desired parameters.
 * Create an input by creating an object of desired input type, and filling in
 * necessary properties. Lastly, register the inputs in the form object.
 */

$form = new App\Form("", "POST");

$candyText = new App\TextInput("candy_text", "Favorite Candy", "candy_text_id");
$candyText->setBootstrap(['form-control', 'w-50', 'm-auto', 'd-block', 'mt-2']);
$candyText->isSticky();

$candyBut = new App\SubmitInput('candy_submit', '', 'candy_submit_id');
$candyBut->setBootstrap(['btn', 'btn-primary', 'mt-2']);
$candyBut->setSubmitText("Submit");

$form->registerInput($candyText);
$form->registerInput($candyBut);
//$form->printInputs();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>OOP Form Widget</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .center {
            margin: 2em auto;
            width: 80%;
            text-align: center;
        }
    </style>
</head>

<body>
<div class="center">
    <h1>OOP Form Widget</h1>
    <?= $form->render(); ?>
    <?= $form->formData() ?>
</div>
</body>

</html>