<?php

require_once APPPATH . "/third_party/GTrack/GTrack.php";
use GTrack\GTrack;

class Libresi extends GTrack
{
    public function __construct()
    {
        parent::__construct();
        $resi = new GTrack();
    }
}
