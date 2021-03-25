<?php
session_start();
require_once('../../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $folderId = test_input($_POST["folderId"]);

  $folder_path = "../../../admin/attach/".$folderId."/";
  if (!file_exists($folder_path)) {
    mkdir($folder_path, 0777, true);
  }

  $filename = basename($_FILES['fileToUpload']['name']);
   $newname = $folder_path . $filename;
   $fileOk = 1;
   $types = array('image/jpeg', 'application/pdf', 'image/jpg');

   if (($_FILES['fileToUpload']['type'] == "application/pdf") || ($_FILES["fileToUpload"]["type"] == "image/jpeg") || ($_FILES["fileToUpload"]["type"] == "image/jpg"))
   {
       if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $newname))
       {
         $fileOk = 1;
         echo "<form action=\"../\" id=\"my_form\" method=\"post\">\n";
         echo "  <input type=\"hidden\" name=\"project\" value=\"".$folderId."\">\n";
         //echo "  <input type=\"hidden\" name=\"email\" value=\"".$viaje."\">\n";
         echo "<input type='submit' name='btnSignIn' value='Saving...' id='btnSignIn' />\n";
         echo "</form>\n";
         echo "<script type=\"text/javascript\">\n";
         echo "    document.getElementById('btnSignIn').click();\n";
         echo "</script>\n";

       }
       else
       {
         echo "<form action=\"../\" id=\"my_form\" method=\"post\">\n";
         echo "  <input type=\"hidden\" name=\"project\" value=\"".$folderId."\">\n";
         //echo "  <input type=\"hidden\" name=\"email\" value=\"".$viaje."\">\n";
         echo "<input type='submit' name='btnSignIn' value='...' id='btnSignIn' />\n";
         echo "</form>\n";
         echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Solo se permiten archivos PDF & JPG.')
           document.getElementById('btnSignIn').click();
           </SCRIPT>");
       }
   }
   else
   {
     $fileOk = 0;
     echo "<form action=\"../\" id=\"my_form\" method=\"post\">\n";
     echo "  <input type=\"hidden\" name=\"project\" value=\"".$folderId."\">\n";
     //echo "  <input type=\"hidden\" name=\"email\" value=\"".$viaje."\">\n";
     echo "<input type='submit' name='btnSignIn' value='...' id='btnSignIn' />\n";
     echo "</form>\n";
     echo ("<SCRIPT LANGUAGE='JavaScript'>
       window.alert('Solo se permiten archivos PDF & JPG.')
       document.getElementById('btnSignIn').click();
       </SCRIPT>");
   }

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
