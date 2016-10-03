<?php  // <~ do not copy the opening php tag

//* Change the footer text
add_filter('genesis_footer_creds_text', 'sp_footer_creds_filter');
function sp_footer_creds_filter( $creds ) {
	$creds = '[footer_copyright before="Copyright "] &middot; <a href="http://www.lhommedelecosse.com">L\'homme de l\'ecosse</a> &middot; <a href="http://lhommedelecosse.com">Website by L\'homme de l\'ecosse</a>';
	return $creds;
}
