<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jmeno = $_POST['jmeno'];
    $prijmeni = $_POST['prijmeni'];
    $telefon = $_POST['telefon'];
    $postic = $_POST['postic'];
    $pocet = $_POST['pocet'];
    $podpis = $_POST['podpis'];

    $webhookurl = "https://discord.com/api/webhooks/1125901813506383954/-FpGALCMIJax5Gh5dDsZ0QD_HzJD0pfBsHe72anYoSAhICZssiIP3FIN82o-bvCoC515";

    $data = array(
        "content" => "Nová objednávka:\nJméno: $jmeno\nPříjmení: $prijmeni\nTelefon: $telefon\nPost.ic: $postic\nPočet kusů: $pocet\nPodpis: $podpis"
    );

    $curl = curl_init($webhookurl);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($curl);
    curl_close($curl);

}
?>
