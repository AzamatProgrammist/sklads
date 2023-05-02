 
<?php 
  ob_start();
  include 'config.php';
  $sklads = $sklad->getSklads();
  $categorys = $category->getCategories();
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
                        <label>Price</label>
                        <input type="text" name="price" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Count</label>
                        <input type="text" name="count" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Select Category</label>
                        <select name="category_id" class="form-control">
                          <?php foreach($categorys as $category) : ?>
                          <option value="<?php echo $category['id']; ?>"><?php echo $category['category']; ?></option>
                          <?php endforeach ; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Select Sklad</label>
                        <select name="sklad_id" class="form-control">
                          <?php foreach($sklads as $sklad) { ?>
                          <option value="<?php echo $sklad['id']; ?>"><?php echo $sklad['name']; ?></option>
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
    $price = $_POST['price'];
    $count = $_POST['count'];
    $category_id = $_POST['category_id'];
    $sklad_id = $_POST['sklad_id'];
    $result = $product->store($name, $price, $count, $category_id, $sklad_id);
    if ($result) {
          header("Location: /products");
          ob_end_fluch();
        }else{
          echo "Xatolik";
        }
  }

 ?>
