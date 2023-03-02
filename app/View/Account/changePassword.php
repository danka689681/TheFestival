<head>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <!-- <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" /> -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/account.css" rel="stylesheet" />
</head>
<body>
    <script>
        function validatePassword() {
	        var currentPassword, newPassword, confirmPassword, output = true;

	        currentPassword = document.frmChange.currentPassword;
	        newPassword = document.frmChange.newPassword;
	        confirmPassword = document.frmChange.confirmPassword;

	        if (!currentPassword.value) {
		        currentPassword.focus();
		        document.getElementById("currentPassword").innerHTML = "required";
		        output = false;
	        }
	        else if (!newPassword.value) {
	        	newPassword.focus();
		        document.getElementById("newPassword").innerHTML = "required";
		        output = false;
	        }
	        else if (!confirmPassword.value) {
		        confirmPassword.focus();
		        document.getElementById("confirmPassword").innerHTML = "required";
		        output = false;
	        }
	        if (newPassword.value != confirmPassword.value) {
		        newPassword.value = "";
		        confirmPassword.value = "";
		        newPassword.focus();
		        document.getElementById("confirmPassword").innerHTML = "not same";
		        output = false;
	        }
	        return output;
        }
</script>
    <div class="form-container">
        <form class="form-horizontal" name="frmChange" method="post" action=""
            onsubmit="return validatePassword()">

            <div class="validation-message text-center"><?php if(isset($message)) { echo $message; } ?></div>
            <h2 class="title">Change Password</h2>
            <div>
                <div class="row">
                    <label class="inline-block">Current Password</label>
                    <span id="currentPassword"
                        class="validation-message"></span> <input
                        type="password" name="currentPassword"
                        class="form-control" required>

                </div>
                <div class="row">
                    <label class="inline-block">New Password</label> <span
                        id="newPassword" class="validation-message"></span><input
                        type="password" name="newPassword"
                        class="form-control" required>

                </div>
                <div class="row">
                    <label class="inline-block">Confirm Password</label>
                    <span id="confirmPassword"
                        class="validation-message"></span><input
                        type="password" name="confirmPassword"
                        class="form-control" required>

                </div> <br>
                <div class="row">
                    <input type="submit" name="submit" value="Submit"
                        class="form-control btn">
                </div>
            </div>

        </form>
    </div>
</body>

