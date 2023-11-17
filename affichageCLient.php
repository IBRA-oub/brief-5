<?php 
require ('index.php');

$showclient=getclients();


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
                        <a href="#"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">client</a>
                    </li>
                    <li>
                        <a href="affichageCompte.php" target="_blank"
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
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        nom
                    </th>
                    <th scope="col" class="px-6 py-3">
                        prenom
                    </th>
                    <th scope="col" class="px-6 py-3">
                        date de naissance
                    </th>
                    <th scope="col" class="px-6 py-3">
                        nationalité
                    </th>
                    <th scope="col" class="px-6 py-3">
                        genre
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>

                </tr>
            </thead>
            <tbody>

                <?php 
                foreach ($showclient as $clt ) {
                ?>
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php 
                            echo $clt['id'];
                        ?>

                    </th>
                    <td class="px-6 py-4">
                        <?php 
                           echo $clt['nom'];
                        ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php 
                            echo $clt['prenom'];
                        ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php 
                            echo $clt['datenaissance'];
                        ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php 
                            echo $clt['natoinalite'];
                        ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php 
                            echo $clt['genre'];
                        ?>
                    </td>
                    <td class="px-6 py-4">
                        <a href="affichageCompte.php?client_id=<?= $clt['id']; ?>"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">show compte
                        </a>
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