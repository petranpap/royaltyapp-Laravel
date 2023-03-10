<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="/icons/icon_dominate.png">

    <title>Dominate Royalty App</title>
    <script src="https://cdn.tailwindcss.com/"></script>
</head>

<body>
<nav class="fixed z-30 w-full bg-white border-b-2 border-yellow-200" style="background: #f9d352">
    <div class="px-6 py-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button class="p-2 text-gray-600 rounded cursor-pointer lg:hidden ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <a href="#" class="flex items-center text-xl font-bold">
                    <span class="text-blue-800"> <img src="/icons/dominate-logo-2020-new.png" class="w-2/4"></span>
                </a>

            </div>
            <div class="flex items-center  mt-1 lg:w-64">
                <div class="hidden mr-6 lg:block">

                </div>
                <div>

                </div>

                <div class="relative mt-1 lg:w-64">
                    <span class="mx-1"><b><i>Hello</i></b> {{ Auth::user()->name }}</span>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="pt-12 lg:flex">
    <div class="flex flex-col w-full px-4 py-8 overflow-y-auto border-b lg:border-r lg:h-screen lg:w-64">


        <div class="flex flex-col justify-between mt-6">
            <aside>
                <ul>
                    <li>
                        <a class="flex items-center px-4 py-2 text-gray-700 rounded-md " id="clients_menu" href="/clients">
                            <img src="/icons/clients.png" width="35">

                            <span class="mx-4 font-medium">All Clients</span>
                        </a>
                    </li>

                    <li>
                        <a class="flex items-center px-4 py-2 mt-5 text-gray-600 rounded-md hover:bg-gray-200" id="new_client_menu" href="/clients/new">
                            <img src="/icons/newuser.png" width="35">

                            <span class="mx-4 font-medium">Add New Client</span>
                        </a>
                    </li>

                    <li>
                        <a class="flex items-center px-4 py-2 mt-5 text-gray-600 rounded-md hover:bg-gray-200 "  id="search_client_menu" href="/clients/search">
                            <img src="/icons/search.png" width="35">

                            <span class="mx-4 font-medium">Search Client</span>
                        </a>
                    </li>
                    <hr>
                    @if (Auth::user()->admin == 1)

                        <li >
                            <a class="flex items-center px-4 py-2 mt-5 text-gray-600 rounded-md hover:bg-gray-200 "  id="trans_menu" href="/trans">
                                <img src="/icons/trans_history.png" width="35">

                                <span class="mx-4 font-medium">Transactions History</span>
                            </a>
                        </li>

                        <li >
                            <a class="flex items-center px-4 py-2 mt-5 text-gray-600 rounded-md hover:bg-gray-200 "  id="cashiers_menu" href="/cashiers">
                                <img src="/icons/cashier.png" width="35">

                                <span class="mx-4 font-medium">All Cashiers</span>
                            </a>
                        </li>

                        <li >
                            <a class="flex items-center px-4 py-2 mt-5 text-gray-600 rounded-md hover:bg-gray-200 "  id="trans_menu" href="/register">
                                <img src="/icons/add_cashier.png" width="35">

                                <span class="mx-4 font-medium">Create Cashier</span>
                            </a>
                        </li>
                    @endif

                    <li>
<br>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" class="bg-red-600 text-white">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-white hover:bg-red-400 hover:text-gray-700">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>

            </aside>

        </div>
    </div>
    <div class="w-full h-full p-4 m-8 overflow-y-auto">
        <div class="flex bo items-center justify-center ">
                    {{ $slot }}
        </div>
    </div>
</div>
</body>
</body>

</html>
