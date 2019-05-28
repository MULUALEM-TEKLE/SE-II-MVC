

<h2><?php echo $post['title']?></h2>
<small class="post_date">Created at : <?php echo $post['created_at'];?></small>

<img class="img img-responsive img-fluid rounded"  style="width:500px ; height:400px"
         src="<?php echo site_url();?>assets/images/posts/<?php echo $post['post_image']?>" alt="">

<div class="post_body">
<?php echo $post['body']?>
</div>
<?php if($this->session->userdata('user_id') == $post['user_id']):?>
    <?php echo form_open('posts/delete/'.$post['id']);?>
    <input type="submit" class="btn btn-outline-danger" value = "DELETE">
    <a href="<?php echo site_url()?>posts/edit/<?php echo $post['id'];?>" class="text-info btn btn-outline-info">Edit</a>
    <?php echo form_close();?>
<?php endif;?>
<hr>
<h3>Comments</h3>

<?php if($comments):?>
    <?php foreach($comments as $com):?>
    <h5><?php echo $com['body']?> <small><?php echo '['.$com['name'].']'?></small></h5>
<?php endforeach;?>
<?php else:?>
<p>No comments to display</p>
<?php endif;?>

<hr>
<h3>Add Comments</h3>
<div class="text-danger">
    <?php echo validation_errors();?>
</div>
<?php echo form_open('comments/create/'.$post['id'])?>
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="email" required name="email_addr" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Comment</label>
        <textarea name="comment" class="form-control"></textarea>
    </div>
    <input type="hidden" name="slug" value="<?php echo $post['slug']?>">
    <button type="submit" class="btn btn-outline-success">Submit</button>
</form>