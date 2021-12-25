<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>


   <link rel="stylesheet" href="../assets/css/vendor/vendor.min.css">
   <link rel="stylesheet" href="../assets/css/plugins/plugins.min.css">
   <link rel="stylesheet" href="../assets/css/style.min.css">


   <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="../assets/css/prostyle/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../assets/css/prostyle/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="../assets/css/prostyle/responsive.css" rel="stylesheet" />


    <?php include "../includes/header.php" ?>

    <style>
        .mt{
            margin-top: 200px;
        }
    </style>
</head>

<body>
   <!-- ...:::: Start Account Dashboard Section:::... -->
   <div class="account-dashboard">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
               <!-- Nav tabs -->
               <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                  <ul role="tablist" class="nav flex-column dashboard-list">
                     <li><a href="#dashboard" data-bs-toggle="tab"
                           class="nav-link btn btn-block btn-md btn-black-default-hover active">Dashboard</a>
                     </li>


                     <li> <a href="#orders" data-bs-toggle="tab"
                           class="nav-link btn btn-block btn-md btn-black-default-hover">Orders</a></li>
                     <li><a href="#address" data-bs-toggle="tab"
                           class="nav-link btn btn-block btn-md btn-black-default-hover">Addresses</a></li>
                     <li><a href="#account-details" data-bs-toggle="tab"
                           class="nav-link btn btn-block btn-md btn-black-default-hover">Account details</a>
                     </li>
                     <li><a href="login.php" class="nav-link btn btn-block btn-md btn-black-default-hover">logout</a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
               <!-- Tab panes -->
               <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                  <div class="tab-pane fade show active" id="dashboard">
                     <h4>Dashboard </h4>
                     <p>Dear Customer From your account dashboard. you can easily check &amp; view your <a
                           href="#">recent
                           orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">Edit
                           your password and account details.</a></p>
                  </div>
                  <div class="tab-pane fade" id="orders">
                     <h4>Orders</h4>
                     <div class="table_page table-responsive">
                        <table>
                           <thead>
                              <tr>
                                 <th>Order</th>
                                 <th>Date</th>
                                 <th>Status</th>
                                 <th>Total</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>May 10, 2018</td>
                                 <td><span class="success">Completed</span></td>
                                 <td>$25.00 for 1 item </td>
                                 <td><a href="cart.html" class="view">view</a></td>
                              </tr>
                              <tr>
                                 <td>2</td>
                                 <td>May 10, 2018</td>
                                 <td>Processing</td>
                                 <td>$17.00 for 1 item </td>
                                 <td><a href="cart.html" class="view">view</a></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>

                  <div class="tab-pane" id="address">
                     <p>The following addresses will be used on the checkout page by default.</p>
                     <h5 class="billing-address">Billing address</h5>
                     <a href="#" class="view">Edit</a>
                     <p><strong>Bobby Jackson</strong></p>
                     <address>
                        Address: Your address goes here.
                     </address>
                  </div>
                  <div class="tab-pane fade" id="account-details">
                     <h3>Account details </h3>
                     <div class="login">
                        <div class="login_form_container">
                           <div class="account_login_form">
                              <form action="#">
                                 
                                 <div class="input-radio">
                                    <span class="custom-radio"><input type="radio" value="1" name="id_gender">
                                       Mr.</span>
                                    <span class="custom-radio"><input type="radio" value="1" name="id_gender">
                                       Mrs.</span>
                                 </div> <br>
                                 <div class="default-form-box mb-20">
                                    <label>First Name</label>
                                    <input type="text" name="first-name">
                                 </div>
                                 <div class="default-form-box mb-20">
                                    <label>Last Name</label>
                                    <input type="text" name="last-name">
                                 </div>
                                 <div class="default-form-box mb-20">
                                    <label>Email</label>
                                    <input type="text" name="email-name">
                                 </div>
                                 <div class="default-form-box mb-20">
                                    <label>Password</label>
                                    <input type="password" name="user-password">
                                 </div>
                                 <div class="default-form-box mb-20">
                                    <label>Birthdate</label>
                                    <input type="date" name="birthday">
                                 </div>
                                 <span class="example">
                                    (E.g.: 05/31/1970)
                                 </span>
                                 <br>
                                 <label class="checkbox-default" for="offer">
                                    <input type="checkbox" id="offer">
                                    <span>Receive offers from our partners</span>
                                 </label>
                                 <br>
                                 <label class="checkbox-default checkbox-default-more-text" for="newsletter">
                                    <input type="checkbox" id="newsletter">
                                    <span>Sign up for our newsletter<br><em>You may unsubscribe at any
                                          moment. For that purpose, please find our contact info in the
                                          legal notice.</em></span>
                                 </label>
                                 <div class="save_button mt-3">
                                    <button class="btn btn-md btn-black-default-hover" type="submit">Save</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> <!-- ...:::: End Account Dashboard Section:::... -->

   <footer class="mt">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="full">
                        <div class="logo_footer">
                            <a href="#"><img width="210" src="../assets/picshur/logo.png" alt="Senior Man" /></a>
                        </div>
                        <div class="information_f">
                            <p><strong>ADDRESS:</strong> 28 White tower, Street Name New York City, Metaverse</p>
                            <p><strong>TELEPHONE:</strong> +234 987 654 3210</p>
                            <p><strong>EMAIL:</strong>contact@seniorman.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="widget_menu">
                                        <h3>Menu</h3>
                                        <ul>
                                            <li><a href="landing.php">Home</a></li>
                                            <li><a href="landing.php">About</a></li>
                                            <li><a href="products.php">products</a></li>
                                            <li><a href="landing.php">Testimonial</a></li>
                                            <li><a href="#">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="widget_menu">
                                        <h3>Account</h3>
                                        <ul>
                                            <li><a href="#">Account</a></li>
                                            <li><a href="#">Checkout</a></li>
                                            <li><a href="./onboarding/login.php">Login</a></li>
                                            <li><a href="./onboarding/signup.php">Register</a></li>
                                            
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="widget_menu">
                                <h3>Newsletter</h3>
                                <div class="information_f">
                                    <p>Subscribe by our newsletter and get update protidin.</p>
                                </div>
                                <div class="form_sub">
                                    <form>
                                        <fieldset>
                                            <div class="field">
                                                <input type="email" placeholder="Enter Your Mail" name="email" />
                                                <input type="submit" value="Subscribe" />
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->


   <script src="../assets/js/vendor/vendor.min.js"></script>
   <script src="../assets/js/plugins/plugins.min.js"></script>

   <!-- Main JS -->
   <script src="../assets/js/main.js"></script>

   

</body>

</html>