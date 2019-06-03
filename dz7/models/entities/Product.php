<?php
namespace app\models\entities;


class Product extends DataEntity
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $properties = [
        'id' => false,
        'name' => false,
        'description' => false,
        'price' => false
    ];


    public function setId($id): void
    {
        $this->id = $id;
        $this->properties['id'] = true;
    }


    public function setName($name): void
    {
        $this->name = $name;
        $this->properties['name'] = true;
    }


    public function setDescription($description): void
    {
        $this->description = $description;
        $this->properties['description'] = true;
    }


    public function setPrice($price): void
    {
        $this->price = $price;
        $this->properties['price'] = true;
    }



    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}