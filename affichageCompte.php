<?php 
require ('index.php');

$showcompte=getcopmte();

$client_id = isset($_GET['client_id']) ? $_GET['client_id'] : null;

if ($client_id) {
    $query = $cnt->query("SELECT * FROM compte WHERE client_id = $client_id");
    $showcompte = $query->fetch_all(MYSQLI_ASSOC);
} else {
    $showcompte = getcopmte();
}



?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <title>affichage</title>
</head>

<body>

    <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div>LOGO</div>

            <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
                <ul
                    class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">

                    <li>
                        <a href="affichageClient.php" target="_blank"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">client</a>
                    </li>
                    <li>
                        <a href="affichageCompte.php"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">compte</a>
                    </li>
                    <li>
                        <a href="affichageTransaction.php" target="_blank"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">transaction</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="relative overflow-x-auto shadow-md ">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">


                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        RIB
                    </th>
                    <th scope="col" class="px-6 py-3">
                        balance
                    </th>
                    <th scope="col" class="px-6 py-3">
                        devise
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>

                </tr>
            </thead>
            <tbody>

                <?php 
                foreach ($showcompte as $cmp ) {
                ?>
                <tr class=" even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php 
                            echo $cmp['id'];
                        ?>

                    </th>
                    <td class="px-6 py-4">
                        <?php 
                           echo $cmp['rib'];
                        ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php 
                            echo $cmp['balance'];
                        ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php 
                            echo $cmp['devise'];
                        ?>
                    </td>
                    <td class="px-6 py-4">
                        <a href="affichageTransaction.php?compte_id=<?= $cmp['id']; ?>"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">show
                            transaction</a>
                    </td>
                </tr>

                <?php 
                }
                ?>

            </tbody>
        </table>
    </div>



    <footer class="bg-white shadow dark:bg-gray-900 ">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div>LOGO</div>
                <ul
                    class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Client</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Compte</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Transactions</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a
                    href="https://flowbite.com/" class="hover:underline">Bank™</a>. All Rights Reserved.</span>
        </div>
    </footer>



</body>

</html>
<!-- // // Check if the "Update" button is clicked
// if (isset($_POST['submitupdate'])) {
// // Get the user ID from the clicked row
// echo "<script>
window.alert('Erreur lors de la récupération des données utilisateur')
</script>";
// $user_id = $_POST['user_id'];

// // Fetch the existing user data based on the user ID
// $getUserQuery = "SELECT * FROM user WHERE id = $user_id";
// $userResult = mysqli_query($cnx, $getUserQuery);

// if ($userResult) {
// $userData = mysqli_fetch_assoc($userResult);

// // Pre-fill the form fields with existing data
// echo "<script>
//                 document.getElementById('username').value = '" . $userData['username'] . "';
//                 document.getElementById('datenaissance').value = '" . $userData['date_de_naissance'] . "';
//                 document.getElementById('nationalite').value = '" . $userData['nationalite'] . "';
//                 document.getElementById('genre').value = '" . $userData['genre'] . "';
//                 document.getElementById('codepostale').value = '" . $userData['code_postal'] . "';
//                 document.getElementById('telephone').value = '" . $userData['tele'] . "';
//                 document.getElementById('address').value = '" . $userData['adresse'] . "';
//                 document.getElementById('email').value = '" . $userData['email'] . "';
//                 document.getElementById('update_user_id').value = '" . $user_id . "';
//             
</script>";
// } else {
// echo "<script>
window.alert('Erreur lors de la récupération des données utilisateur')
</script>";
// }
// }
// // Update user data in the database
// if (isset($_POST['ajout_client'])) {
// // Get the user ID from the hidden field
// $update_user_id = $_POST['update_user_id'];

// // Your existing code to get other form fields
// $nom = $_POST['username'];
// $datenaissance = $_POST['datenaissance'];
// $nationalite = $_POST['nationalite'];
// $genre = $_POST['genre'];
// $password = $_POST['password'];
// $email = $_POST['email'];
// $address = $_POST['address'];
// $codepostale = $_POST['codepostale'];
// $telephone = $_POST['telephone'];

// // Update the specified fields in the database
// $updateQuery = "UPDATE user SET
// username = '$nom',
// date_de_naissance = '$datenaissance',
// nationalite = '$nationalite',
// genre = '$genre',
// password = '$password',
// email = '$email',
// address = '$address',
// code_postal = '$codepostale',
// tele = '$telephone'
// WHERE id = $update_user_id";

// $updateResult = mysqli_query($cnx, $updateQuery);

// if ($updateResult) {
// echo "<script>
window.alert('Mise à jour réussie')
</script>";
// } else {
// echo "<script>
window.alert('Erreur lors de la mise à jour : " . mysqli_error($cnx) . "')
</script>";
// }
// } -->