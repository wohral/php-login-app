<?php
/**
 * Created by PhpStorm.
 * User: petrvohralik
 * Date: 25.09.17
 * Time: 14:40
 */

namespace App\Controllers;

use App\Core\Controller;

class Error extends Controller
{

    public function index()
    {

        dump('Welcome to home');

        die();

    }

}