#!/bin/bash

source $(dirname $0)/private.inc

BACKUPS="/var/www/wikiq/backup"

[ -e $BACKUPS ]  || mkdir $BACKUPS

echo ======Started new backup process $(date '+%Y-%m-%d')====== >> /var/log/wikiq-backup.log

for DATABASE in wiki_en wiki_ua wiki_ru wiki_pool
do
	/bin/nice -n 19 /usr/bin/mysqldump -u $USER --password=$PASSWORD $DATABASE -c --default-character-set=binary --single-transaction | /bin/nice -n 19 /bin/gzip > $BACKUPS/$DATABASE-$(date '+-%Y-%m-%d').sql.gz
	echo "    backuped $DATABASE" >> /var/log/wikiq-backup.log
done