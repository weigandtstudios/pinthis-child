<?php
	// get options
	$pinthis_pinbox_soc_icons = get_option('pbpanel_pinbox_soc_icons');
	$pinthis_pinbox_show_comments = get_option('pbpanel_pinbox_show_comments');
	$pinthis_pinbox_show_postdate = get_option('pbpanel_pinbox_show_postdate');
?>

<article class="pinbox">
	<div <?php post_class(); ?>>
		<?php if (is_sticky()) { ?>
		<span class="ribbon"><?php echo __('Sticky', 'pinthis'); ?></span>
		<?php } ?>
		<?php if ($pinthis_pinbox_soc_icons == 1) { ?>
		<div class="top-bar">
			<ul class="social-media-icons clearfix">
				<?php echo pinthischild_get_share_buttons() ?>
			</ul>
		</div>
		<?php } ?>
		<div class="excerpt clearfix">
			<?php
				$pinthis_quote_text = get_post_meta($post->ID, 'quote_text', true);
				$pinthis_quote_author = get_post_meta($post->ID, 'quote_author', true);
			?>
			<?php if (has_post_thumbnail()) { ?>
			<p class="quote-cover" 
				<?php  
				$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
				$params = array('width' => 236);
				$img = bfi_thumb($large_image_url[0], $params);
				$parsed_url = strstr(parse_url($img, PHP_URL_PATH), 'bfi_thumb');
				$upload_dir = wp_upload_dir();
				if ($img) {
					list($width, $height) = getimagesize(trailingslashit($upload_dir['basedir']) . $parsed_url);
				?>
				style="background-image:url(<?php echo $img; ?>);"
				<?php
				}
				?>
			>&nbsp;</p>
			<?php } ?>
			<p class="quote-text"><a href="<?php the_permalink(); ?>"><?php echo $pinthis_quote_text; ?></a></p>
			<?php if ($pinthis_quote_author != '') { ?>
			<p class="quote-author"><?php echo $pinthis_quote_author; ?></p>
			<?php } ?>
		</div>
		<div class="meta-data">
			<ul class="clearfix">
				<?php if ($pinthis_pinbox_show_comments == 1 || $pinthis_pinbox_show_postdate == 1) { ?> 
					<?php if ($pinthis_pinbox_show_comments == 1) { ?>
					<li class="border-color-1 tooltip <?php if ($pinthis_pinbox_show_postdate != 1) { ?>full<?php } ?>" title="<?php echo __('Total comments', 'pinthis'); ?>">
						<?php if ($pinthis_pinbox_show_comments == 1) { ?>
							<span class="icon-total-comments"><?php comments_number('0', '1', '%'); ?></span>
						<?php } ?>
					</li>
					<?php } ?>
					<?php if ($pinthis_pinbox_show_postdate == 1) { ?>
					<li class="border-color-2 tooltip <?php if ($pinthis_pinbox_show_comments != 1) { ?>full<?php } ?>" title="<?php echo __('Post date', 'pinthis'); ?>">
						<?php if ($pinthis_pinbox_show_postdate == 1) { ?>
							<span class="icon-post-date"><?php echo get_the_date('d.m.y'); ?></span>
						<?php } ?>
					</li>
					<?php } ?>
				<?php } else { ?>
				<li class="border-color-1 empty">&nbsp;</li>
				<li class="border-color-2 empty">&nbsp;</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</article>
