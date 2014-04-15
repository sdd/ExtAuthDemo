<?php

require_once('Config/database.php');
$dbconf = new DATABASE_CONFIG();
$dbconf = $dbconf->default;

echo "CREATE USER '{$dbconf['login']}'@'{$dbconf['host']}'
	IDENTIFIED BY '{$dbconf['password']}';
GRANT USAGE ON *.* TO '{$dbconf['login']}'@'{$dbconf['host']}'
	IDENTIFIED BY '{$dbconf['password']}' WITH
		MAX_QUERIES_PER_HOUR 0
		MAX_CONNECTIONS_PER_HOUR 0
		MAX_UPDATES_PER_HOUR 0
		MAX_USER_CONNECTIONS 0;
CREATE DATABASE IF NOT EXISTS `{$dbconf['database']}`;
GRANT ALL PRIVILEGES ON `{$dbconf['database']}`.* TO '{$dbconf['login']}'@'{$dbconf['host']}';";