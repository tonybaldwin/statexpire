#!/bin/bash

# script to expire status.net posts older than 3 months old
# by tony baldwin | www.tonybaldwin.me
# this, like the php script, could be used with a cron job.
# your choice!
# it will expire updates, replies, and conversations at 3 months.
# to change the expiry period, "- 3 months" value in the oldate var
# to another value.


datenow=$(date +%Y%m%d)

oldate=$(date -d "$datenow - 3 months" "+%Y%m%d")

notice_query="DELETE FROM 'notice' WHERE 'created' <= '$oldate 01:01:01'"
conversation_query="DELETE FROM 'conversation' WHERE 'created' <= '$oldate 01:01:01'"
reply_query="DELETE FROM 'reply' WHERE 'modified' <= '$oldate 01:01:01'"

# edit the $PASSWORD to reflect your password
# and $DBNAME to reflect your db 
/usr/bin/mysql -D $DBNAME -u root -password="$PASSWORD" << eof
$notice_query
$conversation_query
$reply_query
exit
