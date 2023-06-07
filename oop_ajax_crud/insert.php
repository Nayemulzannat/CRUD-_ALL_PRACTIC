<?php
include "database.php";
$database = new database();
// $read = $databse->insert($parami);

// ==========data insert==========

if ($_POST['type'] == 'add_employee') {

    $add_name = $_POST['add_name'];
    // alart($add_name);
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

// ==============data delete===============

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
// =================== data edit =====================

if ($_POST['type'] == 'edit_form_data') {
    $id = $_POST['id'];
    $select = "SELECT * FROM customer WHERE id= $id";
    $result = $database->select($select);
    $row = $result->fetch_assoc();
?>
    <div class="form-group">
        <label>Name</label>
        <input type="hidden" class="form-control" id="edit_id" value="<?php echo $row['id'] ?>">
        <input type="text" class="form-control" id="edit_name" value="<?php echo $row['name'] ?>">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" id="edit_email" value="<?php echo $row['email'] ?>">
    </div>
    <div class="form-group">
        <label>Address</label>
        <textarea class="form-control" id="edit_address"><?php echo $row['address'] ?></textarea>
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" id="edit_phone" value="<?php echo $row['phone'] ?>">
    </div>
<?php } ?>
<?php
// ===========update data===========
if ($_POST['type'] == 'update_data') {
    $update_id = $_POST["update_id"];
    // alart($update_id);
    $update_name  = $_POST["update_name"];
    $update_email  = $_POST["update_email"];
    $update_address  = $_POST["update_address"];
    $update_phone  = $_POST["update_phone"];
    if ($update_name == '' || $update_email == '' || $update_address == '' || $update_phone == '') {
        echo '<p style="  background-color: #ffcccc;color: #ff0000;   padding: 10px; border: 1px solid #ff0000; border-radius: 4px; margin-bottom: 10px;">Sorry, please fill in all required fields.</p>';
    } else {
        $update_sql = "UPDATE `customer` SET name ='$update_name', email='$update_email', address='$update_address', phone ='$update_phone' WHERE `id`='$update_id'";
        // echo  $update_sql;
        $result = $database->update($update_sql);

        if ($result) {
            echo '<p style="background-color: #d4edda; color: #155724;padding: 10px;   border: 1px solid #c3e6cb;  border-radius: 4px; margin-bottom: 10px;">Data Updated successfully!</p>';
        }
    }
}


if ($_POST['type'] == 'MULTI_DELETE_EMPLOYEE') {
    $checkboxdatas = $_POST['Checkdata'];
    foreach ($checkboxdatas as $delete_id) {
        $delete = "DELETE FROM customer WHERE id= $delete_id";
        $result = $database->delete($delete);
    }
    if ($result) {
        echo '<p style="  background-color: #ffcccc;color: #ff0000;   padding: 10px; border: 1px solid #ff0000; border-radius: 4px; margin-bottom: 10px;">Deleted Successfully.</p>';
    }
}
?>