<?php


class Email
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getEmails($id){

        $this->db->query('SELECT * FROM emails WHERE user_id = :user_id');
        $this->db->bind(':user_id', $id);

        return $this->db->resultSet();
    }

    public function storeEmail($contact_id, $user_id, $contact, $subject, $body){

        $this->db->query('INSERT INTO emails (contact_id, user_id, contact, subject, body) VALUES (:contact_id, :user_id, :contact, :subject, :body)');
        $this->db->bind(':contact_id', $contact_id);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':contact', $contact);
        $this->db->bind(':subject', $subject);
        $this->db->bind(':body', $body);
        $this->db->execute();

    }

}