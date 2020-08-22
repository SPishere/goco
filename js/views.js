var slider = document.getElementById("breathingrange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;
var symptom_json = {};
slider.oninput = function () {
  output.innerHTML = this.value;
};

function showhide(id) {
  var x = document.getElementById(id);
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

document.getElementById("submit").onclick = function () {
  if (document.getElementById("coughmenu").style.display != "none") {
    symptom_json.cough={};
    symptom_json.cough.frequency = document.querySelector(
      'input[name="coughfreq"]:checked'
    ).value;
    symptom_json.cough.type = document.querySelector(
      'input[name="coughtype"]:checked'
    ).value;
  }
  if (document.getElementById("breathemenu").style.display != "none") {
    symptom_json.breathing = {};
    symptom_json.breathing.severity = document.getElementById(
      "breathingrange"
    ).value;
  }
  if (document.getElementById("fevermenu").style.display != "none") {
    symptom_json.fever = {};
    symptom_json.fever.temperature = document.getElementById("temp").value;
  }
  if (document.getElementById("chestmenu").style.display != "none") {
    symptom_json.chest_pain = {};
    symptom_json.chest_pain.type = {};
    symptom_json.chest_pain.type = document.querySelector(
      'input[name="chesttype"]:checked'
    ).value;
  }
  if (document.getElementById("digestion").checked) {
    symptom_json.sore_throat = "Yes";
  }
  $.ajax({
    type: "POST",
    url: "../php_scripts/symptom_update.php",
    data: JSON.stringify(symptom_json),
    success: function (data) {
      alert("Symptom Added!");
      window.history.back();
      /* alert(data); */ // show response from the php script.
    },
  });

  console.log(symptom_json)
};
