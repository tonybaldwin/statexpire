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

$oldate=date(("Y-m-d"), strtotime('-3 months'));

$username="USERNAME";
$password="PASSWORD";
$database="DBNAME";

if (!$link = mysql_connect('localhost', $username, $password)) {
            echo 'Could not connect to mysql';
                exit;
            }

if (!mysql_select_db($database, $link)) {
            echo 'Could not select database';
                exit;
            }

$notice_query="DELETE FROM notice WHERE created <= '$oldate 01:01:01'";
$conversation_query="DELETE FROM conversation WHERE created <= '$oldate 01:01:01'";
$reply_query="DELETE FROM reply WHERE modified <= '$oldate 01:01:01'";

mysql_query($notice_query);
$rowaff1=mysql_affected_rows();
mysql_query($conversation_query);
$rowaff2=mysql_affected_rows();
mysql_query($reply_query);
$rowaff3=mysql_affected_rows();
mysql_close();

echo "SUCCESS: $rowaff1 notices, $rowaff2 conversations, and $rowaff3 replies deleted from database.\n";
