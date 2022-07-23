An Object-Oriented Approach to creating forms. To create a form, firstly create a form  object.

```
    $form = new App\Form("index.php", "POST");
```

Then choose which object you want to represent the type of input.
- SubmitInput
- TextInput
Bootstrap classes can be applied with an index array of strings that contain the classes to be applied.

```
    $candyText = new App\TextInput("candy_text", "Favorite Candy", "candy_text_id");
    $candyText->setBootstrap(['form-control', 'w-50', 'm-auto', 'd-block', 'mt-2']);
    $candyText->isSticky();
    
    $candyBut = new App\SubmitInput('candy_submit', '', 'candy_submit_id');
    $candyBut->setBootstrap(['btn', 'btn-primary', 'mt-2']);
    $candyBut->setSubmitText("Submit");
```

Register the inputs  with the form object.

```
    $form->registerInput($candyText);
    $form->registerInput($candyBut);
```

Then use a shorthand echo expression to render the form, with the form object.

```
    <?= $form->render(); ?>
```