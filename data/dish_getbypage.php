<?php
header('Content-Type:application/json');

$output = [];

$count = 5;

@$start = @$_REQUEST['start'];
if(empty($start))
{
    $start = 0;
}

$conn = mysqli_connect('w.rdc.sae.sina.com.cn','wxm13j320n','i1mxh41lkkm41lkkz214mi3iy1k1lhm5hm4ilh0i','app_liufeng');
$sql = 'SET NAMES UTF8';
mysqli_query($conn,$sql);

$sql = "SELECT did,name,price,img_sm,material FROM kf_dish LIMIT $start,$count";
$result = mysqli_query($conn,$sql);

while(true)
{
    $row = mysqli_fetch_assoc($result);
    if(!$row)
    {
        break;
    }
    $output[] = $row;
}

echo json_encode($output);

?>