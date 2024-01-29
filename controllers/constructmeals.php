<?php
class Pasta
{
    public function __construct(public $name, public $ingredients, public $calories, public $prix)
    {
        $this->name = $name;
        $this->ingredients = $ingredients;
        $this->calories = $calories;
        $this->prix = $prix;
    }
    public function fullPasta()
    {
        return $this->name . ' ' . $this->ingredients . ' ' . $this->calories . ' ' . $this->prix;
    }
}
class Pizza
{
    public function __construct(public $name, public $ingredients, public $calories, public $prix)
    {
        $this->name = $name;
        $this->ingredients = $ingredients;
        $this->calories = $calories;
        $this->prix = $prix;
    }
    public function fullPasta()
    {
        return $this->name . ' ' . $this->ingredients . ' ' . $this->calories . ' ' . $this->prix;
    }
}