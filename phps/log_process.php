<?php
$con = mysqli_connect("localhost", "id201701539", "pw201701539", "manage_exer") or die("disconneted");

$date = $_POST["exer_date"];
$title = $_POST["title"];
$content = $_POST["content"];

$sql = "INSERT INTO exer_log(exer_day, log, title) values(\"".$date."\", '".$content."', '".$title."');";
$res = mysqli_query($con, $sql);

if($res) {
    echo "<script> location.href = \"../htmls/log_write.html\" </script>";
}

else {
    echo "<script> alert(\"다시 입력해주세요.\") </script>";
    echo "<script> location.href = \"../htmls/log_write.html\" </script>";
    
    
}
?>