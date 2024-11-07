<div class="profileBody">
    <div class="pInfo">
        <div class="card">
            <div class="detailInfo">
                <img id="person" src= "<?php echo base_url(); ?>/application/image/person.jpg" alt="A person">
                <h2 class="theName"><?php echo $username; ?></h2>
            </div>
            <h3 class="pts">Points: <?php echo $total_point; ?></h3>
        </div>
        <div class="wastePts">
            <div class="f_v">
                <img id="f_v" src= "<?php echo base_url(); ?>/application/image/vegetables.png" alt="Fruit and Veggies">
                <h3 class="pts_f"><?php echo $fruit_point; ?><br>Pts</h3>
            </div>
            <div class="c_g">
                <img id="c_g" src= "<?php echo base_url(); ?>/application/image/coffeebeans.png" alt="Coffee Ground">
                <h3 class="pts_c"><?php echo $coffee_point ?><br>Pts</h3>
            </div>
            <div class="e_t">
                <img id="e_t" src= "<?php echo base_url(); ?>/application/image/boiled-egg.png" alt="Eggshell">
                <h3 class="pts_e"><?php echo $egg_point; ?><br>Pts</h3>
            </div>
        </div>
    </div>
    <div class="reward">
        <h2 class="rewardH2">Rewards:</h2>
        <div id="redeem">
            <div class="item1">
                <img id="" src= "<?php echo base_url(); ?>/application/image/carrots.jpg" alt="Carrots">
                <h3>Organic Carrot</h3>
                <p><b>20</b> pts / each</p>
            </div>
            <div class="item2">
                <img id="" src= "<?php echo base_url(); ?>/application/image/seeds.jpg" alt="Sunflower seeds">
                <h3>Sunflower Seed</h3>
                <p><b>5</b> pts /each</p>
            </div>
            <div class="item3">
                <img id="" src= "<?php echo base_url(); ?>/application/image/eggs.jpg" alt="Eggs">
                <h3>Egg</h3>
                <p><b>10</b> pts / each</p>
            </div>
            <div class="item4">
                <img id="" src= "<?php echo base_url(); ?>/application/image/duck.jpg" alt="A duck">
                <h3>Little Duck</h3>
                <p><b>200</b> pts / each</p>
            </div>
        </div>
    </div>
</div>