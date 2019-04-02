<!DOCTYPE HTML>
<html>
<head>
<style>
#grahambell
{
	height:100%;
	width:100%;
}
</style>
<link rel="stylesheet" href="phonebookindex.css" type="text/css" />
<title>Phonebook</title>
<div id="header">

		<a href="phonebook.pdf"  target="_blank">
		<img id="img1"  src="phone44.png"  title="phonebook" alt="logo">
		</a>
		<center><h1 id="headh1">PHONE BOOK</h1></center>
		<div class="img2">
		<a href="http://www.facebook.com" title="Facebook" target="_blank">
		<img  style="float:right;" id="img2"  src="facebook.png" alt="facebook">
		</a>
		<a href="http://www.twitter.com" title="Twitter" target="_blank">
		<img  style="float:right;" id="img2"  src="twitter.jpg" alt="twitter">
		</a>
		<a href="http://www.gmail.com" title="Gmail" target="_blank">
		<img  style="float:right;" id="img2"  src="email.png" alt="email">
		</a>
		</div>

</div>
</head>
<body id="body">
	<div id="welcome">
		<marquee behavior="alternate"><h3 id="h3">WELCOME TO PHONEBOOK!</h3></marquee>
	</div><hr id="hr1">
				<div id="div3">
				<a href="https://en.wikipedia.org/wiki/Alexander_Graham_Bell"  target="_blank">
				<img id="grahambell"  src="gb1.jpg"  title="grahambell" alt="grahambell">
				</a>
				</div>
				<div id="div4" >
				<!--<img src="photo.jpg" alt="chennailogo" />-->
	  				<img class="myslides" src="phone.jpg">
	  				<img class="myslides" src="phone1.jpg">
	  				<img class="myslides" src="phone2.jpg">
	  				<img class="myslides" src="phone3.jpg">
	  				<img class="myslides" src="phone6.jpg">
	  				<img class="myslides" src="phone7.jpg">
				</div>
				<div id="div5">
				
				<button id="button1" ><a id="a1" href="itc.pdf" target="_blank">
				<b>International Calling Codes</b></a></button>
				
				
				<button id="button1"><a id="a1" href="registrationphonebook.php" target="_self"><b>Registration</b></a></button>
				<button id="button1"><a id="a1" href="indexpb.php" target="_self"><b>Login</b></a></button>
				<!--<select id="select1" required>
                     <option value="login" hidden selected><b>Login</b></option>
                     <option>
                     <button><a href="indexpb.php" target="_self"><b>Admin Login</b></a></button>
                     </option>
                     <option  id="option" value="user"><b>User Login</b></option>
                </select>-->
				</div>
				<hr id="hr2">
				<div id="div6">
				<p><span id="h4">Contact Us:</span></p>
				<p><span id="p1">Email:</span>varaj6@gmail.com |<span id="p1"> Phone:</span>7845627080 |<span id="p1"> Facebook:</span> varajgandhi </p>
				</div>

		<script>
			var myIndex = 0;
			carousel();

			function carousel() 
			{
	    		var i;
	    		var x = document.getElementsByClassName("myslides");
	    		for (i = 0; i < x.length; i++)
	    		 {
	       				x[i].style.display = "none";  
	    		 }
	    		myIndex++;
	    		if (myIndex > x.length) {myIndex = 1}    
	    		x[myIndex-1].style.display = "block";  
	    		setTimeout(carousel, 4000); // Change image every 2 seconds
			}
			 
				function disableBackButton()
				{
					window.history.forward();
				 
					disableBackButton(); 
					window.onload=disableBackButton(); 
					window.onpageshow=function(evt) { if(evt.persisted) disableBackButton() } 
					window.onunload=function() { void(0) } 
				}
</script>

</body>
</html>

<!--<div class="container">
	<div class="row">
		<input type="hidden" name="count" value="1" />
        <div class="control-group" id="fields">
            <label class="control-label" for="field1">Nice Multiple Form Fields</label>
            <div class="controls" id="profs"> 
                <form class="input-append">
                    <div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Type something" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
                </form>
            <br>
            <small>Press + to add another form field :)</small>
            </div>
        </div>
	</div>
</div>-->