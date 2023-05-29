<?php
class Database
{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "oop_crud_1";
    public $connected;
    public $error = [];
    public $result;
    // public $mysqli;
    // Database connection 
    public function __construct()
    {
        $this->connected =  new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if (!$this->connected) {
            $this->error = "connection is faild" . $this->connected->connect_error;
            return false;
        }
    }









    // Database read connection 
    public function show($pram)
    {
        $result = $this->connected->query($pram) or die($this->connected->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    

    // Database insert connection
    public function create($param)
    {
        $result = $this->connected->query($param) or die($this->connected->error . __LINE__);

        if ($result) {
            header("Location: index.php?sms=" . urlencode('Data inserted successfully.'));
            exit();
        } else {
            die("error :(" . $this->connected->errno . ")" . $this->connected->error);
        }
    }






    // Database update connection
    public function update($param)
    {
        $result = $this->connected->query($param) or die($this->connected->error . __LINE__);

        if ($result) {
            header("Location: index.php?sms=" . urlencode('Data update successfully.'));
            exit();
        } else {
            die("error :(" . $this->connected->errno . ")" . $this->connected->error);
        }
    }
    // Delete data
    public function delete($param)
    {
        $delete = $this->connected->query($param) or die($this->connected->error . __LINE__);
        if ($delete) {
            header("Location: index.php?sms=" . urlencode('Data Delete successfully.'));
            exit();
        } else {
            die("error :(" . $this->connected->errno . ")" . $this->connected->error);
        }
    }



    // Database connection close
    public function __destruct()
    {
        if ($this->connected) {
            $this->connected->close();
            // echo "<br>";
            echo "No connected";
        }
    }
}