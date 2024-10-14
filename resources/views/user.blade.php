<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <h2 class="bg-white p-6 text-center uppercase font-black text-3xl">Contacts</h2>
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block">
                        <table class="min-w-full text-xs text-left whitespace-nowrap">
                            <colgroup>
                                <col class="w-5">
                                <col>
                                <col>
                                <col>
                                <col>
                                <col>
                                <col class="w-5">
                            </colgroup>
                            <thead>
                                <tr class="dark:bg-gray-300">
                                    <th class="p-3">A-Z</th>
                                    <th class="p-3">Name</th>
                                    <th class="p-3">Job title</th>
                                    <th class="p-3">Phone</th>
                                    <th class="p-3">Email</th>
                                    <th class="p-3">Address</th>
                                    <th class="p-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="border-b dark:bg-gray-50 dark:border-gray-300">
                                <tr>
                                    <td class="px-3 text-2xl font-medium dark:text-gray-600">A</td>
                                    <td class="px-3 py-2">
                                        <p>Dwight Adams</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <span>UI Designer</span>
                                        <p class="dark:text-gray-600">Spirit Media</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>555-873-9812</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>dwight@adams.com</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>71 Cherry Court, SO</p>
                                        <p class="dark:text-gray-600">United Kingdom</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <button type="button" title="Open details"
                                            class="p-1 rounded-full dark:text-gray-400 hover:dark:bg-gray-300 focus:dark:bg-gray-300">
                                            <svg viewBox="0 0 24 24" class="w-4 h-4 fill-current">
                                                <path
                                                    d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 text-2xl font-medium dark:text-gray-600"></td>
                                    <td class="px-3 py-2">
                                        <p>Richie Allen</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <span>Geothermal Technician</span>
                                        <p class="dark:text-gray-600">Icecorps</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>555-129-0761</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>richie@allen.com</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>Knesebeckstrasse 32, Obersteinebach</p>
                                        <p class="dark:text-gray-600">Germany</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <button type="button" title="Open details"
                                            class="p-1 rounded-full dark:text-gray-400 hover:dark:bg-gray-300 focus:dark:bg-gray-300">
                                            <svg viewBox="0 0 24 24" class="w-4 h-4 fill-current">
                                                <path
                                                    d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="border-b dark:bg-gray-50 dark:border-gray-300">
                                <tr>
                                    <td class="px-3 text-2xl font-medium dark:text-gray-600">B</td>
                                    <td class="px-3 py-2">
                                        <p>Alex Bridges</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <span>Administrative Services Manager</span>
                                        <p class="dark:text-gray-600">Smilectronics</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>555-238-9890</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>alex@bridges.com</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>Hooivelden 117, Kortrijk</p>
                                        <p class="dark:text-gray-600">Belgium</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <button type="button" title="Open details"
                                            class="p-1 rounded-full dark:text-gray-400 hover:dark:bg-gray-300 focus:dark:bg-gray-300">
                                            <svg viewBox="0 0 24 24" class="w-4 h-4 fill-current">
                                                <path
                                                    d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 text-2xl font-medium dark:text-gray-600"></td>
                                    <td class="px-3 py-2">
                                        <p>Lynette Brown</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <span>Camera Operator</span>
                                        <p class="dark:text-gray-600">Surge Enterprises</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>555-521-5712</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>lynette@brown.com</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>22 rue de la Boétie, Poitiers</p>
                                        <p class="dark:text-gray-600">France</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <button type="button" title="Open details"
                                            class="p-1 rounded-full dark:text-gray-400 hover:dark:bg-gray-300 focus:dark:bg-gray-300">
                                            <svg viewBox="0 0 24 24" class="w-4 h-4 fill-current">
                                                <path
                                                    d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="border-b dark:bg-gray-50 dark:border-gray-300">
                                <tr>
                                    <td class="px-3 text-2xl font-medium dark:text-gray-600">C</td>
                                    <td class="px-3 py-2">
                                        <p>Mariah Claxton</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <span>Nuclear Technician</span>
                                        <p class="dark:text-gray-600">White Wolf Brews</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>555-654-9810</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>mariah@claxton.com</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>R Oliveirinhas 71, Maia</p>
                                        <p class="dark:text-gray-600">Portugal</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <button type="button" title="Open details"
                                            class="p-1 rounded-full dark:text-gray-400 hover:dark:bg-gray-300 focus:dark:bg-gray-300">
                                            <svg viewBox="0 0 24 24" class="w-4 h-4 fill-current">
                                                <path
                                                    d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 text-2xl font-medium dark:text-gray-600"></td>
                                    <td class="px-3 py-2">
                                        <p>Hermila Craig</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <span>Production Engineer</span>
                                        <p class="dark:text-gray-600">Cavernetworks Co.</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>555-091-8401</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>hermila@craig.com</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p>Rua da Rapina 89, Espeja</p>
                                        <p class="dark:text-gray-600">Spain</p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <button type="button" title="Open details"
                                            class="p-1 rounded-full dark:text-gray-400 hover:dark:bg-gray-300 focus:dark:bg-gray-300">
                                            <svg viewBox="0 0 24 24" class="w-4 h-4 fill-current">
                                                <path
                                                    d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
