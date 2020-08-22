$(document).ready(function () {
  document.getElementById("my-symptoms").click();
  //feed to parse
  var feed = "https://www.who.int/feeds/entity/csr/don/en/rss.xml";

  $.ajax(feed, {
    accepts: {
      xml: "application/rss+xml",
    },
    dataType: "xml",
    success: function (data) {
      //Credit: http://stackoverflow.com/questions/10943544/how-to-parse-an-rss-feed-using-javascript

      $(data)
        .find("item")
        .each(function () {
          // or "item" or whatever suits your feed
          
            var el = $(this);
            if (
              el.find("title").text().includes("corona") ||
              el.find("title").text().includes("covid") ||
              el.find("description").text().includes("corona") ||
              el.find("description").text().includes("covid")
            ) {
              var feed = document.getElementById("feed");
              var html = "<div class='card'>";
              html +=
                "<center> <h4>" + el.find("title").text() + "</h4></center>";
              html += " <br><br><p>" + el.find("description").text() + "</p>";
              feed.innerHTML += html;
              html += "</div>";
              console.log("------------------------");
              console.log("title      : " + el.find("title").text());
              console.log("link       : " + el.find("link").text());
              console.log("description: " + el.find("description").text());
            }
        });
     
    },
  });
});

function opentab(evt, gcotabs) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(gcotabs).style.display = "block";
  evt.currentTarget.className += " active";
}

function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}