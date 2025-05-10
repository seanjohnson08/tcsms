<?php

class template_main {

function news_header () {
global $STD;
return <<<HTML
HTML;
}

function news_archive_header ($from, $to) {
global $STD;
return <<<HTML
<div class="sform">
<form method="post" action="{$STD->tags['root_url']}act=main&amp;param=08">
<div class="sformstrip">Select a range of updates</div>
<table class="sformtable" cellspacing="1">
<tr>
  <td class="sformleftw" style="width:50%; font-weight:bold">From: &nbsp; {$from['m']} {$from['d']} {$from['y']}</td>
  <td class="sformleftw" style="width:50%; font-weight:bold">To: &nbsp; {$to['m']} {$to['d']} {$to['y']}</td>
</tr>
</table>
<div class="sformstrip" style="text-align:center"><input type="submit" value="Go" class="button" /></div>
</form>
</div>
<br>
HTML;
}

function news_footer () {
global $STD;
return <<<HTML
HTML;
}

function news_row ($news) {
global $STD;
return <<<HTML
<div class="sform">
  <div class="updatetitle">{$news['title']}</div><br>
  <div class="updatedate">{$news['date']} by {$news['author']}</div><br>
  {$news['message']}<br><br>
    <a href="{$STD->tags['root_url']}act=main&amp;param=02&amp;id={$news['nid']}">View Comments ({$news['comments']})</a> | 
    <a href="{$STD->tags['root_url']}act=main&amp;param=02&amp;id={$news['nid']}&amp;exp=1#reply">Leave Comment</a><br><br><br>
  <div class="sformdark">
</div>
<br>
HTML;
}

function news_update_header () {
global $STD;
return <<<HTML
<br>
<span class='highlight'><b>Recent Additions</b><br></span>
<br>
<div class='newsform'>
HTML;
}

function news_update_footer () {
global $STD;
return <<<HTML
</div>
HTML;
}

function news_no_updates () {
global $STD;
return <<<HTML
<table class='sformtable' cellspacing='1'><tr>
<td height='25' class='newsstrip' style='text-align:center'>No recent additions since last update.</td>
</tr></table>
HTML;
}

function news_gen_mod_header ($name) {
global $STD;
return <<<HTML
<div class='newsstrip'>{$name}</div>
HTML;
}

function news_gen_mod_footer () {
global $STD;
return <<<HTML
HTML;
}

function news_gen_block_header ($name) {
global $STD;
return <<<HTML
<table class='sformtable' cellspacing='1'>
HTML;
}

function news_gen_block_header_col ($name, $id) {
global $STD;
return <<<HTML
<div class="newssubstrip" style="text-align: center">
  <a href="javascript:show_hide('$id');" style="text-decoration:underline" class="outlink">Click to see newly added $name</a></div>
<table id="$id" class='sformtable' style='display:none' cellspacing='1'>
HTML;
}

function news_gen_block_footer () {
global $STD;
return <<<HTML
</table>
HTML;
}

function news_gen_updblock_header ($name) {
global $STD;
return <<<HTML
<div class='newssubstrip'>Updated $name</div>
<table class='sformtable' cellspacing='1'>
HTML;
}

function news_gen_updblock_header_col ($name, $id) {
global $STD;
return <<<HTML
<div class="newssubstrip" style="text-align: center">
  <a href="javascript:show_hide('$id');" style="text-decoration:underline">Click to see updated $name</a></div>
<table id="$id" class='sformtable' style='display:none' cellspacing='1'>
HTML;
}

function news_gen_updblock_footer () {
global $STD;
return <<<HTML
</table>
HTML;
}

function news_gen_block_row ($res) {
global $STD;
return <<<HTML
<tr>
  <td class='newsleftw'><a href='{$res['url']}'><b>{$res['title']}</b></a></td>
  <td class='newsleftw' width='30%'>By {$res['username']}</td>
</tr>
HTML;
}

function comments_header () {
global $STD;
return <<<HTML
<script type='text/javascript'>
<!--
  function check_delete () {
  	form_check = confirm('Are you sure you want to delete this comment?');
  	
  	if (form_check == true) {
  		return true;
  	} else {
  		return false;
  	}
  }
-->
</script>
<table cellspacing="0" cellpadding="0" width="95%">
    <tr>
      <td class="tablecell1" colspan="2">
        <span class="boxheader">Comments</span>
        <br><br>
      </td>
    </tr>
</table>
<div class="sform" id="comments">
<table class="sformtable" cellspacing="0" style="table-layout: fixed;">
HTML;
}

function comments_footer ($pages, $url) {
global $STD;
return <<<HTML
</table>
<div class="sformstrip">
    Pages: {$pages} <span style='font-weight:normal'>| <a href='$url&amp;st=new'>Last Unread</a></span>
</div>
</div>
<br>
HTML;
}

function comments_add ($comment_url, $aexpand) {
global $STD;
return <<<HTML
<div style="text-align:right">
  <span style="font-size:14pt"><a id="reply" href="javascript:show_hide('addc');">Add Comment</a></span>
</div>
<br>
<div style="text-align: center; margin-left: auto; margin-right: auto;">
<script type="text/javascript"><!--
google_ad_client = "pub-2961670651465400";
/* 728x90, created 9/5/08 */
google_ad_slot = "3082258390";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<br>
<div class="sform" id="addc" style="$aexpand">
  <form method="post" action="{$comment_url}">
  <table class="sformtable" cellspacing="0" cellpadding="2">
    <tr>
      <td align="center">
        <br>
        <textarea name="message" cols="50" rows="10" class="textbox"></textarea>
        <br>
        <input type="submit" value="Add Comment" class="button" />
        <br>&nbsp;
      </td>
    </tr>
  </table>
  </form>
</div>
<br>
HTML;
}

function comments_none () {
global $STD;
return <<<HTML
<tr>
<td height="25" class="sformstrip" style="text-align:center">No comments have been left.</td>
</tr>
HTML;
}

function comments_row ($comment) {
global $STD;
return <<<HTML
<tr>
  <td class="sformstrip" width="80">
    <div style="width: 80px; height: 80px;" name="c{$comment['cid']}">{$comment['avatar']}</div>
  </td>
  <td class="sformstrip" style="vertical-align: top;">
  <b class="highlight">{$comment['author']}</b><br>
    {$comment['date']}
  </td>
  <td class="sformstrip" style="text-align:right; padding:2px; vertical-align: top;">
    <span style="vertical-align:middle">{$comment['report_icon']}</span>
    <span style="vertical-align:middle">{$comment['delete_icon']}</span>
    <span style="vertical-align:middle">{$comment['edit_icon']}</span>
    <span style="vertical-align:middle">{$comment['quote_icon']}</span>
  </td>
</tr>
<tr>
  <td class="sformblock" valign="top" width="100%" colspan="3">
    {$comment['message']}
    <br>&nbsp;
  </td>
</tr>
<tr>
  <td class="sformfoot" valign="top" width="100%" colspan="3">
    {$comment['like']}
  </td>
</tr>
<tr>
  <td height="6" colspan="3" class="sformdark">
  </td>
</tr>
HTML;
}

function comments_edit ($comment, $chtml, $comment_url) {
global $STD;
return <<<HTML
<div class="sform">
<table class="sformtable" cellspacing="0">
{$chtml}
</table>
</div>
<br>
<form method="post" action="{$comment_url}">
<div class="sform">
<div class="sformstrip">Edit the comment below</div>
<table class="sformtable" cellspacing="1">
<tr>
  <td class="sformleft">Comment</td>
  <td class="sformright"><textarea name="message" cols="50" rows="10" class="textbox">{$comment}</textarea></td>
</tr>
</table>
<div class="sformstrip" style="text-align:center"><input type="submit" value="Save Edit" class="button" /></div>
</div>
</form>
HTML;
}

function report_sub ($id, $url, $title) {
global $STD;
return <<<HTML
<form method='post' action='{$url}'>
<input type='hidden' name='id' value='{$id}'>
<div class="sform">
<div class="sformstrip">Report a submission</div>
<table class="sformtable" cellspacing="1">
  <tr>
    <td class="sformleft"><b>Submission</b></td>
    <td class="sformright"><b>{$title}</b></td>
  </tr>
  <tr>
    <td class="sformleft"><b>Report</b><br>Enter your report in this box to alert site staff to a submission theft or objectionable content.</td>
    <td class="sformright"><textarea rows='10' cols='50' name='report' class="textbox"></textarea></td>
  </tr>
</table>
<div class="sformstrip" style="text-align:center"><input type='submit' value='Send Report' class='button' /></div>
</div>
</form>
HTML;
}

function report_sub_com ($id, $url, $title, $c_author) {
global $STD;
return <<<HTML
<form method='post' action='{$url}'>
<input type='hidden' name='id' value='{$id}'>
<div class="sform">
<div class="sformstrip">Report a comment</div>
<table class="sformtable" cellspacing='1'>
  <tr>
    <td class="sformleft"><b>Submission</b></td>
    <td class="sformright"><b>{$title}</b></td>
  </tr>
  <tr>
    <td class="sformleft"><b>Comment By</b></td>
    <td class="sformright">{$c_author}</td>
  </tr>
  <tr>
    <td class="sformleft"><b>Report</b><br>Enter your report in this box to alert site staff to objectionable content in this comment.</td>
    <td class="sformright"><textarea rows='10' cols='50' name='report' class="textbox"></textarea></td>
  </tr>
</table>
<div class="sformstrip" style="text-align:center"><input type='submit' value='Send Report' class='button' /></div>
</div>
</form>
HTML;
}

function report_news_com ($id, $url, $title, $c_author) {
global $STD;
return <<<HTML
<form method='post' action='{$url}'>
<input type='hidden' name='id' value='{$id}'>
<div class="sform">
<div class="sformstrip">Report a comment</div>
<table class="sformtable" cellspacing='1'>
  <tr>
    <td class="sformleft"><b>News Entry</b></td>
    <td class="sformright"><b>{$title}</b></td>
  </tr>
  <tr>
    <td class="sformleft"><b>Comment By</b></td>
    <td class="sformright">{$c_author}</td>
  </tr>
  <tr>
    <td class="sformleft"><b>Report</b><br>Enter your report in this box to alert site staff to objectionable content in this comment.</td>
    <td class="sformright"><textarea rows='10' cols='50' name='report' class="textbox"></textarea></td>
  </tr>
</table>
<div class="sformstrip" style="text-align:center"><input type='submit' value='Send Report' class='button' /></div>
</div>
</form>
HTML;
}

function report_msg ($id, $url, $title, $m_author) {
global $STD;
return <<<HTML
<form method='post' action='{$url}'>
<input type='hidden' name='id' value='{$id}'>
<div class="sform">
<div class="sformstrip">Report a message</div>
<table class="sformtable" cellspacing='1'>
  <tr>
    <td class="sformleft"><b>Sender</b></td>
    <td class="sformright">{$m_author}</td>
  </tr>
  <tr>
    <td class="sformleft"><b>Subject</b></td>
    <td class="sformright">{$title}</td>
  </tr>
  <tr>
    <td class="sformleft"><b>Report</b><br>Enter your report in this box to alert site staff to objectionable content in this message.</td>
    <td class="sformright"><textarea rows='10' cols='50' name='report' class="textbox"></textarea></td>
  </tr>
</table>
<div class="sformstrip" style="text-align:center"><input type='submit' value='Send Report' class='button' /></div>
</div>
</form>
HTML;
}

function staff_page () {
global $STD;
return file_get_contents(dirname(__FILE__)."/../staff_page.html");
}


function comments_add_full ($comment, $comment_url) {
global $STD;
return <<<HTML
<form method="post" action="{$comment_url}">
<div class="sform">
<div class="sformstrip">Add your comment below</div>
<table class="sformtable" cellspacing="1">
<tr>
  <td class="sformleft">Comment</td>
  <td class="sformright"><textarea name="message" cols="50" rows="10" class="textbox">{$comment}</textarea></td>
</tr>
</table>
<div class="sformstrip" style="text-align:center"><input type="submit" value="Add comment" class="button" /></div>
</div>
</form>
HTML;
}

//Username request form template - Hypernova
function report_username ($username,$url) {
global $STD;
return <<<HTML
<form method='post' action='{$url}'>
<div class="sform">
<!-- <div class="sformstrip">Request Username Change</div> -->
<table class="sformtable" cellspacing="1">
  <tr>
    <td class="sformleft"><b>Username</b><br>Enter your username request in this box. Please understand that in some cases, your request username may be taken.</td>
    <td class="sformright"><input type="text" size="40" name="new_username" value="{$username}" class="textbox" /></td>
  </tr>
</table>
<div class="sformstrip" style="text-align:center"><input type='submit' value='Submit Request' class='button' /></div>
</div>
</form>
HTML;
}

}
?>
