<?php

namespace Html;

abstract class Input
{
    protected array $bootstrap = [];
    protected string $name;
    protected string $placeholder;
    protected mixed $id;

    public function __construct(string $name, string $placeholder =  '', mixed $id)
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->id = $id;
    }

    /**
     * @param array $bootstrap
     */
    public function setBootstrap(array $bootstrap): void
    {
        $this->bootstrap = $bootstrap;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    protected function bootstrap() : string {
        return implode(' ', $this->bootstrap);
    }


}