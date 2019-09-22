<?php

$src = "/home/jw/sites/mish/_posts/knowledge/";
$files = glob("${src}*.md");
rnfiles($files, "K", $src);

$src = "/home/jw/sites/mish/_posts/products/";
$files = glob("${src}*.md");
rnfiles($files, "P", $src);

function rnfiles($files, $type, $src) {
    $newf = null;
    $cmd = null;

    foreach ($files as $f) {
// org name        
        $f = str_replace($src, "", $f);
        $fparts = explode("-", $f);
        $_y = $fparts[0];
        $_m = $fparts[1];
        $_d = $fparts[2];
        $_type = $fparts[3];
        $_num = $fparts[4];
        $_num = str_replace(".md", "", $_num);

        $repstr = "${_y}-${_m}-${_d}-${_type}-${_num}";

// new name        

        $newdate = explode("-", randomDate("10 September 2018", "now"));
        $_ny = $newdate[0];
        $_nm = $newdate[1];
        $_nd = $newdate[2];
        $_ntype = $fparts[3];
        $_nnum = $fparts[4];
        $_nnum = str_replace(".md", "", $_nnum);
        $nrepstr = "${_ny}-${_nm}-${_nd}-${_ntype}-${_nnum}";

        $newf = "${nrepstr}.md";



        $cmd = "mv ${src}${f} ${src}${newf}\n";
        $cmd .= "perl -pi -e 's/${repstr}/${nrepstr}/gmi' ${src}*.md\n";

        print $cmd . "\n";

//    var_export($fparts);
    }
}

function randomDate($sStartDate, $sEndDate, $sFormat = 'Y-m-d') {
    // Convert the supplied date to timestamp
    $fMin = strtotime($sStartDate);
    $fMax = strtotime($sEndDate);
    // Generate a random number from the start and end dates
    $fVal = mt_rand($fMin, $fMax);
    // Convert back to the specified date format
    return date($sFormat, $fVal);
}
