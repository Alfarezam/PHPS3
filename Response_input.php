<?php
require_once 'nodes/node_role.php';
$objRole = [];
$objRole[] = new Role(1,$_POST['role_name'],$_POST['role_description'],$_POST['role_status']);
include 'views/role_list.php';
?>