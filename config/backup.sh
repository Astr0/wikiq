#!/bin/bash

source $(dirname $0)/private.inc

BACKUPS="/var/www/wikiq/backup"

echo ======Started new backup process $(date '+%Y-%m-%d')======

[ -e $BACKUPS ]  || mkdir $BACKUPS

echo "----deleting old backup files"

/bin/find $BACKUPS/* -mtime +5 -exec bin/rm {} \;

for DATABASE in wiki_en wiki_ua wiki_ru wiki_pool
do
	/bin/nice -n 19 /usr/bin/mysqldump -u $USER --password=$PASSWORD $DATABASE -c --default-character-set=binary --single-transaction | /bin/nice -n 19 /bin/gzip > $BACKUPS/$DATABASE-$(date '+%Y-%m-%d').sql.gz
	echo "----backuped $DATABASE"
done

#upload new files to FTP
echo "----uploading files to FTP"

ftp -n -i $ftpsite <<EOF
user $ftpuser $ftppass
binary
cd $putdir
lcd $BACKUPS
mput *-$(date '+%Y-%m-%d').sql.gz
quit
EOF


# get a list of files and dates from ftp and remove files older than ndays
ndays=7


# work out our cutoff date
MM=`date --date="$ndays days ago" +%b`
DD=`date --date="$ndays days ago" +%d`


echo "----removing files older than $MM $DD"

# get directory listing from remote source
listing=`ftp -i -n $ftpsite <<EOMYF 
user $ftpuser $ftppass
binary
cd $putdir
ls
quit
EOMYF
`
lista=( $listing )
#echo $listing

# loop over our files
for ((FNO=0; FNO<${#lista[@]}; FNO+=9));do
  # month (element 5), day (element 6) and filename (element 8)
  #echo  Date ${lista[`expr $FNO+5`]} ${lista[`expr $FNO+6`]}          File: ${lista[`expr $FNO+8`]}

  # check the date stamp
  if [ ${lista[`expr $FNO+5`]} == $MM ]
  then
	echo ${lista[`expr $FNO+5`]} equals $MM
    if [ ${lista[`expr $FNO+6`]} -lt $DD ]
    then
      # Remove this file
      echo "----Removing ${lista[`expr $FNO+8`]}"
      ftp -i -n $ftpsite <<EOMYF2 
      user $ftpuser $ftppass
      binary
      cd $putdir
      delete ${lista[`expr $FNO+8`]}
      quit
EOMYF2
    fi
  fi
done