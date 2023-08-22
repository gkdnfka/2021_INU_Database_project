<?php
$con = mysqli_connect("localhost", "id201701539", "pw201701539", "manage_exer") or die("disconneted");

$date = $_POST["exer_date"];
$title = $_POST["title"];
$content = $_POST["content"];

$del_id = $_POST["del_id"];
$sql = "UPDATE exer_log set log='".$content."', title='".$title."' WHERE exer_day='".$date."';";
$res = mysqli_query($con, $sql);

if($res) {
    if(!empty($del_id)) {
        foreach($del_id as $id) {
            $sql = "DELETE FROM exer_mem where p_id='".$id."' AND exer_day='".$date."';";
            $res2 = mysqli_query($con, $sql);
            
            if(!$res2) {
                echo "<script> alert(\"실패했습니다. 메인 페이지로 이동합니다.\") </script>";
                echo "<script> location.href = \"../htmls/main_page.html\" </script>";
            }
        }
    }
    echo "<script> location.href = \"./view_log.php\" </script>";
}

else {
    echo "<script> alert(\"다시 입력해주세요.\") </script>";
    echo "<script> location.href = \"./view_log.php\" </script>";
    
}
?>