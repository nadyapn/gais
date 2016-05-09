// Validating Empty Field
function check_empty() {
if (document.getElementById('popupDesc').value == "") {
alert("Fill The Field!");
} else {
document.getElementById('submitForm').submit();
alert("Form Submitted Successfully...");
}
}
//Function To Display Popup
function div_show() {
document.getElementById('divPopup').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('divPopup').style.display = "none";
}
function div_show2(){
  var varSelectRoom = document.getElementById('idSelectRoom').value;
  var foo = document.createTextNode("\u00A0");
  document.getElementById('pIDResultRoom').style.color = "white";
  document.getElementById('pIDResultRoom').innerHTML = ' ' + varSelectRoom;
}
