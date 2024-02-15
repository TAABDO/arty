<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />


    <style>
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            z-index: 1000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .containe {
            background: rgb(176, 212, 249);
            width: 100%;
            height: 80%;
        }
    </style>
    <title>Home</title>
</head>

<body>

    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ArtyCool</span>
            </a>
            @auth
                {{--  ======================  --}}
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                            <span
                                class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            @if (Auth::user()->role_id === 1)
                                <li>
                                    <a href="{{ route('DashAdmin') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                                </li>
                            @elseif(Auth::user()->role_id === 2)
                                <li>
                                    <a href={{ route('partner') }}
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">My
                                        Profile</a>
                                </li>
                            @endif

                            <li>
                                <a href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</a>
                            </li>
                        </ul>
                    </div>
                    <button data-collapse-toggle="navbar-user" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                {{--  ==================================================  --}}
            @else
                <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <a href="{{ route('login') }}"><button type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button></a>
                    <a href="{{ route('register') }}"> <button type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Regester</button></a>

                    <button data-collapse-toggle="navbar-sticky" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                {{--  ===================================================  --}}
            @endauth
            {{--  ===================================================  --}}

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="containe mx-auto pt-48 ">
        <div class="flex flex-row ml-12">
            <div class="ml-20 lg:w-7/12 md:w-6/12 sm:w-full ">
                <h1 class="mt-4 mb-4 text-3xl font-bold">ArtyCool</h1>

                <!-- Search Bar -->
                <div class="flex mb-3">
                    <input type="text" class="w-full px-4 py-2 border rounded-l-md" id="searchInput"
                        placeholder="Search by title, author, genre">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-r-md"
                        onclick="searchBooks()">Search</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Book Cards Container -->
    <div>
        <h1 class="mt-4 mb-4 text-3xl font-bold">New_Project</h1>
    </div>
    <div class="section bg-blue-100">
        <div class="flex flex-wrap justify-center">
            @foreach ($projects as $project)
                <div class="bg-white rounded-lg overflow-hidden drop-shadow-2xl mx-4 my-8 w-80">
                    <div class="p-4">
                        <div class="image mb-3">
                            @if ($project->getFirstMedia('images'))
                                <img src="{{ $project->getFirstMediaUrl('images') }}" alt="project image"
                                    class="w-full h-40 rounded-20 drop-shadow-2xl">
                            @else
                                <p class="text-gray-500">No avatar available</p>
                            @endif
                        </div>
                        <h5 class="text-xl font-bold mb-2">{{ $project->name }}</h5>
                        <h6 class="text-gray-600 mb-2">{{ $project->description }}</h6>
                        <p class="text-gray-700 mb-2">Date: {{ $project->start_date }} - {{ $project->end_date }}</p>
                        <p class="text-gray-700 mb-2">Budget: {{ $project->budget }} DH</p>
                        {{--  <p class="text-gray-700 mb-4">{{ $project->additional_info }}</p>  --}}
                        <div class="flex justify-center">
                            @auth
                                <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2"
                                    onclick="openPopup('{{ $project->name }}', '{{ $project->description }}', '{{ $project->start_date }} - {{ $project->end_date }}','{{ $project->budget }}')">View
                                    Details</a>
                            @else
                                <a href="{{ route('register') }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2">Register to View Details</a>
                            @endauth
                            <button type="button" class="bg-yellow-500 text-white px-4 py-2 rounded-md mr-2"><a
                                    href="">Reserve</a></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <div id="popup" class="modal">
        <span class="close-btn" onclick="closePopup()">X</span>
        <h2 id="popupTitle"></h2>
        <p id="popupAuthor"></p>
        <p id="popupDescription"></p>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="overlay" onclick="closePopup()"></div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white p-8 mt-10">
        <div class="container mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="col-span-2 md:col-span-1">
                    <h3 class="text-lg font-semibold mb-4">About Us</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                </div>
                <div class="md:col-span-1">
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <p>Email: contact@example.com</p>
                    <p>Phone: +1 123 456 7890</p>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-white hover:text-gray-500"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white hover:text-gray-500"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white hover:text-gray-500"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

    <script>
        function openPopup(title, author, description) {
            document.getElementById("popupTitle").innerText = title;
            document.getElementById("popupAuthor").innerText = "Author: " + author;
            document.getElementById("popupDescription").innerText = "Description: " + description;
            document.getElementById("popup").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }

        function closePopup() {
            document.getElementById("popup").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
    </script>

</body>

</html>
