var myList
     var arr = [];
$.ajax({
  type: "GET",
  url: "../php_scripts/symptom_list.php",
  success: function (data) {
    console.log(data);
    myList = JSON.parse(data);
    var consultScore = 0;
    console.log(JSON.parse(data));
    /* console.log(myList[0]) */
    myList.forEach((day) => {
      const date1 = Date.parse(day.date + " UTC")
      const date2 = Date.now();
      const diffTime = Math.abs(date2 - date1);
      const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
      var html =
        "<p id='expand" +
        day.date.replace(/ /g, "").replace(/-/g, "").replace(/:/g, "") +
        "'>";
      if (typeof day.symptom.cough != "undefined") {
        html +=
          "<br><br><img class='card-icon'src='../assets/img/cough.png'></img> Coughing " +
          day.symptom.cough.frequency +
          " " +
          ". " +
          day.symptom.cough.type +
          ". ";
          if (diffDays < 14 ) 
          consultScore += 2;
      }
      if (typeof day.symptom.sore_throat != "undefined") {
        html +=
          "<br><br><img class='card-icon'src='../assets/img/sorethroat.png'></img> Having sore throat. ";
          if (diffDays < 14) consultScore += 4;
      }
      if (typeof day.symptom.chest_pain != "undefined") {
        html +=
          "<br><br><img class='card-icon'src='../assets/img/heart.png'></img> " +
          day.symptom.chest_pain.type +
          " chest pain. ";
      }
      if (typeof day.symptom.breathing != "undefined") {
        html +=
          "<br><br><img class='card-icon'src='../assets/img/breathing.png'></img> Breathing difficulty " +
          day.symptom.breathing.severity +
          " on a scale of 10.";
          if (diffDays < 14) consultScore += 1;
      }
      if (typeof day.symptom.fever != "undefined") {
        html +=
          "<br><br><img class='card-icon'src='../assets/img/fever.png'></img> " +
          day.symptom.fever.temperature +
          "&#176;C fever. ";
          if (diffDays < 14) consultScore += 3;
      }
      html += "</p>";
      document.getElementById("symptom_tracker").innerHTML +=
        `<div class='card' onclick="$('#expand` +
        day.date.replace(/ /g, "").replace(/-/g, "").replace(/:/g, "") +
        `').show()"><center><h4>` +
        timeAgo(Date.parse(day.date + " UTC")) +
        "</h4><br></center>" +
        html +
        "</div>";
      console.log(day.date + " " + JSON.stringify(day.symptom));
    });

    console.log(consultScore);
    if(consultScore >= 25)
    document.getElementById("consult-card").innerHTML =
      "<img src='../assets/img/alert (1).png' style='vertical-align: middle;'></img><b><i>&nbsp; We are concerned about your health status. Please consult a Doctor.</i></b>";
    else
    document.getElementById("consult-card").innerHTML =
      "<img src='../assets/img/tick (1).png' style='vertical-align: middle;'></img><b><i>&nbsp; Your health status seems normal.</i></b>";

    myList.forEach((element) => {
      if (element)
        for (var symptom in element) {
          console.log(symptom.date);
        }
    });
    $("#datepicker").datepicker({
      beforeShowDay: function (date) {
        {
          for (var i = 0; i < arr.length; i++) {
            if (new Date(arr[i]).toString() == date.toString()) {
              return [true, "specialDate"];
            }
          }
          return [true];
        }
      },
    });

    function highLight(date) {
      for (var i = 0; i < arr.length; i++) {
        console.log(
          date.getFullYear() +
            "/" +
            (date.getMonth() + 1) +
            "/" +
            date.getDate()
        );
        if (
          arr[i] ==
          date.getFullYear() +
            "/" +
            (date.getMonth() + 1) +
            "/" +
            date.getDate()
        ) {
          return [true, "ui-state-holiday"];
        }
      }
      return [true];
    }
    console.log(arr);
    /* alert(data); */ // show response from the php script.
  },
});

/* $.ajax({
  type: "GET",
  url: "../php_scripts/symptom_heatmap.php",
  success: function (data) {
    console.log(data);
    console.log(JSON.parse(data));
   
  },
}); */

function buildHtmlTable(selector) {
    var columns = addAllColumnHeaders(myList, selector);

    for (var i = 0; i < myList.length; i++) {
        var row$ = $('<tr/>');
        for (var colIndex = 0; colIndex < columns.length; colIndex++) {

            var cellValue = getCellValue(myList[i], columns[colIndex]);
            if (cellValue == null)
                cellValue = "";
            row$.append($('<td/>').html(cellValue));
        }
        $(selector).append(row$);

        
    }
    $('th').each(function() {
        var text = $(this).text();
        $(this).text(text.replace(/symptom/g, "")); 
        text = $(this).text();
        $(this).text(text.replace(/-/g, " ")); 
        text = $(this).text();
        $(this).text(text.replace(/_/g, " ")); 
        text = $(this).text();
        $(this).text(capitalizeFirstLetter(text)); 
    });
}

function capitalizeFirstLetter(str) {
    return str.replace(/\w\S*/g, function(txt){
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
  }
  
  console.log(capitalizeFirstLetter('foo')); // Foo


function addAllColumnHeaders(myList, selector) {
    var columnSet = [];
    var headerTr$ = $('<tr/>');

    for (var i = 0; i < myList.length; i++) {
        var rowHash = myList[i];

        recursiveHeaderCheck(rowHash, selector, "", columnSet, headerTr$);
    }
    $(selector).prepend("<thead>");
    $(selector).append(headerTr$);
    $(selector).append("</thead>");

    return columnSet;
}


function recursiveHeaderCheck(ListElement, selector, parentKeyname, columnSet, headerTr$) {

    if (typeof ListElement === 'object') {
        if (parentKeyname != '')
            parentKeyname = parentKeyname + '-';
        for (var key in ListElement) {
            var keyname = parentKeyname + key;
            recursiveHeaderCheck(ListElement[key], selector, keyname, columnSet, headerTr$);
        }
    } else {
        if ($.inArray(parentKeyname, columnSet) == -1) {
            columnSet.push(parentKeyname);
            headerTr$.append($("<th/>").html(parentKeyname) );
           
        }
    }

}

function getCellValue(nestedStructure, columnHeader) {
    var subElement = nestedStructure;
    var subHeaders = columnHeader.split("-");
    for (var k = 0; k < subHeaders.length; k++) {
        if (typeof subElement === 'object' && subElement != null)
            subElement = subElement[subHeaders[k]];
    }
    return subElement;
}
function highLight(date) {
  for (var i = 0; i < arr.length; i++) {
    if (new Date(arr[i]).toString() == date.toString()) {
      return [true, "ui-state-holiday"];
    }
  }
  return [true];
}

function timeAgo(someDateInThePast) {
  var result = "";
  var difference = Date.now() - someDateInThePast;

  if (difference < 5 * 1000) {
    return "just now";
  } else if (difference < 90 * 1000) {
    return "moments ago";
  }

  //it has minutes
  if ((difference % 1000) * 3600 > 0) {
    if (Math.floor((difference / 1000 / 60) % 60) > 0) {
      let s = Math.floor((difference / 1000 / 60) % 60) == 1 ? "" : "s";
      result = `${Math.floor((difference / 1000 / 60) % 60)} minute${s} `;
    }
  }

  //it has hours
  if ((difference % 1000) * 3600 * 60 > 0) {
    if (Math.floor((difference / 1000 / 60 / 60) % 24) > 0) {
      let s = Math.floor((difference / 1000 / 60 / 60) % 24) == 1 ? "" : "s";
      result =
        `${Math.floor((difference / 1000 / 60 / 60) % 24)} hour${s}${
          result == "" ? "" : " "
        } ` ;
    }
  }

  //it has days
  if ((difference % 1000) * 3600 * 60 * 24 > 0) {
    if (Math.floor(difference / 1000 / 60 / 60 / 24) > 0) {
      let s = Math.floor(difference / 1000 / 60 / 60 / 24) == 1 ? "" : "s";
      result =
        `${Math.floor(difference / 1000 / 60 / 60 / 24)} day${s}${
          result == "" ? "" : " "
        } ` ;
    }
  }

  return result + " ago";
}