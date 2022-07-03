<?php 
    require 'main/data.php';

if(isset($_POST['maildata'])){
    foreach( $contactdata as $key => $contactdataval){
        $invert = '';
        $status = 'text-ll';
        if($key%2 == 0){
            // $invert = 'bg-light';
        }
        if($contactdataval['status']=='0'){
            $status = 'text-dark font-weight-bold';
        }
    ?>
<div  id="mailrow_<?php echo $contactdataval['id'] ?>"  onmouseover="emailaction(<?php echo $contactdataval['id']?>)" onmouseout="emailactionnvert(<?php echo $contactdataval['id']?>)" class="row p-2 mt-2 mb-2 <?php echo $invert?> emaillist d-flex flex-dierction-column align-items-center">
    <div class="col-3">
    <i class="ion ion-email mx-2"></i>
    <span class=" <?php echo $status?>"><?php echo $contactdataval['fullname'] ?></span>
    </div>
    <div class="col-8">
    <span class=" <?php echo $status?>"><?php echo substr($contactdataval['subject'].'&nbsp;&nbsp; &ndash; &nbsp;&nbsp;'.$contactdataval['message'] , 0,175) ;
        if(strlen($contactdataval['subject'].'&nbsp;&nbsp;–&nbsp;&nbsp;'.$contactdataval['message']) > 175 ){ echo '...'; }

    ?></span>
    </div>
    <div class="col-1">
        <div id="show_<?php echo $contactdataval['id'] ?>">
        
            <?php echo time_elapsed_string($contactdataval['time']) ?>

        </div>
        <div id="mailaction_<?php echo $contactdataval['id'] ?>"class="d-none">
            <a data-bs-toggle="modal" data-bs-target="#centermodal" class="h4 <?php echo $status?> mx-2" onclick="viewthismail(<?php echo $contactdataval['id'] ?>);"><i class="ion-eye email-action-icons-item"></i></a>
            <a  class="<?php echo $status?> mx-2 h4" href="javascript:deletethismail(<?php echo $contactdataval['id'] ?>);"><i class="ion-trash-b email-action-icons-item"></i></a>
        </div>
    </div>
</div>

<?php }    
    }
    else if(isset($_POST['mailviewdata'])){
        $id = $_POST['mailviewdata'];
        $update = "UPDATE `contact` SET `status`='1' WHERE id = $id";
        if ($con->query($update)) {
        
            foreach( $contactdata as $key => $contactviewval){
            // $message = wordwrap($contactviewval["message"], 150, "<br />\n");
            $message = str_replace("\n","<br>" ,$contactviewval["message"] );
                $dateq = date_create($contactviewval["time"]);
                $date =  date_format($dateq , 'M d Y, h:i:A');
                if($contactviewval['id'] === $id ){
                    echo'
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">

                                <div class="modal-title" id="productname">
                                <h4>'.$contactviewval["subject"].'</h4>
                                <small class="float-end">'.$date.'</small>
                                
                                </div>

                                <a type="button" href="javascript:closemodel()" class="btn ion ion-close-round" ></a>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body" id="">
                            <div class="mt-3">
                            <h5 class="font-18"></h5>
                                <hr>
                                <div class="d-flex mb-3 mt-1">
                                    <div class="w-100 overflow-hidden">
                                        <h6 class="m-0 font-14">'.$contactviewval["fullname"].'</h6>
                                        <small class="text-muted">From: '.$contactviewval["email"].'</small>
                                    <br>
                                    <br>
                                        <p class="w-100" style="overflow:hidden">'.$message.'<p> 
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                      </div>';
                }
            }
        }

    }
    
    

function time_elapsed_string($time, $full = false) {
    $now = new DateTime('Asia/Kathmandu');
    $ago = new DateTime($time, new DateTimeZone('Asia/Kathmandu'));
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>