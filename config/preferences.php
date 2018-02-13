<?php

define('DOMAIN', "http://localhost");

define('LIKED', '_USER liked you');
define('VIEW_PROFILE', '_USER came to your profile');
define('NEW_MESSAGE', '_USER send you message');
define('LIKED_BACK', '_USER liked back');
define('UNLIKED', '_USER unliked you');

/*
** The user received a “like”.
** The user’s profile has been checked.
** The user received a message.
** A “liked” user “liked” back.
** A connected user “unliked” you.
*/

$_GENDER_ = array("male", "female");
$_SEX_ = array("bisexual", "heterosexual", "homosexual");
$_TAG_ = array(	"vegan",
				"geek",
				"UNIT student",
				"wow player",
				"music fan",
				"mem lover",
				"anime lover",
				"dota player",
				"animal lover"
);

function encode($str) {
	return sha1(trim($str));
}