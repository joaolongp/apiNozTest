<?php


namespace Service;


use http\Exception\InvalidArgumentException;
use Repository\ClientsRepository;
use Util\UtilGenericConstants;

class ClientsService
{

    public const TABLE = 'clients';
    public const DATA_GET = ['list'];

    private array $data = [];

    /**
     * @var object|ClientsRepository
     */
    private object $ClientRepository;

    /**
     * ClientsService constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
        $this->ClientRepository = new ClientsRepository();
    }

    public function validateGet(){
        $return = null;
        $resource = $this->data['resource'];
        if(in_array($resource, self::RESOURCE_GET)){
            $return = $this->data['id'] > 0 ? $this.$this->getOneByKey() : $this->recurso();
        }
        else{
            throw new InvalidArgumentException(UtilGenericConstants::MSG_NONEXISTENT_RESOURCE_ERROR);
        }

        if($return === null){
            throw new InvalidArgumentException(UtilGenericConstants::MSG_GENERIC_ERROR);
        }
    }

    private function getOneByKey(){

    }

    private function list(){
        return $this->ClientRepository->getDatabase()->getAllClients(self::TABLE);
    }

}