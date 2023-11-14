<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Edit User form <a href="<?= site_url('home') ?>" class="btn btn-primary">Home page </a></h2> 

  <?php
      if(session()->getFlashdata('status')){
        echo "<h4 style=color:green>".session()->getFlashdata('status') ."</h4>";
      }else{
        echo "<h4 style=color:red>".session()->getFlashdata('error') ."</h4>";
      }
    ?> 
  <form action="<?= site_url('edit-users/'.$userdata['id']) ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label for="name">First Name:</label>
      <input type="text" class="form-control" value="<?= $userdata['first_name'] ?>" id="first_name" placeholder="Enter First Name" name="first_name">
    </div>
    <div class="mb-3">
      <label for="name">Last Name:</label>
      <input type="text" class="form-control" value="<?= $userdata['last_name'] ?>" id="last_name" placeholder="Enter Last Name" name="last_name">
    </div>
    <div class="mb-3">
      <label for="city">City:</label>
      <input type="text" class="form-control" value="<?= $userdata['city'] ?>" id="city" placeholder="Enter City" name="city">
    </div>
    <!-- image upload -->
    <div class="mb-3">
      <label for="image">Update Profile Image:</label>
      <input type="file" class="form-control"  name="image" >
    </div>
    <button type="submit" class="btn btn-primary">update</button>
  </form>
</div>

</body>
</html>
