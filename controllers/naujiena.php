<?php
include_once("../models/Naujienos.php");
include_once("../configuration/config.php");
$temp = new Naujienos($mysqli);
$temp->select(1);
echo $temp->parasymo_data;