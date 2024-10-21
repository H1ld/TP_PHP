<?php
session_start();

#####################################################
#### THIS FILE GENERATES THE FOLLOWING VARIABLES ####
#####################################################

$projects = manageProjectsCookie();
$users = manageUsersCookie();

#####################################################
###################### OBJECTS ######################
#####################################################

class Project {
  // Attributes
  private $name;
  private $description;

  function __construct($name, $description) {
    $this->name = $name;
    $this->description = $description;
  }

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }

  function set_description($description) {
    $this->description = $description;
  }
  function get_description() {
    return $this->description;
  }
}

class User {
  // Attributes
  private $username;
  private $password;
  private $email;
  private $isAdmin;

  public function __construct($username, $password, $email, $isAdmin) {
      $this->username = $username;
      $this->password = $password;
      $this->email = $email;
      $this->isAdmin = $isAdmin;
  }

  // Methods
  public function getUsername() {
      return $this->username;
  }

  public function setUsername($username) {
      $this->username = $username;
  }

  public function getPassword() {
      return $this->password;
  }

  public function setPassword($password) {
      $this->password = $password;
  }

  public function getEmail() {
      return $this->email;
  }

  public function setEmail($email) {
      $this->email = $email;
  }

  public function isAdmin() {
        return $this->isAdmin;
  }

  public function setAdmin($isAdmin) {
      $this->isAdmin = $isAdmin;
  }
}

#####################################################
###################### COOKIES ######################
#####################################################

############## project cookies ##############

// create default cookie if none is set and retrieve projects datas from cookies 
function manageProjectsCookie(){
  if (!isset($_COOKIE['projects'])) {
    $projectList = createDefaultProjects();
    saveProjectsCookie($projectList);
    header("Refresh:0");
  } else {
    return retrieveProjectCookie();
  }
}


function createDefaultProjects(){
  $projects = [];
  $projects[] = new Project("Project 1", "Description of Project 1");
  $projects[] = new Project("Project 2", "Description of Project 2");
  $projects[] = new Project("Project 3", "Description of Project 3");
  return $projects;
}

function saveProjectsCookie($projects){
  // Convert the projects array to an array of associative arrays
  $projects_array = array_map(function($project) {
      return [
          "name" => $project->get_name(),
          "description" => $project->get_description()
      ];
  }, $projects);

  $projects_json = json_encode($projects_array);
  
  setcookie("projects", $projects_json, time() + (86400 * 30), "/");
}

function retrieveProjectCookie(){
  $projects_json = json_decode($_COOKIE['projects'], true);

  $projects = [];
  foreach ($projects_json as $project_data) {
      $projects[] = new Project($project_data['name'], $project_data['description']);
  }
  return $projects;
}

############### user cookies ###############

// create default cookie if none is set and retrieve users datas from cookies 
function manageUsersCookie(){
  if (!isset($_COOKIE['users'])) {
    $userList = createDefaultUsers();
    saveUsersCookie($userList);
    header("Refresh:0");
  } else {
    return retrieveUsersCookie();
  }
}


function createDefaultUsers(){
  $users = [];
  $users[] = new User("admin", "password123", "admin@example.com", TRUE);
  $users[] = new User("user_1", "123", "test1@example.com", FALSE);
  $users[] = new User("user_2", "123", "test2@example.com", FALSE);
  $users[] = new User("user_3", "123", "test3@example.com", FALSE);
  return $users;
}

function saveUsersCookie($users){
  // Convert the users array to an array of associative arrays
    $users_array = array_map(function($user) {
      return [
          "username" => $user->getUsername(),
          "password" => $user->getPassword(),
          "email" => $user->getEmail(),
          "isAdmin" => $user->isAdmin()
      ];
  }, $users);

  $users_json = json_encode($users_array);

  // Set the cookie with the user data (expires in 30 days)
  setcookie("users", $users_json, time() + (86400 * 30), "/");
}

function retrieveUsersCookie(){
  $users_json = json_decode($_COOKIE['users'], true); 

  $users = [];
  foreach ($users_json as $user_data) {
      $users[] = new User($user_data['username'], $user_data['password'], $user_data['email'], $user_data['isAdmin']);
  }
  return $users;
}

?>
