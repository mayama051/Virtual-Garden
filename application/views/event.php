    <div class="eventBody">
        <h2 id="event_h">Event</h2>
        <ul class="event_box">
            <?php foreach ($eventInfo as $item) {?>
            <li class="event">
                <img class="event_img"" src="<?php echo $item['image'];?>" alt="Event Photo" style="width: 16vw; height: 25vh;">
                <h4 class="event_title"><?php echo $item['title']?></h4>
                <div class="event_time"><?php echo $item['time'];?></div>
                <div class="event_location">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="17" height="17" fill="black"><path d="M12,0A10.011,10.011,0,0,0,2,10c0,5.282,8.4,12.533,9.354,13.343l.646.546.646-.546C13.6,22.533,22,15.282,22,10A10.011,10.011,0,0,0,12,0Zm0,15a5,5,0,1,1,5-5A5.006,5.006,0,0,1,12,15Z"/><circle cx="12" cy="10" r="3"/></svg>
                    <!--Citation: Marker icon font - free maps and location icon fonts. Flaticon. (n.d.). Retrieved October 9, 2022, from https://www.flaticon.com/free-icon-font/marker_3916884?page=1&amp;position=34&amp;term=marker&amp;related_id=3916884&amp;origin=search -->  
                    <?php echo $item['location'];?>
                </div>
                <a class="event_link" href="<?php echo $item['link'];?>">EXPLORE MORE</a>
            </li>
            <?php }?>
        </ul>

        <h2 id="workshop_h">Workshop</h2>
        <ul class="workshop_box">
            <?php foreach ($wsInfo as $item) {?>
            <li class="workshop">
                <img class="ws_img"" src="<?php echo $item['image'];?>" alt="Workshop Photo" style="width: 16vw; height: 25vh;">
                <h4 class="ws_title"><?php echo $item['title']?></h4>
                <div class="ws_time"><?php echo $item['time'];?></div>
                <div class="ws_location">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="17" height="17" fill="black"><path d="M12,0A10.011,10.011,0,0,0,2,10c0,5.282,8.4,12.533,9.354,13.343l.646.546.646-.546C13.6,22.533,22,15.282,22,10A10.011,10.011,0,0,0,12,0Zm0,15a5,5,0,1,1,5-5A5.006,5.006,0,0,1,12,15Z"/><circle cx="12" cy="10" r="3"/></svg>
                    <!--Citation: Marker icon font - free maps and location icon fonts. Flaticon. (n.d.). Retrieved October 9, 2022, from https://www.flaticon.com/free-icon-font/marker_3916884?page=1&amp;position=34&amp;term=marker&amp;related_id=3916884&amp;origin=search -->  
                    <?php echo $item['location'];?>
                </div>
                <a class="ws_link" href="<?php echo $item['link'];?>">EXPLORE MORE</a>
            </li>
            <?php }?>
        </ul>
        
    </div>

   