<?php
    header("Content-Type: text/html; charset=utf8");
    $kurXML = @simplexml_load_file("https://www.tcmb.gov.tr/kurlar/today.xml") or die("Hata: XML dosyası yüklenemedi.");
    //print_r($kurXML);

    $arrayKur = array(); $index = 0;

    foreach ($kurXML->Currency as $Currency) {
        $newKur = array( 
            'Isim'=> strval($Currency->Isim), 
            'CurrencyName'=> strval($Currency->CurrencyName), 
            'ForexBuying'=> strval($Currency->ForexBuying),
            'ForexSelling'=> strval($Currency->ForexSelling),
            'BanknoteBuying'=> strval($Currency->BanknoteBuying),
            'BanknoteSelling'=> strval($Currency->BanknoteSelling),
            'CrossRateUSD'=> strval($Currency->CrossRateUSD),
            'CrossRateOther'=> strval($Currency->CrossRateOther)       
        );
        $arrayKur[$index] = $newKur;
        //array_push($arrayKur, $newKur);
        $index++;
    }

    if (!empty($arrayKur) && $arrayKur != null) {
        $json["TCMB_AnlikKurBilgileri"] = $arrayKur;
        echo json_encode($json);
    }
    
?>


<?php 
/*
$name;
    $CurrencyName;
    $ForexBuying; $ForexSelling;
    $BanknoteBuying; $BanknoteSelling;
    $CrossRateUSD; $CrossRateOther;
echo $name = $Currency->Isim.'<br>';
        echo $CurrencyName = $Currency->CurrencyName.'<br>';
        echo $ForexBuying = $Currency->ForexBuying.'<br>';
        echo $ForexSelling = $Currency->ForexSelling.'<br>';
        echo $BanknoteBuying = $Currency->BanknoteBuying.'<br>';
        echo $BanknoteSelling = $Currency->BanknoteSelling.'<br>';
        echo $CrossRateUSD = $Currency->ForexBuying.'<br>';
        echo $CrossRateOther = $Currency->ForexSelling.'<br>';
        echo "<hr>";
*/
?>