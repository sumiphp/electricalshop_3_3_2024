<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Electrical Shop </title>
    <meta name="author" content="Electrical Shop">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,100;9..40,200;9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=Lexend:wght@300;400;500;600;700;800;900&family=Lobster&display=swap" rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
   
    <!--link rel="stylesheet" href="assets/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
  
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
   
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
  
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css"--->

    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/bootstrap.min.css';?>">
    
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/fontawesome.min.css';?>">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/magnific-popup.min.css';?>">
    <!-- Swiper Js -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/swiper-bundle.min.css';?>">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/style.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'electricalshop1/assets/css/responsive.css';?>">


    <?php $sitedetails = sitedetails(); 
         
        
         
         ?>
       <style>
label.error.errpopupmsg {
    position: absolute;
    bottom: -35px;
    color: #f61c0d;
    font-style: italic;
    font-weight: 600;
}

</style>




</head>

<body>


    <!--==============================
     Preloader
  ==============================-->
  <!--div class="preloader ">
       
    <div class="preloader-inner">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div-->

   
<?php include('header.php');?>
<div class="breadcumb-wrapper " data-bg-src="<?php echo base_url().'electricalshop1/assets/img/e-shop/inner-banner-img.png';?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="banner-img">
                    <img src="<?php echo base_url().'electricalshop1/assets/img/e-shop/banner-3.png';?>"/>
                </div>
               
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="inner-banner-content">
                    <h1 class="breadcumb-title">Wishlist</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                    <a href="tel:+<?=$sitedetails['phone_number_1']?>" class="th-btn call-bnr-btn"><span class="icon-des"><i class="fa fa-phone"></i></span><?=$sitedetails['phone_number_1']?></a>
                
                </div>

            </div>
        </div>
     
    </div>
</div>
    <div class="space">
        <div class="container">
            <div class="tinv-wishlist woocommerce tinv-wishlist-clear">
                <div class="tinv-header">
                    <h2 class="mb-30">Wishlist</h2>
                </div>

                <?php //print_r($custwishlist);?>
                <form action="#" method="post" autocomplete="off">
                    <table class="tinvwl-table-manage-list">
                        <thead>
                            <tr>
                                <th class="product-cb">
                                    <input type="checkbox" class="global-cb checkAll" title="Select all for bulk action">
                                </th>
                                <th class="product-remove"></th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">
                                    <span class="tinvwl-full">Product Name</span><span class="tinvwl-mobile">Product</span>
                                </th>
                                <th class="product-price">Unit Price</th>
                                <th class="product-date">Date Added</th>
                                <th class="product-stock">Stock Status</th>
                                <th class="product-action">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>


                        <?php if (! empty($custwishlist)) { ?>

<?php foreach ($custwishlist as $product) {
    
    
    ?>
    <?php $prdid=$product['product_id'];
    
    $this->db->where('prod_id',$prdid);
    //$this->db->where('prod_dt_typeid',5);
   // $this->db->order_by("orderno", "asc");
    $this->db->select('*');
    $this->db->from('products');
    $query = $this->db->get();
    $rowdt=$query->row();
    
    
    
    ?>

   
                            <tr class="wishlist_item" id="<?php echo $product['id'];?>" >
                                <td class="product-cb">
                                    <input type="checkbox" name="wishlist_pr[]" value="58" title="Select for bulk action">
                                </td>
                                <td class="product-remove">
                                    <button type="button" name="tinvwl-remove" value="58" title="Remove" onclick="del(<?php echo $product['id'];?>)"><i class="fal fa-times"></i>
                                    </button>
                                </td>
                                <td class="product-thumbnail">
                                    <a href="<?=site_url().'product/'.$rowdt->prod_canonial_name;?>"><img src="<?=site_url()?>assets/uploads/products/<?=$rowdt->prod_primary_image?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="image"></a>
                                </td>
                                <td class="product-name">
                                  
                                    <a href="<?=site_url().'product/'.$rowdt->prod_canonial_name?>">
                                    <?php
                                    //$itn=$item["name"]; 
                                
                               
                                echo $string1=$rowdt->prod_name;
                                ?>
                                


                                    </a>
                                </td>
                                <td class="product-price">
                                    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>
                                    <?php 
                                     $this->db->where('prod_dt_prodid',$prdid);
                                     $this->db->where('prod_dt_typeid',4);
                                    // $this->db->order_by("orderno", "asc");
                                     $this->db->select('*');
                                     $this->db->from('product_details');
                                     $query = $this->db->get();
                                     $pricedt=$query->row();
                                     $currency='USD';
                                     
                                     echo $pricedt->prod_dt_desc;  ?>
                                  
                                
                                    
                                </bdi></span>
                                </td>
                                <td class="product-date">
                                    <time class="entry-date" datetime="2021-11-21 03:54:24">November 21, 2021</time>
                                </td>
                                <td class="product-stock">
                                    <p class="stock in-stock">
                                        <span><i class="fas fa-check"></i></span><span class="tinvwl-txt">In stock</span>
                                    </p>
                                </td>
                                <td class="product-action">

                              

                                <?php  
                                
                                $username=$this->session->userdata('username');
                                            
                                
                                
                                
                                if ($username==''){
                                    $url=base_url('home/login');
                                    
                                    
                                    ?>

                                    <?php } else {
                                        
                                        $url='productssample/addToCart/'.$prdid;
                                        
                                        ?>

                                        <?php } ?>
                                        <a href="<?php echo $url;?>" ><button type="button" class="button th-btn" name="tinvwl-add-to-cart" value="58" title="Add to Cart">
                                        <i class="fal fa-shopping-cart"></i><span class="tinvwl-txt">Add to Cart</span>
                                    </button> </a>


                                  



                                </td>
                            </tr>

                            <?php }} ?>
                           
                        </tbody>
                    </table>
                </form>
                <!--div class="social-buttons">
                    <span>Share on</span>
                    <ul>
                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=permalink" class="social social-facebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/share?url=permalink" class="social social-twitter " title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="http://pinterest.com/pin/create/button/?url=permalink" class="social social-pinterest " title="Pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                        <li><a href="https://api.whatsapp.com/send?text=permalink" class="social social-whatsapp " title="WhatsApp"><i class="fab fa-whatsapp"></i></a></li>
                        <li><a href="http://vecurosoft.com/products/wordpress/foodelio/wishlist/974b61/" class="social social-clipboard " title="Clipboard"><i class="far fa-clipboard"></i></a></li>
                        <li><a href="mailto:?body=permalink" class="social social-email " title="Email"><i class="far fa-envelope"></i></a></li>
                    </ul>
                </div-->

            </div>
        </div>
    </div>
   

<?php include('footer.php');?>



    



    <script src="<?php echo base_url().'electricalshop1/assets/js/vendor/jquery-3.6.0.min.js';?>"></script>
    <!-- Swiper Js -->
    <script src="<?php echo base_url().'electricalshop1/assets/js/swiper-bundle.min.js';?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url().'electricalshop1/assets/js/bootstrap.min.js';?>"></script>
    <!-- Magnific Popup -->
    <script src="<?php echo base_url().'electricalshop1/assets/js/jquery.magnific-popup.min.js';?>"></script>
    <!-- Counter Up -->
    <script src="<?php echo base_url().'electricalshop1/assets/js/jquery.counterup.min.js';?>"></script>
    <!-- Range Slider -->
    <script src="<?php echo base_url().'electricalshop1/assets/js/jquery-ui.min.js';?>"></script>
    <!-- Isotope Filter -->
    <script src="<?php echo base_url().'electricalshop1/assets/js/imagesloaded.pkgd.min.js';?>"></script>
    <script src="<?php echo base_url().'electricalshop1/assets/js/isotope.pkgd.min.js';?>"></script>

        
    <script src="<?php echo base_url().'electricalshop1/assets/js/main.js';?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>

<script>

$('form[id="frmemail"]').validate({  
rules: {  
emailidnews: 'required',  

},  
messages: {  
emailidnews: 'Please enter your emailid',  

},  
submitHandler: function(form) { 


    $.ajax({
url: form.action,
type: form.method,
data: $(form).serialize(),
success: function(response) {
$('input[type=text]').each(function() {
$(this).val('');
});

$('#emailnews').val('');

$('#newsmsg').html(response);
}            
});		
}





//form.submit();  
// }  
});  



$("#sub").click(function(){
$('#newsmsg').html('');
}); 

</script>






    <script>
function del(id){
$.ajax({
            type: 'GET',
            url: "<?php echo base_url().'index.php/checkout/deletewishlist';?>",
            data:{id:id},
            success:function(data){
                $("#"+id).remove();
                $("#msg").html(data);
            }
        });

}


/*$('.checkAll').click(function(){
    alert("enter");
    if($(this).attr('checked')){
        alert("enter11");
       $("input:checkbox").prop("checked", true);
    }
    else{
        $("input:checkbox").prop("checked",false);
    }
});*/


function ch(){

    if ($(".checkAll").length) {
            //alert("en");
            $("input:checkbox").prop("checked", true);
        } else {
            $("input:checkbox").prop("checked", false);
        }


}

/*$(".checkAll").click(function() {
    alert($(".checkAll").length);
        if ($(".checkAll").length) {
          
            $("input:checkbox").prop("checked", true);
        } else {
            $("input:checkbox").prop("checked", false);
        }
    })*/



    $(function(){

$('.checkAll').click(function(){

   if (this.checked) {

      //$(".checkboxes").prop("checked", true);
      $("input:checkbox").prop("checked", true);

   } else {

      //$(".checkboxes").prop("checked", false);
      $("input:checkbox").prop("checked", false);

   }	

});

});


    
</script>

<script>

$('form[id="frmser"]').validate({  
rules: {  
    serquery: 'required',  
 
},  
messages: {  
    serquery: 'Please enter your Keyword',  
 
},  
submitHandler: function(form) { 
   
    $("#frmser").submit();
      
}

});  



</script>





</body>

</html>