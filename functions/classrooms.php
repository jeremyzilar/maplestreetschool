<?php

/* Adding in the custom meta box for Classrooms */
$classroom_meta_box = array(
 'id' => 'mssclassroom',
 'title' => 'Classrooms',
 'page' => 'Classrooms',
 'context' => 'normal',
 'priority' => 'high',
 'fields' => array(
   array(
       'name' => 'roster',
       'desc' => 'Roster Embed Code',
       'id' => 'class_roster',
       'type' => 'text',
       'std' => ''
   )
  )
);

// Add meta box
add_action('admin_menu', 'mssclassroom_add_box');
function mssclassroom_add_box() {
    global $classroom_meta_box;
    add_meta_box($classroom_meta_box['id'], $classroom_meta_box['title'], 'mssclassroom_show_box', $classroom_meta_box['page'], $classroom_meta_box['context'], $classroom_meta_box['priority']);
}

// Callback function to show fields in meta box
function mssclassroom_show_box() {
    global $classroom_meta_box, $post;
    
    // Use nonce for verification
    echo '<input type="hidden" name="mssclassroom_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
        
    foreach ($classroom_meta_box['fields'] as $field) {
        // get current post meta data
        $metaclassroom = get_post_meta($post->ID, $field['id'], true);

        switch ($field['type']) {
            case 'text':
                echo '<div id="'.$field['id'].'" class="mssbox"><label>'.$field['desc'].'</label><input type="text" name="', $field['id'], '" value="', $metaclassroom ? $metaclassroom : $field['std'], '"/></div>';
                break;
            case 'textarea':
                echo '<div id="'.$field['id'].'" class="mssbox"><label>'.$field['desc'].'</label><textarea name="', $field['id'], '" cols="60" rows="4" >', $metaclassroom ? $metaclassroom : $field['std'], '</textarea></div>';
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $metaclassroom == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $metaclassroom == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $metaclassroom ? ' checked="checked"' : '', ' />';
                break;
        }
    }
    echo '<br clear="all"/>';
}

add_action('save_post', 'mssclassroom_save_data');
function mssclassroom_save_data($post_id) {
    global $classroom_meta_box;

    // verify nonce
    if (!wp_verify_nonce($_POST['mssclassroom_meta_box_nonce'], basename(__FILE__))) {
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

    foreach ($classroom_meta_box['fields'] as $field) {
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

register_post_type('classrooms', array(	'label' => 'Classrooms','description' => 'The Classrooms of Maple Street','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'page','hierarchical' => true,'query_var' => true,'has_archive' => true,'supports' => array('title','thumbnail'),'labels' => array (
  'name' => 'Classrooms',
  'singular_name' => 'classroom',
  'menu_name' => 'Classrooms',
  'add_new' => 'Add Classroom',
  'add_new_item' => 'Add New Classroom',
  'edit' => 'Edit',
  'edit_item' => 'Edit classroom',
  'new_item' => 'New classroom',
  'view' => 'View classroom',
  'view_item' => 'View classroom',
  'search_items' => 'Search Classrooms',
  'not_found' => 'No Classrooms Found',
  'not_found_in_trash' => 'No Classrooms Found in Trash',
  'parent' => 'Parent Classroom',
),) );

?>