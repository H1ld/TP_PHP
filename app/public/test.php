<?php

include 'data/data.php';

$cv = new CV('John Doe', 'johndoe@example.com', '123-456-7890', '123 Main St, City, Country');

$cv->addSkill(new Skill('PHP', 'Advanced'));
$cv->addSkill(new Skill('JavaScript', 'Intermediate'));

$cv->addLanguage(new Language('English', 'Native'));
$cv->addLanguage(new Language('Spanish', 'Intermediate'));

$users[0]->setCV($cv);
saveUsersCookie($users);

?>
