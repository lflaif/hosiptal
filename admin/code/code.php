<?php
    include 'phpqrcode.php';
    QRcode::png('http://www.baidu.com/', $outfile=false, $level=QR_ECLEVEL_L, $size=9, $margin=10, $saveandprint=false);
?>