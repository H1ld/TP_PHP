<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['projectName']) && isset($_POST['projectDescription'])){

        $newProject = new Project($_POST['projectName'], $_POST['projectDescription']);
        $projects[] = $newProject;
        saveProjectsCookie($projects);

    } elseif (isset($_POST['removeProject'])) {
        $index = $_POST['removeProject'];
        array_splice($projects, $index, 1);
        $projects= array_values($projects); //Re-index the array
        saveProjectsCookie($projects);
    }
    header("Refresh:0");
}
?>