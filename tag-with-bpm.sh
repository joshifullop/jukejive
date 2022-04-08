#!/bin/bash

OLDIFS=$IFS
IFS='\n';

while read -r fn
do	

	echo "Processing: $fn"


done < `find "/media/usb/music/metal/" -name "*.mp3" -print0`


IFS=$OLDIFS


