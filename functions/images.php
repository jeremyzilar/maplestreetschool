<?php
// Images
// http://www.studiograsshopper.ch/web-development/wordpress-featured-images-add_image_size-resizing-and-cropping-demo/

// This sets the 3 different DEFAULT WordPress sizes to the 3 sizes that best fit in the posts and pages
update_option('thumbnail_size_w', 140);
update_option('thumbnail_size_h', 140);
update_option('thumbnail_crop', 1);

update_option('medium_size_w', 220);
update_option('medium_size_h', 9999);
update_option('medium_crop', 0);

update_option('large_size_w', 700);
update_option('large_size_h', 9999);
update_option('large_crop', 0);

// Add Featured Images
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 220, 220 ); // default Post Thumbnail dimensions   
}

// Here we are adding additional Image sizes to the theme
// add_image_size('w30', 30, 30, true ); //60 pixels wide x 60 pixels tall
add_image_size('w60', 60, 60, true ); //60 pixels wide x 60 pixels tall
add_image_size('w140', 140, 140, true ); //140 pixels wide x 140 pixels tall
add_image_size('w220', 220, 9999, false); //220 pixels wide (and unlimited height)
// add_image_size('w300', 300, 9999, false); //300 pixels wide (and unlimited height) //Hiding
add_image_size('circle300', 300, 300, true); //300 pixels wide (and unlimited height)
// add_image_size('w380', 380, 9999, false); //380 pixels wide (and unlimited height) //Hiding
// add_image_size('w460', 460, 9999, false); //460 pixels wide (and unlimited height) //Hiding
// add_image_size('w540', 540, 9999, false); //540 pixels wide (and unlimited height)
add_image_size('w620', 620, 9999, false); //620 pixels wide (and unlimited height)
add_image_size('w700', 700, 9999, false); //700 pixels wide (and unlimited height)
add_image_size('w780', 780, 9999, false); //780 pixels wide (and unlimited height)
add_image_size('w860', 860, 9999, false); //860 pixels wide (and unlimited height)
add_image_size('w940', 940, 9999, false); //940 pixels wide (and unlimited height)



// Custom Image Sizes in Media Uploader
// http://sumtips.com/2011/12/custom-image-sizes-in-wordpress.html
function custom_image_sizes($sizes) {
  unset( $sizes['thumbnail']);
  unset( $sizes['medium']);
  unset( $sizes['large']);
  unset( $sizes['full'] ); // removes full size image
  $myimgsizes = array(
    // "w30" => __("w30"),
    "w60" => __("w60"),
    "w140" => __("w140"),
    "w220" => __("w220"),
    "w220" => __("w220"),
    // "w300" => __("w300"), //Hiding this image from being placed in a post
    "circle300" => __("circle300"),
    // "w380" => __("w380"), //Hiding
    // "w460" => __("w460"), //Hiding
    // "w540" => __("w540"),
    "w620" => __("w620"),
    // "w700" => __("w700") //Hiding
  );
  $newimgsizes = array_merge($sizes, $myimgsizes);
  return $newimgsizes;
}
add_filter('image_size_names_choose', 'custom_image_sizes');


// http://wordpress.stackexchange.com/questions/5645/trying-to-hide-buttons-from-attachment-window
function myAttachmentFields($form_fields, $post) {
    // Can now see $post becaue the filter accepts two args, as defined in the add_fitler
    if ( substr( $post->post_mime_type, 0, 5 ) == 'image' ) {
      // $form_fields['image_alt']['value'] = '';
      // $form_fields['image_alt']['input'] = 'hidden';

      // $form_fields['post_excerpt']['value'] = '';
      // $form_fields['post_excerpt']['input'] = 'hidden';

      // $form_fields['post_content']['value'] = '';
      // $form_fields['post_content']['input'] = 'hidden';

      // $form_fields['url']['value'] = '';
      // $form_fields['url']['input'] = 'hidden';

      $form_fields['align']['value'] = '';
      $form_fields['align']['input'] = 'hidden';

      // $form_fields['image-size']['value'] = 'thumbnail';
      // $form_fields['image-size']['input'] = 'hidden';

      // $form_fields['image-caption']['value'] = 'caption';
      // $form_fields['image-caption']['input'] = 'hidden';

      $form_fields['buttons'] = array(
        'label' => '', // Put a label in?
        'value' => '', // Doesn't need one
        'html' => "<input type='submit' class='button' name='send[$post->ID]' value='" . esc_attr__( 'Insert into Post' ) . "' />",
        'input' => 'html'
      );
      $filename = basename( $post->guid );
      $attachment_id = $post->ID;
    }
    
    return $form_fields;
}
// Hook on after priority 10, because WordPress adds a couple of filters to the same hook - added accepted args(2)
add_filter('attachment_fields_to_edit', 'myAttachmentFields', 11, 2 );




// Add Photographer Name and URL fields to media uploader
// 
// @param $form_fields array, fields to include in attachment form
// @param $post object, attachment record in database
// @return $form_fields, modified form fields

 
function be_attachment_field_credit( $form_fields, $post ) {
	
	$form_fields['be-photographer-name'] = array(
		'label' => 'Photographer Name',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'be_photographer_name', true ),
		'helps' => 'If provided, photo credit will be displayed',
	);

	$form_fields['be-photographer-url'] = array(
		'label' => 'Photographer URL',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'be_photographer_url', true ),
		'helps' => 'Add Photographer URL',
	);

	return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'be_attachment_field_credit', 10, 2 );


// Save values of Photographer Name and URL in media uploader
// 
// @param $post array, the post data for database
// @param $attachment array, attachment fields from $_POST form
// @return $post array, modified post data


function be_attachment_field_credit_save($post, $attachment ) {
  // print_r($attachment);
  // print_r($post);
	if( isset( $attachment['be-photographer-name'] ) )
		update_post_meta( $post['ID'], 'be_photographer_name', $attachment['be-photographer-name'] );

	if( isset( $attachment['be-photographer-url'] ) )
update_post_meta( $post['ID'], 'be_photographer_url', esc_url( $attachment['be-photographer-url'] ) );

	return $post;
}

add_filter( 'attachment_fields_to_save', 'be_attachment_field_credit_save', 10, 2 );






// Controls the Image HTML by modifying the WordPress Image shortcode.
// http://codex.wordpress.org/Function_Reference/add_filter
function new_img_shortcode_filter($val, $attr, $content = null) {

	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> '',
		'width'	=> '',
		'caption' => '',
		'src' => ''
	), $attr));
  
  $find = 'attachment_';
  $cust_id = str_replace($find, '', $id);
  $post_custom = get_post_custom($cust_id);
  // print_r($content);
  // $isrc = $src;

  
	if ( 1 > (int) $width || empty($caption) )
		return $val;

	$capid = '';
	if ( $id ) {
		$id = esc_attr($id);
		$capid = 'id="figcaption_'. $id . '" ';
		$id = 'id="' . $id . '"';
	}



	if ($width == 60 || $width == 140 || $width == 300 ){ // if image is circle
	  return '<div class="circle photo w'.(0 + (int) $width).'">' . do_shortcode( $content ) . '<p class="caption">' . $caption . '</p></div>';
  } else if ($width == 30) { // if image doesn't need a caption
    return '<div class="photo w'.(0 + (int) $width).'">' . do_shortcode( $content ) . '</div>';
  } else { // all other images
    return '<div class="photo w'.(0 + (int) $width).'">' . do_shortcode( $content ) . '<p class="caption">' . $caption . '</p></div>';
  }
}
add_filter('img_caption_shortcode', 'new_img_shortcode_filter',10,3);







// Fixing the WP Galery Function
// * This implements the functionality of the Gallery Shortcode for displaying
// * WordPress images on a post.

//deactivate WordPress function
remove_shortcode('gallery', 'gallery_shortcode');
 
//activate own function
add_shortcode('gallery', 'mss_gallery_shortcode');
 
//the own renamed function
function mss_gallery_shortcode($attr) {
	global $post, $wp_locale;

	static $instance = 0;
	$instance++;

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'imagetag'    => 'div',
		'linktag'    => 'a',
		'imagetitle'    => $post->title,
		'captiontag' => 'div',
		'columns'    => 3,
		'size'       => 'large',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	$float = $wp_locale->text_direction == 'rtl' ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$output = apply_filters('gallery_style', "
		<div id='{$selector}' class='carousel slide'><div class='carousel-inner'>");
  // $output = $selector;
	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		if ($i == 0) { 
		  $active = 'active';
		} else{
		  $active = '';
		}
		
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_image($id, $size, false, false) : wp_get_attachment_image($id, $size, true, false);
    
		$output .= "<{$imagetag} class='item ".$active."'>";
		$output .= "<{$linktag}>$link</{$linktag}>";
    if ( $captiontag && trim($attachment->post_excerpt) ) {
  		$output .= "
  			<{$captiontag} class='carousel-caption'><p>
  			" . wptexturize($attachment->post_excerpt) . "
  			</p></{$captiontag}>";
  	}
		$output .= "</{$imagetag}>";

		$i++;
	}

	$output .= "</div>";
	$output .= "<a class='carousel-control left' href='#{$selector}' data-slide='prev'>&lsaquo;</a>
    <a class='carousel-control right' href='#{$selector}' data-slide='next'>&rsaquo;</a>\n";
	$output .= "</div>";
	
	

	return $output;
} 







?>