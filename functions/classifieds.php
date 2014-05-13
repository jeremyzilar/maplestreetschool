<?php

/* Adding in the custom meta box for Ads */
$ads_meta_box = array(
	'id' => 'ad',
	'title' => 'Ad',
	'page' => 'classified',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
		    'name' => 'Classified text',
		    'desc' => 'Create an AD',
		    'id' => 'ad_text',
		    'type' => 'textarea',
		    'std' => ''
		),
		array(
		    'name' => 'Link',
		    'desc' => 'link',
		    'id' => 'ad_link',
		    'type' => 'text',
		    'std' => ''
		)
  )
);

// Add meta box
add_action('admin_menu', 'ad_add_box');
function ad_add_box() {
    global $ads_meta_box;
    add_meta_box($ads_meta_box['id'], $ads_meta_box['title'], 'ad_show_box', $ads_meta_box['page'], $ads_meta_box['context'], $ads_meta_box['priority']);
}

// Callback function to show fields in meta box
function ad_show_box() {
    global $ads_meta_box, $post;
    
    // Use nonce for verification
    echo '<input type="hidden" name="ad_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
        
    foreach ($ads_meta_box['fields'] as $field) {
        // get current post meta data
        $metaAd = get_post_meta($post->ID, $field['id'], true);

        switch ($field['type']) {
            case 'text':
                echo '<div id="'.$field['id'].'" class="mssbox"><label>'.$field['desc'].'</label><input type="text" name="', $field['id'], '" value="', $metaAd ? $metaAd : $field['std'], '"/></div>';
                break;
            case 'textarea':
                echo '<div id="'.$field['id'].'" class="mssbox"><label>'.$field['desc'].'</label><textarea name="', $field['id'], '" cols="60" rows="4" >', $metaAd ? $metaAd : $field['std'], '</textarea></div>';
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $metaAd == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $metaAd == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $metaAd ? ' checked="checked"' : '', ' />';
                break;
        }
    }
    echo '<br clear="all"/>';
}

add_action('save_post', 'ad_save_data');
function ad_save_data($post_id) {
    global $ads_meta_box;

    // verify nonce
    if (!wp_verify_nonce($_POST['ad_meta_box_nonce'], basename(__FILE__))) {
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

    foreach ($ads_meta_box['fields'] as $field) {
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

register_post_type('classified', array(	'label' => 'Classifieds','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'query_var' => true,'has_archive' => true,'supports' => array('title','thumbnail','author',),'labels' => array (
  'name' => 'Classifieds',
  'singular_name' => 'Classified',
  'menu_name' => 'Classifieds',
  'add_new' => 'Add Classified',
  'add_new_item' => 'Add New Classified',
  'edit' => 'Edit',
  'edit_item' => 'Edit Classified',
  'new_item' => 'New Classified',
  'view' => 'View Classified',
  'view_item' => 'View Classified',
  'search_items' => 'Search Classifieds',
  'not_found' => 'No Classifieds Found',
  'not_found_in_trash' => 'No Classifieds Found in Trash',
  'parent' => 'Parent Classified',
),) );

?>