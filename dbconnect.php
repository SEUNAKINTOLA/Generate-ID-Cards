<?php

error_reporting( ~E_DEPRECATED & ~E_NOTICE );
$db_host='localhost';

$db_user='admin2';

$db_password='admin2';

$database='accf2017';

$dbc = mysqli_connect("$db_host","$db_user","$db_password","$database") or die ('Error connecting to Database');
