<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Form</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 ">
     <a href="{{ route('home') }}" class="block mb-2 text-lg text-blue-500">&larr; Go back to home </a>
     <div class="flex items-center justify-center min-h-screen">
         <form class="bg-white  rounded-2xl shadow-lg p-8 w-full max-w-2xl space-y-6" action={{ route('posts.store')}} method="POST">
        @csrf
        <h2 class="text-2xl font-bold text-gray-800 text-center">Créer un poste</h2>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
            <input type="text" name="title" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Author</label>
            <input type="text" name="author"  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Contenu</label>
            <textarea name="content" rows="5"  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
            <select name="status" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
                <option value="archived">Archived</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-sky-600 text-white py-2 rounded-lg hover:bg-sky-700">Enregistrer</button>
    </form>
     </div>
   
</body>
</html>