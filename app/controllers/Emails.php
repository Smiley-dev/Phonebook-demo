<?php


class Emails extends Controller
{

    private $contactModel;
    private $emailModel;

    private $email;
    private $send;

    public function __construct()
    {
        $this->contactModel = $this->model('contact');
        $this->emailModel = $this->model('email');

        $this->email = new \SendGrid\Mail\Mail();
        $this->send = new \SendGrid(API_KEY_SEND_GRID);

    }

    public function index(){

        $emails = $this->emailModel->getEmails($_SESSION['user_id']);

        $data = [
            'emails' => $emails
        ];

        $this->view('emails/emails', $data);
    }

    public function send($id = ''){

        if($id == ''){
            redirect('/contacts/contacts');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'to' => '',
                'contact' => '',
                'subject' => $_POST['subject'],
                'body' => $_POST['body'],
                'errors' => [
                    'to' => '',
                    'subject' => '',
                    'body' => ''
                ]
            ];


            $contact = $this->contactModel->findContactById($id);
            $data['to'] = $contact->email;
            $data['contact'] = $contact->name;



            //Validate email
            if(empty($data['to'])){
                $data['errors']['to'] = 'Please enter email';
            } elseif(!$this->contactModel->findContactByEmail($_SESSION['user_id'],$data['to'])){
                $data['errors']['to'] = 'Contact with that email does not exist';
            }

            //Validate subject
            if(empty($data['subject'])) {
                $data['errors']['subject'] = 'You must enter email subject';
            }

            //Validate body
            if(empty($data['body'])){
                $data['errors']['body'] = 'Email must have some text';
            }

            //Make sure that errors are empty
            if(empty($data['errors']['to']) && empty($data['errors']['subject']) && empty($data['errors']['body'])){

                //Send email
                $this->sendgrid($data['to'], $data['subject'], $data['body']);

                //Store email to database
                $this->emailModel->storeEmail($id, $_SESSION['user_id'], $data['contact'], $data['subject'], $data['body']);

                //Load emails view
                redirect('/emails');
            } else{
                $this->view('emails/sendEmail', $data);

            }
        } else {

            $data = [
                'contact_id' => $id,
                'to' => '',
                'subject' => '',
                'body' => '',
                'errors' => [
                    'to' => '',
                    'subject' => '',
                    'body' => ''
                ]
            ];

            $contact = $this->contactModel->findContactById($id);
            $data['to'] = $contact->email;

            $this->view('emails/sendEmail', $data);
        }


    }

    public function sendgrid($to, $subject, $body){

        $this->email->setFrom($_SESSION['user_email'], $_SESSION['user_name']);
        $this->email->setSubject($subject);
        $this->email->addTo($to);
        $this->email->addContent("text/plain", $body);

        try {
            $response = $this->send->send($this->email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }

    }
}