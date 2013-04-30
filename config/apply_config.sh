/bin/cp -f httpd.conf /etc/httpd/conf/
/bin/cp -f squid.conf /etc/squid/
/bin/cp -f lsearchd /etc/init.d/
chmod 755 /etc/init.d/lsearchd
/etc/init.d/lsearchd restart
service httpd restart
service squid restart