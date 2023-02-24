<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Styles -->

</head>

<body class="antialiased">
    <div class="container-fluid text-white py-2 bg-primary">
        <h2 class="text-center">Search/Filter</h2>
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    <a href="{{ url('/admin/home') }}"
                        class="font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif --}}
                @endauth
            </div>
        @endif
    </div>

    <div class="container col-6 mt-5">
        <input type="text" class="form-control mb-4 p-3" placeholder="Search" id="search-input">
        <ul class="list-group list-group-flush text-primary h-5">
            @foreach ($user as $data)
                <li class="list-group-item p-3">
                    <div class="col">
                        <div>nama : {{ $data->user->name }}</div>
                        <div>email : {{ $data->user->email }}</div>
                        <div>department : {{ $data->departement->name }}</div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>

<script>
    document.querySelector('#search-input')
    addEventListener('input', filterList)

    function filterList() {
        const searchInput = document.querySelector('#search-input')
        const filter = searchInput.value.toLowerCase()
        const listItem = document.querySelectorAll('.list-group-item')

        listItem.forEach((item) => {
            let text = item.textContent
            if (text.toLowerCase().includes(filter.toLowerCase())) {
                item.style.display = ''
            } else {
                item.style.display = 'none'
            }
        })

    }
</script>

</html>
