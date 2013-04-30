/bin/cp -f httpd.conf /etc/httpd/conf/
/bin/cp -f squid.conf /etc/squid/
/bin/cp -f crontab /etc/
service httpd restart
service squid restart
service crond restart