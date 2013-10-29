Zend2Examples
=======================

Introduction
------------
This is a simple, Zend2Examples application using the ZF2 MVC layer and module
systems.


Installation Skeleton
------------

Using Composer (recommended)
----------------------------
The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies using the `create-project` command:

    curl -s https://getcomposer.org/installer | php --
    php composer.phar create-project -sdev --repository-url="http://packages.zendframework.com" zendframework/skeleton-application path/to/install

Alternately, clone the repository and manually invoke `composer` using the shipped
`composer.phar`:

    cd my/project/dir
    git clone git://github.com/zendframework/ZendSkeletonApplication.git
    cd ZendSkeletonApplication
    php composer.phar self-update
    php composer.phar install

(The `self-update` directive is to ensure you have an up-to-date `composer.phar`
available.)

Another alternative for downloading the project is to grab it via `curl`, and
then pass it to `tar`:

    cd my/project/dir
    curl -#L https://github.com/zendframework/ZendSkeletonApplication/tarball/master | tar xz --strip-components=1

You would then invoke `composer` to install dependencies per the previous
example.

Using Git
--------------------
Alternatively, you can install using native git submodules:

    git clone git://github.com/trivan/Zend2Examples.git

Virtual Host
------------

<VirtualHost *:80>

    ServerName zend2examples.com
    
    DocumentRoot /var/www/zend2examples/public
    
    SetEnv APPLICATION_ENV "development"
    

    <Directory />
        Options All
        AllowOverride All
    </Directory>

    <Directory /var/www/zend2examples/>
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

