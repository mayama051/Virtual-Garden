    <div class="section s1">
        <div calss="spanContainer">
            <!-- Sourcecode example for Slides 
                 https://www.w3schools.com/howto/howto_js_slideshow.asp -->
            <div class="slideContainer">
                <div id="home"></div>
                <div class="mySlides fade">
                    <div class="numbertext">1 / 4</div>
                    <img class="s1" src="<?php echo base_url(); ?>/application/image/spanPic.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 4</div>
                    <img class="s1" src="<?php echo base_url(); ?>/application/image/home/ex1.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 4</div>
                    <img class="s1" src="<?php echo base_url(); ?>/application/image/home/ex2.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">4 / 4</div>
                    <img class="s1" src="<?php echo base_url(); ?>/application/image/home/ex3.jpg" style="width:100%">
                </div>

                <div class="ad">
                    <h1>Want to have your own garden?</h1>
                    <p>Turn your food waste into compost to thrive your garden.</p>
                    <div id="description">
                        <button onclick="location.href='<?php echo base_url(); ?>register'" class="btnGetStart">Get Started!</button>
                    </div>
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" id = "prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" id = "next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            



            
            
        </div>
    </div>
    <div class="section s2">
        <div class="item i1">
            <a class="logout" href="<?php echo base_url(); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="160" height="160" fill="darkslategray" class="bi bi-joystick" viewBox="0 0 16 16">
                    <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2z"/>
                    <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23z"/>
                </svg>
                <div class="label" style="background-image: url('<?php echo base_url(); ?>/application/image/label1.jpg');">
                    <h2>Knowledge about compost <br> via our compost game</h2>
                </div>
            </a>
        </div>
        <div class="item i2">
            <a class="logout" href="<?php echo base_url(); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="160" height="160" fill="darkslategray" class="bi bi-twitter" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                </svg>
                <div class="label" style="background-image:url('<?php echo base_url(); ?>application/image/label2.jpg');">
                    <h2>Sharing information from <br> gardeners and composters</h2>
                </div>
            </a>
        </div>
        <div class="item i3">
            <a class="logout" href="<?php echo base_url(); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="darkslategray" class="bi bi-calendar-event" viewBox="0 0 16 16">
                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>
                <div class="label" style="background-image: url('<?php echo base_url(); ?>/application/image/label3.jpg');">
                    <h2>Join an on-going <br> gardening/composting event</h2>
                </div>
            </a>
        </div>
    </div>

