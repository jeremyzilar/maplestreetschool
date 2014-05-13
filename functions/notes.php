<?php

/* Adding in the custom meta box for Notes */
$notes_meta_box = array(
	'id' => 'mssnote',
	'title' => 'Notes',
	'page' => 'notes',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
		    'name' => 'Note',
		    'desc' => 'Add a note',
		    'id' => 'note_text',
		    'type' => 'textarea',
		    'std' => ''
		),
		array(
		    'name' => 'Link',
		    'desc' => 'link',
		    'id' => 'note_link',
		    'type' => 'text',
		    'std' => ''
		)
  )
);

// Add meta box
add_action('admin_menu', 'mssnote_add_box');
function mssnote_add_box() {
    global $notes_meta_box;
    add_meta_box($notes_meta_box['id'], $notes_meta_box['title'], 'mssnote_show_box', $notes_meta_box['page'], $notes_meta_box['context'], $notes_meta_box['priority']);
}

// Callback function to show fields in meta box
function mssnote_show_box() {
    global $notes_meta_box, $post;
    
    // Use nonce for verification
    echo '<input type="hidden" name="mssnote_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
        
    foreach ($notes_meta_box['fields'] as $field) {
        // get current post meta data
        $metanote = get_post_meta($post->ID, $field['id'], true);

        switch ($field['type']) {
            case 'text':
                echo '<div id="'.$field['id'].'" class="mssbox"><label>'.$field['desc'].'</label><input type="text" name="', $field['id'], '" value="', $metanote ? $metanote : $field['std'], '"/></div>';
                break;
            case 'textarea':
                echo '<div id="'.$field['id'].'" class="mssbox"><label>'.$field['desc'].'</label><textarea name="', $field['id'], '" cols="60" rows="4" >', $metanote ? $metanote : $field['std'], '</textarea></div>';
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $metanote == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $metanote == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $metanote ? ' checked="checked"' : '', ' />';
                break;
        }
    }
    echo '<br clear="all"/>';
}

add_action('save_post', 'mssnote_save_data');
function mssnote_save_data($post_id) {
    global $notes_meta_box;

    // verify nonce
    if (!wp_verify_nonce($_POST['mssnote_meta_box_nonce'], basename(__FILE__))) {
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

    foreach ($notes_meta_box['fields'] as $field) {
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

// rewrite false
// hierarchical false

register_post_type('notes', array(	'label' => 'Notes','description' => 'Reminders, messages, and alerts','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'query_var' => true,'has_archive' => true,'supports' => array('title','editor','notes','author'),'labels' => array (
  'name' => 'Notes',
  'singular_name' => 'note',
  'menu_name' => 'Notes',
  'add_new' => 'Add note',
  'add_new_item' => 'Add New note',
  'edit' => 'Edit',
  'edit_item' => 'Edit note',
  'new_item' => 'New note',
  'view' => 'View note',
  'view_item' => 'View note',
  'search_items' => 'Search Notes',
  'not_found' => 'No Notes Found',
  'not_found_in_trash' => 'No Notes Found in Trash',
  'parent' => 'Parent note',
),) );

?>