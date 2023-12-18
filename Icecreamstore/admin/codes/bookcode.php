<?php

include('../../config/app.php');
include_once('../controller/IceController.php');


if(isset($_POST['delete']))
{
    $id = validateInput($db->conn, $_POST['delete']);
    $ice = new IceController;
    $result = $ice->delete($id);
    if($result){
        redirect("IceCream Deleted Successfully","../viewice.php");

    }else{
        redirect("Something Went Wrong","../add_ice.php");

    }
}

if(isset($_POST['update_book']))
{
    $id = validateInput($db->conn,$_POST['ice_id']);
    $inputdata = [

        'flavour' => validateInput($db->conn,$_POST['flavour']),
        'amount' => validateInput($db->conn,$_POST['amount']),
        'price' => validateInput($db->conn,$_POST['price']),
    
    ];

    $ice = new IceController;
    $result = $ice->update($inputdata, $id);
    if($result){
        redirect("IceCream Updated Successfully","../viewice.php");

    }else{
        redirect("Something Went Wrong","../iceedit.php");

    }
}

if(isset($_POST['submit']))
{
    $inputdata = [

    'flavour' => validateInput($db->conn,$_POST['flavour']),
    'amount' => validateInput($db->conn,$_POST['amount']),
    'price' => validateInput($db->conn,$_POST['price']),

    ];
    
    $ice = new IceController;
    $result = $ice->create($inputdata);
    if($result){
        redirect("IceCream Added Successfully","../viewice.php");
    }else{
        redirect("Something Went wrong","../add_ice.php");

    }
}


?>