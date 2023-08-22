<?php
$con = mysqli_connect("localhost", "id201701539", "pw201701539", "manage_exer") or die("disconneted"); 
$sql = "UPDATE person set age = '".$_POST['age']."', pname = '".$_POST['name']."', join_year = '".$_POST['year']."' WHERE id='".$_POST['id']."';";

$res = mysqli_query($con, $sql);

if($res) {
    echo "<script> location.href = \"./view_member.php\" </script>";
}

else {
    echo "<script> alert(\"실패했습니다. 메인 페이지로 이동합니다.\") </script>";
    //echo "실패 원인 :".mysqli_error($con);
    echo "<script> location.href = \"./main_page.html\" </script>";
}
?>