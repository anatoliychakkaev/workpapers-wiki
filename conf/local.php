<?php

$conf['localcss']    = 'local.css';		  //name for additional stylesheet
 
// recursive function to establish best navigate file to be used
function getNavigateFN($ns, $file) {
 
	// check for wiki page = $ns:$file (or $file where no namespace)
	$nsFile = ($ns) ? "$ns:$file" : $file;
	if (file_exists(wikiFN($nsFile))) return $nsFile;
 
// remove deepest namespace level and call function recursively
 
	// no namespace left, exit with no file found	
	if (!$ns) return '';
 
	$i = strrpos($ns, ":");
	$ns = ($i) ? substr($ns, 0, $i) : false;	
	return getNavigateFN($ns, $file);
}
 
function html_navigate() {
	global $ID;
	global $REV;
	global $conf;
 
	// save globals
	$saveID = $ID;
	$saveREV = $REV;
 
  $fileNavigate = getNavigateFN(getNS($ID), 'navigate');
 
	// open navigate <div>
	echo("<div id='wiki_navigate'>");
 
	// determine what to display
	if ($fileNavigate) {
		$ID = $fileNavigate;
		$REV = '';
		print p_wiki_xhtml($ID,$REV,false);
	}
	else {
		//html_index('.');
	}
 
	// close navigate <div>	and restore globals
	echo("</div>");
	$ID = $saveID;
	$REV = $saveREV;
}

?>
