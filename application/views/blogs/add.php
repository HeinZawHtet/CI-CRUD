<?php echo validation_errors(); ?>

<?php echo form_open('blog/create') ?>
	<h1>Add New</h1>
	<div class="form-group">
		<input type="input" name="title" class="form-control" placeholder="Title"/>
	</div>
	<div class="form-group">
		<textarea name="content" placeholder="Content" class="form-control"></textarea>
	</div>
	<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</form>