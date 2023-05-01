 
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
                    <h4>Create Sklad</h4>
                  </div>
                  <form method="POST" action="">
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                          <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>
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
    $result = $sklad->store($name);
    if ($result) {
          header("Location: /sklads");
          ob_end_fluch();
        }else{
          echo "Xatolik";
        }
  }

 ?>
