function call(){
	window.location="registration.php";
}
function call2(){
	let x=document.getElementById('password').value;
	let y=document.getElementById('conpass').value;
	if(x!=y){
		document.getElementById('password').style.border='2px solid red';
	    document.getElementById('conpass').style.border='2px solid red';
	}
	else{
		document.getElementById('password').style.border='2px solid green';
	    document.getElementById('conpass').style.border='2px solid green';
	}	
}
function call3(){
window.location="index.php";
	}
	function cal(){
		document.getElementById('label').style.display='none';
	}
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
  document.getElementById('mail').value='';
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
document.getElementById("buttt").addEventListener("click", function(event){
  event.preventDefault()});