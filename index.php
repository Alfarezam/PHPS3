<?php
require_once "models/model_role.php";
require_once "models/model_user.php";

session_start();
//session_destroy();


$obj_role = new modelRole();
$obj_user = new modelUser();

if (isset($_GET['modul'])) {
    $model = $_GET['modul'];
} else {
    $model = "dashboard";
}

switch($model) {
    case "dashboard":
        include 'views/kosong.php';
        break;
    case "user":
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        switch ($fitur) {
            case 'add':
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $uname = $_POST['user_name'];
                    $pass = $_POST['password'];
                    $role_name = $_POST['role_name'];
                    $role = $obj_role->getRoleByName($role_name);
                    $obj_user->addUser($uname, $pass, $role);
                    header('location: index.php?modul=user');
                }else{
                    $roles = $obj_role->getAllRoles();
                    include 'views/user_input.php';
                }
                break;
            default:
                $users = $obj_user->getUsers();


                include 'views/user_list.php';

        }
        break;
    case "role":
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        switch ($fitur) {
            case 'add':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = $_POST['role_name'];
                    $desc = $_POST['role_description'];
                    $status = $_POST['role_status'];
                    $obj_role->addRole($name, $desc, $status);
                    header('location: index.php?modul=role');
                } else {
                    include 'views/role_input.php';
                }
                break;
            case 'delete':
                $obj_role->deleteRole($id);
                header('location: index.php?modul=role');
                break;
            case 'update':
                $role = $obj_role->getRoleById($id);
                include 'views/role_edit.php';
                break;
            case 'edit':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = $_POST['role_name'];
                    $desc = $_POST['role_description'];
                    $status = $_POST['role_status'];
                    $obj_role->updateRole($id, $name, $desc, $status);
                    header('location: index.php?modul=role');
                } else {
                    include 'views/role_list.php';
                }
                break;
            default:
                $roles = $obj_role->getAllRoles();
                include 'views/role_list.php';
                break;
        }
}
?>
