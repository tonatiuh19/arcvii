<?php
require_once('../../admin/cn.php');
require_once("conekta/lib/Conekta.php");
\Conekta\Conekta::setApiKey("key_zwJjJqVK8WC3v4uWrMczHA");
\Conekta\Conekta::setApiVersion("2.0.0");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = $_POST["conektaTokenId"];
  $monto = $_POST["monto"]*100;
  $projectid = $_POST["project"];
  $derivable = $_POST["deliverable"];
  $correo = $_POST["correo"];

}
else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>

    window.location.href='../';
    </SCRIPT>");

  }



$sql = "SELECT id_project, email_user, b.nombre, b.apellido,b.telefono FROM projects_candidates as a INNER JOIN user as b on a.email_user=b.email WHERE a.status=1 and a.id_project=".$projectid."";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $sql6 = "SELECT nombre, apellido, email, telefono FROM user WHERE email='".$correo."'";
      $result6 = $conn->query($sql6);

      if ($result6->num_rows > 0) {
          // output data of each row
          while($row6 = $result6->fetch_assoc()) {
              $nombreA=$row6["nombre"]." ".$row6["apellido"];
            $telefono = $row6["telefono"];
          }
      } else {
          echo "aaa";
      }

          $correo;
         try{
            $order = \Conekta\Order::create(
              array(
                "line_items" => array(
                  array(
                    "name" => "reserva,".$reserva."",
                    "unit_price" => $monto,
                    "quantity" => 1
                  )//first line_item
                ), //line_items

                "currency" => "MXN",
                "customer_info" => array(
                  "name" => "".$nombreA."" ,
                  "email" => $correo,
                  "phone" => $telefono
                ),
                "metadata" => array("reference" => "12987324097", "more_info" => "lalalalala"),
                "charges" => array(
                    array(
                        "payment_method" => array(
                            //"monthly_installments" => 3,
                            "type" => "card",
                            "token_id" => "".$name.""              ) //payment_method - use customer's default - a card
                          //to charge a card, different from the default,
                          //you can indicate the card's source_id as shown in the Retry Card Section
                    ) //first charge
                ) //charges
              )//order
            );
            $val = 0;
          } catch (\Conekta\ProcessingError $error){
            $val = 1;
            echo "ProcessingError";
            echo $error->getMessage();
          } catch (\Conekta\ParameterValidationError $error){
            echo "ParameterValidationError";
            echo $error->getMessage();
            $val = 1;
          } catch (\Conekta\Handler $error){

            echo $error->getMessage();
            $val = 1;
          }


          /*try {
             $customer = \Conekta\Customer::create(
             [
                "name" => "".$nombreA."",
                "email" => "".$correo."",
                "phone" => "".$telefono."",
                "metadata" => ["reference" => "12987324097", "random_key" => "random value"],
                "payment_sources" => [
                  [
                      "type" => "card",
                      "token_id" => "".$name.""
                  ]
                ]
              ]
            );
          } catch (\Conekta\ProccessingError $error){
            echo $error->getMesage();
          } catch (\Conekta\ParameterValidationError $error){
            echo $error->getMessage();
          } catch (\Conekta\Handler $error){
            echo $error->getMessage();
          }
          echo $customer."<br>";
          $data = json_decode($customer);
          print_r($data);
          echo $data->parent_id[0];
          echo "<br>";
          //Implementation of an order charge
          try{
            $order = \Conekta\Order::create(
              [
                "line_items" => [
                  [
                    "name" => "entregable,".$reserva."",
                    "unit_price" => $monto,
                    "quantity" => 1
                  ]
                ],
                 //shipping_lines - physical goods only
                "currency" => "MXN",
                "customer_info" => [
                  "customer_id" => "".$customer.""
                ],

                "metadata" => ["reference" => "12987324097", "more_info" => "lalalalala"],
                "charges" => [
                  [
                    "payment_method" => [
                      "type" => "card",
                      "token_id" => "".$name.""
                    ] //payment_method - use customer's default - a card
                      //to charge a card, different from the default,
                      //you can indicate the card's source_id as shown in the Retry Card Section
                  ]
                ]
              ]
            );
          } catch (\Conekta\ProcessingError $error){
            echo $error->getMessage();
          } catch (\Conekta\ParameterValidationError $error){
            echo $error->getMessage();
          } catch (\Conekta\Handler $error){
            echo $error->getMessage();
          } echo "ID: ". $order->id;
          echo "Status: ". $order->payment_status;
          echo "$". $order->amount/100 . $order->currency;
          echo "Order";
          echo $order->line_items[0]->quantity .
                "-". $order->line_items[0]->name .
                "- $". $order->line_items[0]->unit_price/100;
          echo "Payment info";
          echo "CODE:". $order->charges[0]->payment_method->auth_code;
          echo "Card info:".
                "- ". $order->charges[0]->payment_method->name .
                "- ". $order->charges[0]->payment_method->last4 .
                "- ". $order->charges[0]->payment_method->brand .
                "- ". $order->charges[0]->payment_method->type;*/



          if ($val == 1) {
                echo "<form action=\"../sorry/\" id=\"my_form\" method=\"post\">\n";
                echo "  <input type=\"hidden\" name=\"error\" value=\"".$error->getMessage()."\">\n";
                echo "<input type='submit' name='btnSignIn' value='Cargando...' id='btnSignIn' />\n";
                echo "</form>\n";
                echo "<script type=\"text/javascript\">\n";
                //echo "    document.getElementById('btnSignIn').click();\n";
                echo "</script>\n";
          }else if($val == 0){
            "ID: ". $order->id;
            "Status: ". $order->payment_status;
            "$". $order->amount/100 . $order->currency;
            "Order";
            $order->line_items[0]->quantity .
                  "-". $order->line_items[0]->name .
                  "- $". $order->line_items[0]->unit_price/100;
            "Payment info";
            "CODE:". $order->charges[0]->payment_method->auth_code;
            "Card info:".
                  "- ". $order->charges[0]->payment_method->name .
                  "- ". $order->charges[0]->payment_method->last4 .
                  "- ". $order->charges[0]->payment_method->brand .
                  "- ". $order->charges[0]->payment_method->type;

           $sql = "INSERT INTO payconek (order_id, amount, customer_id, name, code, card_info, type, id_project, status, id_deliverable)
            VALUES ('".$order->id."', '".$order->amount."', '".$order->currency."','".$order->line_items[0]->name."','".$order->charges[0]->payment_method->auth_code."', '".$order->charges[0]->payment_method->last4 .
            "- ". $order->charges[0]->payment_method->brand .
            "- ". $order->charges[0]->payment_method->type."','2','".$projectid."','".$order->payment_status."','".$derivable."')";

            if ($conn->query($sql) === TRUE) {
              $sql3 = "UPDATE deliverables SET status='1' WHERE id=".$derivable."";

              if ($conn->query($sql3) === TRUE) {
                echo "<form action=\"../admin/success/\" id=\"my_form\" method=\"post\">\n";
                echo "  <input type=\"hidden\" name=\"reserva\" value=\"".$projectid."\">\n";
                echo "  <input type=\"hidden\" name=\"referencia\" value=\"".$order->id."\">\n";

                echo "  <input type=\"hidden\" name=\"nombre\" value=\"".$nombreA."\">\n";
                echo "  <input type=\"hidden\" name=\"correo\" value=\"".$correo."\">\n";
                echo "<input type='submit' name='btnSignIn' value='Cargando...' id='btnSignIn' />\n";
                echo "</form>\n";
                echo "<script type=\"text/javascript\">\n";
                echo "    document.getElementById('btnSignIn').click();\n";
                echo "</script>\n";
              } else {
                  echo "Error updating record: " . $conn->error;
              }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }
    }
} else {
    echo "no entra";
}






  ?>
