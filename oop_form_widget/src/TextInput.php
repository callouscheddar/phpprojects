<?php

namespace Html;

class TextInput extends Input
{
    public function __construct( string $name, mixed $id, string $labelName)
    {
        parent::__construct($name, $id, $labelName);
        $this->labelName = $labelName;
    }

    public function render() : string
    {
        $label = "<label id='$this->id'>$this->labelName</label>";
        $input = sprintf('<input type="text" name="%s" id="%s"><br>', $this->name, $this->id);
        return $label . $input;
    }
}