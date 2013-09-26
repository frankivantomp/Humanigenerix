<?php

$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	switch($lang){
	case "fr":
	header("Location: fr.html");
	break;
	case "en":
	header("Location: an.html");
	break;

}

?>