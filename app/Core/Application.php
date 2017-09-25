<?php
/**
 * Created by PhpStorm.
 * User: petrvohralik
 * Date: 25.09.17
 * Time: 14:26
 */

namespace App\Core;


use App\Controllers\Error;
use App\Controllers\Home;

class Application
{

    /**
     * @var null The Controller loaded by url
     */
    private $controller = null;

    /**
     * @var null Action loaded by url
     */
    private $action = null;

    /**
     * @var array URL parameters loaded by url
     */
    private $params = [];

    public function __construct()
    {

        $this->_getUrlWithoutModRewrite();

        // Check if controller is set
        if (!$this->controller) {
            $page = new Home();
            $page->index();
        } else{
            $page = new Error();
            $page->index();
        }
    }

    private function _getUrlWithoutModRewrite()
    {

        // TODO the "" is weird
        // get URL ($_SERVER['REQUEST_URI'] gets everything after domain and domain ending), something like
        // array(6) { [0]=> string(0) "" [1]=> string(9) "index.php" [2]=> string(10) "controller" [3]=> string(6) "action" [4]=> string(6) "param1" [5]=> string(6) "param2" }
        // split on "/"
        $url = explode('/', $_SERVER['REQUEST_URI']);
        // also remove everything that's empty or "index.php", so the result is a cleaned array of URL parts, like
        // array(4) { [2]=> string(10) "controller" [3]=> string(6) "action" [4]=> string(6) "param1" [5]=> string(6) "param2" }
        $url = array_diff($url, array('', 'index.php'));
        // to keep things clean we reset the array keys, so we get something like
        // array(4) { [0]=> string(10) "controller" [1]=> string(6) "action" [2]=> string(6) "param1" [3]=> string(6) "param2" }
        $url = array_values($url);

        // if first element of our URL is the sub-folder (defined in config/config.php), then remove it from URL
        if (defined('URL_SUB_FOLDER') && !empty($url[0]) && $url[0] === URL_SUB_FOLDER) {
            // remove first element (that's obviously the sub-folder)
            unset($url[0]);
            // reset keys again
            $url = array_values($url);
        }
        // Put URL parts into according properties
        // By the way, the syntax here is just a short form of if/else, called "Ternary Operators"
        // @see http://davidwalsh.name/php-shorthand-if-else-ternary-operators
        $this->url_controller = isset($url[0]) ? $url[0] : null;
        $this->url_action = isset($url[1]) ? $url[1] : null;
        // Remove controller and action from the split URL
        unset($url[0], $url[1]);
        // Rebase array keys and store the URL params
        $this->url_params = array_values($url);
    }

}