<?php if($this->session->flashdata('post_created')):?>
<?php echo '<p class="alert-success">'.$this->session->flashdata('post_created').'</p>'?>
<?php elseif($this->session->flashdata('post_updated')):?>
<?php echo '<p class="alert-warning">'.$this->session->flashdata('post_updated').'</p>'?>
<?php elseif($this->session->flashdata('post_deleted')):?>
<?php echo '<p class="alert-danger">'.$this->session->flashdata('post_deleted').'</p>'?>
<?php elseif($this->session->flashdata('comment_created')):?>
<?php echo '<p class="alert-success">'.$this->session->flashdata('comment_created').'</p>'?>
<?php endif;?>

<h2><?php echo $title ;?></h2>
<?php foreach($posts as $post) :?>
<h3><?php echo $post['title'];?></h3>
<div class="row">
    <div class="col-md-3">
        <img class="img img-responsive img-fluid rounded"
         src="<?php echo site_url();?>assets/images/posts/<?php echo $post['post_image']?>" alt="">
    </div>

    <div class="col-md-9">
        <small class="post_date">Created at : <?php echo $post['created_at'];?> in <?php echo $post['name'];?></small>
        <p><?php echo $post['body'];?></p>
        <p><a class="btn btn-outline-info" href="<?php echo current_url().'/'.$post['slug'];?>">ReadMore</a></p>
    </div>
</div>
<?php endforeach;?>


<div class="pagination-link">
    <?php echo $this->pagination->create_links();?>
</div>