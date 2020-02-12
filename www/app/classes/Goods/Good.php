<?php

namespace App\Goods;

class Good {

    private $data = [];

    public function __construct($data = null) {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'id' => null,
                'name' => null,
                'image' => null,
                'price' => null,
                'in_stock' => null,
                'discount' => null,
            ];
        }
    }

    /**
     * * Sets all data from array
     * @param $array
     */
    public function setData($array) {
        if (isset($array['id'])) {
            $this->setId($array['id']);
        } else {
            $this->data['id'] = null;
        }

        $this->setName($array['name'] ?? null);
        $this->setPrice($array['price'] ?? null);
        $this->setImage($array['image'] ?? null);
        $this->setDiscount($array['discount'] ?? null);
        $this->setInStock($array['in_stock'] ?? null);


    }

    /**
     * Gets all data as array
     * @return array
     */
    public function getData() {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'image'=>$this->getImage(),
            'in_stock'=>$this->getInStock(),
            'discount' =>$this->getDiscount(),
        ];
    }

    /**
     * @param int $id
     */
    public function setId(int $id) {
        $this->data['id'] = $id;
    }

    /**
     * @return int|null
     */
    public function getId() {
        return $this->data['id'];
    }

    /**
     * Sets name
     * @param string $name
     */
    public function setName(string $name) {
        $this->data['name'] = $name;
    }

    /**
     * Returns name
     * @return string
     */
    public function getName() {
        return $this->data['name'];
    }

    /**
     * @param float $date
     */
    public function setPrice(float $price) {
        $this->data['price'] = $price;
    }

    /**
     * @return mixed
     */
    public function getPrice() {
        return $this->data['price'];
    }

    public function setImage(string $image) {
        $this->data['image'] = $image;
    }

    /**
     * @return int|null
     */
    public function getImage() {
        return $this->data['image'];
    }

    public function setInStock(int $in_stock) {
        $this->data['in_stock'] = $in_stock;
    }

    /**
     * Returns name
     * @return string
     */
    public function getInStock() {
        return $this->data['in_stock'];
    }

    public function setDiscount(int $discount) {
        $this->data['discount'] = $discount;
    }

    /**
     * @return int|null
     */
    public function getDiscount() {
        return $this->data['discount'];
    }
}