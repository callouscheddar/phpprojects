<?php

namespace Html;

class TextInput extends Input
{
    private string $value = '';
    private bool $isSticky = false;

    public function __construct(string $name, string $placeholder, mixed $id)
    {
        parent::__construct($name, $placeholder, $id);
    }

    public function isSticky() {
        $this->isSticky = true;
    }

    public function create() : string {
        // If the value is set, apply that value to our input making it 'sticky'
        if (isset($_REQUEST[$this->name]) && $this->isSticky) {
            $this->value = htmlspecialchars($_REQUEST[$this->name]) ;
        }
        //  Check if bootstrap exists,
        return sprintf('<input class="%s" type="text" name="%s" id="%s" placeholder="%s" value="%s">',
            $this->bootstrap(), $this->name, $this->id, $this->placeholder, $this->value);
    }
}