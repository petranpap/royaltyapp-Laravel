<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="w-full h-full p-4 m-8 overflow-y-auto">


        <form id="add-form"  action="/clients/add" method="Post"  >
            @csrf
            @method('POST')
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="fname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                    <input type="text" id="fname" name="fname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                </div>
                <div>
                    <label for="lname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
                    <input type="text" id="lname" name="lname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
                </div>
                <div>
                    <label for="phone_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone 1</label>
                    <input type="tel" id="phone_1" name="phone_1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="99999999" required>
                </div>
                <div>
                    <label for="phone_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone 2</label>
                    <input type="tel" id="phone_2" name="phone_2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="99999999"  >
                </div>

            </div>
{{--            <div class="mb-6">--}}
{{--                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>--}}
{{--                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required>--}}
{{--            </div>--}}

            <div class="mb-6">
                <label for="notes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notes</label>
                <textarea type="notes" id="notes" name="notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" rows="4" cols="50"></textarea>
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>


    </div>

</x-app-layout>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script>
    $("li:not(#new_client_menu)").removeClass("bg-gray-100 border-double border-4 border-yellow-600");
    $("#new_client_menu").addClass("bg-gray-100 border-double border-4 border-yellow-600");
    $("#add-button").hover(function(){
        //Check if all inputs are field in the form
        var inputs = document.querySelectorAll('#add-form input');
        var i =0;
        for (const input of inputs)
            if (input.value !== '')
                i++
        if (i < 6) // it is 6 because we have 2 hidden fields and our 4
        {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'You have to add value to all input fields!'
            })
            return false;
        }
        //Add value ton hidden input to get it to db (avatar input text)
        var avatar_val = $("#image").val().replace("C:\\fakepath\\", "");
        $("#avatar").val(avatar_val)

    });
    $("#add_new").click(function(){
        $("#add-form").toggle(1000);
    });
</script>
