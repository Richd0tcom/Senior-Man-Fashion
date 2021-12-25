<?php
//STEP 2
//initialize the session
session_start();
//create an array of productsto be ussed later.
$productsId = array();


//session_destroy();





//check if add to cart button has been clicked
if (isset($_POST['addToCart'])) {
    //check if the shopping cart exists
    if (isset($_SESSION['shop_cart'])) {
        //create a counter that keeps track of how many products are in the shopping cart so we know the array key for the next product
        $count = count($_SESSION['shop_cart']);

        //create sequential array for matching array keys to products id
        $productsId = array_column($_SESSION['shop_cart'], 'id');

        if (!in_array($_GET['id'], $productsId)) {
            $_SESSION['shop_cart'][$count] = array(
                'id' => $_GET['id'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'quantity' => 1,
                'image'=> $_POST['image']

            );
        } else {
            for ($i = 0; $i < count($productsId); $i++) {
                if ($productsId[$i] == $_GET['id']) {
                    //incremaent the quqntity of the existing orioduct inhe array
                    $_SESSION['shop_cart'][$i]['quantity'] += 1;
                }
            }
        }
    } else {
        //if the shopping cart doesnt exits create first product with araay key 0
        //createa array using submitted form data, start from key 0 and fill it with values;

        $_SESSION['shop_cart'][0] = array(
            'id' => $_GET['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'quantity' => 1,
            'image'=> $_POST['image']

        );
    }
}

function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}




?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>


    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">



    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="./assets/css/prostyle/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="./assets/css/prostyle/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="./assets/css/prostyle/responsive.css" rel="stylesheet" />

    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        button {

            color: white;

        }

        .option1 button:hover {

            color: red;

        }

        .option2 button:hover {

            color: black;

        }
        .yepa{
            margin-top: 50px;
            

        }
    </style>

        <?php include "./includes/header.php"?>

</head>

<body>


    <section class="product_section layout_padding">
        <div class="container">


            <div class="heading_container heading_center">
                <h2>
                    Our <span>products</span>
                </h2>
            </div>
            <div class="row">

                <?php
                //STEP1
                require_once("./config/Dbase.php");
                //select query to display the products
                $query =    'SELECT * 
                            FROM products 
                            ORDER by id ASC';
                //store the result of the query(which is the products table data)
                $result = $conn->query($query);

                if ($result) :
                    if (mysqli_num_rows($result) > 0) :
                        while ($product = $result->fetch_assoc()) : //while there is an associative array(clothes) to fetch, store array keys in variable, then display the clothes details.

                ?>


                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="box">
                                    <div class="option_container">
                                        <div class="options">
                                            <form action="products.php?action=add&id= <?php echo $product['id']; ?>" method="post">
                                                <a class="option1" onclick="alert('Product has been added to the cart! Refer to cart to change quantity')"><button type="submit" name="addToCart">
                                                        Add to cart
                                                    </button>
                                                </a>
                                                <a href="" class="option2"><button type="submit" name="addToCart" onclick="alert('Product has been added to the cart. Refer to cart to increase quantity')">
                                                        Buy Now
                                                    </button>
                                                </a>
                                                <input type="hidden" name="name" value="<?php echo $product['name'] ?>">
                                                <input type="hidden" name="price" value="<?php echo $product['price'] ?>">
                                                <input type="hidden" name="image" value="<?php echo $product['image']; ?>">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="img-box">
                                        <img src="./assets/picshur/<?php echo $product['image']; ?>" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5 style="padding-left:5px">
                                            <?php echo $product['name']; ?> &nbsp;
                                        </h5>
                                        <h6>
                                            $ <?php echo $product['price']; ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>

                <?php
                        endwhile;
                    endif;
                endif;

                ?>



            </div>
            <?php //show proceed button if cartis not empty.
                if(isset($_SESSION['shop_cart'])):
                    if(count($_SESSION['shop_cart'])>0):
            ?>
            <div class="yepa" >
                <a href="#" class="btn btn-lg btn-pink">Proceed to Cart</a>
            </div>
            <?php endif;
                 endif; ?>   

        </div>
    </section>
    <!-- end product section -->

                 <?php include "./includes/footer.php"?>
</body>

</html>