<?php
    add_action('init', 'lisa_popup_register_script');
    function lisa_popup_register_script()
    {
                    wp_register_script('bootstrap', plugin_dir_url(__FILE__) . '/js/bootstrap.js', array(
                                    'jquery'
                    ), '2.5.2');
                    wp_register_style('bootstrap_modal', plugin_dir_url(__FILE__) . '/css/bootstrap-modal.css', false, '1.2.0', 'all');
                    wp_register_style('new_style1', plugin_dir_url(__FILE__) . '/css/popup.css', false, '1.1.0', 'all');
    }
    // use the registered jquery and style above
    add_action('wp_enqueue_scripts', 'enqueue_style');
    function enqueue_style()
    {
                    wp_enqueue_script('bootstrap');
                    wp_enqueue_style('bootstrap_modal');
                    wp_enqueue_style('new_style1');
    }
?>