<?php

class HomeController {

    public function index()
    {
      include __DIR__."/../views/index.php";
    }
    
    public function testnow()
    {
      include __DIR__."/../views/test.php";
      // echo "dsdfsfsd";
    }
    public function zonepage()
    {
      include __DIR__."/../views/zone.php";
      // echo "dsdfsfsd";
    }
}