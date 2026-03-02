<?php

class Conference {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function add($name, $birthyear, $section, $certificate, $participation) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO conference_registrations 
            (name, birthyear, section_name, need_certificate, participation_form) 
            VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->execute([
            $name,
            $birthyear,
            $section,
            $certificate,
            $participation
        ]);
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM conference_registrations ORDER BY id DESC");
        return $stmt->fetchAll();
    }
}
