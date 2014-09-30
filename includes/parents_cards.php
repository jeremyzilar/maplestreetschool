<section id="main">
	<div class="container">
		<div class="row">
			<div class="span1">
				<img src="http://placehold.it/50x50">
			</div>
			<div class="span11">
				<h3>Kepler Zilar</h3>
				<p>jeremyzilar@gmail.com</p>
				<p>718-510-2236</p>
			</div>
		</div>
<?php
	foreach ( $blogusers as $user ) {
		// print_r($user);
		$meta = get_user_meta($user->ID);
		// print_r($meta);
		$user_id = esc_html( $user->ID );

		$first_name = esc_html( $meta['first_name']['0'] );
		$last_name = esc_html( $meta['last_name']['0'] );
		$bio = esc_html( $meta['description']['0'] );
		$user_email = '<a href="mailto:'.esc_html( $user->user_email ).'">'.esc_html( $user->user_email ).'</a>';
		$tel = (!empty($meta['tel']['0']) ? $meta['tel']['0'] : '');
		$wktel = (!empty($meta['wktel']['0']) ? $meta['wktel']['0'] : '');
		$street_address = (!empty($meta['street_address']['0']) ? $meta['street_address']['0'] : '');
		$locality = (!empty($meta['locality']['0']) ? $meta['locality']['0'] : '');
		$region = (!empty($meta['region']['0']) ? $meta['region']['0'] : '');
		$postal_code = (!empty($meta['postal_code']['0']) ? $meta['postal_code']['0'] : '');
		$committee = (!empty($meta['committee']['0']) ? $meta['committee']['0'] : '');
		$partner = (!empty($meta['partner']['0']) ? $meta['partner']['0'] : '');
		$class = (!empty($meta['class']['0']) ? '<h6>' . $meta['class']['0']. '</h6>': '');
		$days = (!empty($meta['days']['0']) ? $meta['days']['0'] : '');
		$child1 = (!empty($meta['child1']['0']) ? $meta['child1']['0'] : '');

		echo <<< EOF
		<tr>
			<td>$child1</td>
			<td>$class</td>
			<td>$first_name $last_name</td>
			<td>$tel</td>
			<td>$wktel</td>
			<td>$committee</td>
		</tr>
EOF;
	}
?>

		</tbody>
	</table>

	</div>
</section>