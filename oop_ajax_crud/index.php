<?php
include_once 'database.php';
$object = new database();
?>
<?php
$prami = "SELECT * FROM customer";
$read = $object->select($prami);
// echo $prami;



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Costomers</b></h2>

                    </div>

                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>

                        <a onclick="multipleDeleteRecord()" class="btn btn-danger"><i
                                class="material-icons">&#xE15C;</i> <span>Delete</span></a>



                    </div>
                </div>
            </div>
            <div class="box-icon">
                <a href="download.php" class="btn btn-warning btn_download"><i class="icon-download"></i> Download
                    Report</a>
            </div>
            <div class="showMessage"></div>
            <table class="table table-striped table-hover" class="requestResult" id="requestResult myTable">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="CheckAll">
                                <label for="selectAll"></label>
                            </span>

                        </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($read) {
                        while ($rows = $read->fetch_assoc()) {

                    ?>
                    <tr>

                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" class="checkboxes" id="checkboxdata" name="checkboxdata"
                                    value="<?php echo $rows['id']; ?>">
                                <label for="checkbox1"></label>
                            </span>
                        </td>

                        <td><?php echo $rows['name'] ?></td>
                        <td><?php echo $rows['email'] ?></td>
                        <td><?php echo $rows['address'] ?></td>
                        <td><?php echo $rows['phone'] ?></td>


                        <td>
                            <a onclick="edit_data('<?php echo $rows['id']; ?>')"><i class="material-icons icon"
                                    title="Edit">&#xE254;</i></a>

                            <a onclick="delete_data('<?php echo $rows['id']; ?>')"><i class="material-icons icon"
                                    title="Delete">&#xE872;</i></a>
                        </td>

                    </tr>
                    <?php } ?>

                    <?php } else {


                        echo '<p style="  background-color: #ffcccc;color: #ff0000;   padding: 10px; border: 1px solid #ff0000; border-radius: 4px; margin-bottom: 10px;">Sorry,Data not available !!.</p>';
                        // echo '<p style="background-color: #d4edda; color: #155724;padding: 10px;   border: 1px solid #c3e6cb;  border-radius: 4px; margin-bottom: 10px;">Data not available !!</p>';

                    } ?>


                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>

        </div>
    </div>

    <!-- add employee Modal HTML -->


    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="fromreset">

                    <!-- <div class="modal-header">
                        <h4 class="modal-title">Add EmployeeEmployee</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                            onclick="insert_sub()">&times;</button>
                    </div> -->
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

                        <input type="button" class="btn btn-success" onclick="insert_sub()" value="Add">
                    </div>


                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <span id="editFormData"></span>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="button" class="btn btn-info" onclick="update_data()" data-dismiss="modal"
                            value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <!-- <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">

                        <input type="button" class="btn btn-danger" value="Delete" 
                    </div>
                </form>
            </div>
        </div>
    </div> -->
</body>
<script>
function multipleDeleteRecord() {
    let checkboxdata = [];

    $.each($("input[name='checkboxdata']:checked"), function() {
        checkboxdata.push($(this).val());
        alert(this);

    });
    if (checkboxdata != '') {
        let msg = confirm("Are You Sure");
        if (msg == true) {
            $.ajax({
                url: "insert.php",
                type: "POST",
                data: {
                    Checkdata: checkboxdata,
                    type: "MULTI_DELETE_EMPLOYEE"
                },
                success: function(response) {
                    $('.showMessage').css('display', 'block').html(response);
                    $("#requestResult").load(" #requestResult > ");

                    setTimeout(function() {
                        $('.showMessage').css('display', 'none');

                    }, 5000);
                }
            });
        }
    } else {
        alert("Select Your Record");
    }
}




$('#CheckAll').change(function() {
    // console.log(CheckAll);
    if ($(this).is(":checked")) {
        $('.checkboxes').each(function() {
            $(this).prop("checked", true);
        });
    } else {
        $('.checkboxes').each(function() {
            $(this).prop("checked", false);
        });
    }
});
// =============data insert ajax===============
function insert_sub() {
    let add_name = $("#add_name").val();
    let add_email = $("#add_email").val();

    let add_address = $("#add_address").val();
    // alert(add_address);
    let add_phone = $("#add_phone").val();
    $.ajax({
        url: "insert.php",
        type: "POST",
        data: {
            add_name: add_name,
            add_email: add_email,
            add_address: add_address,
            add_phone: add_phone,
            type: "add_employee"
        },
        success: function(response) {
            console.log(response);
            $('.showMessage').css('display', 'block').html(response);

            setTimeout(function() {
                $('.showMessage').css('display', 'none');

            }, 5000);
            $('#fromreset').trigger('reset');
            $('#addEmployeeModal').modal('hide');


            $("#requestResult").load(" #requestResult > ");
        }
    });
}
// =========delete data ajax=========

function delete_data(id) {
    let delete_id = id;
    let istrue = confirm("Are You Sure =================!!!!!");
    if (istrue == true) {
        $.ajax({
            url: "insert.php",
            type: "POST",
            data: {
                id: delete_id,
                type: "delete_data"
            },
            success: function(response) {
                // console.log(response);
                $('.showMessage').css('display', 'block').html(response);
                $("#requestResult").load(" #requestResult > ");

                setTimeout(function() {
                    $('.showMessage').css('display', 'none');

                }, 5000);
            }
        });
    }
}
// =========data edita ajax===============
function edit_data(edit_id) {
    $.ajax({
        url: "insert.php",
        type: "POST",
        data: {
            id: edit_id,
            type: "edit_form_data"
        },
        success: function(response) {
            $('#editFormData').html(response);
            $("#editEmployeeModal").modal('show');
        }
    });
}

//}
// ======== update data =============
function update_data() {
    let update_id = $('#edit_id').val();

    let update_name = $('#edit_name').val();
    // alert(update_name);
    let update_email = $('#edit_email').val();
    let update_address = $('#edit_address').val();
    let update_phone = $('#edit_phone').val();


    $.ajax({
        url: "insert.php",
        type: "POST",
        data: {
            update_id: update_id,
            update_name: update_name,
            update_email: update_email,
            update_address: update_address,
            update_phone: update_phone,
            type: "update_data"
        },
        success: function(response) {
            console.log(response);
            $('.showMessage').css('display', 'block').html(response);
            $("#requestResult").load(" #requestResult > ");

            setTimeout(function() {
                $('.showMessage').css('display', 'none');

            }, 5000);
        }

    });

}

// $('#myTable').on('draw.dt', function() {
//     alert('Table redrawn');
// });

// $('#myTable').DataTable({
//     buttons: [{
//         extend: 'csv',
//         text: 'Copy all data',
//         exportOptions: {
//             modifier: {
//                 search: 'none'
//             }
//         }
//     }]
// });
</script>

</html>