<?php

class Task {
    private $_id;
    private $_title;
    private $_description;
    private $_status;
    private $_date_creation;

    public function __construct($_title, $_description, $_status, $_date_creation = NULL, $_id = NULL){
        $this->_title = $_title;
        $this->_description = $_description;
        $this->_status = $_status;
        $this->_date_creation = $_date_creation; 
        $this->_id = $_id;
    }

    public function getId() {
        return $this->_id;
    }

    public function getStatus() {
        return $this->_status;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function getDate_creation() {
        return $this->_date_creation;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function setStatus($status) {
        $this->_status = $status;
    }

    public function setTitle($title) {
        $this->_title = $title;
    }

    public function setDescription($description) {
        $this->_description = $description;
    }

    public function setdate_creation($date_creation) {
        $this->_date_creation = $date_creation;
    }
}