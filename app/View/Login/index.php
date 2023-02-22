<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <?php 
            if(!empty($login_err)){
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }?>
            <form method="POST" class="card-body p-5 text-center" >

                <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typeEmailX">Email</label>
                    <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg  <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" or="typePasswordX">Password</label>
                    <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-outline-light btn-lg px-5" value="Login">
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>
                </div>

            </form>
            </div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>