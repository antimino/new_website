<?php
class Database {
    private $host = '127.0.0.1'; // Modifica se necessario
    private $db_name = 'new_website'; // Sostituisci con il nome del tuo database
    private $username = 'antimo'; // Sostituisci con il tuo username MySQL
    private $password = 'developer3'; // Sostituisci con la tua password MySQL
    private $conn;

    // Costruttore per la connessione al database
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connessione al database fallita: " . $this->conn->connect_error);
        }
    }

    // Metodo per eseguire una query SELECT
    public function query($sql) {
        $result = $this->conn->query($sql);

        if ($result === false) {
            die("Errore nella query: " . $this->conn->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Metodo per eseguire una query INSERT, UPDATE o DELETE
    public function execute($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Errore nella preparazione della query: " . $this->conn->error);
        }

        if (!empty($params)) {
            $types = str_repeat('s', count($params)); // supponiamo che tutti i parametri siano stringhe
            $stmt->bind_param($types, ...$params);
        }

        if (!$stmt->execute()) {
            die("Errore nell'esecuzione della query: " . $stmt->error);
        }

        return $stmt->affected_rows;
    }

    // Metodo per chiudere la connessione
    public function close() {
        $this->conn
