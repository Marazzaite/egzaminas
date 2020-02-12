<?php

namespace App\Clothes;

use \App\App;

class Model {

    private $table_name = 'clothes';

    public function __construct() {
        App::$db->createTable($this->table_name);
    }

    /**
     * Irašo $person i duombaze
     * @param Participant $person
     * @return bool
     */
    public function insert(Clothes $clothes) {
        return App::$db->insertRow($this->table_name, $clothes->getData());
    }

    /**
     * @param array $conditions
     * @return array
     */
    public function get($conditions = []) {
        $clothing = [];
        $rows = App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($rows as $row_id => $row_data) {
            $row_data['id'] = $row_id;
            $clothing[] = new Clothes($row_data);
        }

        return $clothing;
    }

    /**
     * @param Participant $person
     * @return bool
     */
    public function update(Clothes $person) {
        return App::$db->updateRow($this->table_name, $person->getId(), $person->getData());
    }

    /**
     * deletes all participants from database
     * @param Participant $person
     * @return bool
     */
    public function delete(Clothes $person) {
        return App::$db->deleteRow($this->table_name, $person->getId());
    }

    public function __destruct() {
        App::$db->save();
    }

}