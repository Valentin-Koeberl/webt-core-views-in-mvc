<?php
class Hotel {
    public function __construct(
        private string $name,
        private string $description,
        private string $image,
        private string $score
    ) {}

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getScore(): string
    {
        return $this->score;
    }

}

