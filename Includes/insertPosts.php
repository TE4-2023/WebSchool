<?php

session_start();
require 'connect.php';
require 'functions.php';

if ($_SESSION['role'] < 3) {
    // Redirect or handle unauthorized access
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form is submitted, process the data

    $courseID = $_POST['course'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $userID = $_SESSION['userid'];

    // Check if the form is for a post or a message
    if (isset($_POST['deadlineDate'])) {
        // It's a post
        $deadline = $_POST['deadlineDate'];

        try {
            $query = $pdo->prepare('INSERT INTO posts (course_ID, user_ID, name_ID, publishingDate, deadlineDate, description) 
                                   VALUES (:courseID, :userID, :nameID, NOW(), :deadline, :description)');
            $data = array(
                ':courseID' => $courseID,
                ':userID' => $userID,
                ':nameID' => checkName($name),  
                ':deadline' => $deadline,
                ':description' => $description
            );

            $query->execute($data);

            header('Location: ../kurser.php');

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    } else {
        // It's a message
        try {
            $query = $pdo->prepare('INSERT INTO posts (course_ID, user_ID, name_ID, publishingDate, description) 
                                   VALUES (:courseID, :userID, :nameID, NOW(), :description)');
            $data = array(
                ':courseID' => $courseID,
                ':userID' => $userID,
                ':nameID' => checkName($name),  
                ':description' => $description
            );

            $query->execute($data);

            header('Location: ../kurser.php');

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>