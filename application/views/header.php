<!doctype HTML>
<html lang="en">
    <head>
            <title>Virtual Garden</title>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/header.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/homepage.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/login.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/profile.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/tutorialpage.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/gameinfo1.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/gameinfo2.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/game.css">
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/event.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/reference.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/aboutpage.css">
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
            <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
            
    </head>
<body style="margin:0;">
    <nav id="navbar">

        <!-- 
            This part is for access control. If the user has been logged in, 
            after clicking the photo of our logo, she will be direct to My Garden page.
            Otherwise, she will be back to the initial homepage.
        -->
        <?php 
            $CI =& get_instance();
            $currentuser = $CI->session->userdata('username');
            $page = base_url();
            $image = base_url().'application/image/logo.png';
            if($currentuser) {
                $page = base_url().'mainpage';
            }
            echo '<a href="'.$page.'"><img id="logo" src='.$image.' alt="Logo of Virtual Garden"></a>';
        ?>
            
        <ul class="navbar-ul">

            <!-- My garden -->
            <!-- 
                This part is to track where the user is. If the user is in My garden page, 
                there will be a background for the item "My Garden".
            -->
            <?php
                $CI =& get_instance();
                $currentuser = $CI->session->set_userdata('logged_in');
                $currentPage = substr($_SERVER['REQUEST_URI'], 8, 8);
                $test = substr($_SERVER['REQUEST_URI'], 17, 6);
                $class4Bg = '';
                if ($currentPage === 'mainpage' || $test === 'testGo') {
                    $class4Bg = 'showBg';
                }
                echo '<li id="myGarden" class="'.$class4Bg.'">';
            ?>
                <!-- This part is the access control for My garden. If the user has been logged in, 
                she will be directed to the Virtual Garden page instead of the initial homepage. -->

                <?php
                    $CI =& get_instance();
                    $currentuser = $CI->session->userdata('username');
                    $page = base_url().'login';
                    if($currentuser) {
                        $page = base_url().'mainpage';
                    }
                    echo '<a class="" href="'.$page.'">MY &nbsp GARDEN</a>';
                ?>
            </li>

            <!-- Compost game -->
            <!-- 
                This part is to track where the user is. If the user is in Compost-Game-related page, 
                there will be a background for the item "Compost Game".
            -->
            <?php
                $CI =& get_instance();
                $currentuser = $CI->session->set_userdata('logged_in');
                $currentPage = substr($_SERVER['REQUEST_URI'], 8, 4);
                $class4Bg = '';
                if ($currentPage === 'game') {
                    $class4Bg = 'showBg';
                }
                echo '<li id="compostGame" class="'.$class4Bg.'">';
            ?>
                <a class="" href="<?php echo base_url().'gameinfo1'; ?>">COMPOST  &nbsp GAME</a>
            </li>
            
            <!-- Explore -->
            <!-- 
                This part is to track where the user is. If the user is in Event-related, 
                there will be a background for the item "Explore".
            -->
            <?php
                $CI =& get_instance();
                $currentuser = $CI->session->set_userdata('logged_in');
                $currentPage = substr($_SERVER['REQUEST_URI'], 8, 5);
                $class4Bg = '';
                if ($currentPage === 'event') {
                    $class4Bg = 'showBg';
                }
                echo '<li class="explore '.$class4Bg.'"">';
            ?>
                <div id="explore">EXPLORE</div>
                
                <ul id="exp_dropdown">
                    <li>
                        <a href="<?php echo base_url().'event'; ?>">Event</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'event/twitter'; ?>"> Twitter</a>       
                    </li>
                </ul>
                
            </li>

        </ul>

        <!-- Account -->
        <!-- 
            This part is to track where the user is. If the user is in Profile page, 
            there will be a background for the item "Account".
        -->
        <?php
                $CI =& get_instance();
                $currentuser = $CI->session->set_userdata('logged_in');
                $currentPage = substr($_SERVER['REQUEST_URI'], 8);
                $class4Bg = '';
                if ($currentPage === 'profile') {
                    $class4Bg = 'showBg';
                }
                echo '<div id="account" class="'.$class4Bg.'">';
        ?>
            <!-- 
                This part is the access control for Account. If the user has been logged in, 
                A dropdown will show up when clicking the Account item and she can go to profile page.
                Otherwise, she will be direct to log in page. 
            -->
            <?php 
                $CI =& get_instance();
                $currentuser = $CI->session->userdata('username');
                $account = base_url().'login';
                if($this->session->userdata('username')) {
                    echo '<div class="accountAnchor accountDrop">ACCOUNT</div>';
                } else {
                    echo '<a class="accountAnchor" href="'.$account.'">ACCOUNT</a>';
                }
            ?>

            <!-- A dropdown will show up if the user has been logged in. -->
            <?php if($this->session->userdata('username')) : ?>
                <div id="acc_dropdown">
                    <ul id='acc_box'>
                        <li><a class="profile" href="<?php echo base_url().'profile'; ?>">Profile
                            </a>    
                        </li>
                        <li>
                            <a class="logout" href="<?php echo base_url(); ?>login/logout"> Logout
                            </a>
                                    
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
            
            <!-- Logout shows in the dropdown if the user has been logged in. -->
            <?php if($this->session->userdata('username')) : ?>
                <a class="logout" href="<?php echo base_url(); ?>login/logout">
                </a>
            <?php endif; ?>
        
            
        </div>
    </nav>

    
    