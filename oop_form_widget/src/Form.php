<?php

namespace Html;

class Form
{
    private string $action;
    private string $method;
    private array $inputs = [];

    public function __construct(string $action = "", string $method =  "get")
    {
        $this->action = $action;
        $this->method = $method;
    }

    public function registerInput($inp): void
    {
        $this->inputs[] = $inp;
    }

    public function printInputs() : void
    {
        echo '<pre>';
        print_r($this->inputs);
        echo '</pre>';
    }

    public function render() : string
    {
        $inputs = implode(PHP_EOL,  array_map(fn($el) => $el->render(), $this->inputs));
        return sprintf('<form action="%s" method="%s" >%s</form>', $this->action, $this->method, $inputs);
    }
}