<?= $this->setSiteTitle('Customer Designs') ?>

<?= $this->start('head'); ?>

 <!-- <link href="<?=PROOT?>assets/css/jquery.plugin.css" rel="stylesheet" type="text/css" media="all" /> -->
 <link href="<?=PROOT?>assets/css/arenafont.css" rel="stylesheet" type="text/css" media="all" />
 <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
 
<?= $this->end(); ?>

<?= $this->start('body'); ?>
<div id="body-content" class="layout-boxed" style="background: #fff !important;">
  <div id="main-content"> 
    <div class="main-content">
      <div id="shopify-section-collection-template" class="shopify-section">



        <div class="wrap-breadcrumb bw-color">
          <div id="breadcrumb" class="breadcrumb-holder container">

            <div class="row">

               <?php 
                      echo '
                        <div class="col-lg-8 d-none d-lg-block">
                          <div class="page-title">'.
                             end($params).'
                          </div>
                        </div>
                      ';
                 ?> 

                               
      
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                  <ul class="breadcrumb">

                    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                      <a itemprop="url" href="#home">
                        Home
                      </a>
                    </li>

                    <li class="active">
                      <?= end($params)?>
                      
                    </li>
                    
                  </ul>
                </div>
              </div>

            </div>
          </div>

<div class="page-cata" data-logic="true">
  <div class="container">
  
    <div class="row">

        <div id="sidebar" class="left-column-container col-lg-3  d-none d-lg-block">

  

        <div class="sb-widget">
          <div class="sb-banner">

              
                <a href="#">
                  <img class="lazyload" src = "<?=PROOT?>assets/images/products/front2.jpg" alt="" /> 
                </a>
              <div class="block-text">
                <span class="text" style="color: #fff;">Let clothes color your life!</span>
                <a class="btn btn-1" href="<?=PROOT?>Home/ProductList">shop now</a>
              </div>
          </div>
        </div>
  
        <?php include (ROOT.DS.'app'.DS.'views'.DS.'home'.DS.'Categories.php');?>

    </div>

    

<div class="col-lg-9 col-md-12">
        
  <div class="wrap-cata-title">
    <h2>Customer Requests</h2>
  </div>

<div class="cata-toolbar">
  <div class="group-toolbar">
      
  <div class="pagination-showing">
    <div class="showing">

          <?php                       
            $pageNo=$params[1];
            $noOfPages = ceil(($params[2]/6));           
            echo 'Showing page '. $pageNo.' of  '.$noOfPages.'  pages';
          ?>
             
            
    </div>
  </div>
  </div>
</div>


<div id="col-main">

  <div class="cata-product cp-grid">

   

    <!-- product view -->
<?php 
    foreach ($params[0] as $field){
      //dnd($field);

      echo '
  <div class="product-grid-item mode-view-item">
          

    <div class="product-wrapper effect-overlay ">

      <div class="product-head">
        <div class="product-image">
      
          <div class="featured-img">
            <a href="'.PROOT.'CustomRequestController/requestedProductView/'.$field->id.'"> 
                <img class="featured-image front lazyload" src="'.PROOT.'assets/images/custom_requests/'.$field->images[0].'" alt="Georgeous White Dresses" />       
              <span class="product-label"></span>
        </a>
      </div>
         
      <div class="wrapper-countdown">
      <div class="countdown_1588809236539"></div>
      </div>

    </div>
  </div>

  <div class="product-content">
    <div class="pc-inner">
      
      <div class="product-group-vendor-name"> 
        <h5 class="price-cart-wrapper">
          '.$field->pr_name.'
        </h5>

        <div class="product-des-list-" style="list-style-position: outside;">
             
            <span class="a-list-item">'.$field->description.'</span>
            

          
        </div>   

        <div class="product-review">
          <span class="shopify-product-reviews-badge" data-id="1588809236539">            
          </span>
        </div>
        
      </div>
      
     <div class="price-cart-wrapper">
    <div class="product-price">   
        <span class="price">
          <br>
          <span class=money>$100.00</span>
        </span>
    </div>

    <a href="'.PROOT.'CustomRequestController/requestedProductView/'.$field->id.'" class="btn btn-1">View Details</a> 


    </div>
</div>

</div>

</div>


</div>
      ';
    }
 ?>


    <!-- end product view -->

</div>

</div>


</div>



<div class="pagination-holder">
  <ul class="pagination">

    <li>
      <a class="prev disabled" href="javascript:;">
        <i class="icon-demo icon-angle-left"></i>
      </a>
    </li>

    <?php
      $pageNo=$params[1];
      $noOfPages = ceil(($params[2]/6));      

      if ($pageNo-1>0){
        $previousPage=$pageNo-1;
        echo
        '<li>
          <a href="'.$previousPage.'" title="Next" class="next">
            <i class="icon-demo icon-angle-left"></i>
          </a>
        </li>';
      }

      $start=$pageNo-2;
      $end=$pageNo+2;

      if ($noOfPages<=5){
        $start=1;
        $end=$noOfPages;
      }
      
      else{

        if ($pageNo==1 || $pageNo==2){        
          $start=1;
            $end=$noOfPages;
        }

        else if($pageNo+1==$noOfPages) {
          $start=$pageNo-3;
          $end=$noOfPages;
        }

        else if ($pageNo==$noOfPages){
          $start=$noOfPages-4;
          $end=$noOfPages;
        }

      }

      for($i=$start; $i<=$end; $i++) {
        echo '<li><a href="'.$i.'">'.$i.'</a></li>';
      }
        
      if ($pageNo+1<=$noOfPages){
        $nextPage=$pageNo+1;
        echo
        '<li>
          <a href="'.$nextPage.'" title="Next" class="next">
            <i class="icon-demo icon-angle-right"></i>
          </a>
        </li>';
      }

    ?>

  </ul>
</div>


</div>
</div>
  
</div>

      </div>
    </div>
<script type="text/javascript">
    var classname="btn-1";

    var pr_list=[];
    $(document).ready(function(){

        var user_id= JSON.stringify(<?php echo $user->id; ?>);

        console.log(user_id);

        $('.btn-1').on('click',function(){
            var icon=$(this);
            var id=icon.data().id;
            var pr_id=JSON.stringify(id);

            if (!isExist(id)){ 
                pr_list.push(id);

                $.ajax({
                    url:"<?=PROOT?>CustomRequestController/accept",
                    method:"POST",
                    data: {'id': pr_id, 'user_id': user_id, 'status':'1'},
                    success: function(data){
                        icon.css('opacity', '0.5');
                        icon.css('cursor','not-allowed');

                        console.log(data);
                    }
                });
            }


            // var pr_list=[];
            // if (!isExist(id)){ 
            //     pr_list.push(id);
            //     $.ajax({
            //         url:"<?=PROOT?>CustomRequestController/accept",
            //         method:"POST",
            //         data: {'id': pr_id},
            //         success: function(data){
            //             icon.css('opacity', '0.5');
            //             icon.css('cursor','not-allowed');
            //         }
            //     });
            // }
            // else{
            //     //remove item from the list
            //     var index=pr_list.indexOf(id);
            //     pr_list.splice(index, 1);
            //     $.ajax({
            //         url:"<?=PROOT?>CustomRequestController/reject",
            //         method:"POST",
            //         data: {'id': pr_id},
            //         success: function(data){
            //             icon.css('opacity', '0.5');
            //             icon.css('cursor','not-allowed');
            //         }
            //     });
            // }
            
        });
    });

    function isExist(id){
        for (var i=0; i<pr_list.length; i++){
          if (pr_list[i]==id){
            pr_list.splice(i,1);
            return true;
          }
        }
        pr_list.push(id);  
        return false;
    }
</script>
  
  </div>
</div>
<?= $this->end(); ?>