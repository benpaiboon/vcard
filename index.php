<?php
  
  include 'phpqrcode/qrlib.php';

  function genVcard(){
    $filePath = 'vcf/hansak.a.vcf';
    $myfile = fopen($filePath, "w") or die("Unable to open file!");
    
    $firstName = 'Hansak';
    $lastName = 'Aisariyatip';
    $fullname = 'Hansak Aisariyatip';
    $org = 'Asset World Corp Co.,Ltd.';
    $title = 'AVP - Portfolio Project Manager';
    $tel_voice = '022279444';
    $tel_cell = '06840245800';
    $tel_fax = '0226701888';
    $email = 'hansak.a@assetworld.co.th';

    $vcard = "BEGIN:VCARD"."\n";
    $vcard .= "VERSION:3.0"."\n";
    $vcard .= "N:$lastName;$firstName;;"."\n";
    $vcard .= "FN:$fullname"."\n";
    $vcard .= "ORG:$org"."\n";
    $vcard .= "TITLE:$title"."\n";
    $vcard .= "TEL;TYPE=WORK,VOICE:$tel_voice"."\n";
    $vcard .= "TEL;TYPE=WORK,CELL:$tel_cell"."\n";
    $vcard .= "TEL;TYPE=WORK,FAX:$tel_fax"."\n";
    $vcard .= "EMAIL:$email"."\n";  
    $vcard .= "END:VCARD";  
    // echo $vcard;

    fwrite($myfile, $vcard);
    fclose($myfile);

    return $vcard;
  }
  
  // Gen QR Code
  $imgPath = 'qrcode/hansak.a';
  $qrcodePath = $imgPath.'.png';
  $qrcodeRender = genVcard();
  QRcode::png($qrcodeRender, $qrcodePath, "L", 3, 1);

?>

<img src="<?php echo $qrcodePath; ?>"><br><br>
<a href="data:text/plain;charset=UTF-8,<?php echo genVcard(); ?>" download="hansak.a.vcf">Get VCF File</a>