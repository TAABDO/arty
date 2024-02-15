<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">User List</h1>
        <button type="button" class="text-white bg-blue-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><a
                                    href="{{ route('users.create') }}">create</a></button>

        <div class="overflow-x-auto">
            <table class="table-auto border-collapse border border-gray-300 shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Domain</th>
                        <th class="px-4 py-2">Profile Picture</th>
                        <th class="px-4 py-2">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="bg-white">
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">{{ $user->domain }}</td>
                        <td class="border px-4 py-2">{{ $user->role->name }}</td>
                        <td class="border px-4 py-2">
                            <img src="{{ $user->getFirstMediaUrl('images') }}" alt="logo" class="rounded-full h-20 w-20 mx-auto">
                        </td>
                        <td class="px-6 py-3 border-b">
                            <button type="button"
                                class="text-white bg-green-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><a
                                    href="{{ route('users.edit', $user->id) }}">Update</a></button>
                            <button type="button"
                                class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><a
                                    href="{{ route('users.destroy', $user->id) }}">Delete</a></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>
