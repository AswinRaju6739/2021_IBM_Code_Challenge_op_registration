<?php
if (isset($_POST['submit'])) {
    $district = $_POST['district'];
    $hospital = $_POST['hospital'];
    $specialisation = $_POST['specialisation'];

    echo 'District is: '. $district; echo '<br/>';
    echo 'Hospital is  : '. $hospital; echo '<br/>';
    echo 'Specialisation is   : '. $specialisation; echo '<br/>';
}