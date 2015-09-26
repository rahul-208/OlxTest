<?php 

echo "<h2>Facebook Like List</h2>";
echo "<ul>";
foreach ($data['getLikes']['data'] as $like) {
    echo "<li>" . $like['name'] . "</li>";
}
echo "<ul>";

//foreach ($data['getLikes']['data'] as $like) {
//
//    $curl = curl_init();
//    // Set some options - we are passing in a useragent too here
//    curl_setopt_array($curl, array(
//        CURLOPT_RETURNTRANSFER => 1,
//        CURLOPT_URL => 'http://olx.in/all-results/q-' . $like['name'].'/',
//    ));
//    // Send the request & save response to $resp
//    $resp = curl_exec($curl);
//    echo $resp;
//    // Close request to clear up some resources
//    curl_close($curl);die;
//
//}
