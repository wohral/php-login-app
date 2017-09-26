<?php
/**
 * Created by PhpStorm.
 * User: petrvohralik
 * Date: 25.09.17
 * Time: 14:40
 */

namespace App\Controllers;

use App\Core\Controller;

class Users extends Controller
{
    public function __construct()
    {
        parent::__construct();



        
    }

    public function index()
    {


        require APP . 'views/_layout/header.php';
        require APP . 'views/users/index.php';
        require APP . 'views/_layout/footer.php';
    }

}