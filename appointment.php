<!DOCTYPE html>
<html lang="en">
<head>
    <title>OP Registration System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
    <style>
    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    #box {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        margin: 0px 200px 0px 200px;
    }
</style>
</head>
<body>
<div class="jumbotron text-center">
    <h1>Make Appointment</h1>

</div>
<div id="box">
    <form action="script.php" method="post">
        <?php
        include "config.php";
        include_once "Common.php";
        $common = new Common();
        $districts = $common->getDistrict($connection);
        ?>
        <label>District <span style="color:red">*</span></label>
        <select name="district" id="districtId" class="form-control" onchange="getHospitalByDistrict();">
            <option value="">District</option>
            <?php
            if ($districts->num_rows > 0 ){
                while ($district = $districts->fetch_object()) {
                    $districtName = $district->name; ?>
                    <option value="<?php echo $district->id; ?>"><?php echo $districtName;?></option>
                <?php }
            }
            ?>
        </select>
        <label>Hospital <span style="color:red">*</span></label>
        <select class="form-control" name="hospital" id="hospitalId" onchange="getSpecialisationByHospital();" >
            <option value="">Hospital</option>
        </select>

        <label>Specialisation <span style="color:red">*</span></label>
        <select class="form-control" name="specialisation" id="specialisationDiv">
            <option value="">Specialisation</option>
        </select>

        <input type="submit" value="Submit">
    </form>
</div>
<script>
    function getHospitalByDistrict() {
        var districtId = $("#districtId").val();
        $.post("ajax.php",{getHospitalByDistrict:'getHospitalByDistrict',districtId:districtId},function (response) {
            var data = response.split('^');
            $("#hospitalId").html(data[1]);
        });
    }
    function getSpecialisationByHospital() {
        var hospitalId = $("#hospitalId").val();
        $.post("ajax.php",{getSpecialisationByHospital:'getSpecialisationByHospital',hospitalId:hospitalId},function (response) {
            var data = response.split('^');
            $("#specialisationDiv").html(data[1]);
        });
    }
</script>
</body>
</html>