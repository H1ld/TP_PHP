<?php
session_start();

class Project {
  // Properties
  public $name;
  public $description;

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

if (!isset($_SESSION['projects'])) {
  $_SESSION['projects'] = [];
  $_SESSION['projects'][] = new Project("Project 1", "Description of Project 1");
  $_SESSION['projects'][] = new Project("Project 2", "Description of Project 2");
  $_SESSION['projects'][] = new Project("Project 3", "Description of Project 3");
}

?>
