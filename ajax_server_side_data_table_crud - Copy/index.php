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
        <div class="table-title" style="padding-top: 50px;">
            <div class="row">
                <div class="col-sm-6">
                    <h2>One Modal <b> And Server Side Data Table Use Crud System </b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Item</span></a>
                    <a  class="btn btn-danger"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
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
                                    <button type="button" onclick="deily_report()" class="btn btn-info" name="button">Search</button>
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

        <div class="showMessage"></div>
        <div class="box-header" data-original-title>
            <h2><i class="icon-align-justify"></i><span class="break"></span>CRM Report</h2>
        </div>
        <table class="table table-striped table-hover" class="requestResult" id="requestResult myTable">
            <thead>
                <tr>
                    <th>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="CheckAll">
                            <label for="selectAll"></label>
                        </span>
                    </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                            <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" class="checkboxes" id="checkboxdata" name="checkboxdata" ?>">
                                        <label for="checkbox1"></label>
                                    </span>
                                </td>

                                <td>
                                    <a><i class="material-icons icon" title="Edit">&#xE254;</i></a>
                                    <a><i class="material-icons icon" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>                   
                </tbody>
        </table>
    </div>


    <!-- add employee Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
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
            </div>
        </div>
</body>

</html>