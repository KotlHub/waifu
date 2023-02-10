<?php

function changeLang($lang) {
    if ($lang == "eng")
    {
        $data = 'ua';
        file_put_contents('language.txt', $data);
    }
    elseif ($lang == "ua")
    {
        $data = 'eng';
        file_put_contents('language.txt', $data);
    }
}

?>