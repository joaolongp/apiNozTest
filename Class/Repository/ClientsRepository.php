<?php


namespace Repository;


use DB\Database;
use http\Exception\InvalidArgumentException;
use Util\UtilGenericConstants;

class ClientsRepository
{
    private object $Database;
    public const TABLE = "clients";

    /**
     * ClientsRepository constructor.
     */
    public function __construct()
    {
        $this->Database = new Database();
    }

    /**
     * @param $name
     */
    public function getAllClients($name){
        if($name){
            $searchData = 'SELECT * FROM ' .self::TABLE;
            $stmt = $this->getDatabase()->getDb()->prepare($searchData);
            $stmt->bindValue(':name', $name);
            $stmt->execute();
        }
        else{throw new InvalidArgumentException(UtilGenericConstants::MSG_NON_RETURN_ERROR);
        }
    }
    /**
     * @return Database|object
     */
    public function getDatabase()
    {
        return $this->Database;
    }
}