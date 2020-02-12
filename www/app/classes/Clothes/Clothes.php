<?php

namespace App\Clothes;

class Clothes {

    private $data = [];

    public function __construct($data = null) {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'id' =>null,
                'name' => null,
                'surname' => null,
                'size' => null,
                'height' => null,
                'color'=> null,
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
        $this->setSurname($array['surname'] ?? null);
        $this->setSize($array['size'] ?? null);
        $this->setHeight($array['height'] ?? null);
        $this->setColor($array['color'] ?? null);
    }

    /**
     * Gets all data as array
     * @return array
     */
    public function getData() {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'surname' => $this->getSurname(),
            'size' => $this->getSize(),
            'height' => $this->getHeight(),
            'color' => $this->getColor(),
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
     * Sets data surname
     * @param string $surname
     */
    public function setSurname(string $surname) {
        $this->data['surname'] = $surname;
    }

    /**
     * @return mixed
     */
    public function getSurname() {
        return $this->data['surname'];
    }

    /**
     * Sets data city
     * @param string $city
     */
    public function setSize(string $size) {
        $this->data['size'] = $size;
    }

    /**
     * @return mixed
     */
    public function getSize() {
        return $this->data['size'];
    }
    public function setHeight(string $height) {
        $this->data['height'] = $height;
    }

    /**
     * @return mixed
     */
    public function getHeight() {
        return $this->data['height'];
    }
    public function setColor(string $color) {
        $this->data['color'] = $color;
    }

    /**
     * @return mixed
     */
    public function getColor() {
        return $this->data['color'];
    }
}
