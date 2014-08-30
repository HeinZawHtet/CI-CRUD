$(function() {

    // if user click the .edit-btn
	$('.edit-btn').on('click', function(e){

        // prevent the browser's default behavior
		e.preventDefault();

        // get id of user clicked item
		var currentBlog = '#blog-'+$(this).data('id');
        // get values from elements
		var currentId = $(currentBlog + ' .blog-id').html();
		var currentTitle = $(currentBlog + ' .blog-title').html();
		var currentContent = $(currentBlog + ' .blog-content').html();


        // set values to form inputs
		$('#edit-form .id').val(currentId);
		$('#edit-form .title').val(currentTitle);
		$('#edit-form .content').val(currentContent);
	});

    // if user click .delete-btn
	$('.delete-btn').on('click', function(e){
        // prevent the browser's default behavior
		e.preventDefault();

        // set id of user clicked item
		var blogId = $(this).data('id');

        // ajax request to /blog/delete/blogid
		$.ajax({
            type: "POST",
            url: 'blog/delete/'+blogId,
            success : function( response ) {
                $('#blog-'+blogId).remove();
            }
        });
	});


    // if user submit the #edit-form form
	$('#edit-form').on('submit', function(e) {
		e.preventDefault();

        // get values from input
		var blogId = $('#edit-form .id').val();
		var blogTitle = $('#edit-form .title').val();
		var blogContent = $('#edit-form .content').val();

        // and sent it via ajax
		$.ajax({
            type: "POST",
            url: 'blog/edit',
            data: {
            	'id': blogId,
                'title': blogTitle,
                'content': blogContent,
            },
            error: function( response ){
                // If there is an error, show them all
                $('#edit-form .modal-body').prepend('<div class="alert alert-danger">' + response.responseText + '</div>');
            },
            success : function( response ) {

                // if success,  add .info to updated id to highlight
                $('#blog-' + blogId).toggleClass('info');

                // hide the modal
                $('.edit-form-modal').modal('hide');

                // update current data
                $('#blog-' + blogId + ' .blog-title').html(blogTitle);
                $('#blog-' + blogId + ' .blog-content').html(blogContent);
            }
        });
	});
    

    // if user submit #add-form form
	$('#add-form').on('submit', function(e) {
		e.preventDefault();

        // get data from inputs
		var title = $("#add-form .title").val();
		var content = $("#add-form .content").val();

        // sent it to blog/create via ajax
		$.ajax({
            type: "POST",
            url: 'blog/create',
            data: {
                'title': title,
                'content': content
            },
            error: function( response ){
                // if error, show them
                $('#add-form .modal-body').prepend('<div class="alert alert-danger">' + response.responseText + '</div>');
            },
            success : function( response ) {

                // if successfully added, clone updated data into table
            	var id = response;
                $('.add-form-modal').modal('hide');
                $('.blog-table tr:nth-child(1)').after('<tr id="blog-'+ id +'"> <td class="blog-id">'+ id +'</td> <td class="blog-title">'+title+'</td> <td class="blog-content">'+content+'</td> <td> <a href="#" data-id="'+id+'" class="edit-btn btn btn-primary" data-toggle="modal" data-target=".edit-form-modal"><i class="glyphicon glyphicon-pencil"></i> Edit</a> <a href="#" data-id="'+id+'" class="delete-btn btn btn-danger"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a> </td> </tr>'); }
        });
	});
});