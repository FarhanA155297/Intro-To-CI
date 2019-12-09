<div class="container">
  <div class="col-lg-6 col-lg-offset-3">
<form class="form-horizontal well" action="" method="post">
  <fieldset>
    <legend>Login</legend>
    <div class="form-group">
      <label for="inputUsername" class="col-lg-2 col-lg-offset-1 control-label">Username</label>
      <div class="col-lg-8">
        <input name="username" type="text" class="form-control" id="inputUsername" placeholder="" required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 col-lg-offset-1 control-label">Password</label>
      <div class="col-lg-8">
        <input name="password" type="password" class="form-control" id="inputPassword" placeholder="" required>
        <div class="checkbox">
          <label>
          <input type="checkbox"> Remember Me
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-6 col-lg-offset-3">
      	<input type="hidden" name="form-submitted" value="login" />
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
</div>
</div>