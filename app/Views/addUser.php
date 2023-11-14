<?php 
  include 'common/header.php';
  include 'common/nav.php';
?>
<div class="container mt-3">
  <h2>Add User form <a href="<?= site_url('home') ?>" class="btn btn-primary">Home page </a></h2> 

  <?php
     if(session()->getFlashdata('status')){
      echo "<h4 style=color:green>".session()->getFlashdata('status') ."</h4>";
    }else if(session()->getFlashdata('error')){
      echo "<h4 style=color:red>".session()->getFlashdata('error') ."</h4>";
    }
    ?>   
  <form action="<?= site_url('add-users') ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label for="name">First Name:</label>
      <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name">
    </div>
    <div class="mb-3">
      <label for="name">Last Name:</label>
      <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name">
    </div>
    <div class="mb-3">
      <label for="city">City:</label>
      <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
    </div>
    <!-- image upload -->
    <div class="mb-3">
      <label for="city">Profile Image:</label>
      <input type="file" class="form-control" id="image"  name="image">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<?php  include 'common/footer.php' ?>
