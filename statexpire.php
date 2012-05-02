<?php

// script to expire status.net posts older than 3 months old
// edit the $PASSWORD to reflect your password
// and $DBNAME to reflect your db (mine is, not surprisingly, simply "statusnet"
// by tony baldwin | www.tonybaldwin.me
// released according to Gnu Affero Public License v. 3
// expiration is set at 3 months, but you can changes the value of oldate, by changing
// the strtotime('-3 months') to some other value, like (-1 year) or (-6 months), or whatever.
// this is to be run from the command line, /usr/bin/php /path/to/statexpire.php
// not run in the browser

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
