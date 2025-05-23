<?php

class education {

    private $id;
    private $unique_id;
    private $name;
    private $address;
    private $type;
    private $lat;
    private $lng;
    private $conn;
    private $tableName = "centerdistance";

    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

    function setuniqueId($uid) {
        $this->unique_id = $uid;
    }

    function getuniqueId() {
        return $this->unique_id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function getName() {
        return $this->name;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function getAddress() {
        return $this->address;
    }

    function setType($type) {
        $this->type = $type;
    }

    function getType() {
        return $this->type;
    }

    function setLat($lat) {
        $this->lat = $lat;
    }

    function getLat() {
        return $this->lat;
    }

    function setLng($lng) {
        $this->lng = $lng;
    }

    function getLng() {
        return $this->lng;
    }

    public function __construct() {
        require_once('db/DbConnect.php');
        $conn = new DbConnect;
        $this->conn = $conn->connect();
    }

    public function getCollegesBlankLatLng() {
        $sql = "SELECT * FROM $this->tableName WHERE lat IS NULL AND lng IS NULL";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllColleges() {
        $uid =  $this->getuniqueId();
        $sql = "SELECT * FROM $this->tableName where user_id = $uid";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCollegesbyid($id) {
        $uid =  $this->getuniqueId();
        $sql = "SELECT * FROM $this->tableName where id = $id and user_id = $uid";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserlocation($id) {

        $sql = "SELECT * FROM users where unique_id = $id";
        $this->setuniqueId($id);
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateCollegesWithLatLng() {
        $sql = "UPDATE $this->tableName SET lat = :lat, lng = :lng WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':lat', $this->lat);
        $stmt->bindParam(':lng', $this->lng);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

?>