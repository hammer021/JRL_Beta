<?php
$bookingId = $bookingInfo->bookingId;
$roomName = $bookingInfo->roomName;
$description = $bookingInfo->description;
$gambar = $bookingInfo->gambar;

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user-circle-o" aria-hidden="true"></i> Portfolio Management
        <small>Add / Edit Portfolio</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Portfolio Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form enctype="multipart/form-data" role="form" action="<?php echo base_url() ?>booking/editBooking" method="post" id="editBooking" role="form">
                        <div class="box-body">
                        <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="roomName">Name</label>
                                        <input type="text" class="form-control required" value="<?php echo $roomName; ?>" id="roomName" name="roomName" maxlength="256" />
                                        <input type="hidden" value="<?php echo $bookingId; ?>" name="bookingId" id="bookingId" />
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea  onKeyPress="check_length(this.form)" onKeyDown="check_length(this.form)" 
                                        rows="4" cols="30" class="form-control required" id="description" name="description"><?php echo $description; ?></textarea>
                                        <input  disabled size=1 value=75 name=text_num> Characters Left
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gambar">Picture </label></br>
                                        <?php if(empty($gambar)){ ?>
                                        <label><i>This Picture Empty </i></label></br> 
                                        <?php }else{?>
                                        <img width="250px" src="<?php echo base_url().'./assets/images/portofolio/'.$gambar;?>">
                                       <?php } ?>
                                        <input type="file" value="<?php echo $gambar;?>" name="gambar" class="dropify" >
                                    </div>
                                </div>
                        </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.dropify').dropify({
            messages: {
                default: 'Drag atau drop untuk memilih gambar',
                replace: 'Ganti',
                remove:  'Hapus',
                error:   'error'
            }
        });
    });
     
</script>
<script language=JavaScript>
function check_length(my_form)
{
maxLen = 75; // max number of characters input
if (my_form.description.value.length >= maxLen) {
// Alert message if maximum limit is reached. 
// If required Alert can be removed. 
var msg = "You have reached your maximum limit of characters allowed";
alert(msg);
// Reached the Maximum length so trim the textarea
	my_form.description.value = my_form.description.value.substring(0, maxLen);
 }
else{ // Maximum length not reached so update the value of my_text counter
	my_form.text_num.value = maxLen - my_form.description.value.length;
}
}
</script>