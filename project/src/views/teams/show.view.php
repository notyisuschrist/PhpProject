<?php
require basePath('views/partials/up.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/header.php');
?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Your content -->
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase mx-auto">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Team name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            # Win
                        </th>
                        <th scope="col" class="px-6 py-3">
                            # Lose
                        </th>
                        <th scope="col" class="px-6 py-3">
                            % AVG
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="mx-auto border-b">
                        <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap ">
                            <?= $team['name'] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $team['win'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $team['lose'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $team['win'] / ($team['lose'] + $team['win']) ?? '0' ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <br>
            </div>
            <div class="flex inline gap-x-4">
                <form method="POST" action="/team">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $team['id']?>">
                    <button class="text-sm font-semibold text-red-500 rounded-md px-3 py-2 hover:bg-red-500 hover:text-white hover:rounded-md hover:shadow-sm">
                        Delete
                    </button>
                </form>
                <a href="/team/edit?name=<?= $team['name'] ?>"
                   class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"">Edit</a>

            </div>
        </div>
    </main>
<?= require basePath('views/partials/down.php'); ?>