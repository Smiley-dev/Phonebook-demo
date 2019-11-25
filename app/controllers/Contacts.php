<?php

class Contacts extends Controller {

    private $contactModel;



    public function __construct()
    {
        $this->contactModel = $this->model('contact');
    }

    public function index(){

        $contacts = $this->contactModel->getContacts($_SESSION['user_id']);

        $data = [
            'contacts' => $contacts
        ];

        $this->view('contacts/contacts', $data);


    }

    public function search($search = ''){
        if ($search == '') {
            $contacts = $this->contactModel->getContacts($_SESSION['user_id']);

            $data = [
                'contacts' => $contacts
            ];

            $this->view('contacts/table', $data);

        } else {
            $contacts = $this->contactModel->searchContacts($_SESSION['user_id'], '%' .$search. '%');

            $data = [
                'contacts' => $contacts
            ];

            $this->view('contacts/table', $data);

        }
    }




    public function addContact(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'user_id' => $_SESSION['user_id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone_number' => $_POST['phone'],
                'group' => $_POST['groups'],
                'errors' => [
                    'name' => '',
                    'email' => '',
                    'phone_number' => ''
                ]
            ];

            //Validate name
            if(empty($_POST['name'])){
                $data['errors']['name'] = 'Name field cannot be empty';
            } elseif($this->contactModel->findContactByName($_POST['name'], $_SESSION['user_id'])){
                //Check if name already exists
                $data['errors']['name'] = "Contact with that name already exists";
            }

            //Validate email and phone number
            if(empty($_POST['email']) && empty($_POST['phone_number'])){
                $data['errors']['email'] = 'Contact must have at least email or a phone number';
                $data['errors']['phone_number'] = 'Contact must have at least email or a phone number';
            }

            //Check if errors are empty
            if(empty($data['errors']['name']) && empty($data['errors']['email']) && empty($data['errors']['phone_number'])){


                $this->contactModel->addContact($data['user_id'], $data['name'], $data['email'], $data['phone_number'], $data['group']);

                redirect('/contacts');

            } else {
                $this->view('contacts/add', $data);
            }

        } else {

            $data = [
                'user_id' => $_SESSION['user_id'],
                'name' => '',
                'email' => '',
                'phone_number' => '',
                'group' => '',
                'errors' => [
                    'name' => '',
                    'email' => '',
                    'phone_number' => ''
                ]
            ];

            $this->view('contacts/add', $data);
        }

    }

    public function edit($id){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'user_id' => $_SESSION['user_id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone_number' => $_POST['phone'],
                'group' => $_POST['groups'],
                'errors' => [
                    'name' => '',
                    'email' => '',
                    'phone_number' => ''
                ]
            ];

            //Validate name
            if(empty($_POST['name'])){
                $data['errors']['name'] = 'Name field cannot be empty';
            } elseif($this->contactModel->findContactByName($_POST['name'], $_SESSION['user_id'])){
                //Check if name already exists
                $data['errors']['name'] = "Contact with that name already exists";
            }

            //Validate email and phone number
            if(empty($_POST['email']) && empty($_POST['phone_number'])){
                $data['errors']['email'] = 'Contact must have at least email or a phone number';
                $data['errors']['phone_number'] = 'Contact must have at least email or a phone number';
            }

            //Check if errors are empty
            if(empty($data['errors']['name']) && empty($data['errors']['email']) && empty($data['errors']['phone_number'])) {

                $this->contactModel->editContact($data);

                redirect('/contacts');
            } else {
                $this->view('contacts/edit', $data);
            }

        } else {

            $contact = $this->contactModel->findContactById($id);

            if($contact->user_id != $_SESSION['user_id']){

                redirect('/contacts');

            } else {

                $data = [
                    'id' => $id,
                    'name' => $contact->name,
                    'email' => $contact->email,
                    'phone_number' => $contact->phone_number,
                    'group' => $contact->contact_group
                ];

                $this->view('contacts/edit', $data);

            }

        }

    }

    public function delete($id){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $contact = $this->contactModel->findContactById($id);

            if($contact->user_id != $_SESSION['user_id']){

                redirect('/contacts');

            } else {
                $this->contactModel->deleteContact($id);
                redirect('/contacts');
            }

        } else {
            redirect('/contacts');
        }

    }

}