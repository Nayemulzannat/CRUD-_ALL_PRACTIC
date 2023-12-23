<?php
//======== Date search wise data show ==========//
include_once 'database.php';
$database = new database();
if ($_POST['type'] == 'DATA_SEARCH') {
    $star_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $sql = "SELECT * FROM `employee_document` WHERE `created_at`>= '$star_date 00:00:01' AND `created_at`<= '$end_date 23:59:59'";
    $results = $database->select($sql);
    if ($results) {
        while ($row = $results->fetch_assoc()) { ?>
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" class="checkboxes" id="checkboxdata" name="checkboxdata" value="<?php echo  $row['id']; ?>">
                        <label for="checkbox1"></label>
                    </span>
                </td>
                <td><?php echo  $row['name'] ?></td>
                <td><?php echo  $row['designation'] ?></td>
                <td><?php echo  $row['office_tele'] ?></td>
                <td><?php echo  $row['office_mobile'] ?></td>
                <td><?php echo  $row['personal_number'] ?></td>
                <!-- <td><?php echo  $row['email'] ?></td>
                <td><?php echo  $row['address'] ?></td>
                <td><?php echo  $row['name_of_office'] ?></td>
                <td><?php echo  $row['division'] ?></td>
                <td><?php echo  $row['district'] ?></td> -->
                <td><?php echo  $row['created_at'] ?></td>
                <td>
                    <a><i class="material-icons icon" onclick="updateFormData('<?php echo  $row['id']; ?>');" title="Edit">&#xE254;</i></a>
                    <a><i class="material-icons icon" onclick="deleteFormData('<?php echo  $row['id']; ?>');" title="Delete">&#xE872;</i></a>
                </td>
            </tr>
    <?php
        }
    }
}
//=========== Modal  connection Start ============//
if ($_POST['type'] == "FORM_DATA") {
    $acrion = $_POST['acrion'];
    $btnAction = $_POST['btnAction'];
    ?>
    <form id="fromreset">
        <div class="modal-header">
            <h4 class="modal-title"><?php echo $acrion ?> EmployeeEmployee</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div id="billcontact">
            <div class="form-group">
                <div class="col-sm-12">
                    <span class="label label-default">Name</span>
                    <input type="text" class="form-control" id="addname" placeholder="Enter Name.......">
                    <input type="hidden" class="form-control" style="width: 100%;" id="updateId">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <span class="label label-default">Designation</span>
                    <input type="text" class="form-control" id="adddesignation" placeholder="Enter A Designation">
                </div>
                <div class="col-sm-6">
                    <span class="label label-default">Office Telephone</span>
                    <input type="text" class="form-control" id="addofficetele" placeholder="Enter A Office Telephone">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <span class="label label-default">Office Mobile</span>
                    <input type="text" class="form-control" id="addofficemobile" placeholder="Enter A Office Mobile">
                </div>
                <div class="col-sm-6">
                    <span class="label label-default">Personal Number</span>
                    <input type="text" class="form-control" id="addpersonalnumber" placeholder="Enter A Personal Phone">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <span class="label label-default">Email</span>
                    <input type="text" class="form-control" id="addemail" placeholder="Enter A Email">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <span class="label label-default">Address</span>
                    <input type="text" class="form-control" id="addaddress" placeholder="Enter A Address">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <span class="label label-default">Name of Office</span>
                    <input type="text" class="form-control" id="addnameoffice" placeholder="Enter A Name office">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <span class="label label-default">Division</span>
                    <input type="text" class="form-control" id="adddivision" placeholder="Enter A Divission">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <span class="label label-default">District</span>
                    <input type="text" class="form-control" id="adddistrict" placeholder="Enter A District">
                </div>
            </div>
        </div>
        <br><br>
        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default" id="newConsigneeReset">Reset</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="<?php echo $btnAction; ?>();"><?php echo $acrion ?>Record</button>
        </div>
        <!-- End Modal Footer -->
    </form>
<?php
    //=========== Modal  connection End ===============//
    //===========  Update Modal Fetch Data Start  ============//
}
if ($_POST['type'] == 'FETCH_FORM_DATA') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM `employee_document` WHERE `id`= '$id'";
    $results = $database->select($sql);
    $row = $results->fetch_assoc();
    $arr = array('id' => $row['id'], 'name' => $row['name'], 'designation' => $row['designation'], 'office_tele' => $row['office_tele'], 'office_mobile' => $row['office_mobile'], 'personal_number' => $row['personal_number'], 'email' => $row['email'], 'address' => $row['address'], 'name_of_office' => $row['name_of_office'], 'division' => $row['division'], 'district' => $row['district']);
    echo json_encode($arr);
}
//===========  Update Modal Fetch Data End  ============//
//===========  Update  Data Start   ====================//
if ($_POST['type'] == 'update_data_ajax') {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $office_tele = $_POST['office_tele'];
    $office_mobile = $_POST['office_mobile'];
    $personal_number = $_POST['personal_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $name_of_office = $_POST['name_of_office'];
    $division = $_POST['division'];
    $district = $_POST['district'];
    $updateId = $_POST['updateId'];
    $sql = "UPDATE `employee_document` SET `name`='$name',`designation`='$designation',`office_tele`='$office_tele',`office_mobile`='$office_mobile',`personal_number`=' $personal_number',`email`='$email',`address`='$address',`name_of_office`='$name_of_office',`division`='$division',`district`='$district' WHERE `id`='$updateId'";
    $result = $database->update($sql);
    if ($result) {
        $arr = array('status' => 'success', 'msg' => 'Data Update Successfully.');
    } else {
        $arr = array('status' => 'error', 'msg' => 'Data Not Update.');
    }
    echo json_encode($arr);
}
//===========  Update  Data Start  End ====================//
//===========  insert  Data Start  start ====================//
if ($_POST['type'] == 'insert_data_ajax') {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $office_tele = $_POST['office_tele'];
    $office_mobile = $_POST['office_mobile'];
    $personal_number = $_POST['personal_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $name_of_office = $_POST['name_of_office'];
    $division = $_POST['division'];
    $district = $_POST['district'];
    if ($name == '' || $designation == '' || $office_tele == '' || $office_mobile == '' || $personal_number == '' || $email == '' || $address == '' || $name_of_office == '' || $division == '' || $district == '') {
        $arr = array('status' => 'error', 'msg' => 'Data Must Not Be Empty.');
    } else {
        $sql = "INSERT INTO `employee_document`(`name`, `designation`, `office_tele`, `office_mobile`, `personal_number`, `email`, `address`, `name_of_office`, `division`, `district`) VALUES ('$name','$designation','$office_tele','$office_mobile','$personal_number','$email','$address','$name_of_office','$division','$district')";
        $result = $database->insert($sql);
        if ($result) {
            $arr = array('status' => 'success', 'msg' => 'Data Inserted Successfully.');
        } else {
            $arr = array('status' => 'error', 'msg' => 'Data  Not Inserted.');
        }
    }
    echo json_encode($arr);
}
//===========  insert  Data Start  end ====================//
//===========  Delete  Data Start  start ====================//
if ($_POST['type'] == 'delete_data_ajax') {
    $id = $_POST['id'];
    $sql = "DELETE FROM `employee_document` WHERE `id`='$id'";
    $result = $database->delete($sql);
    if ($result) {
        $arr = array('status' => 'success', 'msg' => 'Data Delete Successfully.');
    } else {
        $arr = array('status' => 'error', 'msg' => 'Data  Not Delete.');
    }
    echo json_encode($arr);
}
//===========  Delete  Data Start  end ====================//
//===========  Multiple  Data Delete  start ====================//
if ($_POST['type'] == 'multipleDataDelete_data_ajax') {
    $id = $_POST['id'];

    if ($id == '') {
        $arr = array('status' => 'success', 'msg' => 'Pleace Select Data.');
    } else {
        $str = implode(",", $id);
        $sql = "DELETE FROM `employee_document` WHERE `id` in ($str)";
        $result = $database->delete($sql);
        if ($result) {
            $arr = array('status' => 'success', 'msg' => 'Data Delete Successfully.');
        } else {
            $arr = array('status' => 'error', 'msg' => 'Data  Not Delete.');
        }
    }
    echo json_encode($arr);
}
//===========  Multiple  Data Delete  end ====================//
?>