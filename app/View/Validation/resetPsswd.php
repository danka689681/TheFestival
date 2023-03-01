<div class="main-content">

<h2>Change your password</h2>
<form method="POST">
  <div class="form-group">
    <label for="exampleInputPassword1">New password</label>
    <input type="password" name="newPsswd" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm new password</label>
    <input type="password" name="confirmNewPsswd" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <small id="emailHelp" class="form-text text-muted"><?= $errMsg?></small>
  <button name="changePsswd" type="submit" class="btn btn-primary">Change password</button>
</form>
</div>
 