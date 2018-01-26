<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */


add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';

	/**
	 * Metabox to be displayed on custom post Members
	 */
	$meta_boxes['member_pic'] = array(
		'id'         => 'member_pic',
		'title'      => __( 'About Member', 'cmb' ),
		'pages'      => array( 'members', ), // Post type
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => __( 'Member Picture', 'cmb' ),
				'desc' => __( 'Upload an image or enter a URL. </br>*Width and height greater than 150px.', 'cmb' ),
				'id'   => $prefix . 'member_picture',
				'type' => 'file',
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __( 'Email', 'cmb' ),
				'id'   => $prefix . 'email',
				'type' => 'text_email',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Website URL', 'cmb' ),
				'id'   => $prefix . 'url',
				'type' => 'text_url',
				// 'repeatable' => true,
			),
		)
	);
	
	/**
	 * Repeatable Field Groups
	 */
	 
	$meta_boxes['field_group'] = array(
		'id'         => 'field_group',
		'title'      => __( 'Repeating Field Group', 'cmb' ),
		'pages'      => array( 'page', ),
		'show_on' => array( 'key' => 'page-template', 'value' => array( 'page-full-menu.php', 'default' ) ),
		'fields'     => array(
			array(
				'id'          => $prefix . 'repeat_group',
				'type'        => 'group',
				'description' => __( 'Generates reusable form entries', 'cmb' ),
				'options'     => array(
					'group_title'   => __( 'Entry {#}', 'cmb' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add Another Entry', 'cmb' ),
					'remove_button' => __( 'Remove Entry', 'cmb' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array(
						'name' => 'Entry Title',
						'id'   => 'title',
						'type' => 'text',
						// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
					),
					array(
						'name' => 'Description',
						'description' => 'Write a short description for this entry',
						'id'   => 'description',
						'type' => 'wysiwyg',
					),
				),
			),
		),
	);

	// Add other metaboxes as needed
	return $meta_boxes;
}

/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) ){
		require_once 'init.php';
	}
}
add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );

