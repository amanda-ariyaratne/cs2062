<?= $this->setSiteTitle('Shopping Cart') ?>

<?= $this->start('head'); ?>

<!--    <link rel='stylesheet'  href='--><?//=PROOT?><!--assets/css/style.css' type='text/css' media='all' />-->
<!--    <link rel='stylesheet'  href='--><?//=PROOT?><!--assets/css/woo-styles.css' type='text/css' media='all' />-->
<!--    <link rel='stylesheet' id='pt-grid-css'  href='--><?//=PROOT?><!--assets/css/pt-grid.css' type='text/css' media='all' />-->



    <style>
        table th:first-child {
            border-left: 1px solid #e1e1e1;
        }
        table th{
            color: #575757;
            font-weight: 100;
            font-size: 14px;
            background-color: #efefef;
            border-top: 1px solid #e1e1e1;
            border-right: 1px solid #e1e1e1;
            border-bottom: 1px solid #e1e1e1;
        }
        table td:first-child {
            border-left: 1px solid #e1e1e1;
        }
        table td{
            color: #6a6a6a;
            font-weight: 400;
            font-size: 14px;
            border-right: 1px solid #e1e1e1;
            border-bottom: 1px solid #e1e1e1;
        }

        #shopping-cart {
            margin: 40px 180px;
        }

        #product-grid {
            margin: 40px 0px;
        }

        #shopping-cart table {
            width: 100%;
            background-color: #F0F0F0;
        }

        #shopping-cart table td {
            background-color: #FFFFFF;
        }

        .txt-heading {
            color: #211a1a;
            border-bottom: 1px solid #E0E0E0;
            overflow: auto;
        }

        .btn btn-1 {
            /*background-color: #ffffff;*/
            /*border: #d00000 1px solid;*/
            /*padding: 5px 10px;*/
            /*color: #d00000;*/
            /*float: right;*/
            /*text-decoration: none;*/
            /*border-radius: 3px;*/
            margin: 40px 480px;
        }

        .btnAddAction {
            padding: 5px 10px;
            margin-left: 5px;
            background-color: #efefef;
            border: #E0E0E0 1px solid;
            color: #211a1a;
            float: right;
            text-decoration: none;
            border-radius: 3px;
            cursor: pointer;
        }

        #product-grid .txt-heading {
            margin-bottom: 18px;
        }

        .product-item {
            float: left;
            background: #ffffff;
            margin: 20px 20px 0px 0px;
            border: #E0E0E0 1px solid;
        }

        .product-image {
            height: 155px;
            width: 250px;
            background-color: #FFF;
        }

        .clear-float {
            clear: both;
        }

        .demo-input-box {
            border-radius: 2px;
            border: #CCC 1px solid;
            padding: 2px 1px;
        }

        .tbl-cart {
            font-size: 0.9em;
        }

        .tbl-cart th {
            font-weight: normal;
        }

        .product-title {
            margin-bottom: 20px;
        }

        .product-price {
            float:left;
        }

        .cart-action {
            float: right;
        }

        .product-quantity {
            padding: 5px 10px;
            border-radius: 3px;
            border: #E0E0E0 1px solid;
        }

        .product-tile-footer {
            padding: 15px;
            overflow: auto;
        }

        .cart-item-image {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: #E0E0E0 1px solid;
            padding: 5px;
            vertical-align: middle;
            margin-right: 15px;
        }
        .no-records {
            text-align: center;
            clear: both;
            margin: 38px 0px;
        }
    </style>


<?= $this->end(); ?>

<?= $this->start('body'); ?>

    <div id="body-content" class="layout-boxed">
    <div id="main-content">
    <div class="main-content">

        <div class="wrap-breadcrumb bw-color">
            <div id="breadcrumb" class="breadcrumb-holder container">

                <div class="row">

                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="page-title">Shopping Cart</div>
                    </div>


                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <ul class="breadcrumb">
                            <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                                <a itemprop="url" href="/">
                                    <span itemprop="title" class="d-none">Handy Store</span>Home
                                </a>
                            </li>
                            <li class="active">Cart</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    <?php
    $fields = $params[0];
    session_start();
    $_SESSION["cart_item"] = $fields;

    ?>
        <main class="site-content col-xs-9 col-md-9 col-sm-9" style="margin-left: 185px" itemscope="itemscope" itemprop="mainContentOfPage"><!-- Main content -->

    <?php
    if(isset($_SESSION["cart_item"])){
        $total_quantity = 0;
        $total_price = 0;
        ?>
        <a class="btn btn-1" style="margin-left: 980px" href="<?=PROOT?>CartController/emptyCart/<?php echo $fields[0]["customer_id"]; ?>">Empty Cart</a><br><br>

        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
            <tr>
                <th style="text-align:center;">Name</th>
                <th style="text-align:center;" width="8%">Color</th>
                <th style="text-align:center;" width="8%">Quantity</th>
                <th style="text-align:center;" width="15%">Unit Price</th>
                <th style="text-align:center;" width="20%">Price</th>
                <th style="text-align:center;" width="8%">Remove</th>
            </tr>
            <?php
            foreach ($_SESSION["cart_item"] as $item){
                $item_price = $item["quantity"]*$item["price"];

                $color = $item["color"];


                ?>
                <tr>
                    <td><?php echo '<img style="width:60px;height:70px;" src="'.PROOT.'assets/images/products/'.$item["image"].'"  >';?><?php echo $item["name"]; ?><br><br><label>Product by: </label><?php echo $item["vendor_name"]; ?></td>
                    <td><?php echo '<div style="text-align:center"><span style="height: 25px;width: 25px;background-color: '.$color.';display: inline-block; margin: 2px" class="dot"></span>'; ?></td>
                    <td style="text-align:center;"><?php echo $item["quantity"]; ?></td>
                    <td  style="text-align:center;"><?php echo "$ ". number_format($item["price"],2); ?></td>
                    <td  style="text-align:center;"><?php echo "$ ". number_format($item_price,2); ?></td>
                    <td style="text-align:center;"><a href="<?=PROOT?>CartController/remove/<?php echo $item["cart_id"]; ?>/<?php echo $item["customer_id"]; ?>" class="btnRemoveAction"><img style="" src="<?=PROOT?>assets/images/icon-delete.png" alt="Remove Item" /></td>
                </tr>
                <?php
                $total_quantity += $item["quantity"];
                $total_price += ($item["price"]*$item["quantity"]);

            }
            ?>

            <tr>
                <td colspan="2" align="right">Total:</td>
                <td align="right"><?php echo $total_quantity; ?></td>
                <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <br>
        <div class="wc-proceed-to-checkout">

            <a href="<?=PROOT?>OrderController/CustomerInformation" class="btn btn-1" style="margin-left: 930px" >Proceed to checkout</a>
        </div>
        <?php
    } else {
        ?>
        <div class="no-records">Your Cart is Empty</div>
        <?php
    }
    ?>

        </main>
    </div>
</div>
    </div>
<?= $this->end(); ?>