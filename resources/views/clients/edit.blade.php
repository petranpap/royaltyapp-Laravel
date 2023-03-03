<x-app-layout>
    <x-slot name="header">

    </x-slot>
<style>
    a:hover {
        background: green;
        color: white !important;
        border: 0 !important;
    }
</style>
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
            <br>
            <br>
        @endif
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style=" margin-bottom: 5px; ">
            <a class="text-blue-500 border border-blue-500 hover:bg-blue-500 hover:text-white active:bg-blue-600 font-bold  px-2 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" href="../" > < Back</a>
            Client:  {{ $client->fname }} {{ $client->lname }} ID: ({{ $client->id }})

        </h2>
        <div class="pull-right">


        </div>
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <div class="min-h-screen ">
                                <div class="bg-white p-1 w-full">

                                    <form id="update" class="w-1/2 float-left" action="{{ url('update-client/'.$client->id).'/'.Auth::user()->id }}" method="Post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="flex items-center mb-5">
                                            <label for="name" class="inline-block mr-6 text-right
                                 font-bold text-gray-600">First Name</label>
                                            <input type="text" id="name" name="fname" placeholder="FirstName"
                                                   class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 text-gray-600 placeholder-gray-400 outline-none"
                                            value="{{ $client->fname }}">
                                        </div>

                                        <div class="flex items-center mb-5">
                                            <label for="name" class="inline-block mr-6 text-right
                                 font-bold text-gray-600">Last Name</label>
                                            <input type="text" id="name" name="lname" placeholder="LastName"
                                                   class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 text-gray-600 placeholder-gray-400 outline-none"
                                                   value="{{ $client->lname }}">
                                        </div>
{{--                                        <div class="flex items-center mb-5">--}}
{{--                                            <label for="name" class="inline-block mr-6 text-right pr-8--}}
{{--                                 font-bold text-gray-600">Email</label>--}}
{{--                                            <input type="text" id="email" name="email" placeholder="Email"--}}
{{--                                                   class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 text-gray-600 placeholder-gray-400 outline-none"--}}
{{--                                                   value="{{ $client->email }}">--}}
{{--                                        </div>--}}

                                        <div class="flex items-center mb-5">
                                            <label for="name" class="inline-block mr-6 text-right pr-8
                                 font-bold text-gray-600">Phone 1: </label>
                                            <input type="text" id="phone_1" name="phone_1" placeholder="Phone_1"
                                                   class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 text-gray-600 placeholder-gray-400 outline-none"
                                                   value="{{ $client->phone_1 }}">
                                        </div>

                                        <div class="flex items-center mb-5">
                                            <label for="name" class="inline-block mr-6 text-right pr-8
                                 font-bold text-gray-600">Phone 2: </label>
                                            <input type="text" id="phone_2" name="phone_2" placeholder="Phone_2"
                                                   class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 text-gray-600 placeholder-gray-400 outline-none"
                                                   value="{{ $client->phone_2 }}">
                                        </div>

                                        <div class="flex items-center mb-5">
                                            <label for="name" class="inline-block mr-6 text-right pr-8
                                 font-bold text-gray-600">Notes</label>
                                            <textarea  id="notes" name="notes" placeholder="Notes"
                                                   class="flex-1 py-2 border border-gray-400 focus:border-green-400 text-gray-600 placeholder-gray-400 outline-none"
                                                       value=""  rows="4" cols="50">{{ $client->notes }}</textarea>
                                        </div>

                                        <div class="flex items-center mb-5">
                                            <label for="name" class="inline-block mr-6 text-right pr-8
                                 font-bold text-gray-600">Current Points: </label>
                                            <input type="text" id="points" name="points" placeholder="Current Points"
                                                   class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 text-gray-600 placeholder-gray-400 outline-none"
                                                   value="{{ $client->new_points}}" disabled>
                                        </div>
                                        <div class="flex items-center mb-5">
                                        <label for="name" class="inline-block mr-6 text-right pr-8
                                 font-bold text-gray-600">Add new points: </label>
                                        <input type=number step=0.01  id="receipt" name="receipt" placeholder="Receipt"
                                               class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 text-gray-600 placeholder-gray-400 outline-none"
                                               value="" >
                                            <button
                                                style="display: none"
                                                type="button"
                                                id="add_btn"
                                                class="text-green-500 border border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold  px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                                Add +
                                            </button>

                                            <button
                                                style="display: none"
                                                type="button"
                                                id="zero_btn"
                                                class="text-red-500 border border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold  px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                                Clear Points
                                            </button>
                                </div>
                                        <div class="flex items-center mb-5" id="newpts" style="display: none">
                                            <label for="name" class="inline-block mr-6 text-right pr-8
                                 font-bold text-gray-600">New Points: </label>
                                            <input  type="text" id="new_points" name="new_points" placeholder="New Points"
                                                   class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 text-gray-600 placeholder-gray-400 outline-none"
                                                    value="" readonly>
                                        </div>






                                        <div class="text-right">
                                            <button type="submit" id="add-button" class="text-green-500 border border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase px-8 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Update</button>
                                        </div>

                                    </form>
                                    @if($client->new_points>=500)
                                        <form id="redeem" class="w-1/2 float-right" action="{{ url('redeem-client/'.$client->id)}}" method="Post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                        <input type="submit" id="redeem_btn" class=" p-16 float-right  text-blue-500 border border-blue-500 hover:bg-blue-500 hover:text-white active:bg-blue-600 font-bold  rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" value="POINTS REDEEM -500"/>
                                        </form>
                                    @endif

                                </div>
                            </div>

                    </div>

                </div>
                <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                <script>
                    $('#receipt').keyup(function() {
                        $('#add_btn').show();
                        $('#zero_btn').show();
                        $('#newpts').show();
                    });
                    $('#zero_btn').click(function () {
                        $('#receipt').val('');
                        $('#new_points').val('');
                    })

                    $('#add_btn').click(function () {
                        $('#new_points').val(Math.round($('#points').val()) + Math.round($('#receipt').val()));
                    })

                    $('#redeem_btn').click(function () {
                        event.preventDefault();

                        Swal.fire({
                            title: 'Do you want to redeem 500 points?',
                            showDenyButton: true,
                            confirmButtonText: 'Yes',
                            denyButtonText: `No`,
                            allowOutsideClick:false,
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                Swal.fire('Saved!', '', 'success')
                                setTimeout(() => {
                                    $('#redeem').submit()
                                }, 1500);
                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                        })
                    })
                </script>




            </div>
        </div>
    </div>
</x-app-layout>

