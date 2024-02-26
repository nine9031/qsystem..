<?php

if (isset($_POST['submit'])) {
    require 'conn.php';




    $QDate = $_POST['QDate'];
    $QNumber = $_POST['QNumber'];
    $Pid =  $_POST['Pid'];
    $QStatus =  $_POST['QStatus'];

    echo 'QDate = ' . $QDate;
    echo 'QNumber = ' . $QNumber;
    echo 'Pid = ' . $Pid;
    echo 'QStatus = ' . $QStatus;


    $sql = "UPDATE queue SET QDate = :QDate, QNumber = :QNumber, Pid = :Pid, QStatus = :QStatus WHERE Pid = :Pid";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':QDate', $_POST['QDate']);
    $stmt->bindParam(':QNumber', $_POST['QNumber']);
    $stmt->bindParam(':Pid', $_POST['Pid']);
    $stmt->bindParam(':QStatus', $_POST['QStatus']);


    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->execute()) {
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly update customer information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
    }
    $conn = null;
}
