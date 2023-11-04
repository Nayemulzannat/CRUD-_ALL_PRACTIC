<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>PHP & Ajax CRUD</title>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <table id="main" border="0" cellspacing="0">
    <tr>
      <td id="header">
        <h1>PHP REST API CRUD</h1>

        <div id="search-bar">
          <label>Search :</label>
          <input type="text" id="search" autocomplete="off" />
        </div>
      </td>
    </tr>
    <tr>
      <td id="table-form">
        <form id="addForm">
          Name : <input type="text" name="sname" id="sname" /> Age :
          <input type="number" name="sage" id="sage" /> City :
          <input type="text" name="scity" id="scity" />
          <input type="submit" id="save-button" value="Save" />
        </form>
      </td>
    </tr>
    <tr>
      <td id="table-data">
        <table width="100%" cellpadding="10px">
          <tr>
            <th width="40px">Id</th>
            <th>Name</th>
            <th width="50px">Age</th>
            <th width="150px">Gender</th>
            <th width="60px">Edit</th>
            <th width="70px">Delete</th>
          </tr>
          <tbody id="load-table"></tbody>
        </table>
      </td>
    </tr>
  </table>

  <div id="error-message" class="messages"></div>
  <div id="success-message" class="messages"></div>

  <!-- Popup Modal Box for Update the Records -->
  <div id="modal">
    <div id="modal-form">
      <h2>Edit Form</h2>
      <form action="" id="edit-form">
        <table cellpadding="10px" width="100%">
          <tr>
            <td width="90px">First Name</td>
            <td>
              <input type="text" name="sname" id="edit-name" />
              <input type="text" name="sid" id="edit-id" hidden="" />
            </td>
          </tr>
          <tr>
            <td>Age</td>
            <td><input type="number" name="sage" id="edit-age" /></td>
          </tr>
          <tr>
            <td>City</td>
            <td><input type="text" name="scity" id="edit-gender" /></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="button" id="edit-submit" value="Update" /></td>
          </tr>
        </table>
      </form>
      <div id="close-btn">X</div>
    </div>
  </div>

  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      //Fetch All Records
      function loadTable() {
        $.ajax({
          url: "http://localhost/CRUD_ALL_PRACTIC/php-rest-api-crud/api-fetch-all.php",
          type: "GET",
          success: function(data) {
            if (data.status == false) {
              $("#load-table").append(
                "<tr><td colspan='6'><h2></h2>" + data.message + "</td></tr>"
              );
            } else {
              $.each(data, function(key, value) {
                $("#load-table").append(
                  "<tr>" +
                 "<td>" + value.roll + "</td>" +
                  "<td>" + value.name + "</td>" + 
                  "<td>" + value.age + "</td>" +
                  "<td>" + value.gender + "</td>" +
                  "<td><button class = 'edit-btn'data-sroll=" +  value.roll + ">Edit</button></td>" +
                  "<td><button class = 'delete-btn'data-roll=" + value.roll + ">Delete</button></td>" +
                  "</tr>"
                );
              });
            }
          },
        });
      }
      loadTable();
      //Insert New Record

      //Delete Record

      //Fetch Single Record : Show in Modal Box
      $(document).on("click", ".edit-btn", function() {
        $("#modal").show();
        var roll = $(this).data("sroll");
        var obj = {
          s_roll: roll
        };
        var myJson = JSON.stringify(obj);
        // alert(myJson);
        // console.log(myJson);
        $.ajax({
          url : "http://localhost/CRUD_ALL_PRACTIC/php-rest-api-crud/api-fetch-single.php",
          type : "post",
          data : myJson,
          // dataType: "json",
          success: function(data) {
            // $("#edit-id").val(data[0].roll);
            // $("#edit-name").val(data[0].name);
            // $("#edit-age").val(data[0].age);
            // $("#edit-gender").val(data[0].gender);
            console.log(data);

          },
        });
      });
      //Hide Modal Box
      $("#close-btn").on("click", function() {
        $("#modal").hide();
      });

      //Update Record

      //Live Search Record
    });
  </script>
</body>

</html>