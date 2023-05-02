 
<?php 
  ob_start();
  include 'config.php';
  $users = $user->getUsers();
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
                    <h4>Users</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <a href="/createUser" class="btn btn-primary">Add</a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Action</th>
                        </tr>
                        <?php foreach ($users as $user) { ?>
                        <tr>
                          <td><?php echo $user['name']; ?></td>
                          <td><?php echo $user['email']; ?></td>
                          <td>
                            <?php foreach($roles as $rol) { ?>
                              <?php if ($user['role_id'] == $rol['id']) {
                                echo $rol['role'];
                              } ?>                              
                            <?php } ?>
                          </td>
                          <td>
                            <?php foreach($_SESSION['roles'] as $role) { ?>
                              <?php if ($role['role_id'] == 1) { ?>
                            <a href="/editUser?id=<?php echo $user['id']; ?>" class="btn btn-primary">Edit</a>
                            <form method="POST" action="/deleteSklad">
                              <input type="hidden" name="id" value="vv">
                              <button class="btn btn-icon btn-danger" onclick="return confirm('Confirm  delete')" type="submit" name="delete"><i class="fas fa-times"></i></button>
                            </form>
                          <?php } ?>
                          <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </section>
    
<?php 

  include 'resource/layouds/footer.php';


 ?>