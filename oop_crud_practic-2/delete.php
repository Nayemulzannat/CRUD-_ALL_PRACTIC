<?php
include 'Database.php';
$id = $_GET['id'];

if (isset($_POST['delete'])) {
    $param = "DELETE FROM student WHERE id=$id";
    $deleteData = $dataupdate->delete($param);
}
header("location: http://localhost/CRUD_ALL_PRACTIC\oop_crud_practic-2/index.php");