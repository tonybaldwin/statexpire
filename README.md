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

The statexpire.php is to be run from the command line with
/usr/bin/php /path/to/statexpire.php
not to be run in a browser.
As such, it requires php-cli, but statusnet already requires that to run other scripts.
I recommend sticking it in /statusnet/scripts/

Or, of course, the statexpire.sh is a bash script, to be run from the command line.

You could have a cronjob do it:
0 0 1 * * /usr/bin/php /var/www/statusnet/scripts/statexpire.php
or
0 0 1 * * /var/www/status/scripts/statexpire.sh

or some such thing.
They both accomplish the same thing.
