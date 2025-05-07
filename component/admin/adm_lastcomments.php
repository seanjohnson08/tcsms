<?php

$component = new component_adm_lastcomments;

class component_adm_lastcomments {
	
	var $html		= "";
	var $output		= "";
	
	function init () {
		global $STD, $IN;
		
		$this->html = $STD->template->useTemplate('adm_conf');
		
		$this->output .= $STD->global_template->page_header("Recent Comments");
		if (empty($_GET['n']))
			$this->output .= $STD->global_template->message("<iframe width=\"100%\"  height=\"720px\" src=\"/admin.php?act=lastcommentsframe\" />");
		else
			$this->output .= $STD->global_template->message("<iframe width=\"100%\"  height=\"720px\" src=\"/admin.php?act=lastcommentsframe&n=".$_GET['n']."\" />");

		$STD->template->display( $this->output );
	}
}
?>