<?php
/**
 * Created by PhpStorm.
 * User: marcela.llanos
 * Date: 3/6/2020
 * Time: 10:16 AM
 */

namespace Application\Controller;


use Application\Model\Dao\IRegisterUserDao;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class RegisterControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $controller = null;

        switch ($requestedName)
        {
            case RegisterController::class :
                $userDao = $container->get(IRegisterUserDao::class);
                $controller = new RegisterController($userDao);
                break;
        }

        return $controller;
    }
}