<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkbox Example</title>
  <script>
    function toggleFields() {
      // Get references to the text fields
      var field1 = document.getElementById("field1");
      var field2 = document.getElementById("field2");

      // Get reference to the checkbox
      var checkbox = document.getElementById("checkbox");

      // Check the checkbox status
      if (checkbox.checked) {
        // If checked, hide the text fields
        field1.style.display = "none";
        field2.style.display = "none";
      } else {
        // If unchecked, show the text fields
        field1.style.display = "block"; // You can also use "inline" or "inline-block" depending on your layout
        field2.style.display = "block";
      }
    }
  </script>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>


<?php

session_start();
require 'connect.php';
require 'functions.php';


if ($_SESSION['role'] < 3)
{
    // header('Location: create.html');
    // exit;
}


?>


<body>

    <form action="insertPosts.php" method="post">

    <p>Kurser</p>
<?php 
    try {
        $query = $pdo->prepare('
            SELECT *, HEX(course.color) 
            FROM course 
            LEFT JOIN name 
            ON course.name_ID = name.name_ID
            INNER JOIN course_enrollments
            ON course.course_ID = course_enrollments.course_ID
            WHERE course_enrollments.user_ID = :uid;
        ');
        $data = array(':uid' => $_SESSION['userid']);
    
        $query->execute($data);
    
        echo '<label for="color">Color:</label>
        <select id="color" name="course" onchange="changeColor(this)" required>';
        // Fetch and display the results
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    
        echo '<option style="background-color:#'.$row['HEX(course.color)'].';" value="'.$row['course_ID'].'">'.$row['name'].'</option>';
    
        }
        echo '</select>';
    
    } catch (PDOException $e) {
        echo $e->getMessage();
        // Prints errormessage
    }
?>

        <label for="name">Name:</label>
        <input type="text" id="field2" name="name">

        <label for="checkbox">Meddelande</label>
        <input type="checkbox" id="checkbox" onchange="toggleFields()">

        <label for="field1">Deadline Date:</label>
        <input type="datetime-local" id="field1" name="deadline">

        <label for="field2">Description:</label>
        <textarea id="description" name="description"novalidate rows="4" required></textarea>

        <input type="submit" value="Submit">
    </form>

    
</body>
<?php
echo '<script>console.log('.$_SESSION['userid'].')</script>';
?>
</html>


