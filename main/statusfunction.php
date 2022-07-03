<?php 
function statofproduct($stat){
    if($stat== 'ordered'){
        $name = 'Ordered';
        $bgcol = 'primary';
        $per = '10';
    }else if($stat == 'packaging'){
        $name = 'Packaging';
        $bgcol = 'info';
        $per = '25';

    }else if($stat=='delevering'){
        $name = 'Delivering';
        $bgcol = 'success';
        $per = '55';

    }
    else if($stat=='delivered'){
        $name = 'Delivered';
        $bgcol = 'success';
        $per = '100';

    }else if($stat=='cancelled'){
        $name = 'Cancelled';
        $bgcol = 'danger';
        $per = '100';

    }else if($stat=='returned'){
        $name = 'Returned';
        $bgcol = 'warning';
        $per = '100';

    }
     
 $return = '<div class="progress">
 <div class="progress-bar progress-bar-striped bg-'.$bgcol.'" role="progressbar" style="width: '.$per.'%" aria-valuenow="'.$per.'" aria-valuemin="0" aria-valuemax="100">
 </div>
</div>
<br>
<span>'.$name.'</span></td>';

return $return;
 }
?>