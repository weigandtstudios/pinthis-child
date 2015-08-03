<?php

// Theme setup
function pinthischild_get_share_buttons()
{
	return '<li><a href="https://www.pinterest.com" class="border-color-pinterest icon-pinterest tooltip" title="' . __('Share on Pinterest', 'pinthis') . '" target="_blank">' . __('Pinterest', 'pinthis') . '</a></li>
				<li><a href="https://www.facebook.com/sharer/sharer.php?u=' . get_permalink() . '" class="border-color-3 icon-facebook tooltip" title="' . __('Share on Facebook', 'pinthis') . '" target="_blank">' . __('Facebook', 'pinthis') . '</a></li>
				<li><a href="https://plus.google.com/share?url=' . get_permalink() . '" class="border-color-1 icon-gplus tooltip" title="' . __('Share on Google+', 'pinthis') . '" target="_blank">' . __('Google+', 'pinthis') . '</a></li>
				<li><a href="https://twitter.com/share?url=' . get_permalink() . '" class="border-color-4 icon-twitter tooltip" title="' . __('Share on Twitter', 'pinthis') . '" target="_blank">' . __('Twitter', 'pinthis') . '</a></li>';
}
?>
