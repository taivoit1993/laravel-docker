<?php
namespace App\Repository;

abstract class BaseRepository implements RepositoryInterface{
    protected $model;
    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel(){
        $this->model = app()->make($this->getModel());
    }
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function findById()
    {
        // TODO: Implement findById() method.
    }

    public function create($attribute = [])
    {
        // TODO: Implement create() method.
    }

    public function update($id, $attribute = [])
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
