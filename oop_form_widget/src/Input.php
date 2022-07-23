<?php

namespace Html;

abstract class Input
{
    protected string $type;
    protected string $name;
    protected mixed $id;
    protected mixed $value;

    public function __construct(string $name, mixed $id)
    {
        $this->name = $name;
        $this->id = $id;
    }
}