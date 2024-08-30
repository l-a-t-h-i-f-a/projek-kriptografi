<?php 
    include "config.php";
    $comment= $_POST['comment'];
    $file= $_POST['file'];


    // enkripsi gambar
    $filecontent = file_get_contents($file);
    $base64 = rtrim(base64_encode($filecontent));
   

    echo $dekrip;




    function Rot13($comment){
        for($i=0; $i < strlen($comment); $i++){
            $c = ord($comment[$i]);
            
            if($c >= ord('n') & $c <= ord('z') | $c >= ord('N') & $c <= ord('Z')){
            $c -= 13;
            }elseif($c >= ord('a') & $c <= ord('m') | $c >= ord('A') & $c <= ord('M')){
            $c += 13;
            }
            $comment[$i] = chr($c);
        }
        
        return $comment;
    }
    $rot13 = Rot13($comment);
    echo $rot13;
    

        $cipher = "AES-256-CBC";
        $secret = "12345678901234567890123456789012";
        $option = 0;
        $iv = str_repeat("0", openssl_cipher_iv_length($cipher));

        $ciphertext = openssl_encrypt($rot13, $cipher, $secret, $option, $iv);
    

    echo $ciphertext;

   $query = mysqli_query($connection, "INSERT INTO review VALUES ('', '$ciphertext', '$base64')") or die (mysqli_error($connection));

    if($query){
        echo "
            <script>
                alert('Review telah terkirim. Terima kasih atas kepedulian Anda.');
                document.location.href = 'homepage.php';
            </script>
        ";

    }
    else {
            echo "proses gagal";
    }
    
?>