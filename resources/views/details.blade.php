<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
     @vite('resources/css/app.css')
</head>
<body>
     <div class="bg-white rounded-xl shadow p-5 hover:shadow-lg m-auto w-100">
                <h2 class="font-bold text-lg text-gray-800 mb-2">{{ $post->title }}</h2>
                <p class="text-xs text-gray-500 mb-1">Posted {{ $post->created_at->diffForHumans()  }} By {{ $post->author }}</p>
                <p class="text-xs text-gray-500 mb-3">Status: {{ $post->status }}</p>
                <p class="text-sm text-gray-700">{{ $post->content }}</p>
                <a href="{{ route('posts.edit',$post) }}" class="bg-sky-500 text-white px-2 m-2 py-1 text-xs rounded-lg ">Update</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-2 py-1 text-xs rounded-lg">Delete</button>                
                </form>
            </div>
</body>
</html>