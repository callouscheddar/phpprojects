<?php

namespace Html;

class NumberInput extends Input
{
    private int $minNum;
    private int $maxNum;
    private string $labelName;

    public function __construct(string $name, mixed $id, string $labelName, int $minNum = 0, int $maxNum = 100)
    {
        parent::__construct($name, $id);
        $this->maxNum = $maxNum;
        $this->minNum = $minNum;
        $this->labelName = $labelName;
    }

    public function render() : string
    {
        $label = sprintf('<label id="%s">%s</label>', $this->id, $this->labelName);
        $input = sprintf('<input type="number" name="%s" id="%s" min="%s" max="%s"><br>', $this->name, $this->id, $this->minNum, $this->maxNum);
        return $label . $input;
    }
}