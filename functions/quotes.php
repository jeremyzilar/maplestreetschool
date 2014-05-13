<?php

/* Adding in the custom meta box for Quotes */
$meta_box = array(
	'id' => 'mssQuotes',
	'title' => 'Quotes',
	'page' => 'quote',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
		    'name' => 'Quote',
		    'desc' => 'Add a quote from a child',
		    'id' => 'quote_text',
		    'type' => 'textarea',
		    'font_class' => 'f900',
		    'std' => ''
		),
		array(
		    'name' => 'Child Name',
		    'desc' => 'name',
		    'id' => 'quote_name',
		    'type' => 'text',
		    'font_class' => 'f300',
		    'std' => ''
		),
		array(
		    'name' => 'Age',
		    'desc' => 'age',
		    'id' => 'quote_age',
		    'type' => 'text',
		    'font_class' => 'f300',
		    'std' => ''
		),
		array(
		    'name' => 'Class',
		    'desc' => 'Class <em>(e.g. Stars,Roots,Waves)</em>',
		    'id' => 'quote_class',
		    'type' => 'text',
		    'font_class' => 'f300',
		    'std' => ''
		)
  )
);

// Add meta box
add_action('admin_menu', 'mytheme_add_box');
function mytheme_add_box() {
    global $meta_box;
    add_meta_box($meta_box['id'], $meta_box['title'], 'mytheme_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}

// Callback function to show fields in meta box
function mytheme_show_box() {
    global $meta_box, $post;
    
    // Use nonce for verification
    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
        
    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);

        switch ($field['type']) {
            case 'text':
                echo '<div id="'.$field['id'].'" class="mssbox '.$field['font_class'].'"><label>'.$field['desc'].'</label><input type="text" name="', $field['id'], '" value="', $meta ? $meta : $field['std'], '"/></div>';
                break;
            case 'textarea':
                echo '<div id="'.$field['id'].'" class="mssbox '.$field['font_class'].'"><label>'.$field['desc'].'</label><textarea name="', $field['id'], '" cols="60" rows="4" >', $meta ? $meta : $field['std'], '</textarea></div>';
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
    }
    echo '<br clear="all"/>';
}

add_action('save_post', 'mytheme_save_data');
function mytheme_save_data($post_id) {
    global $meta_box;

    // verify nonce
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}

// check autosave
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
	return $post_id;
}





// REGISTER THE QUOTE POST TYPE
register_post_type('quote', array('label' => 'Quotes','description' => 'Famous MSS Quotes','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'query_var' => true,'has_archive' => true,'supports' => array('quote','author'),'taxonomies' => array('post_tag','classes'),'labels' => array (
  'name' => 'Quotes',
  'singular_name' => 'Quote',
  'menu_name' => 'Quotes',
  'add_new' => 'Add Quote',
  'add_new_item' => 'Add New Quote',
  'edit' => 'Edit',
  'edit_item' => 'Edit Quote',
  'new_item' => 'New Quote',
  'view' => 'View Quote',
  'view_item' => 'View Quote',
  'search_items' => 'Search Quotes',
  'not_found' => 'No Quotes Found',
  'not_found_in_trash' => 'No Quotes Found in Trash',
  'parent' => 'Parent Quote',
),) );


// //Auto generates a title for the quote, based off of the first 40 chars of the quote
// add_filter ('title_save_pre','post_title_generator');
// function post_title_generator($title) {
//   global $post;
//   $type = get_post_type($post->ID);
//   if ($type == 'quote') {
//     $title = strip_tags(get_post_meta($post->ID, 'quote_text', true));
//     $char_limit = 40;
//     if( strlen( $title ) > $char_limit ) {
//       $title = substr( $title, 0, $char_limit ) . '...';
//     }
//     return $title;
//   }
// }


?>