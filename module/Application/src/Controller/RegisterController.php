<?php
/**
 * Created by PhpStorm.
 * User: marcela.llanos
 * Date: 3/6/2020
 * Time: 10:14 AM
 */

namespace Application\Controller;

use Application\Model\Dao\IRegisterUserDao;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\form\RegisterUserForm;
use Application\Model\Entity\User;

class RegisterController extends AbstractActionController
{
    protected $userDao;

    public function __construct(IRegisterUserDao $userDao)
    {
        $this->userDao = $userDao;
    }

    public function indexAction()
    {
        $form = new RegisterUserForm('register');

        $form->get('create')->setValue('Add User');
        $request = $this->getRequest();

        if ($request->isPost())
        {
            $user = new User();
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $user->exchangeArray($form->getData());
                $this->userDao->saveData($user);

                // Redirect to list of albums
                return $this->redirect()->toRoute('application');
            }
        }

        return new ViewModel(['title' => 'Create New User', 'form' => $form]);
    }

    public function addAction()
    {
        $form = new RegisterUserForm();
        $form->get('create')->setValue('Add User');
        $request = $this->getRequest();

        if ($request->isPost())
        {
            $user = new User();
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $user->exchangeArray($form->getData());
                $this->userDao->saveData($user);


                // Redirect to list of albums
                return $this->redirect()->toRoute('application');
            }
        }
        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if (!$id)
        {
            return $this->redirect()->toRoute('application');
        }

        $form = new RegisterUserForm('register');

        $user = $this->userDao->getById($id);

        $form->bind($user);
        $form->get('submit')->setAttribute('value', 'Edit');


        $modelView = new ViewModel(['title' => 'Edit User', 'form' => $form]);
        $modelView->setTemplate('application/register/form');

        return $modelView;
    }

    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if (!$id)
        {
            return $this->redirect()->toRoute('application');
        }

        $user = new User();
        $user->setId($id);

        $this->userDao->delete($user);

        return $this->redirect()->toRoute('application');

    }


}