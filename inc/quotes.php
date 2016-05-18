<?php

	// Quotes
	function post_type_quotes() {
		$labels = array(
	    	'name' => _x('Quotes', 'post type general name', 'themesdojo'),
	    	'singular_name' => _x('Quote', 'post type singular name', 'themesdojo'),
	    	'add_new' => _x('Add New Quote', 'book', 'themesdojo'),
	    	'add_new_item' => __('Add New Quote', 'themesdojo'),
	    	'edit_item' => __('Edit Quote', 'themesdojo'),
	    	'new_item' => __('New Quote', 'themesdojo'),
	    	'view_item' => __('View Quote', 'themesdojo'),
	    	'search_items' => __('Search Testimonials', 'themesdojo'),
	    	'not_found' =>  __('No Quote found', 'themesdojo'),
	    	'not_found_in_trash' => __('No Testimonials found in Trash', 'themesdojo'), 
	    	'parent_item_colon' => ''
		);		
		$args = array(
	    	'labels' => $labels,
	    	'public' => true,
	    	'publicly_queryable' => true,
	    	'show_ui' => true, 
	    	'query_var' => true,
	    	'rewrite' => true,
	    	'capability_type' => 'post',
	    	'hierarchical' => false,
	    	'menu_position' => null,
			'supports' => array('title','editor', 'thumbnail'),
	    	'menu_icon' => 'dashicons-menu'
		); 		

		register_post_type( 'quote', $args );
		
	} 
									  
	add_action('init', 'post_type_quotes');

	add_filter("manage_edit-quote_columns", "quote_edit_columns");     
	  
	function quote_edit_columns($columns){  
	        $columns = array(  
	            "cb" => "<input type=\"checkbox\" />",  
	            "title" => "Author",  
	            "description" => "Quote",   
	        );    
	  
	        return $columns;  
	}    
	  
	add_action("manage_posts_custom_column",  "quote_custom_columns");   
	  
	function quote_custom_columns($column){  
	        global $post;  
	        switch ($column)  
	        {  
	            case "description":  
	                the_excerpt();  
	                break;    
	        }  
	}
	//End Quote Function


?>