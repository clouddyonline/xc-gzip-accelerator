
Place the **gzip.php** file in the **wwwdir** Xtream Codes panel folder


Set the **owner** and **group** for the **gzip.php** file according to your Xtream Codes panel:

	chown xtreamcodes:xtreamcodes gzip.php
or

	chown xui:xui gzip.php

Add the following lines to **nginx.conf**:

    location = /get.php {
    	rewrite ^ /gzip.php last;
    }
    
    location = /player_api.php {
    	rewrite ^ /gzip.php last;
    }
    
    location = /xmltv.php {
    	rewrite ^ /gzip.php last;
    }

