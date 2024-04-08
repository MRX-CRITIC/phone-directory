<?php

class PhoneDirectory
{
    private $contacts = [];
    private $filePath = '../contacts.json';

    public function __construct()
    {
        if (file_exists($this->filePath)) {
            $this->contacts = json_decode(file_get_contents($this->filePath), true);
        }
    }

    public function addContact($name, $phoneNumber)
    {
        $contact = new Contact($name, $phoneNumber);
        $this->contacts[] = $contact;
        $this->saveContacts();
    }

    public function deleteContact($index)
    {
        if (isset($this->contacts[$index])) {
            unset($this->contacts[$index]);
            $this->contacts = array_values($this->contacts);
            $this->saveContacts();
        }
    }

    public function getContacts()
    {
        return $this->contacts;
    }

    private function saveContacts()
    {
        file_put_contents($this->filePath, json_encode($this->contacts, JSON_PRETTY_PRINT));
    }
}