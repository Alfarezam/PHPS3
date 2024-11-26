<?php
require_once "nodes/node_user.php";
require_once "nodes/node_role.php";

class modelUser
{
    private $users = [];
    private $nextId = 1;

    public function __construct()
    {
        if (isset($_SESSION['users'])) {
            $this->users = unserialize($_SESSION['users']);
            $this->nextId = count($this->users) + 1;
        } else {
            $this->initializeDefaultUsers();
        }
    }

    public function addUser($uname, $pass, $role)
    {
        $user = new \User($this->nextId++, $uname, $pass, $role);
        $this->users[] = $user;
        $this->saveToSession();
    }

    private function saveToSession()
    {
        $_SESSION['users'] = serialize($this->users);
    }

    public function getUsers()
    {
        return $this->users;
    }

    private function initializeDefaultUsers()
    {
        $obj_role1 = new \Role(1, "Admin", "Administration", 1);
        $obj_role2 = new \Role(1, "Kasir", "Kasir", 1);
        //data dummy
        $this->addUser('alfarezaym@gmail.com', '1223', $obj_role1);
        $this->addUser('alex@gmail.com', '123', $obj_role1);
        $this->addUser('oriel@gmail.com', '111', $obj_role2);
    }


    public function getUserById($user_id)
    {
        foreach ($this->users as $user) {
            if ($user->user_id == $user_id) {
                return $user;
            }
        }
        return null;
    }

    public function deletUser($user){
        if ($user != null) {
            $key = array_search($user, $this->users);
            unset($this->users[$key]);
            $this->saveToSession();
            return true;
        }
        return false;
    }
    public function updateUser($userid, $username, $password, $role){
        $userlokal =$this ->getUserById($userid);
        if ( $userlokal!= null){
        $userlokal -> username = $username;
        $userlokal -> password = $password;
        $userlokal -> role = $role;
        $this->saveToSession();
        return true;
    }
        return false;

    }
}
//session_start();
//// Testing Input dan Output
//$obj_user = new modelUser();
//$users = $obj_user->getUsers();
//// print_r($users);
//foreach ($users as $user) {
//    echo "Username: ".$user->username."<br/>";
//    echo "Password: ".$user->password."<br/>";
//    echo "Role Name: ".$user->role->role_name."<br/>";
//}
//
//echo "-----------------------------"."<br/>";
//echo "Testing delete User by ID"."<br/>";
//$userlokal = $obj_user ->getUsers(1);
//$obj_role1 = new Role(1, "Admin", "Administration", 1);
//$obj_user -> updateUser(2, "alexander@gmail.com",12345,$obj_role1);
//foreach ($users as $user) {
//    echo "Username: " . $user->username . "<br/>";
//    echo "Password: " . $user->password . "<br/>";
//    echo "Role Name: " . $user->role->role_name . "<br/>";
//
//}
//
?>