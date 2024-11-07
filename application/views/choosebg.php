<?php echo form_open(base_url().'Choosebg/goGarden'); ?>
    <div id="bgTitle" >  Choose Your background</div>
    <div id="bg1"  >  First Background</div>
    <div id="bg2" >  Second Background</div>
    <br><br>
    <input type="submit" id="bg1box" name="bg" value=1>

    <input type="submit" id="bg2box" name="bg" value=2>
    <div id="bg3" >  Third Background</div>
    <input type="submit" id="bg3box" name="bg" value=3>
            
<?php echo form_close(); ?>