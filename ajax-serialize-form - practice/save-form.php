<?php
$conn = mysqli_connect("localhost", "root", "", "asterisk");
if (isset($_POST["fullname"]) && isset($_POST["age"]) && isset($_POST["gender"]) && isset($_POST["country"])) {
    $name = $_POST['fullname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    
}
