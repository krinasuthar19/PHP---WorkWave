<?php
include 'layouts/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
<<<<<<< Updated upstream
  $uid = $_POST['task_emp'];
  $task_id = $_POST['t_id'];
  $d_id = $_POST['d_id'];
=======
    $uid = $_POST['task_emp'];
    $task_id = $_POST['t_id'];
    $d_id = $_POST['d_id'];
    $status = 1;
>>>>>>> Stashed changes

  foreach ($task_id as $index => $t_id) {
    // echo "uid: $uid[$index]<br>";
    // echo "tid: $t_id<br>";
    // echo "did: $d_id[$index]<br><br>";

<<<<<<< Updated upstream
    $user_id = $uid[$index];
    $task_id = $t_id;
    $dep_id = $d_id[$index];
    $query = "INSERT INTO assign_task ( u_id, t_id, d_id) VALUES ('$user_id','$task_id','$dep_id')";
    $result = mysqli_query($link, $query);
  }

  if ($result) {
    $_SESSION['status'] = "Task assigned successfully";
    header("Location: task.php");
    exit(0);
  } else {
    $_SESSION['status'] = "Task not assigned";
    header("Location: task.php");
    exit(0);
  }
=======
        $user_id = $uid[$index];
        $task_id = $t_id;
        $dep_id = $d_id[$index];
        $query = "INSERT INTO assign_task ( u_id, t_id, d_id, status) VALUES ('$user_id','$task_id','$dep_id',$status)";
        $result = mysqli_query($link, $query);
    }

    if ($result) {
        $_SESSION['status'] = "Task assigned successfully";
        $query2 = "UPDATE `task` SET `status`=1";
        $result2 = mysqli_query($link, $query2);
        if ($result) {
            echo "Status Updated";
        }

        header("Location: task.php");
        exit(0);
    } else {
        $_SESSION['status'] = "Task not assigned";
        header("Location: task.php");
        exit(0);
    }
>>>>>>> Stashed changes
}

$link->close();
