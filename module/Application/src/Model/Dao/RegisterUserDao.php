<?php
/**
 * Created by PhpStorm.
 * User: marcela.llanos
 * Date: 3/6/2020
 * Time: 10:25 AM
 */

namespace Application\Model\Dao;


use Application\Model\Entity\User;
use PHPUnit\Framework\Exception;
use Zend\Db\Exception\RuntimeException;
use Zend\Db\TableGateway\TableGateway;
use Zend\Text\Table\Table;

class RegisterUserDao implements IRegisterUserDao
{
    protected $tableGateway;

    /**
     * RegisterUserDao constructor.
     * @param $tableGateway
     */
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();

        return $resultSet;
    }

    public function getById($id)
    {
        $rowset = $this->tableGateway->select(['id' => (int)$id]);
        $row = $rowset->current();

        if (!$row)
        {
            throw  new Exception('Cannot find the register with the id : $id');
        }

        return $row;

    }

    public function saveData(User $user)
    {
        $data = [
            'name' => $user->getName(),
            'lastname' => $user->getLastname(),
            'country' => $user->getCountry(),
            'city' => $user->getCity(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'interest' => $user->getInterest(),
        ];

        $id = $user->getId();
        if ($id == 0)
        {
            $this->tableGateway->insert($data);
        }
        else
        {
            if ($this->getById($id))
            {
                $this->tableGateway->update($data, ['id' => $id]);
            }
            else
            {
                throw new RuntimeException("id user doesn't exist $id");
            }
        }
    }

    public function delete(User $user)
    {
        $this->tableGateway->delete(['id' => $user->getId()]);
    }
}