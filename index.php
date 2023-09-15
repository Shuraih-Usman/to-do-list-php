<?php

// This project is created by Shuraih Usman 
// You are free to use this program as you wish
// But don't forget to give me a credit
// Thank you
// contact me on facebook http://sfb.me/shuraih.usman
session_start();

if (isset($_POST['task'])) {
    $task = $_POST['task'];

    if (!isset($_SESSION['tasks'])) {
        $_SESSION['tasks'] = [];
    }

   
    $_SESSION['tasks'][] = $task;

    if(isset($_SESSION['tasks'])) {
        $success = "You Successfully added new Tasks";
    } else {
        $error = "Fail to add new Tasks";
    }
}

if(isset($_POST['index'])) {
    $index = $_POST['index'];

    if(isset($_SESSION['tasks'][$index])) {
        unset($_SESSION['tasks'][$index]);
        $success = '<font color="green">Task Successfuly Deleted </font>';

        $_SESSION['tasks'] = array_values($_SESSION['tasks']);
    } else {
        $error = '<font color="red">Fail to delete tasks</font>';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>To do List Project - Shuraih Usman</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="wrapper">
        <div class="left-column">
            <h1>To do List - Shuraih 99%</h1>
            <br>
            <?php
                if (isset($error)) {
                    echo "<div class='alert'>$error</div>";
                } else if(isset($success)) {
                    echo "<div class='alert'>$success</div>";
                }
            ?>
            <form method="post">
                <input type="text" name="task" placeholder="Add a new task" required>
                <button type="submit">Add</button>
            </form>
            <ul>
                <?php
                if (isset($_SESSION['tasks'])) {
                    foreach ($_SESSION['tasks'] as $index => $task) {
                        echo "
                        <li>
                            <num>$index</num>
                            <span>$task</span>
                            <form method='post'>
                                <input type='hidden' name='index' value='$index'>
                                <button class='delete-button' type='submit'>Delete</button>
                            </form>
                        </li>";
                    }
                }
                ?>
            </ul>
        </div>
        <div class="right-column">
            <h2>About</h2>
            <p>This is a simple To-do list application created by Shuraih Usman, the App was developed using HTML, CSS, and PHP, there wasn't any database interaction, it is a Server-Side application that I integrated using SESSION as the means of authentication and storing all the data inserted into the Session array, then called the session array. The Delete function is implemented by taking the array based on its index number and unsetting it using PHP UNSET Function.</p>
        </div>
    </div>
    <br>
    <center>To-Do List App - 2023 | Designed with ♥ by <a href="//fb.me/shuraih.usman">Shuraih 99%</a></center>
</div>
</body>
</html>


