<?php

namespace App\Reviews;

class Reviews {

    private $data = [];

    public function __construct($data = null) {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'review' =>null,
                'id' => null,
                'date' => null,
                'userid' => null,
                'ranking' => null,
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
        $this->setReview($array['review'] ?? null);
        $this->setDate($array['date'] ?? null);
        $this->setUserId($array['userid'] ?? null);
        $this->setId($array['id'] ?? null);
        $this->setRanking($array['ranking'] ?? null);
    }

    /**
     * Gets all data as array
     * @return array
     */
    public function getData() {
        return [
            'review' => $this->getReview(),
            'id' => $this->getId(),
            'date' => $this->getDate(),
            'userid'=>$this->getUserId(),
            'ranking'=>$this->getRanking(),
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
    public function setReview(string $review) {
        $this->data['review'] = $review;
    }

    /**
     * Returns name
     * @return string
     */
    public function getReview() {
        return $this->data['review'];
    }

    /**
     * Sets data surname
     * @param string $surname
     */
    public function setDate(string $date) {
        $this->data['date'] = $date;
    }

    /**
     * @return mixed
     */
    public function getDate() {
        return $this->data['date'];
    }
    public function setUserId(int $id) {
        $this->data['userid'] = $id;
    }

    /**
     * @return int|null
     */
    public function getById() {
        return $this->data['username'];
    }
    public function setById(int $username) {
        $this->data['username'] = $username;
    }

    /**
     * @return int|null
     */
    public function getUserId() {
        return $this->data['userid'];
    }
    public function setRanking(string $ranking) {
        $this->data['ranking'] = $ranking;
    }

    /**
     * Returns name
     * @return string
     */
    public function getRanking() {
        return $this->data['ranking'];
    }


}
