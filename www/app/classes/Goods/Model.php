<?php

namespace App\Goods;

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
    public function insert(Good $good) {
        return App::$db->insertRow($this->table_name, $good->getData());
    }

    /**
     * @param array $conditions
     * @return array
     */
    public function get($conditions = []) {
        $goods = [];
        $rows = App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($rows as $row_id => $row_data) {
            $row_data['id'] = $row_id;
            $goods[] = new Good($row_data);
        }

        return $goods;
    }


    /**
     * @param Participant $person
     * @return bool
     */
    public function update(Good $good) {
        return App::$db->updateRow($this->table_name, $good->getId(), $good->getData());
    }

    /**
     * deletes all participants from database
     * @param Participant $person
     * @return bool
     */
    public function delete(Good $good) {
        return App::$db->deleteRow($this->table_name, $good->getId());
    }


    public function __destruct() {
        App::$db->save();
    }

}