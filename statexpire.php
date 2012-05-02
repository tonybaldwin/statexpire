<?php

// script to expire status.net posts older than 3 months old
// edit the $PASSWORD to reflect your password
// and $DBNAME to reflect your db (mine is, not surprisingly, simply "statusnet"
// by tony baldwin | www.tonybaldwin.me
// released according to Gnu Affero Public License v. 3

$oldate=date((Ymd), strtotime('-3 months'));

$username="USERNAME";
$password="PASSWORD";
$database="DBNAME";
mysql_connect(localhost,$USERNAME,$PASSWORD);

if (!$mysql_connect) {
	    die('Could not connect: ' . mysql_error());
}


$num=mysql_numrows($result);

$query="DELETE FROM `notice` WHERE `created` <= '$oldate 01:01:01'"
mysql_query($query);
$rowaff=mysql_affected_rows();
mysql_close();

echo "SUCCESS: $rowaff rows deleted from database.";
