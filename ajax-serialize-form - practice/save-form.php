<?php
$conn = mysqli_connect("localhost", "root", "", "asterisk");
if (isset($_POST["fullname"]) && isset($_POST["age"]) && isset($_POST["gender"]) && isset($_POST["country"])) {
echo $name = $_POST['fullname'];
}