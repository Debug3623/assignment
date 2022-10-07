<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Books extends CI_Controller
{
    public $tab_users='users';
    public $tab_pdf='pdf_books';
    public $tab_devices='devices';
    public $tab_books='books';

    /*
    |----------------------------------------------------------------------
    | CLASS CONSTRUCTOR
    |----------------------------------------------------------------------
    */

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
  | FUNCTION @addBooks FOR Add Books
  |----------------------------------------------------------------------
  */

    public function addBooks()
    {
    
        $user_id= $this->api->validateApiKey();
      
        extract($_POST);
        $user = array();
        //Validating Required Params
        $this->api->verifyRequiredParams(array("title"));
        $product = $this->api->getSingleRecordWhere($this->tab_books, array('title' => $title, 'user_id' => $user_id));

        if (!empty($product)) {
          $this->api->print_error('Books already exists.');
        }
        $image = $this->uploadImage($_FILES);
        $insertData = $this->api->insertData($this->tab_books, array('title' => $title,'user_id'=>$user_id,'description'=>$description,'category_id'=>$category_id,'image'=>$image));

        $inserted_id = $this->db->insert_id($insertData);
       $pdf = $this->uploadFile($_FILES);
        $insertPdf = $this->api->insertData($this->tab_pdf, array('book_id' => $inserted_id,'filename'=>$pdf,'user_id'=>$user_id));

        if ($insertData) {
       
            $this->api->successResponse("Book Successfully added.");

        } else {
        
        $this->api->print_error('Book is not added.');

        }
    }


    /*
|----------------------------------------------------------------------
| FUNCTION @upload File
|----------------------------------------------------------------------
*/

    private function uploadFile($data)
    {
        $image = '';
        if ($data) {
            $info = pathinfo($_FILES['filename']['name']);
            $ext = $info['extension'];
            $newname = $_FILES['filename']['name'];
            $target = 'uploads/pdf' . $newname;
            if (move_uploaded_file($_FILES['filename']['tmp_name'], $target)) {
                $image = $newname;
            }
        }
        return $image;
    }

    /*
    |----------------------------------------------------------------------
    | FUNCTION @getBooks get All Books
    |----------------------------------------------------------------------
    */

    public function getBooks()
    {
        $categories[] = $this->api->get_categories();

       // var_dump(  $categories); die();

        if (!empty($categories)) {
              $this->api->successResponseWithData('All Books', $categories);
  
        } else {  
             $this->api->print_error('Category is not exist', $categories);

         }

    }




   /*
    |----------------------------------------------------------------------
    | FUNCTION @getSingleBook get single Book
    |----------------------------------------------------------------------
    */

    public function getSingleBook()
    {

        $user_id = $this->api->validateApiKey();
        // check request type
        extract($_POST);
        $book = array();
        //Validating Required Params
        $this->api->verifyRequiredParams(array("id"));
        $newpath = base_url('uploads/');
        $feilds = "id,title,category_id,user_id,CONCAT('$newpath','',image) as image,created_at";

    
        $book = $this->api->getSingleRecordWhere($this->tab_books, array('id'=>$id),$feilds);
        // $book = $this->api->getBookDetails($id);

        if (!empty($book)) {
                $this->api->successResponseWithData('Book detail', $book);
        } else {  
             $this->api->print_error('Book does not exist', $book);

         }

    }

       /*
    |----------------------------------------------------------------------
    | FUNCTION @getSingleBook get single Book
    |----------------------------------------------------------------------
    */

    public function getBooksOfCategory()
    {

        $user_id = $this->api->validateApiKey();
        // check request type
        extract($_POST);
        $book = array();
        //Validating Required Params
        $this->api->verifyRequiredParams(array("category_id"));
        $book = $this->api->getBookCateDetail($category_id);
        // $book = $this->api->getBookDetails($id);

        if (!empty($book)) {
                $this->api->successResponseWithData('Book detail', $book);
        } else {  
             $this->api->print_error('Book does not exist', $book);

         }

    }

           /*
    |----------------------------------------------------------------------
    | FUNCTION @getSingleBook get single Book
    |----------------------------------------------------------------------
    */

    public function getBooksOfUser()
    {

        $user_id = $this->api->validateApiKey();
        // check request type
        extract($_POST);
        $book = array();
        //Validating Required Params
        $this->api->verifyRequiredParams(array("user_id"));
        $book = $this->api->getBookUserDetail($user_id);
        // $book = $this->api->getBookDetails($id);
 
        if (!empty($book)) {
                $this->api->successResponseWithData('User Books detail', $book);
        } else {  
             $this->api->print_error('Book does not exist', $book);

         }

    }



       /*
  |----------------------------------------------------------------------
  | FUNCTION @deleteProduct FOR Delete Product
  |----------------------------------------------------------------------
  */


    public function deleteProduct()
    {

       $user_id= $this->api->validateApiKey();
        extract($_POST);

        //Validating Required Params
        $this->api->verifyRequiredParams(array("id"));

        $isDelete = $this->api->deleteRecord($this->tab_products, array("id" => $id, "user_id" => $user_id));

       if($isDelete )
       {
        $this->api->successResponse("Product deleted Successfully");
       } else{

        $this->api->print_error('product does not deleted.');
        }

    }


    /*
    |----------------------------------------------------------------------
    | FUNCTION @uploadPicture FOR UPLOADING IMAGE/AUDIO
    |----------------------------------------------------------------------
    */

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





}
