<?php

class Cekresi extends CI_Controller
{
    function index()
    {
        $this->load->library('libresi');
        $GTrack = new Libresi();
        echo '<pre>';
        $cek    = $GTrack->tiki('660003808552');

        var_dump($cek);
    }
}
