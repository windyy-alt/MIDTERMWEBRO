<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amimir Library - Category Information</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Display&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
            font-family: "Poppins", sans-serif; 
        }

        body {
            min-height: 100vh;
            background: rgba(0, 0, 0, 0.6);
            overflow-x: hidden;
        }

        #bg-video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -2;
            object-fit: cover;
        }

        .overlay {
            position: fixed;
            top: 0; 
            left: 0;
            width: 100%; 
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        nav {
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            padding: 15px 60px;
            position: fixed; 
            width: 100%;
            top: 0; 
            left: 0;
            z-index: 100;
            background: #7c1313;
            backdrop-filter: blur(6px);
        }

        .logo, .logo h2, .logo-img {
            margin: 0;
            padding: 0;
        }


        .logo { 
            display: flex; 
            align-items: center; 
            gap: 20px;
        }
        .logo-img { 
            width: 45px; 
            height: 45px; 
            object-fit: contain; 
        }
        .logo h2 { 
            font-size: 22px; 
            color: #fd8916; 
            font-family: "Libre Caslon Display", serif; 
        }

        nav ul { 
            list-style: none; 
            display: flex; 
            gap: 25px; 
        }

        nav ul li a, nav ul li button {
            text-decoration: none;
            color: #fd8916;
            font-weight: 500;
            transition: 0.3s;
            font-family: "Libre Caslon Display", serif;
            font-weight: 600;
            background: none; 
            border: none; 
            cursor: pointer;
        }

        nav ul li a:hover, nav ul li button:hover {
            background: #fd8916; 
            color: #000;
            padding: 12px 25px;
            border-radius: 30px;
            font-size: 1rem; font-weight: bold;
        }

        .container {
            background-color: rgba(122, 18, 18, 0.8);
            justify-content: center; align-items: center;
            margin: 120px auto 0;
            width: 85%;
            padding: 20px;
            border-radius: 12px;
        }

        h2 {
            text-align: center;
            color: #ffb84d;
            margin-bottom: 20px;
        }

        table {
            width: 100%; border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.1);
        }

        th, td {
            padding: 10px; text-align: left;
            border: 1px solid #ffb84d;
            color: #fff;
        }

        th {
            background-color: rgba(255, 184, 77, 0.5);
            color: #fff;
            text-transform: uppercase;
        }

        .add-book-btn {
            background-color: #ffb84d;
            color: #7a1212;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .actions {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .action-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 20px;
            transition: 0.3s;
        }

        .action-btn.edit { color: #ffb84d; }
        .action-btn.delete { color: #ff4d4d; }

        .action-btn:hover {
            transform: scale(1.2);
        }

        footer {
            text-align: center;
            color: #ffb84d;
            background-color: #7a1313;
            padding: 8px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        form { display: none; margin-bottom: 20px; }

        .form-group { margin-bottom: 10px; }
        label { display: block; margin-bottom: 5px; color: #fff; }
        input, select {
            width: 100%; padding: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .add-btn {
            background-color: #ffb84d;
            color: #7a1212;
            border: none;
            padding: 8px 15px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <video autoplay muted loop id="bg-video">
        <source src="{{ asset('videos/background.mp4') }}" type="video/mp4">
    </video>
    <div class="overlay"></div>

    <nav>
        <div class="logo">
            <img src="{{ asset('images/image.png') }}" alt="Amimir Logo" class="logo-img">
            <h2>Amimir Library</h2>
        </div>
        <ul>
            <li><a href="{{ route('books.index') }}">Manage Books</a></li>
            <li><a href="{{ route('category.index') }}">Manage Categories</a></li>
            <li><a href="#">Manage Members</a></li>
            <li><a href="#">Manage Borrows</a></li>
            <li><a href="#">Profile</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="container">
        <h2>Category Information</h2>

        <button class="add-book-btn" onclick="toggleForm()">+ Add Category</button>

        {{-- Tambah Kategori --}}
        <form id="addCategoryForm" method="POST" action="{{ route('category.store') }}">
            @csrf
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="name" required>
            </div>
            <button type="submit" class="add-btn">Save</button>
        </form>

        {{-- Tabel Kategori --}}
        <table>
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ str_pad($category->id, 5, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at->format('Y-m-d') }}</td>
                    <td>{{ $category->updated_at->format('Y-m-d') }}</td>
                    <td class="actions">
                        {{-- Tombol Edit --}}
                        <a href="{{ route('category.edit', $category->id) }}" class="action-btn edit" title="Edit">
                            ✏
                        </a>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete" title="Delete">🗑</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <footer>
        Copyright © Amimir Library
    </footer>

    <script>
        function toggleForm() {
            const form = document.getElementById('addCategoryForm');
            form.style.display = (form.style.display === 'block') ? 'none' : 'block';
        }
    </script>
</body>
</html>