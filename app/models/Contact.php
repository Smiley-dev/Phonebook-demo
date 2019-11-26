<?php

class Contact {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getContacts($user_id){

        $this->db->query('SELECT * FROM contacts WHERE user_id = :user_id ORDER BY name');
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();

    }

    public function searchContacts($user_id, $search){

        $this->db->query('SELECT * FROM contacts WHERE user_id = :user_id AND name LIKE :search ORDER BY name');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':search', $search);
        return $this->db->resultSet();

    }

    public function filterContacts($user_id, $group, $email, $phone){

        $query = 'SELECT * FROM contacts WHERE user_id = :user_id ';

        //Nothing is selected
        if($group == '0' && $email == '' && $phone == ''){

            $this->db->query($query . ' ORDER BY name');
            $this->db->bind(':user_id', $user_id);
            return $this->db->resultSet();

            //Everything is selected
        } else if ($group !== '0' && $email !== '' && $phone !== ''){

            $query .= 'AND contact_group = :group AND email != "" AND phone_number != ""';

            $this->db->query($query . 'ORDER BY name');
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':group', $group);

            return $this->db->resultSet();

            //Just group
        } else if ($group !== '0' && $email == '' && $phone == ''){

            $query .= 'AND contact_group = :group ';

            $this->db->query($query . 'ORDER BY name');
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':group', $group);

            return $this->db->resultSet();

            //Just email
        } else if ($group == '0' && $email !== '' && $phone == ''){

            $query .= 'AND email != "" ';

            $this->db->query($query . 'ORDER BY name');
            $this->db->bind(':user_id', $user_id);


            return $this->db->resultSet();

            //Just phone
        }  else if ($group == '0' && $email == '' && $phone !== ''){

            $query .= 'AND phone_number != "" ';

            $this->db->query($query . 'ORDER BY name');
            $this->db->bind(':user_id', $user_id);

            return $this->db->resultSet();

            //Group and email
        } else if($group !== '0' && $email !== '' && $phone == ''){

            $query .= 'AND contact_group = :group AND email != ""';

            $this->db->query($query . 'ORDER BY name');
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':group', $group);

            return $this->db->resultSet();

            //Group and phone number
        } else if($group !== '0' && $email == '' && $phone !== ''){
            $query .= 'AND contact_group = :group AND phone_number != ""';

            $this->db->query($query . 'ORDER BY name');
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':group', $group);

            return $this->db->resultSet();

            //Email and phone number
        } else if($group == '0' && $email !== '' && $phone !== ''){

            $query .= 'AND phone_number != "" AND email != ""';

            $this->db->query($query . 'ORDER BY name');
            $this->db->bind(':user_id', $user_id);

            return $this->db->resultSet();
        }

    }

    public function addContact($user_id, $name, $email='', $phone = '', $group = '0'){

        $this->db->query('INSERT INTO contacts (user_id, name, email, phone_number, contact_group) VALUES (:user_id, :name, :email, :phone, :group)');

        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':group', $group);

        $this->db->execute();
    }

    public function editContact($data){
        $this->db->query('UPDATE contacts SET name = :name, email = :email, phone_number = :phone_number, contact_group = :contact_group WHERE contact_id = :id');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone_number', $data['phone_number']);
        $this->db->bind(':contact_group', $data['group']);
        $this->db->bind(':id', $data['id']);

        $this->db->execute();
    }

    public function deleteContact($id){
        $this->db->query('DELETE FROM contacts WHERE contact_id = :id');

        $this->db->bind(':id', $id);

        $this->db->execute();
    }

    public function findContactByName($name, $id){

        $this->db->query('SELECT * FROM contacts WHERE name = :name AND user_id = :id');
        $this->db->bind(':name', $name);
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        if(empty($row)){
            return false;
        } else {
            return true;
        }
    }

    public function findContactById($id){
        $this->db->query('SELECT * FROM contacts WHERE contact_id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        if(empty($row)){
            return false;
        } else {
            return $row;
        }
    }
}