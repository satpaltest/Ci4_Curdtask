<?php 
  include 'common/header.php';
  include 'common/nav.php';
?>
<div class="container mt-3">
  <h2>Basic Table <a href="<?= base_url('addUsers')?>" class="btn btn-primary">Add-User</a></h2>
  <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p> 
    <!--display msg  -->
  <?php
      if(session()->getFlashdata('status')){
        echo "<h4 style=color:green>".session()->getFlashdata('status') ."</h4>";
      }else{
        echo "<h4 style=color:red>".session()->getFlashdata('error') ."</h4>";
      }
  ?>         
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>City</th>
        <th colspan="2" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php
        if(!empty($userdata)){
        foreach($userdata as $userrow){ ?>
      <tr>
        <td><?= $userrow['id']; ?></td>
        <td><?= $userrow['first_name']; ?></td>
        <td><?= $userrow['last_name']; ?></td>
        <td><?= $userrow['city']; ?></td>
        <td class="text-center"><a href="<?= site_url('allrecord/edit-user/'.$userrow['id']) ?>" class="btn btn-success">Edit</a></td>
        <td class="text-center"><a href="<?= site_url('allrecord/delete/'.$userrow['id']) ?>" class="btn btn-danger">Delete</a></td>
      </tr>
      <?php } }else{
        ?>
        <tr><td colspan="6" class="text-center">Not data found</td></tr>
        <?php 
      } ?>
    </tbody>
  </table>
</div>
<?php 
  include 'common/footer.php';
?>
