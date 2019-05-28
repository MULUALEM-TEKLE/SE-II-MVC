<h2 class="text-center"><?php echo $title;?></h2>

<?php echo validation_errors();?>

<div class="row justify-content-center">
    <div class="col-sm-8 col-xs-12">
        <?php echo form_open_multipart('posts/create');?>
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name ="title" placeholder="Add Title">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">body</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" name="body"
                placeholder="Add Body"></textarea>
            </div>
            <div class="form-group">
            <label for="">Categories</label>
                <select name="category_id" id="" class="form-control">
                    <?php foreach($categories as $cat):?>
                    <option value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="form-group">
                <label for="">Photo</label>
                <input type="file" name = "userfile" size = "20">
            </div>

            <button type="submit" class="btn btn-primary float-right">Submit</button>
        <?php echo form_close();?>
    </div>
</div>