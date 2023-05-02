<?php 
  ob_start();
  include 'config.php';
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $producta = $product->getProduct($id);
  }
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
                  <form method="POST" action="/updateProduct">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" value="<?php echo $producta['name']; ?>" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                      </div>
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input id="price" value="<?php echo $producta['price']; ?>" type="text" class="form-control" name="price" tabindex="1">
                      </div>
                      <div class="form-group">
                        <label for="password">Count</label>
                        <input type="hidden" name="id" value="<?php echo $producta['id']; ?>">
                        <input id="count" value="<?php echo $producta['count']; ?>" type="text" class="form-control" name="count" tabindex="1" required>
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
  

 ?>



