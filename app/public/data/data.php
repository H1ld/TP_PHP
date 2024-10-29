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

class User {
  private $username;
  private $password;
  private $email;
  private $isAdmin;
  private $cv;

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
    
}

class CV {
  private $name;
  private $email;
  private $phone;
  private $address;
  private $skills = [];
  private $languages = [];

  public function __construct($name, $email, $phone, $address) {
      $this->name = $name;
      $this->email = $email;
      $this->phone = $phone;
      $this->address = $address;
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

  public function addSkill(Skill $skill) {
      $this->skills[] = $skill;
  }

  public function getSkills() {
      return $this->skills;
  }

  public function addLanguage(Language $language) {
      $this->languages[] = $language;
  }

  public function getLanguages() {
      return $this->languages;
  }
}

class Skill {
  private $title;
  private $experience;

  public function __construct($title, $experience) {
      $this->title = $title;
      $this->experience = $experience;
  }

  public function getTitle() {
      return $this->title;
  }

  public function setTitle($title) {
      $this->title = $title;
  }

  public function getExperience() {
      return $this->experience;
  }

  public function setExperience($experience) {
      $this->experience = $experience;
  }
}

class Language {
  private $name;
  private $experience;

  public function __construct($name, $experience) {
      $this->name = $name;
      $this->experience = $experience;
  }

  public function getName() {
      return $this->name;
  }

  public function setName($name) {
      $this->name = $name;
  }

  public function getExperience() {
      return $this->experience;
  }

  public function setExperience($experience) {
      $this->experience = $experience;
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
  setcookie("projects", serialize($projects), time() + (86400 * 30), "/");
}

function retrieveProjectCookie(){
  return unserialize($_COOKIE['projects']);
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
  setcookie("users", serialize($users), time() + (86400 * 30), "/");
}

function retrieveUsersCookie(){
  return unserialize($_COOKIE['users']);
}

?>
