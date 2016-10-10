<?php

header("Content-Type:application/json");

$output = [];

@$id = @$_REQUEST['id'];
if(empty($id))
{
    echo '[]';
    return;
}

$conn = mysqli_connect('w.rdc.sae.sina.com.cn','wxm13j320n','i1mxh41lkkm41lkkz214mi3iy1k1lhm5hm4ilh0i','app_liufeng');
$sql = 'SET NAMES UTF8';
mysqli_query($conn,$sql);

$sql = "SELECT did,name,price,img_lg,material,detail FROM kf_dish WHERE did=$id";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);
if(empty($row))
{
    echo '[]';
}
else
{
    $output[] = $row;
    echo json_encode($output);
}
?>