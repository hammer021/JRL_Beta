<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        <small>Control panel</small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
        <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>My Web<sup style="font-size: 20px"></sup></h3>
                 <p><?php echo $reff;?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-cloud"></i>
                </div>
                <a href="<?php echo base_url().'Home/'.$reff; ?>" class="small-box-footer">Open <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <?php if ($is_admin==1) {?>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $countTask;?></h3>
                  <p>Content</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo base_url(); ?>task" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <?php }?>
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $countUser;?></h3>
                <p>My User(by Refferal)</p>
                </div>
                
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                
                <a href="<?php echo base_url()?>MyUser" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <?php if ($is_admin==1) {?>
              <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $countAllUser;?></h3>
                  <p>All Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href="<?php echo base_url()?>userListing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <?php }?>
          </div>
          <!-- End Row -->

          <div class="container">
            <h3>
            Perolehan User 
            </h3>
            <canvas id="canvas" width="900" height="280"></canvas>
          </div>
    </section>
    <?php
        foreach($graph as $data1){
            $refferal[] = $data1->refferal;
            $jumlah[] = (float) $data1->jumlah;
        }
    ?>

        
</div>


<script type="text/javascript" src="<?php echo base_url().'assets/plugins/chartjs/Chart.js'?>"></script>
<script>
 
            var lineChartData = {
                labels : <?php echo json_encode($refferal);?>,
                datasets : [
                     
                    {
                        
                        fillColor: ['rgb(255, 99, 132)','rgb(60, 179, 113)', 'rgba(56, 86, 255, 0.87)', 'rgb(175, 238, 239)'],
                        strokeColor: ['rgb(255, 99, 132)','rgb(60, 179, 113)', 'rgba(56, 86, 255, 0.87)', 'rgb(175, 238, 239)'],
                        
                        
                        data : <?php echo json_encode($jumlah);?>
                    }
 
                ]
                 
            }
 
        var myBar = new Chart(document.getElementById("canvas").getContext("2d")).Bar(lineChartData);
     

    </script>
