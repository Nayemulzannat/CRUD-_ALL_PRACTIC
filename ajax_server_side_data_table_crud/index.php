<!DOCTYPE html>
<html lang="en">
<?php
// include'database.php';
$date = date("Y-m-d");
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
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
                    <a onclick="multipleDeleteRecord()" class="btn btn-danger"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                </div>
            </div>
        </div>
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
    <!-- add employee Modal HTML -->
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-80p">
            <div class="modal-content">
                <span id="modal-show"></span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
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
                    // alert(result);
                    // console.log(result);
                    $('#result').html(result);
                }
            });
        }

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
                    // alert(responce);
                    $("#addEmployeeModal").modal('show');
                    $("#modal-show").html(responce);
                }
            });
        }

        function updateFormData(id) {
            $.ajax({
                url: 'action.php',
                type: 'POST',
                data: {
                    id: id,
                    acrion: "Udate",
                    btnAction: "update_data",
                    type: "FORM_DATA"
                },
                success: function(responce) {
                    console.log(responce);
                    $("#addEmployeeModal").modal('show');
                    $("#modal-show").html(responce);
                }
            });
        };
        $(document).ready(function() {
            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5'
                ]
            });
        });
    </script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- datable library -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>