<?php

class Common
{
  public function getDistrict($connection)
  {
      $mainQuery = "SELECT * FROM districts";
      $result1 = $connection->query($mainQuery) or die("Error in main Query".$connection->error);
      return $result1;
  }

  public function getHospitalByDistrict($connection,$districtId){
      $query = "SELECT * FROM hospitals WHERE districtId='$districtId'";
      $result = $connection->query($query) or die("Error in  Query".$connection->error);
      return $result;
  }

  public function getSpecialisationByHospital($connection,$hospitalId){
      $query = "SELECT * FROM specialisations WHERE hospital_id='$hospitalId'";
      $result = $connection->query($query) or die("Error in  Query".$connection->error);
      return $result;
  }
}