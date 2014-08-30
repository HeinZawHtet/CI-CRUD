<?php echo validation_errors(); ?>

<?php echo form_open('blog/edit') ?>
	<h1>Edit Blog</h1>
	<input type="hidden" name="id" class="form-control" value="<?php echo $blog['id'] ?>"/>
	<div class="form-group">
		<input type="input" name="title" class="form-control" placeholder="Title" value="<?php echo $blog['title'] ?>"/>
	</div>
	<div class="form-group">
		<textarea name="content" placeholder="Content" class="form-control"><?php echo $blog['content'] ?></textarea>
	</div>
	<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</form>