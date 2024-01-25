<?php
if ( stristr($_SERVER["REQUEST_URI"], basename(__FILE__)) )
{
	http_response_code(403);
	exit;
}
if ( strpos($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip") !== false )
{
	if ( ob_start(function($data)
	{
		header_remove("Content-Length");
		return gzencode($data, 1);
	}) )
	{
		header("Content-Encoding: gzip");
	}
}
switch ( $script = ltrim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/") )
{
	case "get.php": case "player_api.php": case "xmltv.php":
		if ( $script == "get.php" && !file_exists($script) && file_exists("playlist.php") )
		{
			$script = "playlist.php";
		}
		require_once($script);
	break;
	default:
		http_response_code(404);
	break;
}
?>
