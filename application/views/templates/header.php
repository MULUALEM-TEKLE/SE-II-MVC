<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet"  href="<?php echo base_url();?>assets/css/style.css">

</head>
<body>
    
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <a class="navbar-brand" href="<?php echo base_url();?>">LOGO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" 
      aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url();?>home">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>posts">Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>about">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>categories">Categories</a>
          </li>
          
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown03" data-toggle="dropdown" 
            aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown03">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->
        </ul>

        <ul class="navbar-nav navbar-right">
        
          <?php if($this->session->userdata('logged_in')):?>
            <li class="nav-item">
              <a class="nav-link " href="<?php echo base_url()?>posts/create">Create Post</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="<?php echo base_url()?>categories/create">Create Category</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="<?php echo base_url()?>users/logout">Logout</a>
            </li>
          <?php endif;?>
          
          <?php if(!$this->session->userdata('logged_in')):?>
            <li class="nav-item">
              <a class="nav-link " href="<?php echo base_url()?>users/register">SignUp</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="<?php echo base_url()?>users/login">Login</a>
            </li>
          <?php endif;?>
        </ul>
        <!-- <form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search">
        </form> -->
      </div>
    </nav>

<div class="container-fluid">


<?php if($this->session->flashdata('user_registered')):?>
<?php echo '<p class="alert-success">'.$this->session->flashdata('user_registered').'</p>'?>
<?php elseif($this->session->flashdata('user_logged_in')):?>
<?php echo '<p class="alert-success">'.$this->session->flashdata('user_logged_in').'</p>'?>
<?php elseif($this->session->flashdata('user_logged_out')):?>
<?php echo '<p class="alert-success">'.$this->session->flashdata('user_logged_out').'</p>'?>
<?php elseif($this->session->flashdata('category_deleted')):?>
<?php echo '<p class="alert-success">'.$this->session->flashdata('category_deleted').'</p>'?>
<?php endif;?>
