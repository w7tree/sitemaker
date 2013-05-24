#!/bin/sh

TEMP=$_
DIR=`echo $TEMP | sed -e s/sitemaker.sh$//`

cp -r $DIR/* ./
cp -r $DIR/.htaccess ./
rm ./sitemaker.sh

echo "Do you create wordpress theme?(y/n)"
read answer

if [ "$answer" = y ]
then
  rm -rf ./_include
else
  rm ./functions.php
fi

