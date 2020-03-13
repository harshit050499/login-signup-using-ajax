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
							<label for="name">Email:</label>
							<input class="form-control" type="email" name="email" id="email">
						</div>
						<div class="form-group">
							<label for="name">Password:</label>
							<input class="form-control" type="password" name="password" id="password">
						</div>
					
						<div class="button" style="text-align: center;margin: 25px 0px;">
                                <input  class="button-submit btn btn-primary " type="submit" name="submit" style="background: rgb(177,4,0) !important; border:none !important; color: white !important;" onclick="login();">
                            </div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	function login()
	{
		var email=document.getElementById('email').value;
		var pass=document.getElementById('password').value;
		if(email!="" && pass!="")
		{
			if (ValidateEmail(email)) {

				$.ajax(
				{
					type:'POST',
					url:"ajax/login.php",
					data:{email:email,pass:pass,login:'login'},
					success:function(data)
					{
						if(data==0)
						{
							window.location.href = "dashboard.php";
						}
						else if(data==1)
						{
							alert('invalid credentials');
						}
						else
						{
							alert(data);
						}
					}
				});
			}
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
</script>
</section>

<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>
</body>
</html>