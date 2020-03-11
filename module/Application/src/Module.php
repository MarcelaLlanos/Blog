<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Model\Dao\IRegisterUserDao;
use Application\Model\Dao\RegisterUserDao;
use Application\Model\Entity\User;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\ServiceManager;

class Module
{
    const VERSION = '3.1.3';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'RegisterTableGateway' => function (ServiceManager $serviceManager)
                {
                    $dbAdapter = $serviceManager->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new User());
                    return new TableGateway('user', $dbAdapter, null, $resultSetPrototype);
                },
                IRegisterUserDao::class => function(ServiceManager $serviceManager){
                    $tableGateway = $serviceManager->get('RegisterTableGateway');
                    $dao = new RegisterUserDao($tableGateway);
                    return $dao;
                }
            ]
        ];
    }
}
