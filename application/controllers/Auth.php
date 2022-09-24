<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public $tab_users = 'users';
    public $tab_devices = 'devices';
    public $tab_customers = 'customers';

    function __construct()
    {
        parent::__construct();
        header('Content-type: application/json');

    }


    /*
   |----------------------------------------------------------------------
   | FUNCTION @checkRequest FOR CHEKCING REQUEST TYPE
   |----------------------------------------------------------------------
   */


    private function checkRequest($method = 'post')
    {
        $response = array();
        if ($this->input->method() != $method) {
            $response['status'] = 500;
            $response['message'] = "Only " . strtoupper($method) . " method allowed for this request";
            echo json_encode($response);
            exit;
        }
    }




    /*
     |----------------------------------------------------------------------
     | FUNCTION @supplierSignup FOR LOGGING USER IN
     |----------------------------------------------------------------------
     */

    /*SignUp User*/
    public function signup()
    {
        extract($_POST);
        //Validating Required Params
        $this->api->verifyRequiredParams(array("fname", "lname", "address", "dob"));

        //email test if already exists
        $get_user = $this->api->getSingleRecordWhere($this->tab_users, array('fname' => $fname));

        if (!$get_user) {

            $accesstoken = $this->api->generateRandomString();
            $image = $this->uploadImage($_FILES);
            $userdata = array('fname' => $fname, 'lname' => $lname,'dob' => $dob, 'address' => $address, 'accessToken' => $accesstoken,'image'=>$image);
         
            $user_id = $this->api->insertGetId($this->tab_users, $userdata);
            $insert_id = $this->db->insert_id();
               $userdataDevice = array('user_id'=>$user_id,'mac_address'=>$mac_address,'device_type'=>$device_type,'device_id'=>$device_id);

            $this->api->insertGetId($this->tab_devices, $userdataDevice);
            $user = $this->auth->getUserProfile($user_id);
            $this->api->successResponseWithData('Registration Successfully', $user);

        } else {

            $this->api->print_error('First Name Already Exist');

        }
    }
  
    private function uploadImage()
    {
        $image = '';

        if (isset($_FILES['image']['name'])) {
            $info = pathinfo($_FILES['image']['name']);
            $ext = $info['extension'];
            $newname = rand(5, 3456) * date(time()) . "." . $ext;
            $target = 'uploads/' . $newname;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $image = $newname;
            }
        }
        return $image;
    }




    /*
 |----------------------------------------------------------------------
 | FUNCTION @socialLogin FOR LOGGING USER IN SOCIAL L0GIN
 |----------------------------------------------------------------------
 */

    public function socialLogin()
    {
        $this->api->verifyRequiredParams(array("social_id", "social_type"));
        $data = $this->input->post(NULL);
        $user = $this->api->getSingleRecordWhere('users', array('social_id' => $data['social_id'], 'user_type' => 1));

        extract($_POST);
        if (empty($user) || count([$user]) <= 0) {
            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $user = $this->api->getSingleRecordWhere('users', array('email' => $_POST['email'], 'user_type' => 1));
            } else {
                $response = array();
                $response['status'] = 205;
                $response['message'] = "Please provide following details to continue.";
                echo json_encode($response);
                exit;
            }
        }
        //  $user_profile = $this->auth->getSupplierProfile($id);

        if (empty($user) || count([$user]) <= 0) {
            $this->api->verifyRequiredParams(array("email"));

            //register social customer start
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < 250; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }
            $accesstoken = $this->api->generateRandomString();

            $emailExist = $this->api->mail_exists($email);
            if ($emailExist) {
                $this->api->print_error("Email exist already against " . $emailExist['social_type']);
            }
            $this->api->verifyRequiredParams(array("name"));

            $user = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => md5($randomString),
                'social_id' => $_POST['social_id'],
                'social_type' => $_POST['social_type'],
            );

            $user['user_type'] = 1;
            $user['accesstoken'] = $accesstoken;
            $id = $this->api->insertData('users', $user);
            $inserted_id = $this->db->insert_id($id);
            // $customer_data = $this->api->getSingleRecordWhere('users', array('id' => $inserted_id));
            $profile = $this->auth->getSupplierProfile($inserted_id);
            if (!empty($profile)) {
                unset($profile->password);
                unset($profile->created_at);
                if ($profile != NULL) {
                    $this->api->successResponseWithData("Signup Successfully", $profile);
                }
            }

        } else {
            unset($user->password);
            unset($user->created_at);
            $user_profile = $this->auth->getSupplierProfile($user->id);
            $this->api->successResponseWithData("Login Successfully", $user_profile);
        }
    }


    /*
  |----------------------------------------------------------------------
  | FUNCTION @forgetPassword FOR Forget Password
  |----------------------------------------------------------------------
  */

    public function forgotPassword()
    {

        extract($_POST);
        $this->api->verifyRequiredParams(array("email"));
        $notExist = $this->api->mail_exists($email);
        if (!$notExist) {
            $this->api->print_error("This Email isnt Registered with any account");
        }

        $_POST['password_reset'] = rand(1000, 9999);
        $subject = 'Forgot Password Code for your account email:' . $_POST['email'];
        $html = '<h4>Here is your code details</h4>
            <table border="0" cellpadding="2" cellspacing="5">
            <tr>
            <td>' . $_POST['password_reset'] . '</td>
            </tr>
            </table>';
        $this->api->sendEmail($email, $subject, $html);
        // print_r($_POST['password_reset']);
        // exit();
        $this->api->updateData($this->tab_users, array('password_reset' => $_POST['password_reset']), array('email' => $email));
        // $id = $this->api->updateData('users', $_POST['password_reset'],array('password_reset'=>0));
        $this->api->successResponse("Email Sent Successfully", "Success");

    }

    /*
|----------------------------------------------------------------------
| FUNCTION @verifyPasswordCode FOR verify rest password Code
|----------------------------------------------------------------------
*/

    public
    function verifyPasswordCode()
    {

        extract($_POST);
        $this->api->verifyRequiredParams(array("password_reset", "email"));

        //user check
        $notExist = $this->api->mail_exists($email);
        if (!$notExist) {
            $this->api->print_error("user not found");
        }

        $user = $this->api->getSingleRecordWhere($this->tab_users, array('password_reset' => $password_reset, 'email' => $email));
        if (empty($user->password_reset)) {
            $this->api->print_error("you have not requested for password reset");
        }
        if ($_POST['password_reset'] != $user->password_reset) {
            $this->api->print_error("code does not match");
        } else {


            $profile = $this->auth->getSupplierProfile($user->id);
            $this->api->successResponseWithData("Code matched Successfully", $profile);
        }

    }

    /*
  |----------------------------------------------------------------------
  | FUNCTION @resetPassword FOR Reset Password
  |----------------------------------------------------------------------
  */

    public
    function resetPassword()
    {
        $user_id = $this->apis->validateApiKey();
        extract($_POST);
        $this->api->verifyRequiredParams(array("password", "confirmpassword"));
        if ($_POST['password'] != $_POST['confirmpassword']) {
            $this->api->print_error("Password and confirmpassword does not match");
        }
        $this->api->updateData($this->tab_users, array('password' => md5($_POST['password'])), array('id' => $user_id));
        $this->api->successResponse("Password updated Successfully");

    }

    /*
  |----------------------------------------------------------------------
  | FUNCTION @changePassword FOR change Password
  |----------------------------------------------------------------------
  */

    public
    function changePassword()
    {
        $user_id = $this->apis->validateApiKey();
        extract($_POST);
        if ($this->api->verifyRequiredParams(array("newpassword", "confirmpassword", "oldpassword"))) {
            $user = $this->api->getSingleRecordWhere('users', array('id' => $user_id, 'password' => md5($_POST['oldpassword'])));

            if (empty($user)) {
                $this->api->print_error("Invalid Old Password");
            }

            if ($_POST['newpassword'] != $_POST['confirmpassword']) {
                $this->api->print_error("newpassword and confirmpassword does not match");
            }
            if ($_POST['newpassword'] == $_POST['confirmpassword']) {
                $this->api->updateData('users', array('password' => md5($_POST['newpassword'])), array('id' => $user_id));
                $this->api->successResponse("Password Updated Successfully", "Success");
            } else {
                $this->api->print_error('something Went Wrong');
            }
        }
    }


    /*
|----------------------------------------------------------------------
| FUNCTION @updatePassword FOR update Password
|----------------------------------------------------------------------
*/

    public
    function updatePassword()
    {
        $userId = $this->apis->validateApiKey();
        extract($_POST);
        $this->verifyRequiredParams(array("newpassword", "confirmpassword"));

        if ($_POST['newpassword'] == $_POST['confirmpassword']) {
            $this->api->updateData($this->tab_users, array('password' => md5($_POST['newpassword'])), array('id' => $userId));
            $this->successResponse("Password Updated Successfully", "Success");
        } else {
            $this->print_error('something Went Wrong');
        }

    }

}
