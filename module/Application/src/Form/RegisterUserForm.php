<?php
/**
 * Created by PhpStorm.
 * User: marcela.llanos
 * Date: 3/6/2020
 * Time: 11:11 AM
 */

namespace Application\form;


use Zend\Form\Element;
use Zend\Form\Form;

class RegisterUserForm extends Form
{

    public function __construct($name = null)
    {
        parent::__construct($name);

        $id = new Element\Hidden('id');
        $this->add($id);

        $name = new Element\Text('name');
        $name->setLabel('Name')
             ->setLabelAttributes(['class' => 'control-label col-sm-2']);
        $name->setAttributes([
            'class' => 'form-control',
            'placeholder' => 'Enter your name. Ex.:Mariana'
        ]);
        $this->add($name);

        $lastname = new Element\Text('lastname');
        $lastname->setLabel('Lastname')->setLabelAttributes(['class' => 'control-label col-sm-2']);
        $lastname->setAttributes([
            'class' => 'form-control',
            'placeholder' => 'Enter your lastname. Ex.:'
        ]);
        $this->add($lastname);

        $country = new Element\Text('country');
        $country->setLabel('Country')->setLabelAttributes(['class' => 'control-label col-sm-2']);
        $country->setAttributes([
            'class' => 'form-control',
            'placeholder' => 'Enter your Country. Ex.:'
        ]);
        $this->add($country);

        $city = new Element\Text('city');
        $city->setLabel('City')->setLabelAttributes(['class' => 'control-label col-sm-2']);
        $city->setAttributes([
            'class' => 'form-control',
            'placeholder' => 'Enter your city. Ex.:'
        ]);
        $this->add($city);

        $email = new Element\Email('email');
        $email->setLabel('Email')->setLabelAttributes(['class' => 'control-label col-sm-2']);
        $email->setAttributes([
            'class' => 'form-control',
            'placeholder' => 'Enter your email. Ex.:'
        ]);
        $this->add($email);

        $password = new Element\Password('password');
        $password->setLabel('Password')->setLabelAttributes(['class' => 'control-label col-sm-2']);
        $password->setAttributes([
            'class' => 'form-control',
            'placeholder' => 'Enter a password.'
        ]);
        $this->add($password);

        $interest = new Element\Text('interest');
        $interest->setLabel('Interest')->setLabelAttributes(['class' => 'control-label col-sm-2']);
        $interest->setAttributes([
            'class' => 'form-control',
            'placeholder' => 'Enter what are you interest for.'
        ]);
        $this->add($interest);

        $button = new Element\Button('create');
        $button->setAttributes([
            'value' => 'Create',
            'class' => 'btn btn-primary',
            'type' => 'Submit',
            'id' => 'submitButton'
        ]);
        $this->add($button);
    }
}