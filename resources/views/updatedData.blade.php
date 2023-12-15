<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title> Update Data </title>
</head>
<body class="h-screen flex items-center justify-center">
    
    <div class="bg-gray-100 py-10 px-20  rounded-xl">
        <h1 class="text-3xl font-bold text-center"> Update Data </h1>
        <form action="{{ route('updatedData', $data->id) }}" method="POST">
            @csrf
            <div class="flex flex-col">
                <label for="name" class="text-xl mt-4"> Name: </label>
                <input type="text" name="name" id="name" value="{{ $data->name }}" class="border-2 border-gray-300 p-2 rounded-lg" required>
                <span style="color: red"> @error('name') {{ $message }} @enderror</span>

                <label for="email" class="text-xl mt-4"> Email: </label>
                <input type="email" name="email" id="email" value="{{ $data->email }}" class="border-2 border-gray-300 p-2 rounded-lg" required>
                <span style="color: red"> @error('email') {{ $message }} @enderror</span>

                <label for="state" class="text-xl mt-4"> State: </label>
                <input type="text" name="state" id="state" value="{{ $data->state }}" class="border-2 border-gray-300 p-2 rounded-lg" required>
                <span style="color: red"> @error('state') {{ $message }} @enderror</span>

                <label for="phone_no" class="text-xl mt-4"> Phone Number: </label>
                <input type="text" name="phone_no" id="phone_no" value="{{ $data->phone_no }}" class="border-2 border-gray-300 p-2 rounded-lg" required>
                <span style="color: red"> @error('phone_no') {{ $message }} @enderror</span>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                    Update
                </button>

            </div>
        </form>
    </div>
    
</body>
</html>
