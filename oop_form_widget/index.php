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

$form = new App\Form();
$form->registerInput(new App\TextInput("candy", "candy_id", "Candy Name"));
$form->registerInput(new App\NumberInput("candy_amount", "candy_amount_id", "Candy Amount", 1, 150));
//$form->printInputs();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</div>
</body>

</html>