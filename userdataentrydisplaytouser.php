<?php 

    $lines = file("text\scores.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $data = array_map(function($v){
        list($v1, $w1, $x1, $y1, $time1, $check1, $check2, $check3, $check4) = explode(":", $v);
        return ["v1" => $v1, "w1" => $w1, "x1" => $x1, "y1" => $y1, "time1" => $time1, "check1" => $check1, "check2" => $check2, "check3" => $check3, "check4" => $check4];
    }, $lines);

    usort($data, function($a, $b){
        if($a["time1"] == $b["time1"])
            return 0;
        return $a["time1"] < $b["time1"] ? 1 : -1;
    });

?>

<table width="200" border="1">
    <tr>
        <td width="150">Title</td>
        <td width="99">News</td>
        <td width="99">Image_Url</td>
        <td width="99">Remarks</td>
        <td width="99">Time</td>
        <td width="150">Date and Time</td>
        <td width="400">Not Approval</td>
        <td width="99">Approval</td>
        <td width="99">Progression</td>
        <td width="99">Completion</td>
    </tr>
<?php foreach($data as $user){ ?>
    <tr>
        <td height="119">
            <td height="119"><?php echo $user["v1"]; ?></td>
        <td><?php echo $user["w1"]; ?></td>
        <td><img src='img\<?php echo htmlspecialchars($user["x1"]); ?>' height="200px" width="200px"></td>
        <td><?php echo $user["y1"]; ?></td>
        <?php if($user["check1"]==0 && $user["check2"]==0 && $user["check3"]==0 && $user["check4"]==0){
            $user["check1"]="  -  ";
            $user["check2"]="  -  ";
            $user["check3"]="  -  ";
            $user["check4"]="  -  ";  } ?>
        <?php if($user["check1"]==1 && $user["check2"]==0 && $user["check3"]==0 && $user["check4"]==0){
            $user["check1"]="Not Approved";
            $user["check2"]="  -  ";
            $user["check3"]="  -  ";
            $user["check4"]="  -  ";  } ?>
        <?php if($user["check1"]==0 && $user["check2"]==1 && $user["check3"]==0 && $user["check4"]==0){
            $user["check1"]="  -  ";
            $user["check2"]="Approved";
            $user["check3"]="  -  ";
            $user["check4"]="  -  ";  } ?>
        <?php if($user["check1"]==0 && $user["check2"]==0 && $user["check3"]==1 && $user["check4"]==0){
            $user["check1"]="  -  ";
            $user["check2"]="Approved";
            $user["check3"]="In Process";
            $user["check4"]="  -  ";  } ?>
        <?php if($user["check1"]==0 && $user["check2"]==0 && $user["check3"]==0 && $user["check4"]==1){
            $user["check1"]="  -  ";
            $user["check2"]="Approved";
            $user["check3"]="Processed";
            $user["check4"]="Completed";  } ?>
            <?php 
            $b = floor($user["time1"]/100000000);
            $user["time1"] = $user["time1"]%100000000;
            $c = floor($user["time1"]/1000000);
            $user["time1"] = $user["time1"]%1000000;
            $d = floor($user["time1"]/10000);
            $user["time1"] = $user["time1"]%10000;
            $e = floor($user["time1"]/100);
            $f = $user["time1"]%100; 
            if(strlen($e)==1){
                $e="0".$e;
            }
            if(strlen($f)==1){
                $f="0".$f;
            }
            $user["time1"]=$f."/".$e."/".$c.$d;
            ?>
        <td><?php echo $user["time1"]; ?></td>
        <td><?php echo $user["check1"]; ?></td>
        <td><?php echo $user["check2"]; ?></td>
        <td><?php echo $user["check3"]; ?></td>
        <td><?php echo $user["check4"]; ?></td>
    </tr>
<?php } ?>
</table>