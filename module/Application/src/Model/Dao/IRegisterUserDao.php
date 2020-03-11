<?php
/**
 * Created by PhpStorm.
 * User: marcela.llanos
 * Date: 3/6/2020
 * Time: 10:22 AM
 */

namespace Application\Model\Dao;

use Application\Model\Entity\User;

interface IRegisterUserDao
{
    public function fetchAll();
    public function getById($id);
    public function saveData(User $user);
    public function delete(User $user);
}