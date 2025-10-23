<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen bg-gray-50">
    <h1 class="text-sky-500 text-2xl text-center mt-6">Liste des postes</h1>
    <a href="{{ route('posts.create')}}" class="m-auto w-[200px] bg-sky-600 text-white text-center py-2 rounded-lg hover:bg-sky-700">Ajouter un post</a>

    <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        @foreach ($posts as $post)
            <div class="bg-white rounded-xl shadow p-5 hover:shadow-lg transition">
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
        @endforeach
    </div>
    <div class="w-[50%] pb-6 px-6">
        {{ $posts->links() }}
    </div>
</body>
</html>