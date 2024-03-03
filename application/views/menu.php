<ul>

<?php

$i=0;


foreach($menus as $mn){
                                
                                $this->db->where('parentmenuid',$mn['menuid']);    
                                $this->db->where('menutype',2);
                                $this->db->where('status',1);
                                $this->db->select('*');
                                $this->db->from('menus');
                                $query = $this->db->get();
                                $rowcount = $query->num_rows();
                                
                                
                                
                                ?>



<?php 


if ($i==0){
    //$style='background-color:yellow;color:black';
    $style="Sale-box";
}
else{
    $style='';
}

if ($rowcount==0){

   
    
    
    ?>

    <li class="<?php echo $style;?>">
                        <a href="<?php echo base_url().$mn['url'];?>" ><?php echo $mn['menuname'];?></a>
                    </li>
                   
                    <?php } else {?>


                        <li class="menu-item-has-children <?php echo $style;?>">
                        <a href="<?php echo base_url().$mn['url'];?>" ><?php echo $mn['menuname'];?></a>
                        <?php

                        $this->db->where('parentmenuid',$mn['menuid']);                                        
    $this->db->where('menutype',2);
    $this->db->where('status',1);
    $this->db->order_by('orderno');
    $this->db->select('*');
    $this->db->from('menus');
    $query = $this->db->get();
    $submenulist=$query->result_array();

    ?>




                        <ul class="sub-menu">

                        <?php foreach($submenulist as $sm){?>
                            <li><a href="<?php echo base_url().$sm['url'];?>"><?php echo $sm['menuname'];?></a></li>

                            <?php } ?>

                            </ul>
                    </li>


                        <?php } 
                    
                    $i++;
                    
                    
                    }?>
                   
                    <!--li class="menu-item-has-children">
                        <a href="#">Bulk Enquiry</a>
                        <ul class="sub-menu">
                            <li><a href="#">Bulk Enquiry</a></li>
                            <li><a href="#">Bulk Enquiry</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Brands</a>
                        <ul class="sub-menu">
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Brands</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Product</a>
                        <ul class="sub-menu">
                            <li><a href="#">Product</a></li>
                            <li><a href="#">Product Details</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#">Clearance</a>
                    </li>
                    <li><a href="#">About Us</a></li>
                  
                    <li>
                        <a href="#">Contact</a>
                    </li-->
                </ul>