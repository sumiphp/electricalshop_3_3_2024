<!doctype html>
<html lang="en">
    <?php $sitedetails = sitedetails();
    $productMetaTags = $prodDesc = '';
    $prodPoints = [];
    foreach ($productdetails['Details'] as $key => $value) {
        if ($value['pd_type_name'] == 'Meta Tags') {
            $productMetaTags = html_entity_decode($value['prod_dt_desc']);
        } else if ($value['pd_type_name'] == 'Description') {
            $prodDesc = $value['prod_dt_desc'];
        } else {
            $prodPoints[$value['pd_type_name']] = $value['prod_dt_desc'];
        }
    }

   //print_r($productdetails['Details']);
    //die;

    $currency = '';
    if (isset($sitecurrency)) {
        $currency = $sitecurrency['currency'];
    }
    ?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">             
        <?php //echo htmlspecialchars_decode($productMetaTags);?>           
        <?php $this->load->view('includes/metatags', array('page_title' => $page_title, 'productMetaTags' => $productMetaTags)); ?>
        <?php $this->load->view('includes/header-assets', array('page_title' => $page_title)); ?>
        <?php $this->load->view('includes/more-header-assets'); ?>
        <?php echo htmlspecialchars_decode($getga->site_ga_code); ?>
    </head>
   
    <body>
        <?php $this->load->view('includes/header-menu', array('page_title' => $page_title)); ?>

        <div class="product-deatils-area pt-0">
            <div class="container">
                <div class="product-details pt-50">
                    <div class="">
                        <div class="row">
                            <?php if (isset($productdetails['Images']) && ! empty($productdetails['Images'])) { ?>
                                <div class="col-lg-6 col-md-12">
                                    <div class="products-img-box text-center client-slider owl-carousel owl-theme">
                                        <?php foreach ($productdetails['Images'] as $image) { ?>
                                            <img class="client-item" src="<?=site_url()?>assets/uploads/products/<?=$image['pd_img_image']?>" alt="<?=$image['prod_name']?>" title="<?=((trim($image['pd_img_description']) != '') ? $image['pd_img_description'] : $image['prod_name'])?>"/>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-lg-6 col-md-12">
                                <div class="product-box-details-area">
                                    <div class="products-details">
                                        <h2><?=$product['prod_name']?></h2>
                                        <p><?=html_entity_decode(nl2br($prodDesc))?></p>
                                    </div>
                                    <div class="matrial-details">
                                        <?php if (isset($productdetails['Brand']) && ! empty($productdetails['Brand']) && isset($productdetails['Brand'][0])) { ?>
                                            <h2>
                                                <img src="<?=site_url()?>assets/uploads/brands/<?=$productdetails['Brand'][0]['brand_image']?>" alt="<?=$image['prod_name']?>" title="<?=((isset($productdetails['Brand']) && isset($productdetails['Brand'][0]) && isset($productdetails['Brand'][0]['brand_name'])) ?  $productdetails['Brand'][0]['brand_name'] : '')?>" style="width: 50px;"/>
                                            </h2>
                                        <?php } ?>
    
                                        <div class="details-table-sec">
                                        
                                            <table id="part" cellspacing="0">
                                                <tr style="display: none;">
                                                    <th class="label">
                                                        Availability :
                                                    </th>
                                                    <td>
                                                        <span class="btn-sec">
                                                            <a href="#" class="default-btn small-btn"> Instock</a>    
                                                            <a href="#" class="default-btn small-btn"> Request </a> 
                                                        </span>  
                                                    </td>
                                                </tr>
                                                <?php foreach ($prodPoints as $label => $value) { ?>
                                                    <tr>
                                                        <th class="label">
                                                            <?=$label?> :
                                                        </th>
                                                        <td>
                                                            <?=$value?> <?=(in_array(strtolower($label), ['amount', 'price', 'value']) ? $currency : '')?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                                <!-- <tr>
                                                    <th class="label">
                                                        Price :
                                                    </th>
                                                    <td>
                                                        <span class="smallText"> AED 1000</span> AED 850 +VAT 
                                                    <span class="inner-select">
                                                        <select id="currencyList" class="select-box">
                                                            <option value="AED" selected="selected" label="AED">AED</option>
                                                            <option value="EUR" label="EUR">EUR</option>
                                                            <option value="JPY" label="JPY">JPY</option>
                                                            <option value="USD" label="USD">USD</option>
                                                            </select>
                                                    </span> 
                                                    </td>
                                                </tr> -->

                                                <!-- <tr style="display: none;">
                                                    <th class="label">
                                                        Quantity :
                                                    </th>
                                                    <td>
                                                        <input type="number" id="quantity" name="quantity" min="1" max="5">

                                                    </td>
                                                </tr> -->
                                            
                                            </table>
                                        </div>
                                        <div class="button-area" style="display: none;">
                                            <div class="btn-sec mt-30">
                                                <a href="#" class="default-btn  ml-50">
                                                    <img src="<?=site_url()?>assets/img/btn-cart.png"/>
                                                    Add to Cart
                                                </a>
                                                <a href="#" class="default-btn ml-20">
                                                    Whole Sale Price
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php if (isset($productdetails['TechnicalDataSheetHierarchy']) && ! empty($productdetails['TechnicalDataSheetHierarchy'])) { ?>
            <div class="data-sheet-details">
                <div class="container">
                    <div class="list-of-details-product">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="details-area">
                                    <h2 class="mb-2">Technical Data Sheet</h2>
                                    <h6>Details</h6>
                                    <p><?=html_entity_decode(nl2br($productdetails['TechnicalDataSheetHierarchy']['TDS_0']['tech_sheet_text']))?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            $tds1 = false;
                            $tds3 = false;
                            $counter = 0;
                            foreach ($productdetails['TechnicalDataSheetHierarchy'] as $tdsKey => $tds) { 
                                $counter++;
                                if ($tdsKey != 'TDS_0') {
                                    if ($tds['tech_sheet_level'] == 1) { ?>
                                        <?php if ($tds1) { ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div>
                                        <?php } ?>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="main-content-list-area">
                                                <h2><?=$tds['tech_sheet_text']?></h2>
                                                <div class="main-list">
                                                    <div class="table-row-area">
                                                        <table id="main" cellspacing="0">
                                    <?php } else if ($tds['tech_sheet_level'] == 2) { 
                                        $tds3 = false; ?>
                                                            <tr>
                                                                <th><?=$tds['tech_sheet_text']?></th>
                                    <?php } else if ($tds['tech_sheet_level'] == 3) { 
                                        $tds1 = true; 
                                        if ($tds3) { ?>
                                                            <tr>
                                                                <th></th>
                                        <?php } else {
                                            $tds3 = true; 
                                        } ?>
                                                                <td><?=$tds['tech_sheet_text']?></td>
                                                            </tr>
                                    <?php } ?>
                                <?php }
                            } ?>
                            <?php if (count($productdetails['TechnicalDataSheetHierarchy']) == $counter) { ?>
                                </table>
                            </div>
                        </div>
                    </div>  
                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            <?php } ?>
        <?php } ?>

        <?php $this->load->view('includes/google-map', array('page_title' => $page_title, 'sitedetails' => $sitedetails)); ?>

        <?php $this->load->view('includes/footer-content', array('page_title' => $page_title, 'recent_categories' => $recent_categories)); ?>

        <?php $this->load->view('includes/footer-assets', array('page_title' => $page_title)); ?>

        <?php $this->load->view('includes/more-footer-assets'); ?>

        <script>
            $(document).ready(function() {
                Frontend.productSearchBar();

                var dropdown = document.getElementsByClassName("dropdown-btn");
                var i;
                
                for (i = 0; i < dropdown.length; i++) {
                dropdown[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var dropdownContent = this.nextElementSibling;
                    if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                    } else {
                    dropdownContent.style.display = "block";
                    }
                });
                }

                function myFunction() {
                    var dots = document.getElementById("dots");
                    var moreText = document.getElementById("more");
                    var btnText = document.getElementById("myBtn");
                
                    if (dots.style.display === "none") {
                        dots.style.display = "inline";
                        btnText.innerHTML = "Read more"; 
                        moreText.style.display = "none";
                    } else {
                        dots.style.display = "none";
                        btnText.innerHTML = "Read less"; 
                        moreText.style.display = "inline";
                    }
                }
                document.getElementById('searchIcon').onclick = function() {
                    document.getElementById('search').classList.add("visible");
                    document.getElementById('clear').classList.add("visible");
                    document.getElementById('search').focus();
                    document.getElementById('searchIcon').classList.add("hide");
                }
                document.getElementById('clear').onclick = function() {
                    document.getElementById('searchIcon').classList.remove("hide");
                    document.getElementById('search').classList.remove("visible");
                    document.getElementById('clear').classList.remove("visible");
                }
            });
        </script>
    </body>
</html>