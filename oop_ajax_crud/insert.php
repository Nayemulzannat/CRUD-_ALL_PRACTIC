<?php
include "database.php";
$database = new database();
// $read = $databse->insert($parami);

if ($_POST['type'] == 'add_employee') {

    $add_name = $_POST['add_name'];
    $add_email = $_POST['add_email'];
    // console . log($add_email);
    $add_address = $_POST['add_address'];
    $add_phone = $_POST['add_phone'];
    if ($add_name == '' || $add_email == '' || $add_address == '' || $add_phone == '') {
        echo '<p style="  background-color: #ffcccc;color: #ff0000;   padding: 10px; border: 1px solid #ff0000; border-radius: 4px; margin-bottom: 10px;">Sorry, please fill in all required fields.</p>';
    } else {
        $parami = " INSERT INTO customer(name,email,address,phone) values('$add_name','$add_email','$add_address',' $add_phone')";
        $read = $database->insert($parami);
        if ($read) {
            echo '<p style="background-color: #d4edda; color: #155724;padding: 10px;   border: 1px solid #c3e6cb;  border-radius: 4px; margin-bottom: 10px;">Data inserted successfully!</p>';
        }
    }
}
if ($_POST['type'] == 'delete_data') {

    $delete_id = $_POST['id'];
    // echo $delete_id;
    $delete = "DELETE FROM customer WHERE id= $delete_id";
    // echo  "DELETE FROM customer WHERE id= $delete_id";
    $result = $database->delete($delete);
    if ($result) {
        echo '<p style="  background-color: #ffcccc;color: #ff0000;   padding: 10px; border: 1px solid #ff0000; border-radius: 4px; margin-bottom: 10px;">Exam Deleted Successfully.</p>';
    }
}

if ($_POST['type'] == 'edit_form_data') {
    $id = $_POST['id'];
    $select = "SELECT * FROM customer WHERE id= $id";
    $result = $database->select($select);
    $rows = $result->fetch_assoc();
?>
    <div class="form-group">
        <label>Name</label>
        <input type="hidden" class="form-control" id="edit_id" value="<?php echo $rows['id'] ?>">
        <input type="text" class="form-control" id="edit_name" value="<?php echo $rows['name'] ?>">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" id="edit_email" value="<?php echo $rows['email'] ?>">
    </div>
    <div class="form-group">
        <label>Address</label>
        <textarea class="form-control" id="edit_address"><?php echo $rows['address'] ?></textarea>
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" id="edit_phone" value="<?php echo $rows['phone'] ?>">
    </div>
<?php } ?>