azer
=======

minimal PHP framework


note:

You will need to set your webserver to redirect all request like "/myApp/foo/bar" to index.php

for ex with an Apache .htaccess in www/myApp/ folder:


	<IfModule mod_rewrite.c>
		RewriteEngine On
		RewriteRule ^/?(javascript|css|img) - [L]
		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteCond %{REQUEST_FILENAME} !-d
		RewriteRule . index.php [L]
	</IfModule>

or in your apache sites-enabled config:

	<IfModule mod_rewrite.c>
		RewriteEngine On
		RewriteRule ^/?myApp/(javascript|css|img) - [L,NC]
		RewriteCond %{REQUEST_URI} ^/?myApp [NC]
		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteCond %{REQUEST_FILENAME} !-d
		RewriteRule . /myApp/index.php [L]
	</IfModule>
	
and finally, you also need to set your server to allow CORS, (ex on Apache http://enable-cors.org/server_apache.html)
