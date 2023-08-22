<?php
$con = mysqli_connect("localhost", "id201701539", "pw201701539", "manage_exer") or die("disconneted");

$name = $_POST["name"];
$age = $_POST["age"];
$year = $_POST["year"];

$sql = "INSERT INTO person(age, join_year, pname) values ('" .$age. "', '" .$year. "', '".$name."')";

$res = mysqli_query($con, $sql);

if($res) {
    echo "<script> location.href = \"../htmls/join.html\" </script>";
}

else {
    echo "<script> alert(\"fail\") </script>";
    echo "<script> location.href = \"../htmls/join.html\" </script>";
}

?>