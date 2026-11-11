<?php
header('Content-Type: text/html; charset=utf-8');
echo '<h1>Версии баз данных</h1>';

$mysql = new PDO(
    'mysql:host=mysql;dbname=' . getenv('MYSQL_DATABASE'),
    getenv('MYSQL_USER'),
    getenv('MYSQL_PASSWORD')
);
$mysqlVersion = $mysql->query('SELECT VERSION()')->fetchColumn();
echo '<p>MySQL: ' . htmlspecialchars($mysqlVersion) . '</p>';

$postgres = new PDO(
    'pgsql:host=postgres;dbname=' . getenv('POSTGRES_DB'),
    getenv('POSTGRES_USER'),
    getenv('POSTGRES_PASSWORD')
);
$postgresVersion = $postgres->query('SHOW server_version')->fetchColumn();
echo '<p>PostgreSQL: ' . htmlspecialchars($postgresVersion) . '</p>';

$redis = new Redis();
$redis->connect('redis', 6379, 2.0);
$redisVersion = $redis->info('server')['redis_version'];
echo '<p>Redis: ' . htmlspecialchars($redisVersion) . '</p>';

phpinfo(INFO_GENERAL);
