<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amimir Library - Book Information</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Display&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
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
            font-size: 1rem;
            font-weight: bold;
        }


        .container {
            background-color: rgba(122, 18, 18, 0.8);
            justify-content: center;
            align-items: center;
            margin: 120px  auto 0;
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
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ffb84d;
        }

        th {
            background-color: rgba(255, 184, 77, 0.5);
            color: #fff;
            text-transform: uppercase;
        }

        td img {
            width: 60px;
            height: 80px;
            border-radius: 6px;
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

        
        footer {
            text-align: center;
            background-color: #7c1313;
            color: #fd8916;
            padding: 8px;
            width: 100%;
            font-size: 13px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        form {
            display: none;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
        }

        .edit-btn, .delete-btn {
            background-color: #ffb84d;
            color: #7a1212;
            border: none;
            padding: 5px 10px;
            border-radius: 7px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
        }

        .edit-btn:hover {
            background-color: #ffd27f;
        }

        .delete-btn {
            background-color: #c0392b;
            color: white;
        }

        .delete-btn:hover {
            background-color: #e74c3c;
        }

    </style>
</head>
<body>

    <video autoplay muted loop id="bg-video">
        <source src="{{ asset('videos/background.mp4') }}" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>

    <div class="overlay"></div>

  <nav>
    <div class="logo">
      <img src="{{ asset('images/image.png') }}" alt="Amimir Logo" class="logo-img">
      <h2>Amimir Library</h2>
    </div>
    <ul>
      <li><a href="{{ route('books.index') }}">Manage Books</a></li>
      <li><a href="#">Manage Categories</a></li>
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
    <h2>Book Information</h2>

    <button class="add-book-btn" onclick="toggleForm()">+ Add Book</button>

    <form id="addBookForm" method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" required>
        </div>

        <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" required>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category_id" required>
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Cover Image</label>
            <input type="file" name="cover">
        </div>

        <button type="submit" class="add-book-btn">Save</button>
    </form>


    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Cover</th>
                <th>Author</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ str_pad($book->id, 5, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category->name ?? '-' }}</td>
                    <td>
                        @if($book->cover)
                            <img src="{{ asset('storage/' . $book->cover) }}" alt="cover" style="width:100px;">
                        @else
                            <em>No Image</em>
                        @endif
                    </td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->created_at->format('Y-m-d') }}</td>
                    <td>{{ $book->updated_at->format('Y-m-d') }}</td>


                     <td class="action-buttons">
                            <button type="button" class="edit-btn"
                                onclick="editBook('{{ $book->id }}', '{{ addslashes($book->title) }}', '{{ addslashes($book->author) }}', '{{ $book->category_id }}')">
                                Update
                            </button>



                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="margin-top: 5px; display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this book?')">
                                Delete
                            </button>
                        </form>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>


</div>

  <footer>
    <p>© Amimir Group | Created for ETS</p>
  </footer>

<script>
    function toggleForm() {
        const form = document.getElementById('addBookForm');
        form.style.display = (form.style.display === 'block') ? 'none' : 'block';
    }

   
        function editBook(id, title, author, category_id) {
            const form = document.getElementById('addBookForm');
            form.style.display = 'block'; 
           
            form.action = `/books/${id}`;

          
            let methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'PUT';
            form.appendChild(methodInput);

          
            form.querySelector('input[name="title"]').value = title;
            form.querySelector('input[name="author"]').value = author;
            form.querySelector('select[name="category_id"]').value = category_id;

           
            const submitBtn = form.querySelector('button[type="submit"]');
            submitBtn.textContent = 'Update Book';
        }

</script>
</body>
</html>