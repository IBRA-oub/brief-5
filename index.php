<?php 

$server='localhost';
$username='root';
$password= '';
$db="bank";



$cnt = new mysqli($server, $username, $password, $db);

if ($cnt->connect_error) {
    die("Error connecting to:" . $cnt->connect_error);
}

$clienttable="

    CREATE TABLE IF NOT EXISTS `client` (
        id int PRIMARY KEY AUTO_INCREMENT,
        nom varchar(50) NOT NULL,
        prenom varchar(50) NOT NULL,
        datenaissance DATE NOT NULL,
        natoinalite varchar(50) NOT NULL,
        genre ENUM('homme', 'female') NOT NULL
    );
";

//$cnt->query($clienttable);

$comptetable="

    CREATE TABLE IF NOT EXISTS `compte` (
        id int PRIMARY KEY AUTO_INCREMENT,
        rib varchar(50) NOT NULL,
        balance float(10) NOT NULL,
        devise varchar(10) NOT NULL,
        client_id int NOT NULL,
        FOREIGN KEY (client_id) REFERENCES client(id)
    );
";

//$cnt->query($comptetable);

$transactionstable="

    CREATE TABLE IF NOT EXISTS `transactions` (
        id int PRIMARY KEY AUTO_INCREMENT,
        montant float(10) NOT NULL,
        devis varchar(10) NOT NULL,
        type ENUM('credit', 'debit') NOT NULL,
        compte_id int NOT NULL,
        FOREIGN KEY (compte_id) REFERENCES `compte`(id)
    );
";
//$cnt->query($transactionstable);
 
$inerclients="INSERT INTO client(nom,prenom,datenaissance,natoinalite, genre) 
VALUE
('oubourrih', 'brahim', '2001-02-07', 'Marrocan', 'homme'),
('El Karroudi', 'Amine', '2005-07-25', 'Marrocan', 'homme'),
('Najim', 'Soufiane', '2001-03-20', 'USA', 'homme'),
('NomClient4', 'PrenomClient4', '1985-07-20', 'NationaliteClient4', 'female'),
('NomClient4', 'PrenomClient4', '1985-07-20', 'NationaliteClient4', 'homme')

 ";

//$cnt->query($inerclients);

$inercompte="INSERT INTO compte(rib,balance,devise,client_id) 
VALUE
('87658765345678', 1000.30, 'EURO', 1),
('23456789098765', 2300.40, 'DH', 1),
('76543234567654', 5400.50, 'USD', 1),
('09876543456765', 76500.00, 'USD', 1),
('32123456543456', 1880.30, 'DH', 1),
('45678987654344', 97700.20, 'DH', 2),
('45678876544567', 34400.10, 'EURO', 2),
('45678876544567', 65400.50, 'USA', 2),
('45678876544567', 7600.00, 'DH', 3),
('93655535399200', 76080.00, 'DH', 4)

 ";

/*if ($cnt->query($inercompte) === TRUE) {
    echo "Database created successfully";
  } else {
    echo "Error creating database: " . $cnt->error;
  }*/
  
 //$cnt->query($inercompte);

 $inertransaction="INSERT INTO transactions(montant,devis,type,compte_id)
 VALUE
 (3223.00,'EURO', 'credit', 1),
 (654.33,'DH', 'debit', 1),
 (876.55,'USD', 'credit', 1),
 (543.00,'EURO', 'debit', 2),
 (746.20,'DH', 'credit', 2),
 (6533.00,'USD', 'debit', 3),
 (768.40,'EURO', 'credit', 3),
 (800.00,'DH', 'debit', 3),
 (120.30,'USD', 'debit', 4),
 (500.12,'EURO', 'credit', 4),
 (543.40,'DH', 'debit', 5),
 (876.55,'USD', 'credit', 5),
 (100.00,'EURO', 'debit', 5),
 (200.00,'DH', 'credit', 5),
 (250.00,'USD', 'debit', 6),
 (350.50,'EURO', 'credit', 6),
 (400.00,'DH', 'debit', 6),
 (450.50,'USD', 'debit', 6),
 (500.50,'EURO', 'credit', 7),
 (600.00,'DH', 'debit', 7),
 (700.33,'USD', 'credit', 8),
 (800.20,'EURO', 'debit', 9)
 ";

 //$cnt->query($inertransaction);




function getclients(){


   $query = $GLOBALS['cnt']->query('SELECT * FROM client');

   $data_clients=$query->fetch_all(MYSQLI_ASSOC);

   $query = null;
   return $data_clients;
}
function getcopmte(){


    $query = $GLOBALS['cnt']->query('SELECT * FROM compte');
 
    $data_compte=$query->fetch_all(MYSQLI_ASSOC);
 
    $query = null;
    return $data_compte;
 }
 function gettransaction(){


    $query = $GLOBALS['cnt']->query('SELECT * FROM transactions');
 
    $data_transaction=$query->fetch_all(MYSQLI_ASSOC);
 
    $query = null;
    return $data_transaction;
 }

 //fonction de filtre


function getTransactionsByCompteId($compte_id)
{
    global $cnt;
    $query = $cnt->query("SELECT * FROM transactions WHERE compte_id = $compte_id");
    return $query->fetch_all(MYSQLI_ASSOC);
}
//$cnt->close();

?>