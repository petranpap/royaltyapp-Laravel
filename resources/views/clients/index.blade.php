@if( Auth::user())


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="w-full h-full p-4 m-8 overflow-y-auto">
        @if(session()->has('status'))

            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold"> {{ session()->get('status') }} </p>
                        <p class="text-sm">Successfully.</p>
                    </div>
                </div>
            </div>
        @endif
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        {{ $clients->links() }}
                        <input id="search_users" type="text"  class="block p-4 pl-10 text-sm text-gray-900 border border-black rounded-lg  focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search phone, name...">
                        <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400 " id='table_users'>
                            <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-black-700 dark:text-black-700">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Name
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Phone_1
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Phone_2
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Points
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Last Update
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($clients as $client)
                            <tr class="bg-white border-b hover:bg-teal-100 hover:text-black dark:border-white-700 text-sm text-black">
                                <td class="py-4 px-6"> {{ $client->fname }} {{ $client->lname }}</td>
                                <td class="py-4 px-6"> {{ $client->phone_1 }}</td>
                                <td class="py-4 px-6"> {{ $client->phone_2 }}</td>
                                <td class="py-4 px-6"> {{ $client->new_points }}</td>
                                <td class="py-4 px-6"> {{ $client->updated_at }}</td>
                                <td>
                                    <a class="btn btn-primary" href="/clients/edit/{{ $client->id}}"><img src="/icons/view.png" width="50"></a>

                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>

                </div>


    </div>

</x-app-layout>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script>
    $("li:not(#clients_menu)").removeClass("bg-gray-100 border-double border-4 border-yellow-600");
    $("#clients_menu").addClass("bg-gray-100 border-double border-4 border-yellow-600");
    $(document).ready(function(){
        $("#search_users").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table_users tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

</script>
@else
    <script>window.location = "/";</script>
@endif
