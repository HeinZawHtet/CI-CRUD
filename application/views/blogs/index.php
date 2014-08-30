<!-- If there is no blogs -->
<?php if(empty($blogs)) { ?>
	
	<div class="well">
		There is no blogs. <a href="<?php echo site_url("blog/create") ?>" class="btn btn-primary">Add New Here</a>
	</div>

<?php } else { ?>
	<div class="well">
		<a href="<?php echo site_url("blog/create") ?>" class="btn btn-primary" data-toggle="modal" data-target=".add-form-modal">Add New</a>
	</div>
	<table class="blog-table table table-responsive table-striped">
		<tr>
			<th width="5%">ID</th>
			<th width="25%">Title</th>
			<th width="50%">Content</th>
			<th width="20%">Action</th>
		</tr>

		<!-- loop the blogs -->
<?php foreach ($blogs as $blog): ?>
		<tr id="blog-<?php echo $blog['id']; ?>">
			<td class="blog-id"><?php echo $blog['id'] ?></td>
			<td class="blog-title"><?php echo $blog['title'] ?></td>
			<td class="blog-content"><?php echo $blog['content'] ?></td>
			<td>
				<a href="<?php echo site_url("blog/edit/".$blog['id']) ?>" data-id="<?php echo $blog['id'] ?>" class="edit-btn btn btn-primary" data-toggle="modal" data-target=".edit-form-modal"><i class="glyphicon glyphicon-pencil"></i> Edit</a> 
				<a href="<?php echo site_url("blog/delete/".$blog['id']) ?>" data-id="<?php echo $blog['id'] ?>" class="delete-btn btn btn-danger"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>
			</td>
		</tr>
<?php endforeach; ?>
	</table>

	<div class="modal fade edit-form-modal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
		    <form id="edit-form">
			    <div class="modal-header">
	    		    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        		<h4 class="modal-title">Edit</h4>
	      		</div>
		    	<div class="modal-body">

					<input type="hidden" class="id" name="id">
					<div class="form-group">
						<input type="text" class="title form-control" name="title">
					</div>
					<div class="form-group">
						<textarea name="content" class="content form-control"></textarea>
					</div>

				</div>
				<div class="modal-footer">
	        		<button type="submit" class="btn btn-primary">Save changes</button>
	      		</div>
	      	</form>
	    </div>
	  </div>
	</div>

	<div class="modal fade add-form-modal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
		    <form id="add-form">
			    <div class="modal-header">
	    		    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        		<h4 class="modal-title">Add New</h4>
	      		</div>
		    	<div class="modal-body">

					<input type="hidden" class="id" name="id">
					<div class="form-group">
						<input type="text" class="title form-control" name="title">
					</div>
					<div class="form-group">
						<textarea name="content" class="content form-control"></textarea>
					</div>

				</div>
				<div class="modal-footer">
	        		<button type="submit" class="btn btn-primary">Save changes</button>
	      		</div>
	      	</form>
	    </div>
	  </div>
	</div>
<?php } ?>