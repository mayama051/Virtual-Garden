<!doctype HTML>
<html lang="en">
    <head>
            <title>My_Garden</title>
    </head>
<div>
    <div id="gardenContainer">
        <img id="garden" src=<?php echo base_url()."application/image/bg/garden".$gardenId.".jpg"; ?>>
        
        <div id="pictureContainer" style=<?php 
            echo "position:absolute;"."width:".$row->contentWidth."%;"."height:".$row->contentHeight."%;"."bottom:".$row->contentBottom."%;"."left:".$row->contentLeft."%; "; 
        ?> >
            <?php 
            if ($query != ""){
                foreach ($query->result() as $row){
                $count = 0;      
            ?>
            
                <img id=<?php echo $count; ?> 
                src=<?php echo base_url().'application/image/'.$row->image.'.png'; ?> 
                style=<?php 
                    echo "position:absolute;"."bottom:".$row->pBottom."%;"."left:".$row->pLeft."%;"."width:".$row->pWidth."em;"."height:".$row->pHeight."em; "; 
                    ?> >
                <?php $count = $count + 1; ?>
            <?php } } ?>
        </div>
        <div id="btn_form">
            <div>
                <img class="personal_pic" src=<?php echo base_url()."application/image/person.jpg" ?>>
            </div>
            <div id="choose_btn1" onclick=<?php echo "openPopup('fruit')"; ?>>
                <div class="btn_word">
                    <img width="30" height="30" src=<?php echo base_url()."application/image/vegetables.png" ?>> 
                    <div class="btn_word"> Fruit & Veggies </div>
                </div>

                <div class="progress_box">
                    <div class="progress_bg" style="border-radius: 5px;">
                        <div id="fruit_progress" style=<?php echo "width:".($fruit_width*10)."%;background-color:green;height:clac(100%+5px);"."border-radius:5px;";  ?>>
                        </div>
                    </div>
                    <div class="progress_text">
                        <?php echo $fruit_width."/10"; ?>
                    </div>
                </div>
                <div id="fruit_description">
                    <div id="hoverContent">
                        <div>Carrot   Banana</div>
                        <div>  Apple    Pear</div>
                        <div>  Shallot  Orange</div>
                        <div>  Onion    Garlic</div>    
                        <div> ----------------------------- </div> 
                    </div>
                    <div> 
                     <img src=<?php echo base_url()."application/image/flower.5.png" ?> >
                     <img src=<?php echo base_url()."application/image/t.5.png" ?> >
                    </div>
                    
                </div>
                
            </div>

            <div id="choose_btn2" onclick=<?php echo "openPopup('tree')"; ?>>
                <div class="btn_word">
                <img width="30" height="30" src=<?php echo base_url()."application/image/coffeebeans.png"?>>
                    <div class="btn_word"> Coffee Grounds </div>
                </div>

                <div class="progress_box">
                    <div class="progress_bg" style="border-radius: 5px;">
                        <div id="tree_progress" style=<?php echo "width:".($tree_width*10)."%;background-color:#770505;height:clac(100%+5px);"."border-radius:5px;";  ?>>
                        </div>
                    </div>
                    <div class="progress_text">
                        <?php echo $tree_width."/10"; ?>
                    </div>
                </div>
                <div id="tree_description"> 
                    <div id="hoverContent">
                        <div>Coffee grounds</div>
                        <div>Coffee filters</div>
                        <div> ----------------------------- </div> 
                    </div>
                    <div> 
                    <img src=<?php echo base_url()."application/image/w.5.png" ?> >
                    <img style="height:100px; width:80px;" src=<?php echo base_url()."application/image/tree.5.png" ?> >
                    </div>
                </div>
            </div>

            <div id="choose_btn3" onclick=<?php echo "openPopup('chicken')"; ?>>
                <div class="btn_word">
                <img width="30" height="30" src=<?php echo base_url()."application/image/boiled-egg.png" ?>>
                    <div class="btn_word"> Eggshells & Teabags </div>
                </div>

                <div class="progress_box">
                    <div class="progress_bg" style="border-radius: 5px;">
                        <div id="tree_progress" style=<?php echo "width:".($chicken_width*10)."%;background-color:#D27C2C;height:clac(100%+5px);"."border-radius:5px;";  ?>>
                        </div>
                    </div>
                    <div class="progress_text">
                        <?php echo $chicken_width."/10"; ?>
                    </div>
                </div>
                <div id="chicken_description">
                    <div id="hoverContent">
                        <div>Eggshell</div>
                        <div>Tea bag</div>
                        <div> ----------------------------- </div> 
                    </div>
                    <div> 
                    <img style="height:65px; width:70px;" src=<?php echo base_url()."application/image/chicken.3.1.png" ?> >
                    <img style="height:60px; width:50px;" src=<?php echo base_url()."application/image/chicken.3.2.png" ?> >
                    </div>
                </div>
            </div>
            <div id="points"> <?php echo $points;?><br>points</div>
        </div>
    </div>
    <br><br>
    <div id="contentSection"> </div>
    
    </div class="outergarden">
        <div class="container">
            <div class="popup" id="popup">
                <div onclick="closePopup()" class="close_btn">
                <img width="20" height="20" src=<?php echo base_url()."application/image/X.svg" ?>>
                </div>
                <div class="choose_garden_btn_form">
                    <button id="choose_garden_btn" onclick="openMap()">
                        <img width="50" height="50" src=<?php echo base_url()."application/image/main_scarecrow.svg" ?>>
                        Choose A Composting Hub<br>Here
                    </button>
                </div>
                <?php echo form_open(base_url().'mainpage/updateWaste/1'); ?>
                    <div id="amount_btn" class="form-group">
                        <div id="waste_type"> </div>
                        <input type="number" class="form-control" placeholder="Enter amount in KG" required="required" name="wasteAmount">
                    </div>
                    <div class="form-group">
                        <button id="donate_btn" type="submit" ><span>Donate</span></button>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        
        <div class=<?php if($picture){ ?>
                        <?php echo 'open-donate-popup'; ?>
                        <?php } else { ?>
                        <?php echo "completecontainer"; } ?>
        >
            <img id="completeImg"  src=<?php echo base_url()."application/image/check.png" ?> >
            <div id="donatetext" > Your donation has been completed!
            <?php echo form_open(base_url().'mainpage/index'); ?>
                <button id=donateBtn > CLOSE </button>   
            <?php echo form_close(); ?>
        </div>
    </div>

    <a href="<?php echo base_url(); ?>helpcenter">
        <div class="help">
            <p class="float-icon" >?</p>
        </div>
    </a>

    <div id="map" class="map"> 
        <div class="closeMap" onclick="closeMap();"> 
            <img src=<?php echo base_url()."application/image/X.svg" ?>>
        </div>
    </div>

    

    <div id="map2" class="map2"> 
        <div class="closeMap" onclick="closeMap();"> 
            <img src=<?php echo base_url()."application/image/X.svg" ?>>
        </div>
    </div>


    
</div>
