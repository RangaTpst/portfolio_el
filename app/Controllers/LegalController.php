<?php

namespace App\Controllers;

require_once '../app/Controllers/BaseController.php';

class LegalController extends BaseController
{
    public function mentions()
    {
        $this->render('legal.php');
    }

    public function privacy()
    {
        $this->render('privacy.php');
    }
    public function sitemap()
    {
        $this->render('structure.php');
    }

}
