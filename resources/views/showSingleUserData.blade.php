<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title> 
        @foreach ($singleData as  $data )
         {{ $data->name }} 
        @endforeach 
    </title>
</head>
<body class="h-screen flex items-center justify-center">
    <div class="bg-gray-100 py-10 px-20 rounded-xl">
        <h1 class="font-bold text-3xl"> Single User Data </h1>
        @foreach ($singleData as $id => $data )
            <h3 class="text-lg my-2"> <b> Name: </b>  {{ $data->name }} </h3>
            <h3 class="text-lg my-2"> <b> Email: </b>  {{ $data->email }} </h3>
            <h3 class="text-lg my-2"> <b> State: </b> {{ $data->state }} </h3>
            <h3 class="text-lg my-2"> <b> Phone Number: </b>  {{ $data->phone_no }} </h3>
        @endforeach
    </div>
</body>
</html>