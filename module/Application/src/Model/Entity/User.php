<?php
/**
 * Created by PhpStorm.
 * User: marcela.llanos
 * Date: 3/6/2020
 * Time: 10:27 AM
 */

namespace Application\Model\Entity;


use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class User implements InputFilterAwareInterface
{
    protected $id;
    protected $name;
    protected $lastname;
    protected $country;
    protected $city;
    protected $email;
    protected $password;
    protected $interest;
    protected $inputFilter;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * @param mixed $interest
     */
    public function setInterest($interest)
    {
        $this->interest = $interest;
    }



    public function exchangeArray($data)
    {
        $this->id = (isset($data['id']))? $data['id'] : null;
        $this->name = (isset($data['name']))? $data['name'] : null;
        $this->lastname = (isset($data['lastname']))? $data['lastname'] : null;
        $this->country = (isset($data['country']))? $data['country'] : null;
        $this->city = (isset($data['city']))? $data['city'] : null;
        $this->email = (isset($data['email']))? $data['email'] : null;
        $this->password = (isset($data['password']))? $data['password'] : null;
        $this->interest = (isset($data['interest']))? $data['interest'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter)
        {
            $inputFilter = new InputFilter();
            $inputFilter->add([ 'name' => 'id', 'required' => true, 'filters' => [['name' => 'Int' ]]]);
            $inputFilter->add(['name' => 'name',
                'required' => true,
                'filters' => [
                    ['name' => 'StripTags' ],
                    ['name' => 'StringTrim']
                ],
                'validators' => [
                    ['name' => 'StringLength', 'options' => ['encoding' => 'UTF-8', 'min' => 1, 'max' => 100]]]]);

            $inputFilter->add(['name' => 'lastname',
                'required' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim']
                ],
                'validators' => [
                    ['name' => 'StringLength', 'options' => ['encoding' => 'UTF-8', 'min' => 1, 'max' => 100]]]]);

            $inputFilter->add(['name' => 'city',
                'required' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim']
                ],
                'validators' => [
                    ['name' => 'StringLength', 'options' => ['encoding' => 'UTF-8', 'min' => 1, 'max' => 100]]]]);

            $inputFilter->add(['name' => 'email',
                'required' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim']
                ],
                'validators' => [
                    ['name' => 'StringLength', 'options' => ['encoding' => 'UTF-8', 'min' => 1, 'max' => 100]]]]);


            $inputFilter->add(['name' => 'password',
                'required' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim']
                ],
                'validators' => [
                    ['name' => 'StringLength', 'options' => ['encoding' => 'UTF-8', 'min' => 1, 'max' => 100]]]]);

            $inputFilter->add(['name' => 'country',
                'required' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim']
                ],
                'validators' => [
                    ['name' => 'StringLength', 'options' => ['encoding' => 'UTF-8', 'min' => 1, 'max' => 100]]]]);

            $inputFilter->add(['name' => 'interest',
                'required' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim']
                ],
                'validators' => [
                    ['name' => 'StringLength', 'options' => ['encoding' => 'UTF-8', 'min' => 1, 'max' => 100]]]]);

            return $this->$inputFilter;
        }
    }

    /**
     * Set input filter
     *
     * @param  InputFilterInterface $inputFilter
     * @return InputFilterAwareInterface
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        // TODO: Implement setInputFilter() method.
    }
}