<?php
include "config.php";
include_once "Common.php";
if (isset($_POST['getHospitalByDistrict']) == "getHospitalByDistrict") {
    $districtId = $_POST['districtId'];
    $common = new Common();
    $hospitals = $common->getHospitalByDistrict($connection,$districtId);
    $hospitalData = '<option value="">Hospital</option>';
    if ($hospitals->num_rows>0){
        while ($hospital = $hospitals->fetch_object()) {
            $hospitalData .= '<option value="'.$hospital->id.'">'.$hospital->hospitalname.'</option>';
        }
    }
    echo "test^".$hospitalData;
}
if (isset($_POST['getSpecialisationByHospital']) == "getSpecialisationByHospital") {
    $hospitalId = $_POST['hospitalId'];
    $common = new Common();
    $specialisations = $common->getSpecialisationByHospital($connection,$hospitalId);
    $specialisationData = '<option value="">Specialisation</option>';
    if ($specialisations->num_rows>0){
        while ($specialisation = $specialisations->fetch_object()) {
            $specialisationData .= '<option value="'.$specialisation->id.'">'.$specialisation->specialisationName.'</option>';
        }
    }
    echo "test^".$specialisationData;
}