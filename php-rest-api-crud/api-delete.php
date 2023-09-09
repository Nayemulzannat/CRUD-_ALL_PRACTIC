
<?php
header('content-type: application/json');
header('Access-Control-Allow-origin:*');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Rrquested-With');


$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data['roll'];

include "config.php";
$sql = "DELETE from students where roll = {$student_id}";
$result = mysqli_query($conn, $sql) or die("Not Query Result");
if ($result){
    echo json_encode(array('massage' => 'Delete Data successfull.', 'status => true'));

} else {
    echo json_encode(array('massage' => 'Delete Data Not successfull', 'status => false'));
}


?>
