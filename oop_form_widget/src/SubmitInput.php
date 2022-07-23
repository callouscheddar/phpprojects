<?php

namespace Html;

class SubmitInput extends Input
{
    private string $submitText = '';

    public function __construct(string $name, string $placeholder, mixed $id)
    {
        parent::__construct($name, $placeholder, $id);
    }

    public function create() : string
    {
        return sprintf('<input class="%s" type="submit" name="%s" id="%s" value="%s">',
            $this->bootstrap(), $this->name,  $this->id, $this->submitText);
    }

    /**
     * @param string $submitText
     */
    public function setSubmitText(string $submitText): void
    {
        $this->submitText = $submitText;
    }
}