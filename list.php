<?php
    require('views/shared/header.php');

    $listID = $_GET['varname'];

    // Your Access Key ID, as taken from the Your Account page
    $access_key_id = "AKIAIWRKOEYXIFRTO3YA";

    // Your Secret Key corresponding to the above ID, as taken from the Your Account page
    $secret_key = "jVrzm5flGmyv1qYx7154pI26s+UK740ZJzhmli73";

    // The region you are interested in
    $endpoint = "webservices.amazon.ca";

    $uri = "/onca/xml";

    $params = array(
        "Service" => "AWSECommerceService",
        "Operation" => "ItemSearch",
        "AWSAccessKeyId" => "AKIAIWRKOEYXIFRTO3YA",
        "AssociateTag" => "vulist-20",
        "SearchIndex" => "All",
        "ResponseGroup" => "Images,ItemAttributes,Offers",
        "Keywords" => "oculus"
    );

    // Set current timestamp if not set
    if (!isset($params["Timestamp"])) {
        $params["Timestamp"] = gmdate('Y-m-d\TH:i:s\Z');
    }

    // Sort the parameters by key
    ksort($params);

    $pairs = array();

    foreach ($params as $key => $value) {
        array_push($pairs, rawurlencode($key)."=".rawurlencode($value));
    }

    // Generate the canonical query
    $canonical_query_string = join("&", $pairs);

    // Generate the string to be signed
    $string_to_sign = "GET\n".$endpoint."\n".$uri."\n".$canonical_query_string;

    // Generate the signature required by the Product Advertising API
    $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $secret_key, true));

    // Generate the signed URL
    $request_url = 'http://'.$endpoint.$uri.'?'.$canonical_query_string.'&Signature='.rawurlencode($signature);
?>

<h4>WOW HERE IS LIST ID: <?php echo $listID ?></h4>
<div id="amazon-content-search"></div>
<input type="hidden" id="urlBox" value="<?php echo $request_url ?>">
<input type="text" id="searchBox" onchange="getAmazonData()">
<div class="amazon-results-container">
    <div class="amazon-product-container"></div>
    <div class="amazon-product-container"></div>
    <div class="amazon-product-container"></div>
    <div class="amazon-product-container"></div>
    <div class="amazon-product-container"></div>
    <div class="amazon-product-container"></div>
    <div class="amazon-product-container"></div>
    <div class="amazon-product-container"></div>
    <div class="amazon-product-container"></div>
    <div class="amazon-product-container"></div>
</div>

<?php
    require('views/shared/footer.php');
?>