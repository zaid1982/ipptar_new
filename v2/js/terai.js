function setAddAction() {
document.frmUser.action = "add_kursus.php";
document.frmUser.submit();
}
function setUpdateAction() {
document.frmUser.action = "edit_kursus.php";
var textinputs = document.querySelectorAll('input[type=checkbox]'); 
var empty = [].filter.call( textinputs, function( el ) {
   return !el.checked
});

if (textinputs.length == empty.length) {
    alert("None filled");
    return false;
}
document.frmUser.submit();
}
function setDeleteAction() {
var textinputs = document.querySelectorAll('input[type=checkbox]'); 
var empty = [].filter.call( textinputs, function( el ) {
   return !el.checked
});

if (textinputs.length == empty.length) {
    alert("None filled");
    return false;
}
if(confirm("Are you sure want to delete these rows?")) {
document.frmUser.action = "delete_kursus.php";
document.frmUser.submit();
}
}