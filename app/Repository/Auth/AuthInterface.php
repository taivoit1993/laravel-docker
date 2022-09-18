<?php
namespace App\Repository\Auth;

use App\Repository\RepositoryInterface;

interface AuthInterface extends RepositoryInterface{
    /**
     * Interface Api Register
     * @param array $attribute
     * @return mixed
     */
    public function register($attribute = []);

    /**
     * Interface APi Login
     * @param $attribute
     * @return mixed
     */
    public function login($attribute = []);

}
