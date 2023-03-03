<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="w-full h-full p-4 m-8 overflow-y-auto" id="search_panel">





        </form>
        <form   action="/clients_search" method="Post"  class="border border-b-4 border-gray-400 p-4">
            @csrf
            @method('POST')
            <div class="grid gap-6 mb-6 md:grid-cols-2">


                <div>
                    <label for="phone_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone </label>
                    <input type="tel" id="phone_1" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="99999999" >
                </div>
                <button id="phone_1_btn" style="width: 50%;height: fit-content;margin: 4%;" type="submit" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-not-allowed">Search</button>


            </div>


        </form>





    </div>

    @isset($client_data)

        <script>
            document.getElementById("search_panel").style.display='none'
        </script>
        <div class="w-full h-full p-4 m-8 overflow-y-auto p-6 bg-white border-b border-gray-200 " >
            <a class="flex items-center px-4 py-2 mt-5 text-blue-500 border border-blue-500 hover:bg-blue-500 hover:text-white active:bg-blue-600 font-bold rounded-md border border-gray-200 w-fit"  id="search_client_menu" href="/clients/search">
                <img src="/icons/search.png" width="35">

                <span class="mx-4 font-medium">Search Again</span>
            </a>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">

                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400 ">
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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($client_data as $client)
                        <tr class="bg-white border-b hover:bg-teal-100 hover:text-black dark:border-white-700 text-sm text-black">
                            <td class="py-4 px-6"> {{ $client->fname }} {{ $client->lname }}</td>
                            <td class="py-4 px-6"> {{ $client->phone_1 }}</td>
                            <td class="py-4 px-6"> {{ $client->phone_2 }}</td>
                            <td class="py-4 px-6"> {{ $client->new_points }}</td>
                            <td>
                                <a class="btn btn-primary" href="/clients/edit/{{ $client->id}}"><img src="/icons/view.png" width="50"></a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>

        </div>

    @endisset

</x-app-layout>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script>
    $("li:not(#search_client_menu)").removeClass("bg-gray-100 border-double border-4 border-yellow-600");
    $("#search_client_menu").addClass("bg-gray-100 border-double border-4 border-yellow-600");
    $(':button').prop('disabled', true);

    $("#fname").on("keyup change", function(e) {
        $("#fname_btn").prop('disabled', false);
        $("#fname_btn").removeClass('bg-gray-700 hover:bg-gray-800 cursor-not-allowed');
        $("#fname_btn").addClass('bg-blue-700 hover:bg-blue-800 ')

    })

    $("#lname").on("keyup change", function(e) {
        $("#lname_btn").prop('disabled', false);
        $("#lname_btn").removeClass('bg-gray-700 hover:bg-gray-800 cursor-not-allowed');
        $("#lname_btn").addClass('bg-blue-700 hover:bg-blue-800 ')

    })

    $("#email").on("keyup change", function(e) {
        $("#email_btn").prop('disabled', false);
        $("#email_btn").removeClass('bg-gray-700 hover:bg-gray-800 cursor-not-allowed');
        $("#email_btn").addClass('bg-blue-700 hover:bg-blue-800 ')

    })

    $("#phone_1").on("keyup change", function(e) {
        $("#phone_1_btn").prop('disabled', false);
        $("#phone_1_btn").removeClass('bg-gray-700 hover:bg-gray-800 cursor-not-allowed');
        $("#phone_1_btn").addClass('bg-blue-700 hover:bg-blue-800 ')

    })

    $("#phone_2").on("keyup change", function(e) {
        $("#phone_2_btn").prop('disabled', false);
        $("#phone_2_btn").removeClass('bg-gray-700 hover:bg-gray-800 cursor-not-allowed');
        $("#phone_2_btn").addClass('bg-blue-700 hover:bg-blue-800 ')

    })
</script>
