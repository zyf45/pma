<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Internship List</title>
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f3f4f6;
            color: #1a202c;
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #4299e1;
            color: #fff;

        }

        .navbar a {
            text-decoration: none;
            color: #fff;
            margin-right: 1.5rem;
            font-weight: bold;
            font-size: 1.2rem;
            font-family: Candara;
        }

        .container {
            max-width: 100%;
            padding: 2rem;
            background-color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            margin: 0 auto;
            position: relative;
            margin-top: 1rem;
            font-family: Candara;
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #2d3748;
            font-family:  Arial;
            line-height: 80px;

        }

        .internship-list {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;

        }

        .internship-item {
            flex: 0 0 calc(48% - 1rem);
            margin-bottom: 1.5rem;
            box-sizing: border-box;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            font-family: 华文中宋;

        }

        .internship-item img {
            max-width: 100%;
            height: auto;
            margin-bottom: 1rem;
            border-radius: 0.25rem;
            max-height: 200px;
        }

        .internship-category {
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #4299e1;
            font-size: 20px;
            font-family: Candara;

        }

        .internship-description {
            color: #39414f;
            white-space: pre-wrap;
            font-family: 华文中宋;
        }

        .edit-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #4299e1;
            color: #fff;
            padding: 0.5rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s;
            display: block;
            text-decoration: none;
            font-family: Candara;
        }

        .edit-button:hover {
            background-color: #2c5282;
        }

        .top-right-buttons {
            display: flex;
            gap: 10px;
        }

        .login-button,
        .register-button,
        .create-button,
        .logout-button {
            padding: 0.75rem;
            background-color: #4299e1;
            color: #fff;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-button:hover,
        .register-button:hover,
        .create-button:hover,
        .logout-button:hover {
            background-color: #2c5282;
        }

        .filter-dropdown {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .filter-dropdown label {
            font-size: 1rem;
            color: #4a5568;
        }

        .filter-dropdown button,
        .filter-dropdown select {
            padding: 0.5rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.25rem;
            font-size: 1rem;
            color: #2d3748;
        }

        .filter-dropdown button:hover,
        .filter-dropdown select:hover {
            border-color: #4299e1;
        }

        .filter-dropdown button:focus,
        .filter-dropdown select:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.5);
        }

        .filter-section {
            margin-right: 2rem;
        }

        .msg {
            margin: 20px;
            color: #8ca9d5;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="navbar">
    <div>
        <a href="/">internToYou</a>
    </div>
    <div class="top-right-buttons">
        @if(!session('employer'))
            <a href="/login" class="login-button">LOG IN</a>
            <a href="/register" class="register-button">REGISTER</a>
        @endif
        @if(session('employer'))
            <a href="/add" class="create-button">POST</a>
            <a href="/logout" class="logout-button">LOG OUT</a>
        @endif
    </div>
</div>
<div class="container">

    @if (session('msg'))
        <p class="msg">{{ session('msg') }}</p>
    @endif

    <div class="filter-dropdown">
        <div class="filter-section">
            <label for="filter">Select：</label>
            <button id="latestBtn" onclick="filterByLatest()">The latest posting</button>
        </div>

        <div class="filter-section">
            <label for="employerFilter">Employer：</label>
            <select id="employerFilter" name="employerFilter">
                <option value="all">all employers</option>
            </select>
        </div>

        <div class="filter-section">
            <label for="categoryFilter">Categories：</label>
            <select id="categoryFilter" name="categoryFilter">
                <option value="all">all categories</option>
                <option value="it">Information Technology</option>
                <option value="accounting">Accounting</option>
                <option value="business">Business</option>
            </select>
        </div>
    </div>

    <h1>Internship Position List</h1>

    <ul class="internship-list">
        @foreach($internshipPositions as $internship)
            <li class="internship-item">
                @if($internship->photo)
                    <img src="{{ asset('storage/' . $internship->photo) }}" alt="Internship Office Photo">
                @else
                    <img src="{{ asset('storage/photos/default.jpg') }}" alt="Default Image">
                @endif
                <div class="internship-category">{{ $internship->major }}</div>
                <h2>{{ $internship->title }}</h2>
                <p class="internship-description">{{ $internship->content }}</p>
                @if(session('employer') && $internship->employer_id == session('employer'))
                    <a href="{{ route('edit', ['id' => $internship->id]) }}" class="edit-button">EDIT</a>
                @endif
            </li>
        @endforeach
    </ul>
</div>

<script src="/static/js/jquery.min.js"></script>
<script>

    $(document).ready(function() {
        getAllEmployers();
    })

    function getAllEmployers() {
        $.ajax({
            url: '/getEmployers',
            method: 'GET',
            success: function(data) {
                populateEmployerDropdown(data);
            },
            error: function() {
                alert('Request failed');
            }
        });
    }

    function populateEmployerDropdown(employers) {
        const employerFilter = $('#employerFilter');
        employerFilter.empty();

        employerFilter.append('<option value="all">all employers</option>');

        $.each(employers, function(index, employer) {
            employerFilter.append('<option value="' + employer.id + '">' + employer.user + '</option>');
        });
    }

    function filterInternships() {
        const employerFilter = $('#employerFilter').val();
        const categoryFilter = $('#categoryFilter').val();

        $.ajax({
            url: '{{ route('filter') }}',
            method: 'GET',
            data: {
                employer: employerFilter,
                category: categoryFilter
            },
            success: function(data) {
                updateInternshipList(data);
            },
            error: function() {
                alert('Request failed');
            }
        });
    }

    function updateInternshipList(internships) {
        const list = $('.internship-list');
        list.empty();

        $.each(internships, function(index, internship) {
            const listItem = $('<li class="internship-item"></li>');
            listItem.append('<img src="' + (internship.photo ? '{{ asset('storage/') }}' + '/' + internship.photo : '{{ asset('storage/photos/default.jpg') }}') + '" alt="Internship Office Photo">');
            listItem.append('<div class="internship-category">' + internship.major + '</div>');
            listItem.append('<h2>' + internship.title + '</h2>');
            listItem.append('<p class="internship-description">' + internship.content + '</p>');
            @if(session('employer'))
            if (internship.employer_id === {{ session('employer') }}) {
                let editUrl = '{{ route("edit", ["id" => ":id"]) }}';
                editUrl = editUrl.replace(':id', internship.id);
                listItem.append('<a href="' + editUrl + '" class="edit-button">EDIT</a>');
            }
            @endif

            list.append(listItem);
        });
    }

    $('#employerFilter, #categoryFilter').change(function() {
        filterInternships();
    });

    $('#latestBtn').click(function() {
        sortLatest();
        $('#employerFilter').val('all');
        $('#categoryFilter').val('all');
    });

    function sortLatest() {
        $.ajax({
            url: '/sortLatest',
            method: 'GET',
            success: function(data) {
                updateInternshipList(data);
            },
            error: function() {
                alert('Request failed');
            }
        });
    }
</script>
</body>
</html>
