<?php
require_once 'connection.php';

function Create($data){
    $name = $data['name'];
    $student_id = $data['student_id'];
    $gender = $data['gender'];
    $email = $data['email'];
    $phone = $data['phone'];
    $blood_group = $data['blood_group'];
    $session_year = $data['session'];
    $student_type = $data['student_type'];
    $hometown = $data['hometown'];
    
    $connection = Connect();
    $sql = "INSERT INTO students(name, student_id, gender, email, phone, blood_group, session_year, student_type, hometown) VALUES(:name, :student_id, :gender, :email, :phone, :blood_group, :session_year, :student_type, :hometown)";
    $query = $connection->prepare($sql);
    if($query->execute([':name' => $name, ':student_id' => $student_id, ':gender' => $gender, ':email' => $email, ':phone' => $phone, ':blood_group' => $blood_group, ':session_year' => $session_year, ':student_type' => $student_type, ':hometown' => $hometown])){
        return 1;
    }
    else return -1;
}

function Get(){
    $connection = Connect();
    $sql = "SELECT * FROM students";
    $query = $connection->prepare($sql);
    $query->execute();
    $students = $query->fetchAll(PDO::FETCH_OBJ);

    return $students;
}

function Delete($id){
    $connection = Connect();
    $sql = "DELETE FROM students WHERE id=:id";
    $query = $connection->prepare($sql);

    if ($query->execute([':id' => $id])) {
        header("Location: /");
    }
}

?>