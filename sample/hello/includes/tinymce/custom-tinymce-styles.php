<?php

if ( !class_exists( 'CustomTinyMceStyles' ) ) {
	class CustomTinyMceStyles {

		public function __construct() {
			add_filter( 'mce_buttons', array( &$this, 'add_dropdown' ) );
			add_filter( 'tiny_mce_before_init', array( &$this, 'add_items' ) );
		}

		public function add_dropdown( $buttons ){
			array_unshift( $buttons, 'styleselect' );
			return $buttons;
		}
 
		public function add_items( $init_array ){
			$styles = array();
		
			$styles[] = array(
				'title'   => 'Block Title',
				'classes' => 'block-title',
				'selector'  => 'h3',
				'wrapper' => true
			);

			$styles[] = array(
				'title'   => 'Sub Heading',
				'classes' => 'subheading',
				'selector'  => 'h3',
				'wrapper' => true
			);

			$init_array['style_formats'] = json_encode( $styles );
		
			return $init_array;
		}
	}	

	new CustomTinyMceStyles();
}