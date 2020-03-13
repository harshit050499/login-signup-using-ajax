<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<section>
	<div class="col-sm-12">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="contain-login">
				<div class="login-form">
					<form id='form'>
						<div class="form-group">
							<label for="name">NAME:</label>
							<input class="form-control" type="text" name="name" id="name">
						</div>
						<div class="form-group">
							<label for="name">Email:</label>
							<input class="form-control" type="email" name="email" id="email">
						</div>
						<div class="form-group">
							<label for="name">Password:</label>
							<input class="form-control" type="password" name="password" id="password">
						</div>
						<div class="form-group">
							<label for="name">Confirm Password</label>
							<input class="form-control" type="password" name="cpassword" id="cpassword">
						<div class="form-group">
							<label for="name">GENDER:</label>
							<select  id="gender" name="gender" class="form-control">
								<!-- <option value="">SELECT</option> -->
								<option value="male">MALE</option>
								<option value="female">FEMALE</option>
								<option value="other">OTHER</option>
							</select>
						</div>
						<div class="button" style="text-align: center;margin: 25px 0px;">
                                <input  class="button-submit btn btn-primary " type="submit" name="submit" style="background: rgb(177,4,0) !important; border:none !important; color: white !important;" onclick="save();">
                            </div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	function save()
	{
			

			var name=document.getElementById('name').value;
			var email=document.getElementById('email').value;
			var pass=document.getElementById('password').value;
			var cpass =document.getElementById('cpassword').value;
			var gender =document.getElementById('gender').value;
			if(name!="" && email!="" && pass!="" && cpass!="" && gender!="")
			{
			var a = ValidateEmail(email);
            var b = passmatch(pass,cpass);
            
            
				if( a== true && b== true){
                    $.ajax({
                                        type: "POST",
                                        url: "ajax/signup.php",
                                        data: {name:name,pass:pass,cpass:cpass,email:email,gender:gender,signup:'signup'},
                                        success: function(data){
                                          
                                             if(data == 3){
                                                alert('You are already registered. kindly Login.');

                                             }
                                             else if(data == 0){
                                                alert('registered sucessfully !. ');
                                                
                                                window.location.reload();
                                             }
                                             else if(data==7)
                                             {
                                             	alert("something went wrong");
                                             }
                                             else{
                                                alert(data);
                                             }
                                     
                                         
                                        }
                                      });
              }
			}
			else
			{
				alert("INPUT ALL THE DATA");
			}
	}
	function ValidateEmail(mail){     
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if(reg.test(mail)){
            return true;
        }
        else{
                alert("You have entered an invalid email address!");   
                return false;
            }
}
function passmatch(a,b){
   
    if(a == b){ return (true);}
    else{ alert("You have entered an invalid Password!"); return(false); }
}
</script>
</section>
<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>
</body>

</html>