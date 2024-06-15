<?php
function dbconnect($server, $user, $password, $database)
{
    global $conn;
    $conn = mysqli_connect($server, $user, $password, $database);
    if (mysqli_connect_errno()) {
        echo 'Error' . mysqli_connect_error();
    }

}

function insert($name, $email, $phone, $password)
{
    global $conn;
    dbconnect('localhost', 'root', '', 'akashprajapati');
    $sql = "INSERT INTO table01 (name, email, phone ,password) VALUES ('$name', '$email', '$phone','$password')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        mysqli_connect_error();
    } else {
        return true;
    }
}

function update($id, $name, $email, $phone)
{
    global $conn;
    dbconnect('localhost', 'root', '', 'akashprajapati');
    $sql = "UPDATE table01 SET name='$name',email='$email',phone='$phone' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        mysqli_connect_error();
        exit;
    } else {
        return true;
    }
}

function mydelete($id)
{
    global $conn;
    dbconnect('localhost', 'root', '', 'akashprajapati');
    $sql = "DELETE FROM table01 where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return true;
    } else {
        echo "Error deleting data: " . mysqli_error($conn);
        return false;
    }
}

function getData()
{
    global $conn;
    dbconnect('localhost', 'root', '', 'akashprajapati');
    $sql = "SELECT*FROM table01";
    $result = mysqli_query($conn, $sql);
    $data = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    return [];
}

function getDataById($id)
{
    global $conn;
    dbconnect('localhost', 'root', '', 'akashprajapati');
    $sql = "SELECT*FROM table01  WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $data = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    return [];
}



?>