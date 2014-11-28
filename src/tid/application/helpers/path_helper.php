<?php
if ( ! function_exists('assets_url'))
{
	function assets_url($uri = '', $full = true)
	{
		$CI =& get_instance();
		if($full)
		return base_url($CI->config->slash_item('asset_path').ltrim($uri, '/'));
		return $CI->config->slash_item('asset_path').ltrim($uri, '/');
	}
}
