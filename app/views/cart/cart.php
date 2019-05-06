<?= $this->setSiteTitle('Cart'); ?>

<?= $this->start('head'); ?>

<!--    <meta charset="UTF-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <link rel="profile" href="http://gmpg.org/xfn/11">-->
<!--    <link rel="pingback" href="http://handy.themes.zone/xmlrpc.php">-->
    <link rel='stylesheet'  href='<?=PROOT?>assets/css/style.css' type='text/css' media='all' />
    <link rel='stylesheet'  href='<?=PROOT?>assets/css/woo-styles.css' type='text/css' media='all' />
    <link rel='stylesheet' id='pt-grid-css'  href='<?=PROOT?>assets/css/pt-grid.css' type='text/css' media='all' />



    <style>
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

<?php
//$fields = Cart::$cartItems;
    $fields = [["quantity"=>2,"price"=>900,"name"=>"T shirt","code"=>124]];
//    dnd($fields);
    session_start();
    $_SESSION["cart_item"] = $fields;

?>

<div id="shopping-cart">
<!--    <div class="txt-heading">Shopping Cart</div>-->
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
    <a class="btn btn-1" href="index.php?action=empty">Empty Cart</a>
    <?php
    if(isset($_SESSION["cart_item"])){
        $total_quantity = 0;
        $total_price = 0;
        ?>
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
            <tr>
                <th style="text-align:left;">name</th>
                <th style="text-align:left;">Code</th>
                <th style="text-align:right;" width="5%">Quantity</th>
                <th style="text-align:right;" width="10%">Unit Price</th>
                <th style="text-align:right;" width="10%">Price</th>
                <th style="text-align:center;" width="5%">Remove</th>
            </tr>
            <?php
            foreach ($_SESSION["cart_item"] as $item){
                $item_price = $item["quantity"]*$item["price"];
                ?>
                <tr>
                    <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
                    <td><?php echo $item["code"]; ?></td>
                    <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                    <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
                    <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
                    <td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
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
        <?php
    } else {
        ?>
        <div class="no-records">Your Cart is Empty</div>
        <?php
    }
    ?>
</div>
<?= $this->end(); ?>