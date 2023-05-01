<?php 
  ob_start();
  include 'config.php';
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $user->editUser($id);
  }
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
                    <h4>Edit User</h4>
                  </div>
                  <form method="POST" action="/updateUser">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" value="<?php echo $result['name']; ?>" type="name" class="form-control" name="name" tabindex="1" required autofocus>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" value="<?php echo $result['email']; ?>" type="email" class="form-control" name="email" tabindex="1">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                        <input id="password" value="<?php echo $result['password']; ?>" type="password" class="form-control" name="password" tabindex="1" required>
                      </div>
                      <div class="form-group">
                        <label>Roles</label>
                        <select name="role_id" class="form-control">
                          <?php foreach($roles as $role) { ?>
                          <option <?php if ($role['id'] == $result['role_id']) { ?> selected <?php } ?> value="<?php echo $role['id']; ?>"><?php echo $role['role']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" name="update" class="btn btn-primary">Save</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </section>
<?php 
  include 'resource/layouds/footer.php';
  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $result = $sklad->update($id, $name);
    if ($result) {
          header("Location: /sklads");
          ob_end_fluch();
        }else{
          echo "Xatolik";
        }
  }

 ?>



