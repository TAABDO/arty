<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div>
        <button
            class="bg-blue-500 hover:bg-blue-700 ml-20 mt-20 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"><a
                href="{{ route('projects') }}">Partner update</a></button>
    </div>
    <div class="max-w-lg mx-auto">
        <form action="{{ route('projects.update', ['project' => $project->id])}}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-row justify-between">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                    <input type="text" name="name" id="name" value="{{ $project->name }}" clas="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <input type="text" name="description" id="description" value="{{ $project->description }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                <select name="status" id="status"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <option value="1">Start</option>
                    <option value="2">In Progress</option>
                    <option value="3">Finished</option>
                </select>
            </div>

            <div class="flex flex-row justify-between">

                <div class="mb-4">
                    <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Start Date:</label>
                    <input type="date" name="start_date" id="start_date" value="{{ $project->start_date }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">End Date:</label>
                    <input type="date" name="end_date" id="end_date" value="{{ $project->end_date }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
            </div>

            <div class="mb-4 w-28">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2 ">Image:</label>
                <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-68 h-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="budget" class="block text-gray-700 text-sm font-bold mb-2">Budget:</label>
                <input type="number" name="budget" id="budget" value="{{ $project->budget }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="partner_id" class="block text-gray-700 text-sm font-bold mb-2">Partner:</label>
                <select name="partner_id" id="">
                    @foreach ($partners as $partner)
                        <option value="{{ $partner->id }}"
                            {{ $project->partner_id == $partner->id ? 'selected' : '' }}> {{ $partner->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" name="submit"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            </div>

        </form>
</body>

</html>
