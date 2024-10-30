<?php

function lisa_popup_shortcode($atts, $content = null)
	{
	extract(shortcode_atts(array(
		'id' => '',
	) , $atts));
	$q = new WP_Query(array(
		'p' => $id,
		'post_type' => 'fpopup',
		'order' => 'DES',
	));
	$list = '<div>';
	while ($q->have_posts()):
		$q->the_post();
		$idd = get_the_ID();
		$pop_subtitle = get_post_meta(get_the_ID() , 'popupmeta_pop_sub_title', true);
		$pop_button_color = get_post_meta(get_the_ID() , 'popup_colorpicker', 1);
		$pop_text_color = get_post_meta(get_the_ID() , 'popup_text_colorpicker', 1);
		$pop_button = get_post_meta(get_the_ID() , 'popupmeta_pop_button', true);
		$pop_title = get_the_title();
		$post_content = get_the_content();
		$pop_shortcode = get_post_meta(get_the_ID() , 'popupmeta_pop_shortcode', true);
		$pop_shortcode = get_post_meta(get_the_ID() , 'popupmeta_pop_shortcode', true);
		$pop_buttons = get_post_meta(get_the_ID() , 'button_type', true);
		$list.= '
        <' . esc_attr($pop_buttons) . '  class="btn btn-primary btn-lg btn-divine" data-toggle="modal" data-target="#myModal-' . esc_attr($id) . '">
 ' . $pop_button . '
</' . $pop_buttons . '>

<!-- Modal -->
<div class="modal modal-divine fade" id="myModal-' . esc_attr($id) . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog divine-modal-dialog" role="document">
    <div class="modal-content divine-modal-content">
      <div class="modal-header divine-modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">' . esc_attr($pop_title) . '</h4>
        <p class="modal-title" id="myModalLabel">' . esc_attr($pop_subtitle) . '</p>
      </div>
      <div class="modal-body">
        ' . do_shortcode($pop_shortcode) . '
      </div>

    </div>
  </div>
</div>
<style>
.divine-modal-dialog{}
.divine-modal-content {
    padding: 24px;
}
.divine-modal-header{    padding: 0px;
    border-bottom: 0px;
    text-align: center;
    margin-bottom: 13px;}
button.btn-divine{background-color:' . esc_attr($pop_button_color) . ';color:' . esc_attr($pop_text_color) . ';} 
a.btn-divine{color:' . esc_attr($pop_text_color) . ';}
a.btn-divine:hover{color:' . esc_attr($pop_text_color) . '}
</style>

';
	endwhile;
	$list.= '</div>';
	wp_reset_query();
	return $list;
	}

add_shortcode('lisa_form_popup', 'lisa_popup_shortcode');
?>