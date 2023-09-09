<?php
header('content-type: application/json');
header('Acess-Control-Allow-origin:*');

$data = json_decode(file_get_contents("php://input"), true);
echo $student_id = $data['roll'];

include "config.php";
$sql = "select * from students where roll = {$student_id}";
$result = mysqli_query($conn, $sql) or die("Not Query Result");
if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result , MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(array('massage' => 'No Record Found.', 'status => false'));
}
