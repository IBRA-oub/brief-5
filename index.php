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
        name varchar(50) NOT NULL,
        prenom varchar(50) NOT NULL,
        datenaissance DATE NOT NULL,
        natinalite varchar(50) NOT NULL,
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
        type ENUM('credit', 'debit') NOT NULL,
        compte_id int NOT NULL,
        FOREIGN KEY (compte_id) REFERENCES `compte`(id)
    );
";
//$cnt->query($transactionstable);
 
$inerclients="INSERT INTO client(name,prenom,datenaissance,natinalite, genre) 
VALUE
('NomClient1', 'PrenomClient1', '1990-01-01', 'NationaliteClient1', 'homme'),
('NomClient2', 'PrenomClient2', '1995-02-15', 'NationaliteClient2', 'female'),
('NomClient3', 'PrenomClient3', '1985-07-20', 'NationaliteClient3', 'homme')
 ";

//$cnt->query($inerclients);

$inercompte="INSERT INTO compte(rib,balance,devise,client_id) 
VALUE
('87658765345678', 1000, 'Dinar', 10),
('23456789098765', 1000, 'DH', 10),
('45678987654344', 2000, 'Dinar', 11),
('45678876544567', 3000, 'Dinar', 12)
 ";

/*if ($cnt->query($inercompte) === TRUE) {
    echo "Database created successfully";
  } else {
    echo "Error creating database: " . $cnt->error;
  }*/
  
 //$cnt->query($inercompte);

 $inertransaction="INSERT INTO transactions(montant,type,compte_id)
 VALUE
 (322300, 'credit', 25),
 (23400, 'debit', 25),
 (77700, 'credit', 26),
 (9900, 'debit', 27),
 (100, 'credit', 28)";
 
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

//$cnt->close();

?>