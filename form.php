<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
	<title>Registeration for user</title> 
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script> 


    <script type="text/javascript">
	$(document).ready(function(){
		$("#loginform").validate({
			debug: false,
			rules: {
				username: "required",
                                password: "required"
			},
			messages: {
				username: "Please let us know who you are.",
                                password: "Password must be provided"

			},
			submitHandler: function(form) {$("#myform").hide();
				// do other stuff for a valid form
				$.post('register.php', $("#loginform").serialize(), function(data) {
					$('#results').html(data);
					//alert("Form submitted successfully!!!");
				});
			}
		});
                
            
	});
	</script>
	<style>
	label.error { width: 250px; display: inline; color: red;}
	</style>
</head>
<body>
<?php
if(isset($_GET["op"]))
 { if($_GET["op"]=='error')
    {
       echo $_GET['err'].", please change your username";
    }

  }
?>

	<div id="login">
		<div id="login-ct">
			<div id="login-header">
				<h2 name="cs">Login</h2>
				<a class="modal_close" href="#"></a>
			</div>
		
			<form name="loginform" id="loginform" action="">  

			  <div class="txt-fld">
			    <label for="">Username</label>
			    <input  class="good_input" id="username" name="username" type="text" />

			  </div>
			  <div class="txt-fld">
			    <label for="">Password</label>

			    <input name="password"  id="password"type="text" />

			  </div>
			  <div class="btn-fld">
			  	<button type="submit"  name="submit">Login&raquo;</button>
		          </div>
			 </form>
		</div>
	</div>


<!-- We will output the results from process.php here -->
<div id="results">
</div>
</body>
</html>
