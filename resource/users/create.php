 
<?php 
  ob_start();
  include 'config.php';
  $roles = $role->getRoles();
  include 'resource/layouds/header.php';
  include 'resource/layouds/sidebar.php';
 ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Sklad</h4>
                  </div>
                  <form method="POST" action="">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Roles</label>
                        <select name="role_id" class="form-control">
                          <?php foreach($roles as $role) { ?>
                          <option value="<?php echo $role['id']; ?>"><?php echo $role['role']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" name="btn" class="btn btn-primary">Save</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

        </section>
    
<?php 

  include 'resource/layouds/footer.php';

  if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role_id = $_POST['role_id'];
    $result = $user->store($name, $password, $email, $role_id);
    if ($result) {
          header("Location: /users");
          ob_end_fluch();
        }else{
          echo "Xatolik";
        }
  }

 ?>
