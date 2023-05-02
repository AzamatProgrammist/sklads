<?php 
  include 'config.php';
  if (isset($_GET['id'])) {
    $category_id = $_GET['id'];
    $productCategory = $product->productCategory($category_id);
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
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Count</th>
                          <th>Action</th>
                        </tr>
                        <?php foreach ($productCategory as $product) { ?>
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



