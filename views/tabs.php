<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script defer src="theme.js"></script>
  <link rel="stylesheet" href="../style.css" />
  <link rel="stylesheet" href="../css/views.css" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="../js/jquery-ui.min.css" integrity="sha256-rByPlHULObEjJ6XQxW/flG2r+22R5dKiAoef+aXWfik=" crossorigin="anonymous" />
</head>

<body onLoad="$('#loading').hide()">
  <?php session_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  if (!$_SESSION["authenticated_user_id"]) {
    header("Location: ../index.html");
    exit();
  }

  ?>
  <nav class="navbar">
    <ul class="navbar-nav">
      <li class="logo">
        <a href="#" class="nav-link">
          <span class="link-text logo-text">GoCo</span>
          <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="angle-double-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x">
            <g class="fa-group">
              <path fill="currentColor" d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z" class="fa-secondary"></path>
              <path fill="currentColor" d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z" class="fa-primary"></path>
            </g>
          </svg>
        </a>
      </li>

      <!-- <li class="nav-item">
        <a href="#" class="nav-link">
          <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="news" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-news fa-w-16 fa-5x" onclick="opentab(event, 'feedrss')">
            <g class="fa-group">
              <path fill="currentColor" d="M552 64H88c-13.255 0-24 10.745-24 24v8H24c-13.255 0-24 10.745-24 24v272c0 30.928 25.072 56 56 56h472c26.51 0 48-21.49 48-48V88c0-13.255-10.745-24-24-24zM56 400a8 8 0 0 1-8-8V144h16v248a8 8 0 0 1-8 8zm236-16H140c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm208 0H348c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm-208-96H140c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm208 0H348c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm0-96H140c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h360c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12z" class="fa-secondary"></path>

            </g>
          </svg>
          <span class="link-text" id="feedbutton" onclick="opentab(event, 'feedrss')">News Feed</span>
        </a>
      </li> -->

      <li class="nav-item">
        <a href="#" class="nav-link">
          <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="thermometer-full" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-thermometer-full fa-w-18 fa-9x" onclick="opentab(event, 'symptom_tracker')">
            <g class="fa-group">
              <path fill="currentColor" d="M616,304a24,24,0,1,0-24-24A24,24,0,0,0,616,304ZM552,416a24,24,0,1,0,24,24A24,24,0,0,0,552,416Zm-64-56a24,24,0,1,0,24,24A24,24,0,0,0,488,360ZM616,464a24,24,0,1,0,24,24A24,24,0,0,0,616,464Zm0-104a24,24,0,1,0,24,24A24,24,0,0,0,616,360Zm-64-40a24,24,0,1,0,24,24A24,24,0,0,0,552,320Zm-74.78-45c-21-47.12-48.5-151.75-73.12-186.75A208.13,208.13,0,0,0,234.1,0H192C86,0,0,86,0,192c0,56.75,24.75,107.62,64,142.88V512H288V480h64a64,64,0,0,0,64-64H320a32,32,0,0,1,0-64h96V320h32A32,32,0,0,0,477.22,275ZM288,224a32,32,0,1,1,32-32A32.07,32.07,0,0,1,288,224Z" class="fa-secondary"></path>

            </g>
          </svg>
          <span class="link-text" onclick="opentab(event, 'symptom_tracker')" id="my-symptoms">My Symptoms</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">
          <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="head-side-cough" role="img" xmlns="cough-svgrepo-com.svg" viewBox="0 0 512 512" class="svg-inline--fa fa-head-side-cough fa-w-16 fa-9x" onclick="opentab(event, 'heatmap')">
            <g class="fa-group">
              <path fill="currentColor" d="M248 8C111.03 8 0 119.03 0 256s111.03 248 248 248 248-111.03 248-248S384.97 8 248 8zm-11.34 240.23c-2.89 4.82-8.1 7.77-13.72 7.77h-.31c-4.24 0-8.31 1.69-11.31 4.69l-5.66 5.66c-3.12 3.12-3.12 8.19 0 11.31l5.66 5.66c3 3 4.69 7.07 4.69 11.31V304c0 8.84-7.16 16-16 16h-6.11c-6.06 0-11.6-3.42-14.31-8.85l-22.62-45.23c-2.44-4.88-8.95-5.94-12.81-2.08l-19.47 19.46c-3 3-7.07 4.69-11.31 4.69H50.81C49.12 277.55 48 266.92 48 256c0-110.28 89.72-200 200-200 21.51 0 42.2 3.51 61.63 9.82l-50.16 38.53c-5.11 3.41-4.63 11.06.86 13.81l10.83 5.41c5.42 2.71 8.84 8.25 8.84 14.31V216c0 4.42-3.58 8-8 8h-3.06c-3.03 0-5.8-1.71-7.15-4.42-1.56-3.12-5.96-3.29-7.76-.3l-17.37 28.95zM408 358.43c0 4.24-1.69 8.31-4.69 11.31l-9.57 9.57c-3 3-7.07 4.69-11.31 4.69h-15.16c-4.24 0-8.31-1.69-11.31-4.69l-13.01-13.01a26.767 26.767 0 0 0-25.42-7.04l-21.27 5.32c-1.27.32-2.57.48-3.88.48h-10.34c-4.24 0-8.31-1.69-11.31-4.69l-11.91-11.91a8.008 8.008 0 0 1-2.34-5.66v-10.2c0-3.27 1.99-6.21 5.03-7.43l39.34-15.74c1.98-.79 3.86-1.82 5.59-3.05l23.71-16.89a7.978 7.978 0 0 1 4.64-1.48h12.09c3.23 0 6.15 1.94 7.39 4.93l5.35 12.85a4 4 0 0 0 3.69 2.46h3.8c1.78 0 3.35-1.18 3.84-2.88l4.2-14.47c.5-1.71 2.06-2.88 3.84-2.88h6.06c2.21 0 4 1.79 4 4v12.93c0 2.12.84 4.16 2.34 5.66l11.91 11.91c3 3 4.69 7.07 4.69 11.31v24.6z" class="fa-secondary"></path>

            </g>
          </svg>
          <span class="link-text" onclick="opentab(event, 'heatmap')">Heatmap</span>
        </a>
      </li>

      <!--  <li class="nav-item">
        <a href="#" class="nav-link">
          <svg
            aria-hidden="true"
            focusable="false"
            data-prefix="fad"
            data-icon="contact"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 640 512"
            class="svg-inline--fa fa-chat fa-w-20 fa-5x"
            onclick="opentab(event, 'chat')"
          >
            <g class="fa-group">
              <path
                fill="currentColor"
                d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"
                class="fa-secondary"
              ></path>
            
            </g>
          </svg>
          <span class="link-text" onclick="opentab(event, 'chat')">Live Chat</span>
        </a>
      </li>
 -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="contact" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-contact fa-w-20 fa-5x" onclick="opentab(event, 'contact')">
            <g class="fa-group">
              <path fill="currentColor" d="M97.333 506.966c-129.874-129.874-129.681-340.252 0-469.933 5.698-5.698 14.527-6.632 21.263-2.422l64.817 40.513a17.187 17.187 0 0 1 6.849 20.958l-32.408 81.021a17.188 17.188 0 0 1-17.669 10.719l-55.81-5.58c-21.051 58.261-20.612 122.471 0 179.515l55.811-5.581a17.188 17.188 0 0 1 17.669 10.719l32.408 81.022a17.188 17.188 0 0 1-6.849 20.958l-64.817 40.513a17.19 17.19 0 0 1-21.264-2.422zM247.126 95.473c11.832 20.047 11.832 45.008 0 65.055-3.95 6.693-13.108 7.959-18.718 2.581l-5.975-5.726c-3.911-3.748-4.793-9.622-2.261-14.41a32.063 32.063 0 0 0 0-29.945c-2.533-4.788-1.65-10.662 2.261-14.41l5.975-5.726c5.61-5.378 14.768-4.112 18.718 2.581zm91.787-91.187c60.14 71.604 60.092 175.882 0 247.428-4.474 5.327-12.53 5.746-17.552.933l-5.798-5.557c-4.56-4.371-4.977-11.529-.93-16.379 49.687-59.538 49.646-145.933 0-205.422-4.047-4.85-3.631-12.008.93-16.379l5.798-5.557c5.022-4.813 13.078-4.394 17.552.933zm-45.972 44.941c36.05 46.322 36.108 111.149 0 157.546-4.39 5.641-12.697 6.251-17.856 1.304l-5.818-5.579c-4.4-4.219-4.998-11.095-1.285-15.931 26.536-34.564 26.534-82.572 0-117.134-3.713-4.836-3.115-11.711 1.285-15.931l5.818-5.579c5.159-4.947 13.466-4.337 17.856 1.304z" class="fa-secondary"></path>

            </g>
          </svg>
          <span class="link-text" onclick="opentab(event, 'contact')">Contact Us</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">
          <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="account" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-contact fa-w-20 fa-5x" onclick="opentab(event, 'account')">
            <g class="fa-group">
              <path fill="currentColor" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z" class="fa-secondary"></path>

            </g>
          </svg>
          <span class="link-text" onclick="opentab(event, 'account')">Account </span>
        </a>
      </li>


      <li class="nav-item">
        <a href="#" class="nav-link">
          <svg onclick="window.location.href='../php_scripts/logout.php'" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="power-off" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-power-off fa-w-20 fa-5x">
            <g class="fa-group">
              <path fill="currentColor" d="M400 54.1c63 45 104 118.6 104 201.9 0 136.8-110.8 247.7-247.5 248C120 504.3 8.2 393 8 256.4 7.9 173.1 48.9 99.3 111.8 54.2c11.7-8.3 28-4.8 35 7.7L162.6 90c5.9 10.5 3.1 23.8-6.6 31-41.5 30.8-68 79.6-68 134.9-.1 92.3 74.5 168.1 168 168.1 91.6 0 168.6-74.2 168-169.1-.3-51.8-24.7-101.8-68.1-134-9.7-7.2-12.4-20.5-6.5-30.9l15.8-28.1c7-12.4 23.2-16.1 34.8-7.8zM296 264V24c0-13.3-10.7-24-24-24h-32c-13.3 0-24 10.7-24 24v240c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24z" class="fa-secondary"></path>

            </g>
          </svg>
          <span class="link-text" onclick="window.location.href='logout.php'"> Logout </span>
        </a>
      </li>
    </ul>
  </nav>

  <main>
    <!-- Tab content -->
    <!--  <div id="feed">

 </div> -->

    <div id="heatmap" class="tabcontent">
      <iframe id="worldmeter" class="heatmap" src="https://who.sprinklr.com/"></iframe>
    </div>

    <div id="chat" class="tabcontent">
      <iframe id="botchat" class="chat" src="https://covid.deepset.ai/"></iframe>
    </div>

    <div id="feedrss" class="tabcontent">
      <div id="feed">

      </div>
    </div>

    <div id="symptom_tracker" class="tabcontent">
      </br> </br>
      <h1>How are you feeling today?</h1>
      <div id="consult-card" class="card"></div>
      <div id="symptom-cards" class="symptom-cards">

      </div>
      </br> </br>
      <center>
        <button type="button" class="button" onclick="window.location.href='symptom_tracker.html'"><b>Add Symptom</b></button>
      </center>
    </div>

    <div id="account" class="tabcontent">
      </br>
      <div class="card" style="padding: 64px; text-align: center">

        <?php
        require("../config.inc.php");

        $servername = $config_server_name;
        $username = $config_username;
        $password = $config_password;
        $dbname = $config_db_name;

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users WHERE id=" . $_SESSION["authenticated_user_id"];
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

          // output data of each row
          while ($row = $result->fetch_assoc()) {
            if ($row['gender'] === "female") { ?>
              <center> <img src="../assets/img/female.png"></img><br><br>
              <?php
            } else { ?>
                <center> <img src="../assets/img/male.png"></img><br><br>
                <?php
              }
              echo "<h3>" . $row['first_name'] . " " . $row['last_name'] . "</h3><br><br>";
              /* echo "<br>"; */
                ?> <i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $row['email'];
                                                                      echo "<br>";
                                                                      ?> <i class="fa fa-phone" aria-hidden="true"></i> <?php echo $row['phone'];
                                                                        echo "<br>";
                                                                        ?> <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row['city'] . ", " . $row['state'] . ", " . $row['country'];
                                                                        echo "<br><br>";
                                                                        echo "Joined on " . $row['reg_date'] . "</center>";
                                                                      }
                                                                    } else {
                                                                      echo "false";
                                                                    }
                                                                    $conn->close();
                                                                        ?>
      </div>
      </br>
    </div>



    <div id="contact" class="tabcontent">
      <h3>Contact Details - India</h3> </br>
      <DIV id="page_1">


        <P class="p0 ft1">Central Helpline Number for <NOBR>corona-virus:</NOBR> - <NOBR><SPAN class="ft0">+91-11-23978046</SPAN></NOBR>
        </P>
        <P class="p1 ft2">Helpline Numbers of States & Union Territories (UTs)</P>
        <TABLE cellpadding=0 cellspacing=0 class="t0">
          <TR>
            <TD class="tr0 td0">
              <P class="p2 ft3">S. No</P>
            </TD>
            <TD class="tr0 td1">
              <P class="p3 ft3">Name of the State</P>
            </TD>
            <TD class="tr0 td2">
              <P class="p3 ft3">Helpline Nos.</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td3">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td4">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td5">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">1</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Andhra Pradesh</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">
                <NOBR>0866-2410978</NOBR>
              </P>
            </TD>
          </TR>
          <TR>
            <TD class="tr3 td9">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td10">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td11">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">2</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Arunachal Pradesh</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">9436055743</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">3</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Assam</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">6913347770</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr3 td9">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td10">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td11">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">4</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Bihar</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">104</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">5</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Chhattisgarh</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">104</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr0 td6">
              <P class="p2 ft5">6</P>
            </TD>
            <TD class="tr0 td7">
              <P class="p3 ft5">Goa</P>
            </TD>
            <TD class="tr0 td8">
              <P class="p3 ft5">104</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr4 td6">
              <P class="p2 ft5">7</P>
            </TD>
            <TD class="tr4 td7">
              <P class="p3 ft5">Gujarat</P>
            </TD>
            <TD class="tr4 td8">
              <P class="p3 ft5">104</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr5 td9">
              <P class="p4 ft7">&nbsp;</P>
            </TD>
            <TD class="tr5 td10">
              <P class="p4 ft7">&nbsp;</P>
            </TD>
            <TD class="tr5 td11">
              <P class="p4 ft7">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr0 td6">
              <P class="p2 ft5">8</P>
            </TD>
            <TD class="tr0 td7">
              <P class="p3 ft5">Haryana</P>
            </TD>
            <TD class="tr0 td8">
              <P class="p3 ft5">8558893911</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">9</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Himachal Pradesh</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">104</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr0 td6">
              <P class="p2 ft5">10</P>
            </TD>
            <TD class="tr0 td7">
              <P class="p3 ft5">Jharkhand</P>
            </TD>
            <TD class="tr0 td8">
              <P class="p3 ft5">104</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">11</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Karnataka</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">104</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">12</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Kerala</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">
                <NOBR>0471-2552056</NOBR>
              </P>
            </TD>
          </TR>
          <TR>
            <TD class="tr3 td9">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td10">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td11">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr6 td6">
              <P class="p2 ft5">13</P>
            </TD>
            <TD class="tr6 td7">
              <P class="p3 ft5">Madhya Pradesh</P>
            </TD>
            <TD class="tr6 td8">
              <P class="p3 ft5">104</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr7 td9">
              <P class="p4 ft8">&nbsp;</P>
            </TD>
            <TD class="tr7 td10">
              <P class="p4 ft8">&nbsp;</P>
            </TD>
            <TD class="tr7 td11">
              <P class="p4 ft8">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">14</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Maharashtra</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">
                <NOBR>020-26127394</NOBR>
              </P>
            </TD>
          </TR>
          <TR>
            <TD class="tr3 td9">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td10">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td11">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">15</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Manipur</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">3852411668</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr4 td6">
              <P class="p2 ft5">16</P>
            </TD>
            <TD class="tr4 td7">
              <P class="p3 ft5">Meghalaya</P>
            </TD>
            <TD class="tr4 td8">
              <P class="p3 ft5">108</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td9">
              <P class="p4 ft9">&nbsp;</P>
            </TD>
            <TD class="tr2 td10">
              <P class="p4 ft9">&nbsp;</P>
            </TD>
            <TD class="tr2 td11">
              <P class="p4 ft9">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">17</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Mizoram</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">102</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr3 td9">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td10">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td11">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">18</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Nagaland</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">7005539653</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">19</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Odisha</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">9439994859</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr3 td9">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td10">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td11">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">20</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Punjab</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">104</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">21</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Rajasthan</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">
                <NOBR>0141-2225624</NOBR>
              </P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr8 td6">
              <P class="p2 ft5">22</P>
            </TD>
            <TD class="tr8 td7">
              <P class="p3 ft5">Sikkim</P>
            </TD>
            <TD class="tr8 td8">
              <P class="p3 ft5">104</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr0 td9">
              <P class="p4 ft9">&nbsp;</P>
            </TD>
            <TD class="tr0 td10">
              <P class="p4 ft9">&nbsp;</P>
            </TD>
            <TD class="tr0 td11">
              <P class="p4 ft9">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">23</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Tamil Nadu</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">
                <NOBR>044-29510500</NOBR>
              </P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr0 td6">
              <P class="p2 ft5">24</P>
            </TD>
            <TD class="tr0 td7">
              <P class="p3 ft5">Telangana</P>
            </TD>
            <TD class="tr0 td8">
              <P class="p3 ft5">104</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">25</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Tripura</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">
                <NOBR>0381-2315879</NOBR>
              </P>
            </TD>
          </TR>
          <TR>
            <TD class="tr3 td9">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td10">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td11">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">26</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Uttarakhand</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">104</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">27</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Uttar Pradesh</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">18001805145</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr0 td6">
              <P class="p2 ft5">28</P>
            </TD>
            <TD class="tr0 td7">
              <P class="p3 ft5">West Bengal</P>
            </TD>
            <TD class="tr0 td8">
              <P class="p3 ft5">1800313444222, 03323412600,</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td12">
              <P class="p2 ft3">S. No</P>
            </TD>
            <TD class="tr2 td13">
              <P class="p3 ft3">Name of Union Territory (UT)</P>
            </TD>
            <TD class="tr2 td14">
              <P class="p3 ft3">Helpline Nos.</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td3">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td4">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td5">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD rowspan=2 class="tr8 td6">
              <P class="p2 ft5">1</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Andaman and Nicobar Islands</P>
            </TD>
            <TD rowspan=2 class="tr8 td8">
              <P class="p3 ft5">
                <NOBR>03192-232102</NOBR>
              </P>
            </TD>
          </TR>

          <TR>
            <TD class="tr10 td9">
              <P class="p4 ft12">&nbsp;</P>
            </TD>
            <TD class="tr10 td10">
              <P class="p4 ft12">&nbsp;</P>
            </TD>
            <TD class="tr10 td11">
              <P class="p4 ft12">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">2</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Chandigarh</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">9779558282</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr3 td9">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td10">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td11">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr11 td6">
              <P class="p2 ft5">3</P>
            </TD>
            <TD class="tr11 td7">
              <P class="p3 ft5">Dadra and Nagar Haveli and Daman & Diu</P>
            </TD>
            <TD class="tr11 td8">
              <P class="p3 ft5">104</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr4 td9">
              <P class="p4 ft9">&nbsp;</P>
            </TD>
            <TD class="tr4 td10">
              <P class="p4 ft9">&nbsp;</P>
            </TD>
            <TD class="tr4 td11">
              <P class="p4 ft9">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">4</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Delhi</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">
                <NOBR>011-22307145</NOBR>
              </P>
            </TD>
          </TR>
          <TR>
            <TD class="tr3 td9">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td10">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td11">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">5</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Jammu & Kashmir</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">01912520982, <NOBR>0194-2440283</NOBR>
              </P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">6</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Ladakh</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">01982256462</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr3 td9">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td10">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
            <TD class="tr3 td11">
              <P class="p4 ft6">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">7</P>
            </TD>
            <TD class="tr2 td7">
              <P class="p3 ft5">Lakshadweep</P>
            </TD>
            <TD class="tr2 td8">
              <P class="p3 ft5">104</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr1 td9">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td10">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
            <TD class="tr1 td11">
              <P class="p4 ft4">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr2 td6">
              <P class="p2 ft5">8</P>
            </TD>
            <TD rowspan=2 class="tr8 td7">
              <P class="p3 ft5">Puducherry</P>
            </TD>
            <TD rowspan=2 class="tr8 td8">
              <P class="p3 ft5">104</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr5 td6">
              <P class="p4 ft7">&nbsp;</P>
            </TD>
          </TR>
          <TR>
            <TD class="tr0 td9">
              <P class="p4 ft9">&nbsp;</P>
            </TD>
            <TD class="tr0 td10">
              <P class="p4 ft9">&nbsp;</P>
            </TD>
            <TD class="tr0 td11">
              <P class="p4 ft9">&nbsp;</P>
            </TD>
          </TR>
        </TABLE>
      </DIV>
      </br>
      </br>
      <h3> Contact GoCo team</h3>
      </br>
      <p> Email ID: goco2info@gmail.com </p>
    </div>

    <div class="footer">
      <p>(C) 2020 GOCO</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!--     <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
     <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha256-KM512VNnjElC30ehFwehXjx1YCHPiQkOPmqnrWtpccM=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../js/tabs.js"></script>
    <script src="../js/list.js"></script>

  </main>
</body>

</html>