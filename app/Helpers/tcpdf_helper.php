<?php

if (!function_exists('load_tcpdf')) {
    function load_tcpdf()
    {
        // Carga TCPDF
        require_once APPPATH . 'ThirdParty/tcpdf/tcpdf.php';
    }
}
