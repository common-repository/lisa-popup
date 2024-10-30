<?php 
if ( file_exists( dirname( __FILE__ ) . '/lib/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/lib/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/lib/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/lib/init.php';
}
add_action( 'cmb2_admin_init', 'popup_metabox' );

 function popup_metabox() {
	$prefix = 'popupmeta_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */

	$popup_metabox = new_cmb2_box( array(
		'id'            => $prefix . 'popup_metabox',
		'title'         => __( 'Pop up details', 'cmb2' ),
		'object_types'  => array( 'fpopup', ), 
	) );


    $popup_metabox->add_field( array(
    'name'    => 'Popup Subtitle',
    'desc'    => 'This will be the subtitle under the title.',
    'default' => '',
    'id'      => $prefix . 'pop_sub_title',
    'type'    => 'text',
) );
         $popup_metabox->add_field( array(
    'name'    => 'Form Shortcode',
    'desc'    => 'Put the shortcode of your form here.( Contact form/Mailchimp/Ninja form/Gravity form/any kind of form )',
    'default' => '',
    'id'      => $prefix . 'pop_shortcode',
    'type'    => 'text',
) );
         $popup_metabox->add_field( array(
    'name'    => 'Button text',
    'desc'    => 'This is the text of the button',
    'default' => '',
    'id'      => $prefix . 'pop_button',
    'type'    => 'text',
) );     
    
 $popup_metabox->add_field( array(
    'name'    => 'Button background',
    'id'      => 'popup_colorpicker',
    'type'    => 'colorpicker',
    'default' => '#ff834c',
    'attributes' => array(
        'data-colorpicker' => json_encode( array(
            // Iris Options set here as values in the 'data-colorpicker' array
            'palettes' => array( '#3dd0cc', '#ff834c', '#4fa2c0', '#0bc991', ),
        ) ),
    ),
) );
 $popup_metabox->add_field( array(
    'name'    => 'Button text color',
    'id'      => 'popup_text_colorpicker',
    'type'    => 'colorpicker',
    'default' => '#111111',
    'attributes' => array(
        'data-colorpicker' => json_encode( array(
            // Iris Options set here as values in the 'data-colorpicker' array
            'palettes' => array( '#3dd0cc', '#ff834c', '#4fa2c0', '#0bc991', ),
        ) ),
    ),
) );
$popup_metabox->add_field( array(
    'name'             => 'Button Type',
    'id'               => 'button_type',
    'type'             => 'radio',
    
    'options'          => array(
        'button' => __( 'Button', 'cmb2' ),
        'a'   => __( 'Text', 'cmb2' ),
       
    ),
) );     
     
     
}
?>