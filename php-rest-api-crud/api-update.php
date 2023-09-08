<?php
header('content-type: application/json');
header('Acess-Control-Allow-origin:*');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Rrquested-With');



$data = json_decode(file_get_contents("php://input"), true);

$roll = $data['roll'];
$name = $data['name'];
$gender = $data['gender'];
$age = $data['age'];


include "config.php";
$sql = "UPDATE students SET roll = {$roll}, name ='{$name}', gender = '{$gender}', age = {$age} WHERE roll = {$roll}";

$result = mysqli_query($conn, $sql);
if ($result) {
    echo json_encode(array('massage' => 'Record Update.', 'status => true'));
}else {
    echo json_encode(array('massage' => ' Record Not Found.', 'status => false'));
}

