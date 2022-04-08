#!/bin/bash


#while (1); do



#done



while true; do
	
fields=`mysql -N -se "SELECT songid, filename FROM SongQueue ORDER BY priority DESC LIMIT 1" jukejive` 

if [ -n "$fields" ]
then
	songid=${fields[0]%$'\t'*};
	playfile=${fields[0]#*$'\t'};

	#echo "Got: $fields";
	#echo "Playfile: ($songid) $playfile";

	mysql -e "UPDATE song_queue SET status=1 WHERE songid='$songid'" jukejive

	omxplayer "$playfile" &
	cur_pid=$!;

	echo "($cur_pid) Playing: $playfile";

	wait;

	mysql -N -e "DELETE FROM song_queue WHERE songid='$songid'" jukejive
else
	echo "Nothing queued. sleeping 10s";
	sleep 10
fi	


done


exit;
