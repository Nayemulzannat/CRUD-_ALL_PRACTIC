<?php
// header('content-type: application/json');
// header('Acess-Control-Allow-origin:*');
// header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Rrquested-With');



$data = json_decode(file_get_contents("php://input"), true);

$roll = $data['roll'];
$name = $data['name'];
$age = $data['age'];
$gender = $data['gender'];


include "config.php";
$sql = "INSERT INTO students(roll,name,age,gender) VALUES ({$roll},'{$name}',{$age},'{$gender}')";

$result = mysqli_query($conn, $sql) or die("Not Query Result");
if ($result) {
    echo json_encode(array('massage' => 'Record Inserted.', 'status => true'));
}else {
    echo json_encode(array('massage' => ' Record Found.', 'status => false'));
}
