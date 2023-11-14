<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Ci4 LOGO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php
      if(session()->getFlashdata('status')){
        echo "<h4 style=color:green>".session()->getFlashdata('status') ."</h4>";
      }else if(session()->getFlashdata('error')){
        echo "<h4 style=color:red>".session()->getFlashdata('error') ."</h4>";
      }
    ?> 
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url(); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('allrecord'); ?> ">View Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('addUsers') ?>">Add User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Help</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
      </form>
    </div>
  </div>
</nav>