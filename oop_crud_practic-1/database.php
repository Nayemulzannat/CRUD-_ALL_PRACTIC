<?php
class Database
{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "oop_crud_1";

    public $mysqli;
    public $error = [];
    public $result;


    public function __construct()
    {
        $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if (!$this->mysqli) {
            $this->error = "connection fail" . $this->mysqli->connect_error;
        }
    }




    // data show
    public function select($query)
    {
        $result = $this->mysqli->query($query) or die($this->mysqli->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }





    // data insert
    public function insert($param)
    {
        $result = $this->mysqli->query($param) or die($this->mysqli->error . __LINE__);
        if ($result) {
            header("Location: index.php?sms=" . urlencode('Data inserted successfully.'));
            exit();
        } else {
            die("error :(" . $this->mysqli->errno . ")" . $this->mysqli->error);
        }
    }

    
    // update data
    public function update($param)
    {
        $update = $this->mysqli->query($param) or die($this->mysqli->error . __LINE__);
        if ($update) {
            header("Location: index.php?sms=" . urlencode('Data updated successfully.'));
            exit();
        } else {
            die("error :(" . $this->mysqli->errno . ")" . $this->mysqli->error);
        }
    }
    // Delete data
    public function delete($param)
    {
        $delete = $this->mysqli->query($param) or die($this->mysqli->error . __LINE__);
        if ($delete) {
            header("Location: index.php?sms=" . urlencode('Data Delete successfully.'));
            exit();
        } else {
            die("error :(" . $this->mysqli->errno . ")" . $this->mysqli->error);
        }
    }
}
