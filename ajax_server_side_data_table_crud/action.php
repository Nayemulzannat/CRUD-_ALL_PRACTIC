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
                        <input type="checkbox" class="checkboxes" id="checkboxdata" name="checkboxdata">
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
                    <a><i class="material-icons icon" title="Delete">&#xE872;</i></a>
                </td>
            </tr>
    <?php
        }
    }
}
//=========== Form data connection ============//
if ($_POST['type'] == "FORM_DATA") {
    $id = $_POST['id'];
    $acrion = $_POST['acrion'];
    $btnAction = $_POST['btnAction'];
    $sql = "SELECT * FROM `employee_document` WHERE `id`='{$id}'";
    $results = $database->select($sql);
    $data = $results->fetch_assoc()
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
                    <input type="text" class="form-control" id="name" placeholder="Enter Name......." value="<?php echo  $data['name']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <span class="label label-default">Designation</span>
                    <input type="text" class="form-control" id="designation" placeholder="Enter A Designation" value="<?php echo  $data['designation']; ?>">
                </div>
                <div class="col-sm-6">
                    <span class="label label-default">Office Telephone</span>
                    <input type="text" class="form-control" id="office_tele" placeholder="Enter A Office Telephone" value="<?php echo  $data['office_tele']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <span class="label label-default">Office Mobile</span>
                    <input type="text" class="form-control" id="office_mobile" placeholder="Enter A Office Mobile" value="<?php echo  $data['office_mobile']; ?>">
                </div>
                <div class="col-sm-6">
                    <span class="label label-default">Personal Number</span>
                    <input type="text" class="form-control" id="personal_number" placeholder="Enter A Personal Phone" value="<?php echo  $data['personal_number']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <span class="label label-default">Email</span>
                    <input type="text" class="form-control" id="email" placeholder="Enter A Email" value="<?php echo  $data['email']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <span class="label label-default">Address</span>
                    <input type="text" class="form-control" id="address" placeholder="Enter A Address" value="<?php echo  $data['address']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <span class="label label-default">Name of Office</span>
                    <input type="text" class="form-control" id="name_of_office" placeholder="Enter A Name office" value="<?php echo  $data['name_of_office']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <span class="label label-default">Division</span>
                    <input type="text" class="form-control" id="division" placeholder="Enter A Divission" value="<?php echo  $data['division']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <span class="label label-default">District</span>
                    <input type="text" class="form-control" id="district" placeholder="Enter A District" value="<?php echo  $data['district']; ?>">
                </div>
            </div>
        </div>
        <br><br>
        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default" id="newConsigneeReset">Reset</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="<?php echo $btnAction; ?>()"><?php echo $acrion ?>Record</button>
        </div>
        <!-- End Modal Footer -->
    </form>
<?php
}
?>