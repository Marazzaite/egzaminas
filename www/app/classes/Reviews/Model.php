<?php

namespace App\Reviews;

use \App\App;

class Model {

    private $table_name = 'reviews';

    public function __construct() {
        App::$db->createTable($this->table_name);
    }

    /**
     * Irašo $person i duombaze
     * @param Participant $person
     * @return bool
     */
    public function insert(Reviews $review) {
        return App::$db->insertRow($this->table_name, $review->getData());
    }

    /**
     * @param array $conditions
     * @return array
     */
    public function get($conditions = []) {
        $review = [];
        $rows = App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($rows as $row_id => $row_data) {
            $row_data['id'] = $row_id;
            $review[] = new Reviews($row_data);
        }

        return $review;
    }


    /**
     * @param Participant $person
     * @return bool
     */
    public function update(Reviews $review) {
        return App::$db->updateRow($this->table_name, $review->getId(), $review->getData());
    }

    /**
     * deletes all participants from database
     * @param Participant $person
     * @return bool
     */
    public function delete(Reviews $review) {
        return App::$db->deleteRow($this->table_name, $review->getId());
    }


    public function __destruct() {
        App::$db->save();
    }

}