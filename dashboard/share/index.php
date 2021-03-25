<?php
session_start();
require_once('../../admin/cn.php');
if (isset($_SESSION['email'])){


}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='../sign-in/';
		</SCRIPT>");
}

if ($_SESSION['type_user']=="3") {
	echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='../workplace/';
		</SCRIPT>");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = test_input($_POST["project"]);
  $email = test_input($_POST["email"]);

}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>

    window.location.href='../';
    </SCRIPT>");
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


$sql = "SELECT titulo, descripcion, precio FROM projects where id=".$id."";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<html>
        <head>
          <title>arcvii</title>
          <link href="cover.css" rel="stylesheet">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <!-- You can use Open Graph tags to customize link previews.
            Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
          <meta property="og:url"           content="https://www.arcvii.com/" />
          <meta property="og:type"          content="website" />
          <meta property="og:title"         content="'.$row["titulo"].'" />
          <meta property="og:description"   content="'.$row["descripcion"].'" />
          <meta property="og:image"         content="https://www.arcvii.com/img/logo.png" />
        </head>
        <body>

          <!-- Load Facebook SDK for JavaScript -->
          '; ?>
          <div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
          <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
              <div class="inner">
                <!--<h3 class="masthead-brand">Cover</h3>
                <nav class="nav nav-masthead justify-content-center">
                  <a class="nav-link active" href="#">Home</a>
                  <a class="nav-link" href="#">Features</a>
                  <a class="nav-link" href="#">Contact</a>
                </nav>-->
              </div>
            </header>
<?php echo '
            <main role="main" class="inner cover"><img src="../../img/logo.png" class="img-responsive" style="width:48%">
              <h1 class="cover-heading">'.$row["titulo"].'</h1>
              <p class="lead">'.$row["descripcion"].'</p>
              <p class="lead">
                <div class="fb-share-button"
                  data-href="https://www.arcvii.com/"
                  data-layout="button" data-size="large">
                </div>
              </p>
            </main>

            <footer class="mastfoot mt-auto">
              <!--<div class="inner">
                <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>

              </div>-->
            </footer>
          </div>

          <!-- Your share button code -->



        </body>
        </html>';
    }
} else {
    echo "0 results";
}
$conn->close();

?>
