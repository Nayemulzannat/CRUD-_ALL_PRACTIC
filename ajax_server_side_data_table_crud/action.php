<?php
//======== Date search wise data show ==========//
include_once 'database.php';
$database = new database();
if ($_POST['type'] == 'DATA_SEARCH') {
    $star_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $sql = "SELECT * FROM `dncrp_employee_document` WHERE `created_at`>= '$star_date 00:00:01' AND `created_at`<= '$end_date 23:59:59'";
    $results = $database->select($sql);
    if ($results) {
        $i = 1;
        while ($row = $results->fetch_assoc()) { ?>
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" class="checkboxes" id="checkboxdata" name="checkboxdata">
                        <label for="checkbox1"></label>
                    </span>
                </td>
                <td><?php echo $i++  ?></td>
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
                    <a><i class="material-icons icon" title="Edit">&#xE254;</i></a>
                    <a><i class="material-icons icon" title="Delete">&#xE872;</i></a>
                </td>
            </tr>
    <?php
        }
    }
}
//=========== Form data connection ============//
if ($_POST['type'] == "FORM_DATA") {
    $acrion = $_POST['acrion'];
    $btnAction = $_POST['btnAction'];
    ?>
    <form id="fromreset">
        <div class="modal-header">
            <h4 class="modal-title">Add EmployeeEmployee</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="insert_sub()">&times;</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="add_name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="add_email">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" id="add_address"></textarea>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" id="add_phone">
            </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="button" class="btn btn-success" value="Add">
        </div>
    </form>
<?php
}
?>