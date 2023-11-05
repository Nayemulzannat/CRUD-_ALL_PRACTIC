<?php

// header("Content-type: application/vnd.ms-excel");
// header("Content-Disposition: attachment; filename=chillyfacts.com.xls");

include_once 'database.php';
$object = new database();

$Use_Title = 1;
$now_date = date('l jS \ F Y h:i:s A');
$title = ",,,,,###Disposition Statsu Report ### " . "" . "\n,,,,,,I Help BD \n,,,,," . $now_date . "\n"; //"Dump For Table $DB_TBLName from Database $DB_DBName on $now_date";
$file_type = "text/csv";
$file_ending = "csv";

header("Content-Type: application/$file_type");
header("Content-Disposition: attachment; filename=Disposition_status__$now_date.$file_ending");
header("Pragma: no-cache");
header("Expires: 0");

if ($Use_Title == 1) {
    // echo ("$title\n");
}

echo "Name,Email,Address,Phone,\n";



$prami = "SELECT * FROM customer";
$read = $object->select($prami);
if ($read) {
    while ($rows = $read->fetch_assoc()) {
        echo "{$rows['name']},{$rows['email']},{$rows['address']},{$rows['phone']},\n";
    }
}
// echo $prami;