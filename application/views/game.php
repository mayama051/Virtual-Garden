<div class="canvas" id="canvas">
    <div id="games"></div>
    <div class="drag-zone" id="drag-zone">
        <img class="dragable-items" id="donut" src="<?php echo base_url()."application/image/game/donut.png" ?>" alt="donut">
        <img class="dragable-items" id="corn" src="<?php echo base_url()."application/image/game/corn.png" ?>" alt="corn">
        <img class="dragable-items" id="egg" src="<?php echo base_url()."application/image/game/egg.png" ?>" alt="egg">
        <img class="dragable-items" id="eggshell" src="<?php echo base_url()."application/image/game/eggshell.png" ?>" alt="eggshell">
        <img class="dragable-items" id="oil" src="<?php echo base_url()."application/image/game/oil.png" ?>" alt="oil">
        <img class="dragable-items" id="rock" src="<?php echo base_url()."application/image/game/rock.png" ?>" alt="rock">
        <img class="dragable-items" id="fish" src="<?php echo base_url()."application/image/game/fish.png" ?>" alt="fish">
    </div>
    
    <div class="start" id="start-popup">
        <h1>Quiz</h1>
        <p>Drag items to the correct bin</p>
        <img class="ex" src="<?php echo base_url()."application/image/game/start.png" ?>" alt="">
        <div class="bot">
            <button onclick="location.href='<?php echo base_url(); ?>gameinfo2'" class="btn">Back</button>
            <button onclick="closePopup1()" class="btn">Start</button>
        </div>
    </div>

    <div class="result" id="result-popup">
        <?php echo form_open(base_url().'game/done'); ?>
            <h1>Congratulation</h1>
            <p class="form-group">Your score is <span style="color:#527509" id="score"></span></p>
            <p>Good job!</p>
            <div class="bot form-group">
                <button onclick="location.href='<?php echo base_url(); ?>mainpage'"  type="submit" class="btn">close</button>
            </div>
        <?php echo form_close(); ?>
    </div>

    <div class="top-info">What can be used as compost?</div>
    <div class="score-show">Score: <span  id="score-ingame"></div>


    <div class="drop-zone">
        <div id="yes">
            <img class="bin" id = "yes-bin" src="<?php echo base_url()."application/image/game/yes.png" ?>" alt="">
        </div>
        <div id="no">
            <img class="bin" id = "no-bin" src="<?php echo base_url()."application/image/game/no.png" ?>" alt="">
        </div>
        
    </div>
</div>





<style>
    .canvas{
        background-image: url('<?php echo base_url()."application/image/game/table.jpg" ?>');
        width: 100vw;
        height: 80vh;
        background-position: center;
        background-repeat: no-repeat;
        background-size: 100vw 80vh;
        z-index: -100;
    }
</style>