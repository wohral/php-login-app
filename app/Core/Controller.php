<?php
/**
 * Created by PhpStorm.
 * User: petrvohralik
 * Date: 25.09.17
 * Time: 14:26
 */

namespace App\Core;


use App\Model\BaseModel;
use \PDO as PDO;

class Controller
{

    /**
     * @var PDO Database connection
     */
    public $db = null;

    /**
     * @var null Model
     */
    public $model = null;

    public function __construct()
    {
        $this->_openDatabaseConnection();
        $this->loadModel();
    }

    public function loadModel()
    {
        $this->model = new BaseModel($this->db);
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function _openDatabaseConnection()
    {
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ];

        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);
    }

}