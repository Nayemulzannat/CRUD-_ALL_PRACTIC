<!DOCTYPE html>
<html lang="en">
<?php
// include'database.php';
$date = date("Y-m-d");
$status = NULL;
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">

<body>
    <div class="container">
        <div class="table-title" style="padding-top: 50px;">
            <div class="row">
                <div class="col-sm-6">
                    <h2>One Modal <b> And Server Side Data Table Use Crud System </b></h2>
                </div>
                <div class="col-sm-6">
                    <!-- <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Item</span></a> -->
                    <a class="btn btn-success" onclick="addFromData();"><i class="material-icons">&#xE147;</i> <span>Add New Item</span></a>
                    <a class="btn btn-danger"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                </div>
            </div>
        </div>
        <!-- Use Date Search Data  -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-secondary">
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                        </div>
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control" value="<?php echo $date; ?>" id="start_date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" class="form-control" value="<?php echo $date; ?>" id="end_date">
                                </div>
                                <div class="form-group" style="margin-top: 40px;">
                                    <button type="button" onclick="data_search()" class="btn btn-info" name="button">Search</button>
                                    <a href="download.php" class="btn btn-warning btn_download"><i class="icon-download"></i> Download
                                        Report</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <!-- Data showing Table -->
    <div class="container">
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify"></i><span class="break"></span>CRM Report</h2>
        </div>
        <form action="" method="post">
            <table class="table table-striped table-hover" class="requestResult" id="dataTable">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="CheckAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>name </th>
                        <th>designation </th>
                        <th>office_tele </th>
                        <th>office_mobile </th>
                        <th>personal_number </th>
                        <!-- <th>email </th>
                        <th>address </th>
                        <th>name_of_office </th>
                        <th>division </th>
                        <th>district </th> -->
                        <th>created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="result"></tbody>
            </table>
        </form>
    </div>
    <!-- Data showing Table End -->
    <!-- add employee Modal HTML Start -->
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <span id="modal-show"></span>
            </div>
        </div>
    </div>
    <!-- add employee Modal HTML End -->
    <!-- java script start -->
    <script type="text/javascript">
        // Data search Ajax Call Start
        function data_search() {
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            $.ajax({
                url: "action.php",
                type: "POST",
                data: {
                    start_date: start_date,
                    end_date: end_date,
                    type: "DATA_SEARCH"
                },
                // dataType:"POST",
                success: function(result) {
                    $('#result').html(result);
                }
            });
        }
        // Data search Ajax Call End
        // Add FromData Ajax Call Start
        function addFromData() {
            $.ajax({
                url: 'action.php',
                type: "post",
                data: {
                    acrion: "Create",
                    btnAction: "insert_data",
                    type: "FORM_DATA"
                },
                success: function(responce) {
                    $("#addEmployeeModal").modal('show');
                    $("#modal-show").html(responce);
                }
            });
        }
        // Add FromData Ajax Call End
        // Update FromData Ajax Call Start
        function updateFormData(id) {
            $.ajax({
                url: 'action.php',
                type: 'post',
                data: {
                    acrion: "Update",
                    btnAction: "update_data",
                    type: "FORM_DATA"
                },
                success: function(responce) {
                    $("#addEmployeeModal").modal('show');
                    $("#modal-show").html(responce);
                    fetchEmployeeData(id);
                }
            });
        }
        // Update FromData Ajax Call End
        // Update Fetch Data Ajax Call Start
        function fetchEmployeeData(id) {
            $.ajax({
                url: 'action.php',
                type: 'post',
                data: {
                    id: id,
                    type: "FETCH_FORM_DATA"
                },
                dataType: 'json',
                success: function(responce) {
                    $("#updateId").val(responce.id);
                    $("#addname").val(responce.name);
                    $("#adddesignation").val(responce.designation);
                    $("#addofficetele").val(responce.office_tele);
                    $("#addofficemobile").val(responce.office_mobile);
                    $("#addpersonalnumber").val(responce.personal_number);
                    $("#addemail").val(responce.email);
                    $("#addaddress").val(responce.address);
                    $("#addnameoffice").val(responce.name_of_office);
                    $("#adddivision").val(responce.division);
                    $("#adddistrict").val(responce.district);
                }
            });
        }
        // Update Fetch Data Ajax Call End
        // Update Data Ajax Call Start
        function update_data() {
            var name = $('#addname').val();
            var designation = $('#adddesignation').val();
            var office_tele = $('#addofficetele').val();
            var office_mobile = $('#addofficemobile').val();
            var personal_number = $('#addpersonalnumber').val();
            var email = $('#addemail').val();
            var address = $('#addaddress').val();
            var name_of_office = $('#addnameoffice').val();
            var division = $('#adddivision').val();
            var district = $('#adddistrict').val();
            var updateId = $('#updateId').val();
            $.ajax({
                url: 'action.php',
                type: 'post',
                data: {
                    name: name,
                    designation: designation,
                    office_tele: office_tele,
                    office_mobile: office_mobile,
                    personal_number: personal_number,
                    email: email,
                    address: address,
                    name_of_office: name_of_office,
                    division: division,
                    district: district,
                    updateId: updateId,
                    type: 'update_data_ajax'
                },
                dataType: 'json',
                success: function(responce) {
                    //   $("#dataTable").load(" #dataTable > *");
                    $("#addEmployeeModal").modal('hide');
                    if (responce.status == "success") {
                        sweetAlertSuccess(responce.msg);
                        data_search();
                    } else {
                        sweetAlertError(responce.msg);
                    }
                }
            });
        }
        // Update Data Ajax Call End
        // Insert Data Ajax Call Start
        function insert_data() {
            var name = $('#addname').val();
            var designation = $('#adddesignation').val();
            var office_tele = $('#addofficetele').val();
            var office_mobile = $('#addofficemobile').val();
            var personal_number = $('#addpersonalnumber').val();
            var email = $('#addemail').val();
            var address = $('#addaddress').val();
            var name_of_office = $('#addnameoffice').val();
            var division = $('#adddivision').val();
            var district = $('#adddistrict').val();
            $.ajax({
                url: 'action.php',
                type: 'post',
                data: {
                    name: name,
                    designation: designation,
                    office_tele: office_tele,
                    office_mobile: office_mobile,
                    personal_number: personal_number,
                    email: email,
                    address: address,
                    name_of_office: name_of_office,
                    division: division,
                    district: district,
                    type: 'insert_data_ajax'
                },
                dataType: 'json',
                success: function(responce) {
                    // $("#dataTable").load(" #dataTable > *");
                    // $("#addEmployeeModal").modal('hide');
                    if (responce.status == "success") {
                        sweetAlertSuccess(responce.msg);
                        $("#fromreset").trigger('reset');
                        data_search();
                    } else {
                        sweetAlertError(responce.msg);
                    }
                }
            });
        }
        // Insert Data Ajax Call End
        // Delete Data Ajax Call Start
        function deleteFormData(id) {
            if (confirm('Delete user?')) {
                $.ajax({
                    url: 'action.php',
                    type: 'post',
                    data: {
                        id: id,
                        type: 'delete_data_ajax'
                    },
                    dataType: 'json',
                    success: function(responce) {
                        if (responce.status == "success") {
                            sweetAlertSuccess(responce.msg);
                            data_search();
                        } else {
                            sweetAlertError(responce.msg);
                        }
                    }
                });

            } else {
                //'Cancel' is clicked
            }
        }
        // Delete Data Ajax Call End
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
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                paging: true,
                searching: true
              
            });
        });
    </script>
    <script>
        function sweetAlertSuccess(msg) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: msg,
                showConfirmButton: false,
                timer: 1500
            })
        }

        function sweetAlertError(msg) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: msg,
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
    <!-- jQuery sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- datable library -->
    <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>