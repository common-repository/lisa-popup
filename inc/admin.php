<?php
    
    
    //Add shortcode
    add_filter('manage_posts_columns', 'lisa_popup_remove_unwanted_columns');
    add_filter('manage_posts_columns', 'lisa_popup_add_post_columns', 5);
    add_action('manage_posts_custom_column', 'lisa_popup_get_post_column_values', 5, 2);
    
    // Remove unwanted columns
    function lisa_popup_remove_unwanted_columns($defaults)
    {
                    unset($defaults['author']);
                    return $defaults;
    }
    
    // Add new columns
    function lisa_popup_add_post_columns($defaults)
    {
                    // field vs displayed title
                    
                    
                    $defaults['ShortText'] = __('Short code');
                    return $defaults;
    }
    
    // Populate the new columns with values
    function lisa_popup_get_post_column_values($column_name, $postID)
    {
                    if ($column_name === 'ShortText') {
                                    echo '[lisa_form_popup id="' . $postID . '"]';
                    }
                    
    }
    
    //delete view button
    add_filter('post_row_actions', 'remove_row_actions', 10, 1);
    function remove_row_actions($actions)
    {
                    if (get_post_type() === 'fpopup')
                                    unset($actions['view']);
                    
                    return $actions;
    }
    
    
    // delete view ,post preview
    function lisa_popup_posttype_admin_css()
    {
                    global $post_type;
                    $post_types = array(
                                    /* set post types */
                                    'fpopup'
                                    
                    );
                    if (in_array($post_type, $post_types))
                                    echo '<style type="text/css">#post-preview, #wp-admin-bar-view, #edit-slug-box, #view-post-btn{display: none;}</style>';
    }
    
    add_action('admin_head-post-new.php', 'lisa_popup_posttype_admin_css');
    add_action('admin_head-post.php', 'lisa_popup_posttype_admin_css');
    
    //update message
    add_filter('post_updated_messages', function($messages)
    {
                    $messages['fpopup'][2] = '';
                    return $messages;
    });
    
?>