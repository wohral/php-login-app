<?php
/**
 * Created by PhpStorm.
 * User: petrvohralik
 * Date: 25.09.17
 * Time: 14:40
 */

namespace App\Controllers;

use App\Core\Controller;

class Home extends Controller
{

    public function index()
    {
        require APP . 'views/_layout/header.php';
        require APP . 'views/home/index.php';
        require APP . 'views/_layout/footer.php';
    }

}