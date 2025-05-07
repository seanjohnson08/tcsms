<?php

//INIT


//------------------------------------------------
//Mainframe
error_reporting(E_ALL);
set_time_limit(0);

define ('ROOT_PATH', './');
global $upload_msg, $global_error;



require ROOT_PATH.'settings.php';

require ROOT_PATH.'lib/db_drivers/'.$CFG['db_driver'].'.php';

$DB = new db_driver;
$DB->connect();

if (!empty($_GET['debug']))
	$DB->debug = 1;

require ROOT_PATH.'lib/std.php';
require ROOT_PATH.'lib/userlib.php';
require ROOT_PATH.'lib/module.php';
require ROOT_PATH.'component/template_ui.php';

global $IN, $STD, $DB, $CFG;
require_once ROOT_PATH.'lib/resource.php';
require_once ROOT_PATH.'lib/message.php';


//------------------------------------------------
//variables
$debug_user = '';
$count = 0;
$input_discord = '';
$input_username = null;

if (!empty($_GET['dis']))
{
	$input_discord = urldecode($_GET['dis']);
}

if (!empty($_GET['name']))
{
	$input_username = urldecode($_GET['name']);
}


$where = $DB->format_db_where_string(array('discord' => $input_discord),
									 array('username' => $input_username)); 
$DB->query("SELECT username, discord FROM ".$CFG['db_pfx']."_users WHERE ".$where);
$count = intval($DB->get_num_rows());

while ($row = $DB->fetch_row())
{
	$db_user = $row['username'];
}

if ($count <> 0)
{
	echo "yes";
}
else
{
	echo $where.'<br>'.'Username = '.$input_username.'<br>'.'Discord = '.$input_discord.'<br>'.'Count = '.$count;
}

$DB->close_db();

?>