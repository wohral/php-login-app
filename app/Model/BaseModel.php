<?php
/**
 * Created by PhpStorm.
 * User: petrvohralik
 * Date: 26.09.17
 * Time: 16:25
 */

namespace App\Model;


class BaseModel
{

    /**
     * BaseModel constructor.
     * @param PDO $db
     */
    public function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (\PDOException $exception) {
            exit('Database connection could not be established');
        }
    }

}