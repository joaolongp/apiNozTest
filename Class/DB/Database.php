<?php

namespace DB;

use InvalidArgumentException;
use PDO;
use PDOException;
use Util\UtilGenericConstants;

class Database
{
    private object $db;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->db = $this->setDataBase();
    }

    /**
     * @return PDO
     */
    public function setDataBase()
    {
        try {
            return new PDO(
                'mysql:host=' . HOST . '; dbname=' . DATABASE . ';', USER, PASSWORD
            );
        } catch (PDOException $exception) {
            throw new PDOException($exception->getMessage());
        }
    }

    /**
     * @param $table
     * @param $cpf
     * @return string
     */
    public function deleteClientWithoutDependent($table, $cpf)
    {
        $searchDelete = 'DELETE FROM ' . $table . ' WHERE cpf = :cpf';
        if ($table && $cpf) {
            $this->db->beginTransaction();
            $stmt = $this->db->prepare($searchDelete);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $this->db->commit();
                return UtilGenericConstants::MSG_DELETED_SUCCESS;
            }
            $this->db->rollBack();
            throw new InvalidArgumentException(UtilGenericConstants::MSG_NON_RETURN_ERROR);
        }
        throw new InvalidArgumentException(UtilGenericConstants::MSG_GENERIC_ERROR);
    }

    /**
     * @param $table
     * @return array
     */
    public function getAllClients($table)
    {
        if ($table) {
            $search = 'SELECT * FROM ' . $table;
            $stmt = $this->db->query($search);
            $clients = $stmt->fetchAll($this->db::FETCH_ASSOC);
            if (is_array($clients) && count($clients) > 0) {
                return $clients;
            }
        }
        throw new InvalidArgumentException(UtilGenericConstants::MSG_NON_RETURN_ERROR);
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function getOneByKey($table,$cpf)
    {
        if ($table && $cpf) {
            $search = 'SELECT * FROM ' . $table . ' WHERE cpf = :cpf';
            $stmt = $this->db->prepare($search);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->execute();
            $totalClients = $stmt->rowCount();
            if ($totalClients === 1) {
                return $stmt->fetch($this->db::FETCH_ASSOC);
            }
            throw new InvalidArgumentException(UtilGenericConstants::MSG_NON_RETURN_ERROR);
        }

        throw new InvalidArgumentException(UtilGenericConstants::MSG_NON_RETURN_ERROR);
    }

    /**
     * @return object|PDO
     */
    public function getDb()
    {
        return $this->db;
    }
}