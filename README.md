StatusExpire.php
by tony baldwin | www.tonybaldwin.me
released according to the Gnu Affero Public License, v. 3

Expires statusnet updates after a given period (here, 3 months, but you can edit that).
You will have to edit the script to reflect your DBNAME, USERNAME, and PASSWORD,
plus, of course, you can change the value in
$oldate=date((Ymd), strtotime('-3 months'));
from -3 months to whatever you like.
Could be -10 days, -1 year, -6 months, whatever,
and the script will delete updates older than that given value.
