<?php
session_start();
$total=0;

if(empty($_SESSION['shop_cart'])){
    header("location: home.php");
    exit;
};

if(isset($_GET['action'])){
    if($_GET['action']=='delete'){
        //loop through all the products in the shopping cart until it mathes the get id  variable
        foreach($_SESSION['shop_cart'] as $key => $product){
            if($product['id']== $_GET['id']){
                unset($_SESSION['shop_cart'][$key]);
            }
        }
        //reset session keys so th match with the products numeric arrays
     $_SESSION['shop_cart'] = array_values($_SESSION['shop_cart']);

    }
    
    
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

      
    <link rel="stylesheet" href="./assets/css/plugins/animate.min.css">

    <link rel="stylesheet" href="./assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="./assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="./assets/css/style.min.css">



</head>
<body>
    <!--
    <!-- ...:::: Start Cart Section:::... -->
    
    <div class="cart-section">
        <!-- Start Cart Table -->
        <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                <table>
                                    <!-- Start Cart Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Remove</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->

                                    <?php
                                    if(!empty($_SESSION['shop_cart'])):


                                        foreach ($_SESSION['shop_cart'] as $key => $products):

                                    ?>

                                    <tbody>
                                        <!-- Start Cart Single Item-->
                                        <tr>
                                            <td class="product_remove"><a href="cart.php?action=delete&id=<?php echo $products['id'];?>"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <td class="product_thumb"><a href=""><img
                                                        src="./assets/picshur/<?php echo $products['image']; ?>"
                                                        alt=""></a></td>
                                            <td class="product_name"><a href="product-details-default.html"><?php echo $products['name']?></a></td>
                                            <td class="product-price">$<?php echo $products['price']?></td>
                                            <td class="product_quantity"><label>Quantity</label> <input min="1"
                                                    max="100" value="<?php echo $products['quantity']?>" type="number"></td>
                                            <td class="product_total">$<?php echo number_format($products['quantity']*$products['price'],2);?></td>
                                        </tr> <!-- End Cart Single Item-->
                                       
                                    </tbody>

                                    <?php
                                        $total=$total + ($products['quantity']*$products['price']);
                                        endforeach;
                                    endif;
                                    ?>
                                </table>
                            </div>
                            <!--<div class="cart_submit">
                                <button class="btn btn-md btn-golden" type="submit">update cart</button>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->

        <!-- Start Coupon Start -->
        <div class="coupon_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left" data-aos="fade-up" data-aos-delay="200">
                            <h3>Coupon</h3>
                            <div class="coupon_inner">
                                <p>Enter your coupon code if you have one.</p>
                                <input class="mb-2" placeholder="Coupon code" type="text">
                                <button type="submit" class="btn btn-md btn-golden">Apply coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">$<?php echo number_format($total,2);?></p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Shipping</p>
                                    <p class="cart_amount"><span>Flat Rate:</span> $150.00</p>
                                </div>
                                <a href="#">Calculate shipping</a>

                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount"><?php echo number_format($total+150,2);?></p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="./shipping/shipping.php" class="btn btn-md btn-golden">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Coupon Start -->
    </div> <!-- ...:::: End Cart Section:::... -->


    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>
</html>

