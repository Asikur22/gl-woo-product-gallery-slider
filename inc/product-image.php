<?php

defined( 'ABSPATH' ) || exit;

$attachment_ids = get_post_meta( get_the_ID(), 'gallery', true );

array_unshift( $attachment_ids, get_post_thumbnail_id() );
?>
<?php if ( ! empty( $attachment_ids ) ) : ?>
	<div class="cbmproductimages">
		<div class="wpgs images">
			<div class="wpgs-for">
				<?php foreach ( $attachment_ids as $attachment_id ) : ?>
					<?php
					$thumbnail_image = wp_get_attachment_image( $attachment_id, 'full' );
					$thumbnail_src   = wp_get_attachment_image_src( $attachment_id, 'full' );
					$thumbnail_title = get_the_title( $attachment_id );
					?>
					<a class="venobox cbmproduct-image" data-gall="wpgs-lightbox" title="<?php echo $thumbnail_title; ?>" href="<?php echo $thumbnail_src[0]; ?>">
						<?php echo $thumbnail_image; ?>
					</a>
				<?php endforeach; ?>
			</div>
			<div class="wpgs-nav">
				<?php foreach ( $attachment_ids as $attachment_id ) : ?>
					<div class="cbmproduct-thumb">
						<?php echo wp_get_attachment_image( $attachment_id, 'medium' ); ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>
