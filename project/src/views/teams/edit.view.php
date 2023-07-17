<?php
require basePath('views/partials/up.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/header.php');
?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <form method="POST" action="/team">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $team['id']?>">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="name" class="text-md text-gray-700 mx-auto">Team Name</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="text" required name="name" id="name" autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="<?= $team['name'] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="win" class="text-md text-gray-700 mx-auto">Team # wins</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="number" min="0"  required name="win" id="win" autocomplete="win" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="<?= $team['win'] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="lose" class="text-md text-gray-700 mx-auto">Team # lost</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="number" min="0" required name="lose" id="lose" autocomplete="lose" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="<?= $team['lose'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="/teams"><button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button></a>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>


            </form>

    </main>
<?=require basePath('views/partials/down.php');?>