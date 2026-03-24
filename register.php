<?php

$conn=mysqli_connect('localhost','root','','registration');

if ($conn){
    echo "successfull";
}else{
    echo "Not connected";
}

// GET DATA FROM FORM
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$middlename = $_POST['middlename'];
$address = $_POST['address'];
$email = $_POST['email'];
$birthplace = $_POST['birthplace'];
$birth = $_POST['birth'];
$phone = $_POST['tel'];
$sex = $_POST['sex'];
$level = $_POST['Level'];
$strand = $_POST['strand'];
$program = $_POST['program'];
$guardian_name = $_POST['guardian_name'];
$guardian_contact = $_POST['guardian_contact'];
$assistant = $_POST['maam'];

// PREPARED STATEMENT (FIX SA ERROR)
$stmt = $conn->prepare("INSERT INTO students 
(firstname,lastname,middlename,address,email,birthplace,birth,phone,sex,level,strand,program,guardian_name,guardian_contact,assistant)

VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

$stmt->bind_param("sssssssssssssss",
    $firstname,
    $lastname,
    $middlename,
    $address,
    $email,
    $birthplace,
    $birth,
    $phone,
    $sex,
    $level,
    $strand,
    $program,
    $guardian_name,
    $guardian_contact,
    $assistant,
   
);

if ($stmt->execute()) {
    echo "✅ Registration Successful!";
} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>