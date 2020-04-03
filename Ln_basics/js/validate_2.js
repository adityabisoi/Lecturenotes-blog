function validate(inputId, errId) {
	var inputElement = document.getElementById(inputId);
	var errElement = document.getElementById(errId);
	if(inputElement.value.length == ""){
		errElement.style.color="red";
		errElement.style.display="block";
		errElement.innerHTML="Can not be empty";
	  } else {
		errElement.style.color="blue";
		errElement.style.display="block";
		errElement.innerHTML="Correct";
	  }
}

function validatePass() {
	var pass1 = document.getElementById("pass1").value;
	var pass2 = document.getElementById("pass2").value;
	var errElement = document.getElementById("pass2Err");
	if(pass1 != pass2){
		errElement.style.color="red";
		errElement.style.display="block";
		errElement.innerHTML="Password do not match";
	  } else if(pass2 == "") {
	    errElement.style.color="red";
		errElement.style.display="block";
		errElement.innerHTML="Can not be empty";
	  } else {
		errElement.style.color="blue";
		errElement.style.display="block";
		errElement.innerHTML="Correct";
	  }
}

function validateForm() {
  var fname = document.forms["login"]["fname"].value;
  if (fname == "") {
    alert("Name must be filled out");
    return false;
  }
}
