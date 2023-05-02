 
<?php 
  include 'config.php';
  $products = $product->getProducts();
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
                    <h4>Products</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <a href="/createProduct" class="btn btn-primary">Add</a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Count</th>
                          <th>Action</th>
                        </tr>
                        <?php foreach ($products as $product) { ?>
                        <tr>
                          <td><?php echo $product['name']; ?></td>
                          <td><?php echo $product['price']; ?></td>
                          <td><?php echo $product['count']; ?></td>
                          <td>
                            <?php foreach($_SESSION['roles'] as $role) { ?>
                              <?php if ($role['role_id'] == 1) { ?>
                            <a href="/editProduct?id=<?php echo $product['id']; ?>" class="btn btn-primary">Edit</a>
                            <form method="POST" action="/deleteProduct">
                              <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                              <button class="btn btn-icon btn-danger" onclick="return confirm('Confirm <?php echo $product['name']; ?> delete')" type="submit" name="delete"><i class="fas fa-times"></i></button>
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