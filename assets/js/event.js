// Citation: Slick. the last carousel you'll ever need. (n.d.). Retrieved October 9, 2022, from http://kenwheeler.github.io/slick/ 
$(document).ready(function() {

  $('.event_box').slick({
    arrows: true,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    cssEase: 'ease-in',
    speed: 1000,
  });

  $('.workshop_box').slick({
    arrows: true,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    cssEase: 'ease-in',
    speed: 1000,
  });
});




// // Event
// let eventIndex = 1;
// showEvents(eventIndex);

// function plusEvents(n) {
//   showEvents(eventIndex += n);
// }

// function showEvents(n) {
//   let i;
//   let events = document.querySelectorAll(".event");
//   if (n > events.length) {eventIndex = 1}
//   if (n < 1) {eventIndex = events.length}
//   for (i = 0; i < events.length; i++) {
//     events[i].style.display = "none";
//     // events[i].style.opacity = "0";
//     events[i].style.width = "0";
//   }
//   let j;
//   let event_img = document.querySelectorAll(".event_img");

//   for (j = eventIndex; j < (eventIndex + 4); j++) {
//     let position = (j>events.length) ? (j-events.length) : j; 
//     // event_img[j-1].style.height = "370px";
//     // events[j-1].style.opacity = "1";
//     events[position-1].style.display = "flex";
//     events[position-1].style.width = "250px";
//   }
// }

// // Workshop
// let wsIndex = 1;
// showWorkshops(wsIndex);

// function plusWorkshops(n) {
//   showWorkshops(wsIndex += n);
// }

// function showWorkshops(n) {
//   let k;
//   let workshops = document.querySelectorAll(".workshop");
//   if (n > workshops.length) {wsIndex = 1}
//   if (n < 1) {wsIndex = workshops.length}
//   for (k = 0; k < workshops.length; k++) {
//     workshops[k].style.display = "none";
//     // workshops[k].style.opacity = "0";
//     workshops[k].style.width = "0";
//   }
//   let l;
//   let workshop_img = document.querySelectorAll(".ws_img");

//   for (l = wsIndex; l < (wsIndex + 4); l++) {
//     let position = (l>workshops.length) ? (l-workshops.length) : l; 
//     // workshop_img[l-1].style.height = "370px";
//     // workshops[l-1].style.opacity = "1";
//     workshops[position-1].style.display = "flex";
//     workshops[position-1].style.width = "250px";
//   }
// }





// $.ajax({
//   url: "https://www.data.brisbane.qld.gov.au/data/api/3/action/datastore_search",
//   data: data,
//   dataType: "jsonp",
//   cache: true,
//   success: function(results) {
//     iterateRecords(results);
//   }
// });


// $(document).ready(function() {
//     let url = 'http://www.trumba.com/calendars/green-events.rss?filterview=green_events';
//   $.ajax({
//     url: "https://api.rss2json.com/v1/api.json?rss_url=" + url, //For converting default format to JSON format  
//     dataType: 'jsonp', //for making cross domain call
//       success: function(data) {  
//         alert('Success');
//         let pattern = /garden|compost|waste/im;
            
//         $.each(data.items, function(recordKey, recordValue) {
//             // console.log(recordValue);
//             if (recordValue["description"]){

//                 var recordTitle = recordValue["title"];
//                 // var recordYear = getYear(recordValue["dcterms:temporal"]);
//                 // var recordImage = recordValue["150_pixel_jpg"];
//                 var recordDescription = recordValue["description"];

//                 console.log(recordTitle, recordDescription);
            
//                 // if(recordTitle) {
            
//                 //     $("#records").append(
//                 //         $('<section class="record">').append(
//                 //             $('<h2>').text(recordTitle),
//                 //             // $('<h3>').text(recordYear),
//                 //             // $('<img>').attr("src", recordImage),
//                 //             // $('<p>').text(recordDescription)
//                 //         )
//                 //     );
            
//                 // }
//             }
//         });
             
//     }
//   });
// });

// fetch('http://www.trumba.com/calendars/green-events.rss?filterview=green_events')
//   .then(response => response.text())
//   .then(str => new window.DOMParser().parseFromString(str, "text/xml"))
//   .then(data => {
//     console.log(data);
//     const items = data.querySelectorAll("item");
//     let html = ``;
//     items.forEach(el => {
//       html += `
//         <article>
//           // <h1> ${el.querySelector("title").innerHTML}</h1>
//           <h2>
//             <a href="${el.querySelector("link").innerHTML}" target="_blank" rel="noopener">
//               ${el.querySelector("title").innerHTML}
//             </a>
//           </h2>
//         </article>
//       `;
//     });
//     document.body.insertAdjacentHTML("beforeend", html);
  // });
