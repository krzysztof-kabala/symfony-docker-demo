<?php
namespace App\Service;

use App\Entity;
use App\Repository;

class DataService
{
    /** @var \App\Repository\DataRepository */
    private $dataRepo;

    /**
     * DataService constructor.
     * @param \App\Repository\DataRepository $dataRepo
     */
    public function __construct(Repository\DataRepository $dataRepo)
    {
        $this->dataRepo = $dataRepo;
    }

    public function addData(string $name)
    {
        $data = new Entity\Data();
        $data->setName($name);

        $this->dataRepo->save($data);
    }

    /**
     * @return Entity\Data[]
     */
    public function getDataList(): array
    {
        return $this->dataRepo->findAll();
    }
}