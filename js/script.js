window.onload = function() {
	//alert('connect')
}
function myFunction() {
  var x = document.getElementById("login_pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

