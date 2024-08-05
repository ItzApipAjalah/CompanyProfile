<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog Post</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/3a24v2c3w9jjmxd9gzlpop8m08ovlg9xzgi9zsgagf30q7d0/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            tinymce.init({
                selector: '#content',
                plugins: 'advlist autolink lists link image charmap preview anchor textcolor',
                toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link image',
                menubar: false,
                height: 500,
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                }
            });
        });
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
        }
        .navbar-content {
            padding: 1rem;
        }
        .navbar h1 {
            font-size: 1.875rem;
            font-weight: 700;
            color: #333;
        }
        .navbar a {
            color: #4f46e5;
            text-decoration: none;
            margin-right: 1rem;
            font-weight: 600;
        }
        .navbar a.active {
            border-bottom: 2px solid #4f46e5;
        }
        .main-content {
            padding: 2rem;
        }
        .card {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        .card h2 {
            font-size: 2rem;
            color: #333;
        }
        .button {
            background: #4f46e5;
            color: #ffffff;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background: #4338ca;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            font-size: 0.875rem;
            color: #4b5563;
            margin-bottom: 0.5rem;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: #ffffff;
        }
        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }
        .submit-button {
            background: #4f46e5;
            color: #ffffff;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .submit-button:hover {
            background: #4338ca;
        }
        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
        }
        .file-input {
            border: 2px dashed #d1d5db;
            border-radius: 6px;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }
        .file-input:hover {
            border-color: #4f46e5;
        }
        .file-input input {
            display: none;
        }
        .file-input.dragover {
            border-color: #4f46e5;
            background: #f3f4f6;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="navbar shadow-md">
            <div class="navbar-content flex justify-between items-center">
                <h1>Edit Blog</h1>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type="hidden" name="role" value="admin">
                    <button type="submit" class="button bg-red-500 hover:bg-red-600">Logout</button>
                </form>
            </div>
            <div class="bg-gray-50 border-t border-gray-200">
                <div class="container mx-auto flex space-x-4 p-4">
                </div>
            </div>
        </nav>
        <!-- Main Content -->
        <main class="main-content container mx-auto p-6">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Edit Blog</h2>
            <form action="{{ route('blog-posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <label for="title" class="block text-gray-700">Title:</label>
                    <input type="text" name="title" id="title" class="form-control w-full px-3 py-2 border border-gray-300 rounded" required value="{{ old('title', $post->title) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="content" class="block text-gray-700">Content:</label>
                    <textarea name="content" id="content" class="form-control w-full px-3 py-2 border border-gray-300 rounded" required>{{ old('content', $post->content) }}</textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="image" class="block text-gray-700">Image:</label>
                    <input type="file" name="image" id="image" class="form-control w-full px-3 py-2 border border-gray-300 rounded">
                </div>
                <button type="submit" class="submit-button bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
            </form>
        </main>
    </div>
</body>
</html>
