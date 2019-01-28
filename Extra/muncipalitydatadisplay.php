<?php 

    $lines = file("Muncipalitybranch.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $data = array_map(function($v){
        list($invoice, $p1, $v1, $w1, $x1, $y1, $pin, $time1, $check1, $check2, $check3, $check4, $time2) = explode(":", $v);
        return ["invoice" => $invoice, "p1" => $p1, "v1" => $v1, "w1" => $w1, "x1" => $x1, "y1" => $y1, "pin" => $pin, "time1" => $time1, "check1" => $check1, "check2" => $check2, "check3" => $check3, "check4" => $check4, "time2" => $time2];
    }, $lines);

    usort($data, function($a, $b){
        if($a["time1"] == $b["time1"])
            return 0;
        return $a["time1"] < $b["time1"] ? 1 : -1;
    });

?>

<table width="200" border="1">
    <tr>
        <td width="150">InvoiceNumber</td>
        <td width="150">Title</td>
        <td width="150">Pincode</td>
        <td width="99">News</td>
        <td width="99">Related_Image</td>
        <td width="99">Remarks</td>
        <td width="99">Date</td>
        <td width="99">Date of Completion</td>
        <td width="99">Total Days</td>
        <td width="99">Registered Number</td>
    </tr>
<?php foreach($data as $user){ ?>
    <tr>
        <td height="119"><?php echo $user["invoice"]; ?></td>
        <td height="119"><?php echo $user["v1"]; ?></td>
        <td height="119"><?php echo $user["pin"]; ?></td>
        <td><?php echo $user["w1"]; ?></td>
        <td><img src='img\<?php echo htmlspecialchars($user["x1"]); ?>' height="200px" width="200px"></td>
        <td><?php echo $user["y1"]; ?></td>
        
            <?php 
            $b1 = floor($user["time1"]/100000000);
            $user["time1"] = $user["time1"]%100000000;
            $c1 = floor($user["time1"]/1000000);
            $user["time1"] = $user["time1"]%1000000;
            $d1 = floor($user["time1"]/10000);
            $user["time1"] = $user["time1"]%10000;
            $e1 = floor($user["time1"]/100);
            $f1 = $user["time1"]%100; 
            if(strlen($e1)==1){
                $e1="0".$e1;
            }
            if(strlen($f1)==1){
                $f1="0".$f1;
            }
            $user["time1"]=$f1."/".$e1."/".$c1.$d1;
            $a1 = $c1.$d1;
            ?>
            <?php 
            $u = $user["time2"];
            $b2 = floor($user["time2"]/100000000);
            $user["time2"] = $user["time2"]%100000000;
            $c2 = floor($user["time2"]/1000000);
            $user["time2"] = $user["time2"]%1000000;
            $d2 = floor($user["time2"]/10000);
            $user["time2"] = $user["time2"]%10000;
            $e2 = floor($user["time2"]/100);
            $f2 = $user["time2"]%100; 
            if(strlen($e2)==1){
                $e2="0".$e2;
            }
            if(strlen($f2)==1){
                $f2="0".$f2;
            }
            $a2 = $c2.$d2;
            $user["time2"]=$f2."/".$e2."/".$c2.$d2;
            ?>
            <?php
            $x1 = $f1;
            $x2 = $f2;
            $y1 = $e1;
            $y2 = $e2;
            $z1 = $a1;
            $z2 = $a2;
            $date1=date_create($x1."-".$y1."-".$z1);
            $date2=date_create($x2."-".$y2."-".$z2);
            $diff=date_diff($date1,$date2);
            $timediff = $diff->format("%a days");
            if($u=="0"){
                $user["time2"] = "-";
                $timediff = "-";
            } 
               ?>
        <td><?php echo $user["time1"]; ?></td>
        <td><?php echo $user["time2"]; ?></td>
        <td><?php echo $timediff; ?></td>
        <td><?php echo $user["p1"]; ?></td>
    </tr>
<?php } ?>
</table>