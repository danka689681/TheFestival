<div class="Main">
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick="login()">Login</button>
				<button type="button" class="toggle-btn" onclick="register()">Register</button>
			</div>
		    	<form id="login" class="input-group" method="POST">
		    		<input type="email" name="email"class="input-field" placeholder="Email" required>
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
		    		<input type="password" name="password" class="input-field" placeholder="Password" required>
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
		    	</form>
 
		    	<form id="register" class="input-group" method="POST">
		    		<input type="text" name="register-name"class="input-field" placeholder="Name" required>
		    		<input type="email" name="register-email"class="input-field" placeholder="Email" required>
		    		<input type="password" name="register-password"class="input-field" placeholder="Password" required>
					<input type="password" name="register-confirm-password"class="input-field" placeholder="Confirm password" required>
					<div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div> 
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
		    	</form>
				<form id="recaptcha" class="input-group" method="POST">
			 <!--	<div class="g-recaptcha" data-sitekey="6LffltEkAAAAAO87rv5-5Al6forQsIg7OCZnei0X"></div> -->
				</form>
		</div>
	</div>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        var css = document.createElement('link');
        css.rel = 'stylesheet';
        css.href = '../assets/css/login.css';
        document.head.appendChild(css);
    </script>
    <script type="text/javascript" src="../assets/js/login.js"></script>
