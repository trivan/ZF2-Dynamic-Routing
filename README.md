Introduction
------------
This is a simple, zf2dynamicrouter.com application using the ZF2 MVC layer and module
systems.


Virtual Host
------------

<VirtualHost *:80>

    ServerName zf2dynamicrouter.com
    DocumentRoot /var/www/zf2dynamicrouter.com/public
    SetEnv APPLICATION_ENV "development"

    <Directory />
        Options All
        AllowOverride All
    </Directory>

    <Directory /var/www/zf2dynamicrouter.com/>
    DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        allow from all
    </Directory>

    ScriptAlias /cgi-bin/ /usr/lib/cgi-bin/
    <Directory "/usr/lib/cgi-bin">
        AllowOverride All
        Options +ExecCGI -MultiViews +SymLinksIfOwnerMatch
        Order allow,deny
        Allow from all
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log

    # Possible values include: debug, info, notice, warn, error, crit,
    # alert, emerg.
    LogLevel warn

    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>


And then create shortcut to sites-enables : sudo a2ensite example.com
Next turn on mod_rewrite : sudo a2enmod rewrite
Finally restart apache: service apache2 restart


Note : 
Turn on error reporting in php
gedit /etc/php5/apache2/php.ini
in php.ini (probably different for php and cli)

error_reporting = E_ALL
display_errors = 1

