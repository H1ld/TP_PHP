<?php
session_start();

#####################################################
#### THIS FILE GENERATES THE FOLLOWING VARIABLES ####
#####################################################

$users = manageUsersCookie();


#### PLEASE KEEP IN MIND THESE SESSION VARIABLES ####
/*
UserProfileIndex : keeps the id of the user whose profile is being accessed
LoggedInUserIndex : keeps the id of the user logged in
*/

#####################################################
###################### OBJECTS ######################
#####################################################

class User {
  private $username;
  private $password;
  private $email;
  private $isAdmin;
  private $cv;
  private $projects = [];

  public function __construct($username, $password, $email, $isAdmin) {
      $this->username = $username;
      $this->password = $password;
      $this->email = $email;
      $this->isAdmin = $isAdmin;
  }

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

  public function getCV() {
    return $this->cv;
  }

  public function setCV(CV $cv) {
    $this->cv = $cv;
  }
   
  public function addProject(Project $project) {
    $this->projects[] = $project;
  }

  public function removeProject($index) {
    if (isset($this->projects[$index])) {
      array_splice($this->projects, $index, 1);
    }
  }

  public function getProjects() {
    return $this->projects;
  }
}

class Project {
  private $name;
  private $description;

  function __construct($name, $description) {
    $this->name = $name;
    $this->description = $description;
  }

  function setName($name) {
    $this->name = $name;
  }
  function getName() {
    return $this->name;
  }

  function setDescription($description) {
    $this->description = $description;
  }
  function getDescription() {
    return $this->description;
  }
}

class CV {
  private $name;
  private $email;
  private $phone;
  private $address;
  private $skills;
  private $languages;

  public function __construct($name, $email, $phone, $address, $skills, $languages) {
      $this->name = $name;
      $this->email = $email;
      $this->phone = $phone;
      $this->address = $address;
      $this->skills = $skills;
      $this->languages = $languages;
  }

  public function getName() {
      return $this->name;
  }

  public function setName($name) {
      $this->name = $name;
  }

  public function getEmail() {
      return $this->email;
  }

  public function setEmail($email) {
      $this->email = $email;
  }

  public function getPhone() {
      return $this->phone;
  }

  public function setPhone($phone) {
      $this->phone = $phone;
  }

  public function getAddress() {
      return $this->address;
  }

  public function setAddress($address) {
      $this->address = $address;
  }

  public function setSkill($skill) {
      $this->skills = $skill;
  }

  public function getSkills() {
      return $this->skills;
  }

  public function setLanguage($language) {
      $this->languages = $language;
  }
  
  public function getLanguages() {
      return $this->languages;
  }
  
}


#####################################################
###################### COOKIE #######################
#####################################################

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
  $users[0]->addProject(new Project("Project 1", "Description of Project 1"));
  $users[] = new User("user_1", "123", "test1@example.com", FALSE);
  $users[] = new User("user_2", "123", "test2@example.com", FALSE);
  $users[] = new User("user_3", "123", "test3@example.com", FALSE);

  return $users;
}

function saveUsersCookie($users){
  setcookie("users", serialize($users), time() + (86400 * 30), "/");
}

function retrieveUsersCookie(){
  return unserialize($_COOKIE['users']);
}

?>
