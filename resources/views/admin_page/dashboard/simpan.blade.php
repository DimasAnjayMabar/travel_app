@extends('admin_page.app')

@section('content')
    <style>
        #sidebar-overlay {
            -webkit-backdrop-filter: blur(4px); /* For Safari */
            backdrop-filter: blur(4px);
        }
    </style>
    <!-- Navbar -->
    <header class="antialiased">
        <nav class="bg-white border-gray-200 px-4 py-2.5 dark:bg-gray-800">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <button id="hamburger" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">
                        <i class="fas fa-bars text-xl"></i> 
                    </button>

                    <a href="{{ route('simpan') }}" class="flex mr-4">
                        <img src="https://flowbite.s3.amazonaws.com/logo.svg" class="mr-3 h-8" alt="FlowBite Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Koperasi</span>
                    </a>
                </div>
                
                <!-- Preview Profile -->
                <div class="flex items-center">
                    <button type="button" class="flex mx-3 text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="" id="profile" alt="user photo">
                    </button>
                    <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown">
                        <div class="py-3 px-4">
                            <span id="email" class="block text-sm text-gray-500 truncate dark:text-gray-400">loading...</span>
                        </div>
                        <div class="py-3 px-4">
                            <span id="name" class="block text-sm text-gray-500 truncate dark:text-gray-400">loading...</span>
                        </div>
                        <div class="py-3 px-4">
                            <span id="phone" class="block text-sm text-gray-500 truncate dark:text-gray-400">loading...</span>
                        </div>
                        <ul class="py-1 text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                            <li>
                                <a href="#" id="sign-out" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed top-0 left-0 z-50 w-64 h-full bg-white border-r border-gray-200 transform -translate-x-full transition-transform dark:bg-gray-800 dark:border-gray-700">
        <div class="p-4 space-y-2">
            <a href="{{ route('simpan') }}" data-table="simpan" class="block px-4 py-2 rounded text-white hover:bg-gray-100 dark:hover:bg-gray-700">Simpan</a>
            <a href="{{ route('history') }}" data-table="history" class="block px-4 py-2 rounded  text-white hover:bg-gray-100 dark:hover:bg-gray-700">History</a>
            <a href="{{ route('staff-profile') }}" data-table="profile" class="block px-4 py-2 rounded  text-white hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a>
        </div>
    </aside>

    <!-- Dynamic Content Container -->
    <div id="table-container" class="p-3 sm:p-5 antialiased">
        <!-- Table -->
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
            <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="flex-1 flex items-center space-x-2">
                            <h5>
                                <span class="text-gray-500 dark:text-white">Member Accounts</span>
                            </h5>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="simple-search" placeholder="Search for member" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                            </form>
                        </div>
                        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <a href="{{ route('member-register') }}" data-drawer-target="add-member" data-drawer-show="add-member" aria-controls="add-member" class="w-full justify-center sm:w-auto text-gray-500 inline-flex items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Register New Member
                            </a>
                        </div>
                        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <button data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="w-full justify-center sm:w-auto text-gray-500 inline-flex items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Delete Selected
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="p-4">Name</th>
                                    <th scope="col" class="p-4">Email</th>
                                    <th scope="col" class="p-4">Phone</th>
                                    <th scope="col" class="p-4">Simpanan Pokok</th>
                                    <th scope="col" class="p-4">Simpanan Wajib</th>
                                    <th scope="col" class="p-4">Simpanan Sukarela</th>
                                    <th scope="col" class="p-4">Sibuhar</th>
                                    <th scope="col" class="p-4">Loan</th>
                                    <th scope="col" class="p-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($memberAccounts as $member)
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 w-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-{{ $member->supabase_id }}" type="checkbox" onclick="event.stopPropagation()" class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-{{ $member->supabase_id }}" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center mr-3">
                                            <img src="{{ $member->profile ? $member->profile : 'https://flowbite.com/docs/images/people/profile-picture-5.jpg' }}" alt="Member profile" class="h-8 w-auto mr-3">
                                            {{ $member->name }}
                                        </div>
                                    </th>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $member->email }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $member->phone}}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $member->simpanan_pokok}}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $member->simpanan_wajib }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $member->simpanan_sukarela }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $member->sibuhar}}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $member->loan}}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center space-x-4">
                                            <button type="button" data-drawer-target="edit-member" data-drawer-show="edit-member" aria-controls="edit-member" class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                </svg>
                                                Edit
                                            </button>
                                            <button type="button" 
                                                data-id="{{ $member->supabase_id }}" 
                                                class="preview-button py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                </svg>
                                                Preview
                                            </button>
                                            <button type="button" data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                            Showing
                            <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                            of
                            <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                        </span>
                        <ul class="inline-flex items-stretch -space-x-px">
                            <li>
                                <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Previous</span>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page" class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>

        <!-- Edit Member Modal -->
        <form action="#" id="edit-member" class="fixed top-0 left-0 z-40 w-full h-screen max-w-md p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-update-product-label" aria-hidden="true">
            <h5 id="drawer-label" class="inline-flex items-center mb-4 text-xs font-semibold text-gray-500 uppercase dark:text-gray-400">Edit Member</h5>
            <button type="button" data-drawer-dismiss="edit-member" aria-controls="edit-member" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 dark:hover:bg-gray-600 dark:hover:text-white">
                <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="grid gap-3">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="John Doe" required="">
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="domain@example.com" required="">
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                    <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="12345678" required="">
                </div>
                <div>
                    <span class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Member Profile</span>
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-3 pb-3">
                            <svg aria-hidden="true" class="w-6 h-6 mb-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                            <p class="text-xs text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag</p>
                            <p class="text-[10px] text-gray-500 dark:text-gray-400">SVG, PNG, JPG, GIF (800x400px max)</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden">
                    </label>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-3 mt-4">
                <button type="submit" class="w-full justify-center sm:w-auto text-gray-500 inline-flex items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Update</button>
                <button type="button" data-drawer-dismiss="edit-member" aria-controls="edit-member" class="w-full justify-center sm:w-auto text-gray-500 inline-flex items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    Discard
                </button>
            </div>
        </form>
        
        <!-- Preview Member Modal -->
        <div id="read-member" class="overflow-y-auto fixed top-0 left-0 z-40 p-4 w-full max-w-lg h-screen bg-white transition-transform -translate-x-full dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
            <div>
                <h4 id="read-drawer-label" class="mb-5 leading-none text-xl font-semibold text-gray-900 dark:text-white">Member Name</h4>
            </div>
            <button type="button" 
                data-drawer-hide="read-member" 
                aria-controls="read-member" 
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="grid grid-cols-3 gap-4 mb-4 sm:mb-5">
                <div id="member-profile" class="p-2 w-auto bg-gray-100 rounded-lg dark:bg-gray-700">
                    <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Member profile picture">
                </div>
            </div> 
            <dl class="grid grid-cols-2 gap-4 mb-4">
                <div class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Member email</dt>
                    <dd id="member-email" class="flex items-center text-gray-500 dark:text-gray-400">
                        member1@test.com
                    </dd>
                </div>
                <div class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Member Phone</dt>
                    <dd id="member-phone" class="flex items-center text-gray-500 dark:text-gray-400">
                        12345678
                    </dd>
                </div>
                <div class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Simpanan Pokok</dt>
                    <dd class="text-gray-500 dark:text-gray-400">
                        <dd id="member-simpanan-pokok" class="flex items-center text-gray-500 dark:text-gray-400">
                            Rp. 100.000
                        </dd>
                    </dd>
                </div>
                <div class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600"><dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Simpanan Wajib</dt><dd id="member-simpanan-wajib" class="text-gray-500 dark:text-gray-400">Rp. 100.000</dd></div>
                <div class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600"><dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Simpanan Sukarela</dt><dd id="member-simpanan-sukarela" class="text-gray-500 dark:text-gray-400">Rp. 100.000</dd></div>
                <div class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600"><dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Sibuhar</dt><dd id="member-sibuhar" class="text-gray-500 dark:text-gray-400">Rp. 100.000</dd></div>
                <div class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600"><dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Loan</dt><dd id="member-debt" class="text-gray-500 dark:text-gray-400">Rp. 0</dd></div>
            </dl>
            <div class="flex bottom-0 left-0 justify-center pb-4 space-x-4 w-full">
                <button type="button" data-drawer-dismiss="read-member" aria-controls="read-member" class="w-full justify-center sm:w-auto text-gray-500 inline-flex items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    Deposit Simpanan <!-- To do : tambah modal deposit untuk memilih deposit kemana, sibuhar atau wajib -->
                </button>
                <button type="button" 
                    data-drawer-hide="read-member" 
                    aria-controls="read-member" 
                    class="w-full justify-center sm:w-auto text-gray-500 inline-flex items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    Back
                </button>
            </div>
        </div>

        <!-- Delete Member Modal -->
        <div id="delete-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full h-auto max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="delete-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this member?</h3>
                        <button data-modal-toggle="delete-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Yes, I'm sure</button>
                        <button data-modal-toggle="delete-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', async () => {
                const { data: { user }, error } = await window.supabase.auth.getUser();

                if (!user || error) {
                    window.location.href = '/staff';
                    return;
                }

                sessionStorage.setItem('loggedIn', 'true');
                sessionStorage.setItem('staffId', user.id);

                history.pushState(null, null, window.location.href);
                window.addEventListener('popstate', function (event) {
                    if (sessionStorage.getItem('loggedIn') === 'true') {
                        history.pushState(null, null, window.location.href);
                    }
                });

                const response = await fetch('/get-staff', {
                    method : 'POST',
                    headers : {
                        'Content-Type' : 'application/json',
                        'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').content
                    },
                    body : JSON.stringify({email : user.email})
                });

                const userData = await response.json();

                document.getElementById('email').textContent = userData.email;
                document.getElementById('profile').src = userData.profile || 'https://flowbite.com/docs/images/people/profile-picture-5.jpg';
                document.getElementById('name').textContent = userData.username;
                document.getElementById('phone').textContent = userData.phone;

                // Sign-out logic
                const signOut = document.getElementById('sign-out');
                if (signOut) {
                    signOut.addEventListener('click', async (event) => {
                        event.preventDefault();
                        await window.supabase.auth.signOut();
                        sessionStorage.removeItem('loggedIn');
                        window.location.href = '/staff';
                    });
                }

                // Save staffId when register link is clicked
                const registerLink = document.querySelector('a[href="{{ route('member-register') }}"]');
                if (registerLink) {
                    registerLink.addEventListener('click', () => {
                        sessionStorage.setItem('staffId', user.id); // Re-save or ensure it's saved before navigation
                    });
                }
            });
        </script>

        <!-- Sidebar Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const links = document.querySelectorAll('[data-table]');
                const container = document.getElementById('table-container');
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');
                const toggleButton = document.getElementById('hamburger');

                // Toggle sidebar
                toggleButton.addEventListener('click', function () {
                    sidebar.classList.toggle('-translate-x-full');
                    overlay.classList.toggle('hidden');
                });

                // Close sidebar on overlay click
                overlay.addEventListener('click', function () {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                });

                // Close sidebar on Escape key press
                document.addEventListener('keydown', function (event) {
                    if (event.key === 'Escape') {
                        sidebar.classList.add('-translate-x-full');
                        overlay.classList.add('hidden');
                    }
                });
            });
        </script>

        <!-- Preview Member Account Script -->
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                document.querySelectorAll(".preview-button").forEach(button => {
                    button.addEventListener("click", () => {
                        const memberId = button.getAttribute("data-id");

                        fetch(`/preview-member/${memberId}`)
                            .then(res => {
                                if (!res.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return res.json();
                            })
                            .then(data => {
                                // Update all fields
                                document.getElementById("read-drawer-label").innerText = data.name || 'N/A';
                                
                                // Correctly target the img tag inside #member-profile
                                const profileImg = document.querySelector("#member-profile img");
                                if (profileImg) {
                                    profileImg.src = data.profile || 'https://flowbite.com/docs/images/people/profile-picture-5.jpg';
                                }
                                
                                document.getElementById("member-email").innerText = data.email || 'N/A';
                                document.getElementById("member-phone").innerText = data.phone || 'N/A';
                                document.getElementById("member-simpanan-pokok").innerText = `Rp. ${data.simpanan_pokok?.toLocaleString() || '0'}`;
                                document.getElementById("member-simpanan-wajib").innerText = `Rp. ${data.simpanan_wajib?.toLocaleString() || '0'}`;
                                document.getElementById("member-simpanan-sukarela").innerText = `Rp. ${data.simpanan_sukarela?.toLocaleString() || '0'}`;
                                document.getElementById("member-sibuhar").innerText = `Rp. ${data.sibuhar?.toLocaleString() || '0'}`;
                                document.getElementById("member-debt").innerText = `Rp. ${data.debt?.toLocaleString() || '0'}`;

                                // Show modal - make sure this is the correct way to show your modal
                                const modal = document.getElementById("read-member");
                                modal.classList.remove("-translate-x-full");
                                modal.setAttribute('aria-hidden', 'false');
                            })
                            .catch(error => {
                                console.error('Error fetching member data:', error);
                                // You might want to show an error message to the user here
                            });
                    });
                });
            });
        </script>

        <script>
            // Add this to your existing JavaScript
            document.querySelectorAll('[data-drawer-hide="read-member"]').forEach(button => {
                button.addEventListener('click', () => {
                    const modal = document.getElementById('read-member');
                    modal.classList.add('-translate-x-full');
                    modal.setAttribute('aria-hidden', 'true');
                });
            });
        </script>
    @endpush
@endsection