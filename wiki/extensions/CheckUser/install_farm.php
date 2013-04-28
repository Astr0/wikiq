<?php
# install_farm.php script
$_SERVER['SERVER_NAME'] = $argv[1];
$_SERVER['DOCUMENT_ROOT']=  $argv[2]; #optional
require "install.php";