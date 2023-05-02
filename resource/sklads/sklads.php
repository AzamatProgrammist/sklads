 
<?php 
  ob_start();
  include 'config.php';
  $result = $sklad->getSklads();
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
                    <h4>Skladlar</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <a href='/skladCreate' class="btn btn-primary">Add</a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                        <?php foreach ($result as $key): ?>
                        <tr>
                          <td><?php echo $key['name']; ?></td>
                          <td>
                            <?php foreach($_SESSION['roles'] as $role) { ?>
                              <?php if ($role['role_id'] == 1) { ?>
                            <a href="/editSklad?id=<?php echo $key['id']; ?>" class="btn btn-primary">Edit</a>
                            <form method="POST" action="/deleteSklad">
                              <input type="hidden" name="id" value="<?php echo $key['id']; ?>">
                              <button class="btn btn-icon btn-danger" onclick="return confirm('Confirm <?php echo $key['name']; ?> delete')" type="submit" name="delete"><i class="fas fa-times"></i></button>
                            </form>
                          <?php } ?>
                          <?php } ?>
                          </td>
                        </tr>
                        <?php endforeach; ?>
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







