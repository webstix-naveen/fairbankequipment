<?php
/**
 * Template Name:epicor
 */
?>
<?php get_header(); ?>

    <?php
        echo "<h1>Fairbank Equipment</h1>";


        define("YOUR_USERNAME","SessionToken");
        define("TOKENID","DipEj7%2FAszJDya3uipkt6uzWvW2Lswh0gIR4uRAiTifq0e20HBRKw%2BLhLSNehyRH85gEnoLgecX8YXPrpdpe27uyy1MXWdtbW3ShsSEJd2jTwamiIzjx3exHRTCW6gYV");        

        //$apiUrl = 'http://10.1.32.99:5000/Products/BasicInformation';
        //$apiUrl = 'http://10.1.32.99:5000/Products/81375';
        //$apiUrl = 'http://10.1.32.99:5000/Products?pageSize=10&includeTotalItems=true';
        //$apiUrl = 'http://10.1.32.99:5000/Users?includeTotalItems=true';
        //$apiUrl = 'http://10.1.32.99:5000/Customers?startIndex=1&pageSize=2&includeTotalItems=true';
        $apiUrl = 'http://10.1.32.99:5000/Contacts?includeTotalItems=true';

        $args = array(
            'headers' => array(
                //'Accept' => 'application/json',
                //'Authorization' => 'Basic ' . base64_encode( YOUR_USERNAME . ':' . YOUR_PASSWORD )
		        //'SessionToken' => 'DipEj7%2FAszJDya3uipkt6uzWvW2Lswh0gIR4uRAiTifq0e20HBRKw%2BLhLSNehyRH85gEnoLgecX8YXPrpdpe27uyy1MXWdtbW3ShsSEJd2jTwamiIzjx3exHRTCW6gYV'
                'Content-Type' => 'application/json',
                'Authorization' => 'SessionToken ' . TOKENID
            )
        );
        $response = wp_remote_get($apiUrl, $args);
        $responseBody = wp_remote_retrieve_body( $response );
        $result = json_decode( $responseBody );

        echo "<pre>";
        print_r($result);
        echo "</pre>";
    

        if ( is_array( $result ) && !is_wp_error( $result ) ) {
            // Work with the $result data
            echo "Success!!";
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        } else {
            // Work with the error
            echo "Failed!!";
        }
    ?>

<?php get_footer(); ?>