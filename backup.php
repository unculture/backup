<?php
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Symfony\Component\Yaml\Yaml;

$config = Yaml::parse(dirname(__FILE__) . "/config.yaml");


$client = S3Client::factory(
    [
        "key" => $config["aws"]["key"],
        "secret" => $config["aws"]["secret"]
    ]
);


$bucket = $config["aws"]["bucket"];
$path = dirname(__FILE__) . "/";

date_default_timezone_set("Europe/London");
$name = date("G_i_s_d_M_Y");

$databaseUser = $config["database"]["user"];
$databasePassword = $config["database"]["pass"];
$databaseName = $config["database"]["name"];

shell_exec("mysqldump -u $databaseUser -p$databasePassword $databaseName > $path$name.sql");
shell_exec("tar -czf $path$name.tar.gz " . dirname(__FILE__) . "/test $path$name.sql");

/*
$result = $client->putObject(
    [
        'Bucket'     => $bucket,
        'Key'        => $name,
        'SourceFile' => $path . $name . ".tar.gz"
    ]
);
 */
//shell_exec("rm $path$name.tar.gz $path$name.sql");
