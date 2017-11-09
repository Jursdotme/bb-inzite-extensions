<?php

$photos = $settings->photos;

if(is_array($photos)) {

	echo '<div class="main-gallery loading">';
		foreach ($photos as $photo) {
			// echo '<a href="' . wp_get_attachment_url( $photo ) . '" data-fancybox="gallery">';
			
			echo wp_get_attachment_image(
				$photo,
				$settings->photo_size,
				"",
				array( "class" => "img-responsive" )
			);

			// $img = wp_get_attachment_image_src(
			// 	$photo,
			// 	$settings->photo_size
			// );

			// echo '<img class="lazy" data-src="'.$img[0].'" alt="">';

			// echo '</a>';
		}

	echo '</div>';

	if ('thumbnails' === $settings->navigation) {
		
		echo '<div class="thumbnail-gallery loading">';

			foreach ($photos as $photo) {
				echo wp_get_attachment_image(
					$photo,
					$settings->thumbnail_size,
					"",
					array( "class" => "img-responsive" )
				);
			}

		echo '</div>';
	}
} else {
	echo '<p class="no-images">This slider gallery has no images</p>';
}
?>