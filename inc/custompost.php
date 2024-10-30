<?php
    add_action('init', 'lisa_popup_create_post_type');
    
    function lisa_popup_create_post_type()
    {
                    register_post_type('fpopup', array(
                                    'labels' => array(
                                                    'name' => __('Lisa Popup'),
                                                    'singular_name' => __('Popup'),
                                                    'add_new' => 'Add New popup',
                                                    'edit_item' => 'Edit popup',
                                                    'add_new_item' => 'Add a new popup'
                                    ),
                                    'public' => true,
                                    'has_archive' => true,
                                    'menu_icon' => 'dashicons-editor-expand',
                                    'supports' => array(
                                                    'title',
                                                    'category'
                                    )
                    ));
    }
    
?>