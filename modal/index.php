<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="modal fade" id="newConsigneeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-80p">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Create New Consignee
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form class="form-horizontal">

                        <div class="form-group form-group-sm">
                            <!-- left column -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="new_name" class="col-sm-2 control-label bg-danger">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_name" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_subname" class="col-sm-2 control-label">Subname</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_subname" placeholder="">
                                    </div>
                                </div>
                                <p class="lead">Ship to address</p>
                                <div class="form-group">
                                    <label for="new_address" class="col-sm-2 control-label bg-danger">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_address" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_addresssub" class="col-sm-2 control-label">Address 2</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_addresssub" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_zip" class="col-sm-2 control-label bg-danger">Zip</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="new_zip" placeholder="">
                                    </div>
                                    <div class="col-sm-7">
                                        <label for="new_zip_detail" class="sr-only">City, State Country</label>
                                        <input type="text" class="form-control" id="new_zip_detail" placeholder="City, State Country" disabled="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_phone" class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="phone" class="form-control" id="new_phone" placeholder="">
                                    </div>
                                </div>
                                <p class="lead">Bill to address</p>
                                <div class="form-group">
                                    <label for="new_qbnameid" class="col-sm-2 control-label">QBNAMEID</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_qbnameid" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_billadditional" class="col-sm-2 control-label">Name (if other)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_billadditional" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_billto_addr" class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_billto_addr" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_billto_addrsub" class="col-sm-2 control-label">Address 2</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_billto_addsubr" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_billto_zip" class="col-sm-2 control-label">Zip</label>
                                    <div class="col-sm-3">
                                        <label for="new_billto_zip" class="sr-only">City, State Country</label>
                                        <input type="text" class="form-control" id="new_billto_zip" placeholder="">
                                    </div>
                                    <div class="col-sm-7">
                                        <label for="new_billto_zip_detail" class="sr-only">City, State Country</label>
                                        <input type="text" class="form-control" id="new_billto_zip_detail" placeholder="City, State Country" disabled="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="new_www" class="col-sm-2 control-label">Website</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_www" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <!-- right column -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="new_company_identity" class="col-sm-2 control-label">Company Identity</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="new_company_identity">
                                            <option value="1">Default</option>
                                            <option value="2">Company 2</option>
                                            <option value="3">Company 3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="new_bol_require" class="col-sm-2 control-label">BOL Required</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="new_bol_require">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                    <label for="new_pod_require" class="col-sm-2 control-label">POD Required</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="new_pod_require">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_discount" class="col-sm-2 control-label">Discount</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="new_discount" placeholder="0.00">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                    <label for="new_credit" class="col-sm-2 control-label">Credit Limit</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="number" class="form-control" id="new_credit" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_terms" class="col-sm-2 control-label">Terms</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="new_terms">
                                            <option value="Net 15">Net 15</option>
                                            <option value="Net 30">Net 30</option>
                                            <option value="Due on receipt">Due on receipt</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="new_comcode" class="col-sm-2 control-label">Sales Rep</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="new_comcode">
                                            <option value="0">N/A</option>
                                            <option value="1">Alice</option>
                                            <option value="2">Bob</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_active" class="col-sm-2 control-label">Active</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="new_active">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Begin contact information -->
                                <div id="tabs">
                                    <ul>
                                        <li><a href="#normalcontact">Normal Contact</a></li>
                                        <li><a href="#billcontact">Bill Contact</a></li>
                                        <!--<li><a href="#testcontact">Test Contact</a></li>-->
                                    </ul>

                                    <!-- Normal Contact Begin -->
                                    <div id="normalcontact">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <span class="label label-default">Name</span>
                                                <input type="text" class="form-control" id="new_contact" placeholder="">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <span class="label label-default">Phone</span>
                                                <input type="text" class="form-control" id="new_phone" placeholder="">
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="label label-default">Alt Phone</span>
                                                <input type="text" class="form-control" id="new_otherphone" placeholder="">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <span class="label label-default">Cell</span>
                                                <input type="text" class="form-control" id="new_cellphone" placeholder="">
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="label label-default">Fax</span>
                                                <input type="text" class="form-control" id="new_fax" placeholder="">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <span class="label label-default">Email</span>
                                                <input type="text" class="form-control" id="new_email" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Normal Contact End -->

                                    <!-- Bill Contact Begin -->
                                    <div id="billcontact">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <span class="label label-default">Name</span>
                                                <input type="text" class="form-control" id="new_billcontact" placeholder="">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <span class="label label-default">Phone</span>
                                                <input type="text" class="form-control" id="new_billphone" placeholder="">
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="label label-default">Alt Phone</span>
                                                <input type="text" class="form-control" id="new_billotherphone" placeholder="">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <span class="label label-default">Cell</span>
                                                <input type="text" class="form-control" id="new_billcellphone" placeholder="">
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="label label-default">Fax</span>
                                                <input type="text" class="form-control" id="new_billfax" placeholder="">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <span class="label label-default">Email</span>
                                                <input type="text" class="form-control" id="new_billemail" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bill Contact End -->



                                    <!-- Test Contact Begin -->
                                    <!--
                    <div id="testcontact">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon">Name</span>
                                    <input type="text" class="form-control" id="new_testcontact" placeholder="">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Phone</span>
                                    <input type="text" class="form-control" id="new_testphone" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><abbr title="Alternate Phone">Alt</abbr></span>
                                    <input type="text" class="form-control" id="new_testotherphone" placeholder="">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Cell</span>
                                    <input type="text" class="form-control" id="new_testcellphone" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Fax</span>
                                    <input type="text" class="form-control" id="new_testfax" placeholder="">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon">Email</span>
                                    <input type="text" class="form-control" id="new_testemail" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
					-->
                                    <!-- Test Contact End -->


                                </div>
                                <!-- End contact information -->





                            </div>
                        </div>


                        <!-- End main input boxes, starting a new "row" -->

                        <div class="form-group form-group-sm">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="new_comments" class="col-sm-1 control-label">Comments</label>
                                    <div class="col-sm-11">
                                        <textarea class="form-control" rows="3" id="new_comments"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" id="newConsigneeReset">Reset</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="newConsigneeSubmit">Create Record</button>
                        </div><!-- End Modal Footer -->




                    </form>
                </div> <!-- End modal body div -->
            </div> <!-- End modal content div -->
        </div> <!-- End modal dialog div -->
    </div> <!-- End modal div -->
    <!-- Use this to open the modal -->
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#newConsigneeModal">Create New Consignee</button>
</body>
<script>
    $("#tabs").tabs();
    //-- Modal has finished being hidden
    $('#newConsigneeModal').on('hidden.bs.modal', function(e) {
        //$(this).find('form')[0].reset();
    });

    $("#newConsigneeReset").on("click", function() {
        $('#newConsigneeModal').find("form")[0].reset();
    });
    $("#newConsigneeSubmit").on("click", function() {
        submitNewConsignee();
    });

    function submitNewConsignee() {
        $("#new_comments").hide();
    }
</script>

</html>