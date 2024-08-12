<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="container mx-auto px-6 py-16">
        <div class="bg-white shadow-lg rounded-lg p-8">
            @if(session('status'))
                <div class="mb-4 text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.password.change.submit') }}">
                @csrf

                <div class="mb-5">
                    <label for="old_password" class="block text-gray-700 font-medium mb-2">Old Password</label>
                    <input type="password" id="old_password" name="old_password" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-4 focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div class="mb-5">
                    <label for="new_password" class="block text-gray-700 font-medium mb-2">New Password</label>
                    <input type="password" id="new_password" name="new_password" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-4 focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div class="mb-5">
                    <label for="new_password_confirmation" class="block text-gray-700 font-medium mb-2">Confirm New Password</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-4 focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md">Change Password</button>
            </form>
        </div>
    </div>

</body>
</html>
