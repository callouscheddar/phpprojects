<?php

namespace Html;

class NumberInput extends Input
{
    private int $minNum;
    private int $maxNum;

    public function __construct(string $name, mixed $id, string $labelName, int $minNum = 0, int $maxNum = 100)
    {
        parent::__construct($name, $id, $labelName);
        $this->maxNum = $maxNum;
        $this->minNum = $minNum;
    }

    public function render() : string
    {
        $label = "<label id='$this->id'>$this->labelName</label>";
        $input = sprintf('<input type="number" name="%s" id="%s"><br>', $this->name, $this->id);
        return $label . $input;
    }
}