<?php

namespace Html;

class SubmitInput extends Input
{
    private string $buttonText;

    public function __construct(string $name, mixed $id, string $buttonText)
    {
        parent::__construct($name, $id);
        $this->buttonText = $buttonText;
    }

    public function render() : string
    {
        return sprintf('<input type="submit" name="%s" id="%s" value="%s"><br>',
            $this->name, $this->id, $this->buttonText);
    }
}