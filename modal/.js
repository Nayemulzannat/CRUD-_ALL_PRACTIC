$("#tabs").tabs();
//-- Modal has finished being hidden
$('#newConsigneeModal').on('hidden.bs.modal', function (e) {
  //$(this).find('form')[0].reset();
});

$("#newConsigneeReset").on("click", function(){$('#newConsigneeModal').find("form")[0].reset();});
$("#newConsigneeSubmit").on("click", function(){submitNewConsignee();});
function submitNewConsignee() {
  $("#new_comments").hide();
}