<ul>

<?php foreach($menus as $mn){
                                
                                $this->db->where('parentmenuid',$mn['menuid']);    
                                $this->db->where('menutype',2);
                                $this->db->where('status',1);
                                $this->db->select('*');
                                $this->db->from('menus');
                                $query = $this->db->get();
                                $rowcount = $query->num_rows();
                                
                                
                                
                                ?>



<?php if ($rowcount==0){?>

    <li>
                        <a href="<?php echo base_url().$mn['url'];?>"><?php echo $mn['menuname'];?></a>
                    </li>
                   
                    <?php } else {?>


                        <li class="menu-item-has-children">
                        <a href="<?php echo base_url().$mn['url'];?>"><?php echo $mn['menuname'];?></a>
                        <?php

                        $this->db->where('parentmenuid',$mn['menuid']);                                        
    $this->db->where('menutype',2);
    $this->db->where('status',1);
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


                        <?php } }?>
                   
                 
                </ul>