<div class="content">
    <div class="card-body form-container">
        <h2 class="card-title">Change Password</h2><br>
            <form class="form-horizontal" name="frmChange" method="post">
                <div>
                    <div class="row" class="input-group">
                        <label class="inline-block">Current Password *</label>
                        <input id="currentPassword" type="password" name="currentPassword" class="form-control" onkeyup="textFilled()" required>
                        <span class="invalid-feedback custom"><?php echo $currentPassword_err; ?></span>
                    </div><br>
                    <div class="row">
                        <label class="inline-block">New Password *</label>
                        <input id="password" type="password" name="password" class="form-control" onkeyup="textFilled()" required>
                    </div><br>
                    <div class="row">
                        <label class="inline-block">Confirm Password *</label>
                        <input id="confirmPassword" type="password" name="confirmPassword" class="form-control" onkeyup="textFilled()" required>
                        <span class="invalid-feedback custom"><?php echo $confirmPassword_err; ?></span>

                    </div> <br>
                    <div class="row">
                        <input id="btnSubmit" type="submit" name="btnSubmit" value="Submit"
                            class="btn" disabled>
                    </div>
                </div>
            </form>
    </div>
</div>

<script>
   var css = document.createElement('link');
   css.rel = 'stylesheet';
   css.href = '../assets/css/account_changePassword.css';
   document.head.appendChild(css);
</script>

<script>
    function textFilled(){
        if(document.getElementById("currentPassword").value==="" || document.getElementById("password").value==="" || document.getElementById("confirmPassword").value==="") { 
            document.getElementById('btnSubmit').disabled = true; 
        } else { 
            document.getElementById('btnSubmit').disabled = false;
        }
    }
</script>
