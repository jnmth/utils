utils
=====

*Utilities* repository


----


__SlySpy__


Writes a logger file with timestamp, IP, city, country of the visitor + the full url
hence just use one clone for any subpage
simply include this in any html/php that has __visitors counts next to nothing__
 
*Requires GeoPlugin class*
http://www.geoplugin.com/webservices/php

*Requires file "track.log" in the same dir*

*trashit.php* to set cron at: *<?php 	file_put_contents('track.log', " ", LOCK_EX); ?>* to regularly empty out the logger


----

__Trim-Array__

Unset empty values in array like, after import from csv or so.


----
