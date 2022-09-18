<?php
namespace App\Repository;

interface RepositoryInterface{
    /**
     * Get All
     * @return mixed
     */
    public function getAll();

    /**
     * Find by id
     * @param $id
     * @return mixed
     */
    public function findById();

    /**
     * Create
     * @param $attribute=[]
     * @return mixed
     */
    public function create($attribute =[]);

    /**
     * update by id
     * @param $id
     * @param array $attribute=[]
     */
    public function update($id,$attribute=[]);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
