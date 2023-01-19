<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h3>Mengunakan metode  Base64, str_rot13, dan Vigenere.</h3>
    <?php 
function char_to_dec($a){
    $i=ord($a);
    if ($i>=97 && $i<=122){
        return ($i-96);
    } else if ($i>=65 && $i<=90){
        return ($i-38);
    } else {
        return null;
    }
}
 
function dec_to_char($a){
    if ($a>=1 && $a<=26){
        return (chr($a+96));
    } else if ($a>=27 && $a<=52){
        return (chr($a+38));
    } else {
        return null;
    }
}
 
function tabel_vigenere_encrypt($a, $b){
    $i=$a+$b-1;
    if ($i>26){
        $i=$i-26;
    }
    return (dec_to_char($i));
}

			$key="SHOLATLAH";
            $plantext="KEMALELFARAOUK";
            $len_key=strlen($key);
            $len_de=strlen($plantext);
            $split_key=str_split($key);
            $split_de=str_split($plantext);
            $i=0;
            echo "<hr><br>"."1. Mengunakan Metode Vigenere dengan key 'Sholatlah' <br>Plaintext = ".$plantext." <br> Chipertext = ";
            for($j=0;$j<$len_de;$j++){
                if ($i==$len_key){
                    $i=0;
                }
                $split_key2[$j]=$split_key[$i];
                $i++;
            }
            for($k=0;$k<$len_de;$k++){
                $a=char_to_dec($split_key2[$k]);
                $b=char_to_dec($split_de[$k]);
                if (($a && $b)!=null){
                    echo (tabel_vigenere_encrypt($a, $b));
                } else {
                    echo $split_de[$k];
                }
            }

            $en64= base64_encode($plantext);
            $enst=str_rot13($plantext);
            echo "<hr><br> 2. Mengunakan Metode Base64 <br> Plaintext = ".$plantext." <br> Chipertext = ".$en64."<br> <hr>3. Mengunakan Metode str_rot13 <br> Plaintext = ".$plantext." <br> Chipertext = ".$enst;

 
 ?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>