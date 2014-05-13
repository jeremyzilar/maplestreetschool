<?php

/* Adding in the custom meta box for Quotes */
$event_meta_box = array(
	'id' => 'mssEvents',
	'title' => 'Events',
	'page' => 'event',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
      'name' => 'Event Date',
      'desc' => 'Event Date (example: September 30, 2012)',
      'id' => 'event_date',
      'type' => 'text',
      'std' => ''
		),
		array(
      'name' => 'Event Time',
      'desc' => 'Event Time (example: 11AM - 3PM)',
      'id' => 'event_time',
      'type' => 'text',
      'std' => ''
		),
		array(
      'name' => 'Event Cost',
      'desc' => 'Event Cost',
      'id' => 'event_cost',
      'type' => 'text',
      'std' => ''
		),
		array(
      'name' => 'Event URL',
      'desc' => 'Event URL (e.g Eventbrite URL)',
      'id' => 'event_url',
      'type' => 'text',
      'std' => ''
		),
		array(
      'name' => 'Event Description',
      'desc' => 'Event Description',
      'id' => 'event_desc',
      'type' => 'textarea',
      'std' => ''
		)
  )
);


// Add meta box
add_action('admin_menu', 'event_add_box');
function event_add_box() {
  global $event_meta_box;
  add_meta_box($event_meta_box['id'], $event_meta_box['title'], 'event_show_box', $event_meta_box['page'], $event_meta_box['context'], $event_meta_box['priority']);
}

// Callback function to show fields in meta box
function event_show_box() {
    global $event_meta_box, $post;
    // Use nonce for verification
    echo '<input type="hidden" name="event_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
        
    foreach ($event_meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);

        switch ($field['type']) {
            case 'text':
                echo '<div id="'.$field['id'].'" class="mssbox"><label>'.$field['desc'].'</label><input type="text" name="', $field['id'], '" value="', $meta ? $meta : $field['std'], '"/></div>';
                break;
            case 'textarea':
                echo '<div id="'.$field['id'].'" class="mssbox"><label>'.$field['desc'].'</label><textarea name="', $field['id'], '" cols="60" rows="4" >', $meta ? $meta : $field['std'], '</textarea></div>';
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

add_action('save_post', 'event_save_data');
function event_save_data($post_id) {
    global $event_meta_box;

    // verify nonce
    if (!wp_verify_nonce($_POST['event_meta_box_nonce'], basename(__FILE__))) {
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

    foreach ($event_meta_box['fields'] as $field) {
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



register_post_type('event', array('label' => 'Events','description' => 'Maple Street Event','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'page','hierarchical' => false,'query_var' => true,'has_archive' => true,'supports' => array('title','event','thumbnail','author'),'taxonomies' => array('category',),'labels' => array (
  'name' => 'Event',
  'singular_name' => 'event',
  'menu_name' => 'Events',
  'add_new' => 'Add event',
  'add_new_item' => 'Add New event',
  'edit' => 'Edit',
  'edit_item' => 'Edit event',
  'new_item' => 'New event',
  'view' => 'View event',
  'view_item' => 'View event',
  'search_items' => 'Search Events',
  'not_found' => 'No Events Found',
  'not_found_in_trash' => 'No Events Found in Trash',
  'parent' => 'Parent event',
),) );


?>