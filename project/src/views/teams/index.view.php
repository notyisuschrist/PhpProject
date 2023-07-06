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
                    <?php foreach($teams as $team) : ?>
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
                            <?= $team['win'] / ($team['lose'] + $team['win']) ?? '0'?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <br>
                <a class="text-md text-blue-500 hover:underline" href="/teams/create">+ Add a new team</a>
            </div>
    </main>
<?=require basePath('views/partials/down.php');?>
