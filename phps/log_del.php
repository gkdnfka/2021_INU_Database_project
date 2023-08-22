<?php
$con = mysqli_connect("localhost", "id201701539", "pw201701539", "manage_exer") or die("disconneted"); 

$sql = "DELETE FROM exer_log where exer_day='".$_GET['date']."';";
$res = mysqli_query($con, $sql);

if($res) {
    echo "<script> location.href = \"./view_log.php\" </script>";
}

else {
    //echo "<script> alert(\"실패했습니다. 메인 페이지로 이동합니다.\") </script>";
    echo "실패 원인 :".mysqli_error($con);
    //echo "<script> location.href = \"./main_page.html\" </script>";
}
?>