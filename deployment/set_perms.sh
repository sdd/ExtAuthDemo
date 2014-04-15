#!/bin/sh

# Set correct permissions for all CakePHP files

# Blanket for all files and filders
find . -type f -exec chmod 664 {} \;
find . -type d -exec chmod 775 {} \;

# open perms for tmp
chmod -R 777 tmp

# executable perms for console.
chmod 775 Console/cake Console/cake.bat

# change own perms back to executable :-)
chmod 775 set_perms.sh
