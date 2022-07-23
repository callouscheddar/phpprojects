<?php

namespace Html;

abstract class Input
{
    protected string $type;
    protected string $name;
    protected mixed $id;
    protected mixed $value;
    protected string $labelName;

    public function __construct(string $name, mixed $id, string $labelName)
    {
        $this->name = $name;
        $this->id = $id;
        $this->labelName = $labelName;
    }
}