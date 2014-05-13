<?php
  // Roles and Capabilities
  $subRole = get_role( 'subscriber' );  
  $subRole->add_cap( 'read_private_pages' );
?>