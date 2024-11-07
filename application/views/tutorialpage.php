
<div class="imageBox">
    <img src="<?php echo base_url(); ?>application/image/bg/p1.png"  class="tutorial active"/>
    <img src="<?php echo base_url(); ?>application/image/bg/p2.png"  class="tutorial"/> 
    <img src="<?php echo base_url(); ?>application/image/bg/p3.png" class="tutorial"/> 
    <img src="<?php echo base_url(); ?>application/image/bg/p4.png" class="tutorial"/> 
    <img src="<?php echo base_url(); ?>application/image/bg/p5.png" class="tutorial"/> 
    <!-- <img src="<?php echo base_url(); ?>application/image/spanPic.jpg" class="tutorial"/> -->
    <div id="tutorialImage"> </div>
    <div id="buttonBox">
        <button id="previous"> Go previous </button>
        <button id="next"> Go next </button>
        <?php echo form_open(base_url().'Choosebg/index'); ?>	
            <button id="goGarden"> Start My Garden </button>			
        <?php echo form_close(); ?>
        
    </div>
</div>