<?php

/*
 * Following code will get single product details
 * A product is identified by product id (pid)
 */

// array for JSON response
$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// check for post data
if (isset($_GET["idadmin"])) {


    $idadmin = $_GET['idadmin'];

    // get a product from products table
    $result = mysql_query("SELECT * FROM admin WHERE idadmin = $idadmin");

    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {

            $result = mysql_fetch_array($result);

            $product = array();
            $product["idadmin"] = $result["idadmin"];
            $product["adminname"] = $result["adminname"];
            $product["fullname"] = $result["fullname"];
            $product["Phone"] = $result["Phone"];
	    $product["Email"] = $result["Email"];
            // success
            $response["success"] = 1;

            // user node
            $response["camnangs"] = array();

            array_push($response["camnangs"], $product);

            // echoing JSON response
            echo json_encode($response);
        } else {
            // no product found
            $response["success"] = 0;
            $response["message"] = "No user found";

            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "No user found";

        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>
