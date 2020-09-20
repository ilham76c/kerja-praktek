<div class="content">
	<div class="container">            			  			
		<div class="col-md-12">            				
         <?php 
         if (empty($data)) {
            echo "<h2>Tidak ada berita terbaru saat ini!!</h2>";
         }
         foreach ($data as $row) :?>
 				<div class="control-box p-4 my-2 main-content">              
               <div class="row">
                  <div class="col-md-12">
                     <?php 
                           setlocale (LC_TIME, 'id_ID');
                           echo '<sup>'.date("d F Y", strtotime($row->tanggal)).'</sup>';?>
                     <h5 class="media-heading">
                        <a href="#" data-toggle="modal" data-target="<?php echo '.modal'.$row->id;?>">
                           <?php echo $row->judul;?>                                 
                        </a>
                     </h5>
                     <div class="row">
                        <div class="media">
                           <a class="media-left media-middle p-3" href="#" data-toggle="modal" data-target="<?php echo '.modal'.$row->id;?>">
                              <img class="img-media media-object" width="250" src="<?php echo base_url(); ?>upload/img-berita/thumbnail/medium/<?php echo $row->gambar; ?>"  alt="Gambar Berita">
                           </a>
                           <div class="media-body p-2">                             
                              <?php 
                              $str = $row->isi;
                              echo (substr($str,0,350)).'...';//'[&hellip;]'; 
                              ?> 
                       
                              <ul class="list-inline">
                                 <li class="list-inline-item">
                                    <a href="#" data-toggle="modal" data-target="<?php echo '.modal'.$row->id;?>">
                                       Baca<i class="fa fa-arrow-right">>></i>
                                    </a>
                                 </li>                                     
                              </ul>
                           </div>
                        </div>
                     </div>      
                  </div>
               </div>	                 
 				</div>
            <!-- Modal -->
            <div class="<?php echo 'modal'.$row->id;?> modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
               <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLongTitle">
                           <?php 
                           setlocale (LC_TIME, 'id_ID');
                           echo date("l, d F Y  H:i", strtotime($row->tanggal));?>                              
                        </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">                                          
                        <div class="control-box p-3 main-content">
                           <h2><?php echo $row->judul;?></h2>                      
                           <img class="img-media media-object p-3" src="<?php echo base_url(); ?>upload/img-berita/thumbnail/large/<?php echo $row->gambar; ?>" class="img-fluid">
                           <?php echo $row->isi;?>                                                             
                        </div>                                                       
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                        
                     </div>
                  </div>
               </div>
            </div>
         <?php endforeach; ?>               
		</div>  		
      <div class="row">
         <div class="col">
            <!--Tampilkan pagination-->
            <?php echo $pagination; ?>
         </div>
      </div>	
	</div>
</div>  	