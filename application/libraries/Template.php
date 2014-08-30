<?php 

// Template class for better template system.
class Template {

	// set view with template/header.php and template/footer.php
    function show($view, $data = null)
    {
    	$CI =& get_instance();

        $CI->load->view('template/header');
        $CI->load->view($view, $data);
        $CI->load->view('template/footer');
    }
}