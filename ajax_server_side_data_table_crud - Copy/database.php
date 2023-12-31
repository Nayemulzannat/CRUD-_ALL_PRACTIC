<?php
// class database
class  database
{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "oop_crud_1";

    public $connected;
    public $error;
    public $result;

    // DATABASE CONNECTION =====
    public function __construct()
    {
        $this->connected = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        // echo "connected";
        if (!$this->connected) {

            $this->error = "connection is fail" . $this->connected->connect_error;
        }
    }

    // ============ data show table
    public function select($parami)
    {
        $result = $this->connected->query($parami) or die($this->connected->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    // =========== insert data=========
    public function insert($parami)
    {
        $result = $this->connected->query($parami) or die($this->connected->error . __LINE__);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    // ==========delete data=========
    public function delete($delete)
    {
        $result = $this->connected->query($delete) or die($this->connected->error . __LINE__);
        if ($result) {
            return $result;
            exit();
        } else {
            return false;
        }
    }
    // ============update data=========
    public function update($update_data)
    {
        $result = $this->connected->query($update_data) or die($this->connected->error . __LINE__);
        if ($result) {
            return $result;
            exit();
        } else {
            return false;
        }
    }



    // DATABASE CONNECTION CLOSE =====
    // DATABASE CONNECTION CLOSE =====
    public function __destruct()
    {
        if ($this->connected) {
            $this->connected->close();
        }
    }
}