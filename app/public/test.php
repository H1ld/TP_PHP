<?php

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

/*
$cv = new CV('John Doe', 'johndoe@example.com', '123-456-7890', '123 Main St, City, Country');

$cv->addSkill(new Skill('PHP', 'Advanced'));
$cv->addSkill(new Skill('JavaScript', 'Intermediate'));

$cv->addLanguage(new Language('English', 'Native'));
$cv->addLanguage(new Language('Spanish', 'Intermediate'));

$cv->displayCV();*/


?>
