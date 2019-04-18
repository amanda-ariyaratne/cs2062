<?php
/**
 * Created by IntelliJ IDEA.
 * User: Chamodi Madhushani
 * Date: 3/28/2019
 * Time: 10:59 AM
 */
session_start();
class Cart extends Model{
    protected $_db, $_table, $_modelName, $_softDelete = false, $_columnNames = [];

    public $id;


    public function __construct($table="cart"){
        parent::__construct($table);


    }

    public function get_db(){
        return $this->_db;
    }

    public function getPaymenteDetails($o_id){
        $payments = array();

        $details = $this->find(array('conditions' => 'order_id = ?' , 'bind' => [$o_id]));

        if(count($details)!=0){
            foreach ($details as $item) {
                $field = [
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity
                ];
                array_push($payments, $field);
            }
        }
        return $payments;
    }






    public function editCart(){
//        dnd($_GET["addToCart"]);
        if(! empty($_GET["addToCart"])){
                    if(!empty($_POST["addToCart"])) {


                        echo "Added to cart";
//                        $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
//                        $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
//
//                        if(!empty($_SESSION["cart_item"])) {
//                            if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
//                                foreach($_SESSION["cart_item"] as $k => $v) {
//                                    if($productByCode[0]["code"] == $k) {
//                                        if(empty($_SESSION["cart_item"][$k]["quantity"])) {
//                                            $_SESSION["cart_item"][$k]["quantity"] = 0;
//                                        }
//                                        $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
//                                    }
//                                }
//                            } else {
//                                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
//                            }
//                        } else {
//                            $_SESSION["cart_item"] = $itemArray;
//                        }
                    }

            }
        }



}