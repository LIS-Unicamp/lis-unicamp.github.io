<?php

add_action( 'init', 'create_post_type_members' );
// Esta щ a funчуo que щ chamada pelo add_action()

function create_post_type_members() {

    //Labels customizados para o tipo de post
    $labels = array(
	    'label' => __('Group members', 'post type general name'),
	    'singular_label' => __('Member', 'post type singular name'),
	    'add_new' => _x('Add New', 'member'),
	    'add_new_item' => __('Add New Member'),
	    'edit_item' => __('Edit Member'),
	    'new_item' => __('New Member'),
	    'all_items' => __('All Members'),
	    'view_item' => __('View Member'),
	    'search_items' => __('Search Members'),
	    'not_found' =>  __('No Members found'),
	    'not_found_in_trash' => __('No Member found in Trash'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Members'
    );
    
    // Registamos o tipo de post film atravщs desta funчуo
    // passando-lhe os labels e parтmetros de controlo.
    register_post_type( 'members', array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,
	    'rewrite' => true,
	    'has_archive' => true,
	    'capability_type' => 'post',
	    'hierarchical' => false,
	    'menu_position' => null,
	    'supports' => array('title', 'excerpt')
	    )
    );
    
    //Registamos a categoria de groups para paginas
	    register_taxonomy( 'group', array( 'members' ), array(
        'hierarchical' => true,
        'label' => __( 'Group' ),
        'labels' => array( // Labels customizadas
	    'name' => _x( 'Groups', 'taxonomy general name' ),
	    'singular_name' => _x( 'Group', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Search Groups' ),
	    'all_items' => __( 'All Groups' ),
	    'parent_item' => __( 'Parent Group' ),
    	'parent_item_colon' => __( 'Parent Group:' ),
	    'edit_item' => __( 'Edit Group' ),
	    'update_item' => __( 'Update Group' ),
	    'add_new_item' => __( 'Add NewGroup' ),
	    'new_item_name' => __( 'New Group Name' ),
	    'menu_name' => __( 'Groups' ),
	),
        'show_ui' => true,
        'show_in_tag_cloud' => false,
        'query_var' => true,
        'hierarchical' => true,
        'has_archive' => 'group',
        'rewrite' => array(
            'slug' => 'group',
            'with_front' => false,
        ),
        )
    );
}

//rename title field
add_filter( 'enter_title_here', 'custom_enter_title' );

function custom_enter_title( $input ) {
    global $post_type;

    if ( is_admin() && 'members' == $post_type )
        return __( 'Enter Member Name Here', 'your_textdomain' );

    return $input;
}
?>