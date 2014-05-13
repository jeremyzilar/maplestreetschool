<?php /*
Template Name: Users
*/ ?>

<?php get_header(); ?>

<?php
  // Get the authors from the database ordered by user nicename
	global $wpdb;
	$query = "SELECT ID, user_nicename from $wpdb->users ORDER BY user_nicename";
	$author_ids = $wpdb->get_results($query);
?>

<section id="users">
  <div class="container">
    <div class="row">
      <div class="span10">
        <table class="table">
          <?php
         	foreach($author_ids as $author) :
         		$curauth = get_userdata($author->ID);
             // print_r($curauth);
         		$first_name = $curauth->first_name;
         		$last_name = $curauth->last_name;
         		$name = $first_name .' '.$last_name;
         		$email = $curauth->user_email;
         		$class = $curauth->class;
          ?>
          <tr>
            <th><a href="<?php echo $user_link; ?>"><?php echo $name; ?></a></th>
            <td><?php echo $class; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $curauth->description; ?></td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
