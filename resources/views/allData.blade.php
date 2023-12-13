<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title> User's Data </title>
</head>
<body>
    <div class="w-full">
        <h1 class="text-3xl font-bold text-center my-5"> All User's Data </h1>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-60 my-3">
            <a href="{{ route('add-data')}}"> ADD NEW </a>
        </button>

        <div class="overflow-x-auto mx-60 mt-4">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-gray-600 text-white">
                        <th class="p-4 border-b text-left">Name</th>
                        <th class="p-4 border-b text-left">Email</th>
                        <th class="p-4 border-b text-left">State</th>
                        <th class="p-4 border-b text-left">Phone Number</th>
                        <th class="p-4 border-b text-left"> Actions </th>
                    </tr>
                </thead>
                <tbody class="border-gray-300 border-2">
                        @foreach ($allData as $data)
                        <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                            <td class="py-2 px-4 border-b"> {{ $data->name}} </td>
                            <td class="py-2 px-4 border-b"> {{ $data->email}} </td>
                            <td class="py-2 px-4 border-b"> {{$data->state}} </td>
                            <td class="py-2 px-4 border-b"> {{$data->phone_no}} </td>
                            <td class="py-2 px-4 border-b"> 
                            <div class="flex gap-3">
                                <a href="{{ route('singleuserdata', $data->id)}}"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </a>
                                <a href="{{ route('delete', $data->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                      </svg>                                      
                                </a>
                                <a href="{{ route('update', $data->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                      </svg>                                      
                                </a>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            <div class="flex justify-center mt-5">
                {{ $allData->links() }}
            </div>
        </div>

    </div>
</body>
</html>