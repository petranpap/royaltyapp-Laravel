@if (Auth::user()->admin == 1)


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="w-full h-full p-4 m-8 overflow-y-auto">
        @if(session()->has('delete'))

            <div class="bg-red-300 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold"> {{ session()->get('delete') }} </p>
                        <p class="text-sm">Successfully.</p>
                    </div>
                </div>
            </div>
        @endif

            @if(session()->has('success'))

                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                            <p class="font-bold"> {{ session()->get('success') }} </p>
                            <p class="text-sm">Successfully.</p>
                        </div>
                    </div>
                </div>
            @endif
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        {{ $cashiers->links() }}
                        <input id="search_users" type="text"  class="block p-4 pl-10 text-sm text-gray-900 border border-black rounded-lg  focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search phone, name...">
                        <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400 " id='table_users'>
                            <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-black-700 dark:text-black-700">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Name
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Email
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Created
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Edit
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Delete
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($cashiers as $cashier)
                            <tr class="bg-white border-b hover:bg-teal-100 hover:text-black dark:border-white-700 text-sm text-black">
                                <td class="py-4 px-6"> {{ $cashier->name }} </td>
                                <td class="py-4 px-6"> {{ $cashier->email }}</td>
                                <td class="py-4 px-6"> {{ $cashier->created_at }}</td>

                                <td>
                                    <a class="btn btn-primary" href="/cashiers/edit/{{ $cashier->id}}"><img src="/icons/edit_user.png" width="50" style=" display: block; margin-left: auto; margin-right: auto; "></a>

                                </td>
                                <td>
                                    <form action="/cashiers/delete/{{ $cashier->id}}" method="Post" id="delete_form">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" id="delete_user_btn"><img src="/icons/delete_user.png" width="50"></button>
                                    </form>
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
    $("li:not(#cashiers_menu)").removeClass("bg-gray-100 border-double border-4 border-yellow-600");
    $("#cashiers_menu").addClass("bg-gray-100 border-double border-4 border-yellow-600");
    $(document).ready(function(){
        $("#search_users").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table_users tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });


    $('#delete_user_btn').click(function () {
        event.preventDefault();

        Swal.fire({
            title: 'Do you want to delete the cashier?',
            showDenyButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
            allowOutsideClick:false,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Cashier Deleted!', '', 'error')
                setTimeout(() => {
                    $('#delete_form').submit()
                }, 1500);
            } else if (result.isDenied) {
                Swal.fire('Cashier is not deleted', '', 'info')
            }
        })
    })
</script>
@else
    <script>window.location = "/";</script>
@endif
