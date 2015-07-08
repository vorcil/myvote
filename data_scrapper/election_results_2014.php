<?php
/*
 * By Luke Hardiman
 * Basic CSV scrapper to json output for data of 2014 elections
 * http://myvote.nzhost.me/data_scrapper/election_results_2014.php
 * this put the CSV data into a nice readable json output that we can apply jquery plotter
 */

$election_feed ="http://www.electionresults.govt.nz/electionresults_2014/e9/csv/e9_part4.csv";

//check if we have already a csv file if not download file gets refreshed every 24hrs
$csv = file_get_contents("election_results_2014.csv");
if (!$csv){
    $csv = file_get_contents($election_feed);
    $file = fopen("election_results_2014.csv","w");
    fwrite($file,$csv);
    fclose($file);
}

//explode into array
$data = array_map("str_getcsv", explode("\n", $csv));

//****cleanup data

//remove top header of csv
unset($data[0]);

//remove ending blank
if (count($data[count($data)]) <= 1)
    unset($data[count($data)]);

//sort the data
$the_election = array();

//print_r($the_election);exit;
$collection = array();

//preset out keys as array keys
foreach($data[1] as $index => $value){
    //set the value as key
    $collection[$value] = "";
}
//preset the how many collections we have
$collect_count = count($collection);
//git rid of main keys
unset($data[1]);

//keeping up with me :)
//loop all the data we have and merge them into the correct keys
foreach($data as $array_index => $election_data){

    //only merge if the data matches
    if (count($election_data) > $collection_count)
        foreach($election_data as $index => $value){
            $location = $data[$array_index][0];

            if ($index > 0){
                $key = returnKey($index);
                $collection[$key][$location] = $value;
            }


        }

}

function returnKey($count){
    global $collection;
    $counter  = 1;
    foreach($collection as $index => $key){
       // echo $index."\n";
        if ($counter == ($count + 1)) {
            return $index;
        }
        $counter++;
    }


}


//print_r($data);
$response['data'] = $collection;

$response = json_encode($response);

header('Access-Control-Allow-Origin: *');
header('Content-Type:  application/json');

echo isset($_GET['callback'])
    ? "{$_GET['callback']}($response)"
    : $response;

exit; //kill from other processing
?>