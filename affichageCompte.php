<?php 
require ('index.php');

$showcompte=getcopmte();





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


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                <tr>
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
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php 
                            echo $cmp['rib'];
                        ?>

                    </th>
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
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>

                <?php 
                }
                ?>

            </tbody>
        </table>
    </div>







</body>

</html>