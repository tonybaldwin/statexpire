#!/bin/bash

# script to expire status.net posts older than 3 months old

datenow=$(date +%Y%m%d)

datemin3=$(date -d "$datenow - 3 months" "+%Y%m%d")

query="DELETE FROM 'notice' WHERE 'created' <= '$datemin3 01:01:01'"

# edit the $PASSWORD to reflect your password
# and $DBNAME to reflect your db (mine is, not surprisingly, simply "statusnet"
/usr/bin/mysql -D $DBNAME -u root -password="$PASSWORD" << eof
$query
exit
