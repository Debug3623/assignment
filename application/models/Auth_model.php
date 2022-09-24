<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $today =  date('Y-m-d');
    }

         /*
        |----------------------------------------------------------------------
        | Get Customers Profile
        |----------------------------------------------------------------------
        */

        public function getCustomerProfile($userId)
        {
            $newpath = base_url('uploads/');
            $feilds = "id,name,email,mobile,address,CONCAT('$newpath','',image) as image";
            $data = $this->api->getSingleRecordWhere('customers', array('id' => $userId), $feilds);
            if (!empty($data)) {
                return $data;
            } else {
                return false;
            }
        }

       /*
        |----------------------------------------------------------------------
        |  @getSupplierProfile Get Supplier Profile
        |----------------------------------------------------------------------
        */

    public function getUserProfile($id)
    {
        $newpath = base_url('uploads/');
        $fields= "users.id,users.fname,users.lname,users.dob,users.address,concat('$newpath',users.image) as image,accessToken,users.created_at,";
        $field= "devices.id,devices.mac_address,devices.device_type,devices.device_id";
        //$user=array();
        $user= $this->api->getSingleRecordWhere('users',array('id'=>$id),$fields);

        //checking users
        if(empty($user))
        {
            $this->api->print_error('No user found');
        }
 
        return $user;

    }

      public function getSupplier($userId)
    {
        $newpath = base_url('uploads/');
        $feilds = "id,name,email,password,brand_name,CONCAT('$newpath','/',image) as image";
        $data = $this->api->getSingleRecordWhere('users', array('id' => $userId, 'user_type' => 1), $feilds);
        if (!empty($data)) {
            return $data;
        } else
            return false;
    }

        /*
    |----------------------------------------------------------------------
    | @getCustomerBySuppliers Get Customers
    |----------------------------------------------------------------------
    */

    public function getCustomerBySuppliers($userId)
    {
        $newpath = base_url('uploads/');
        $feilds = "id,name,email,mobile,address,CONCAT('$newpath','',image) as image";
        $data = $this->api->getMultipleRecordWhere('customers', array('user_id' => $userId), $feilds);
        if (!empty($data)) {
            return $data;
        } else
            return false;
    }
}
