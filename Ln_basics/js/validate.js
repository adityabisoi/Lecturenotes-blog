function myFunction(){
  var pas=document.getElementById("pass").value;
  var pas1=document.getElementById("rpass").value;
  if(pas!=pas1)
  document.getElementById("error").style.display="block";
  var fname=document.getElementById("fname").value.length;
  if(fname == 0)
  document.getElementById("error1").style.display="block";
  var lname=document.getElementById("lname").value.length;
  if(lname == 0)
  document.getElementById("error2").style.display="block";
  var mail=document.getElementById("mail").value.length;
  if(mail == 0)
  document.getElementById("error3").style.display="block";
}
