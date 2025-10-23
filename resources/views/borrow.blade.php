<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amimir Library - Borrow Management</title>
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
            background-color: rgba(122, 18, 18, 0.85);
            margin: 120px auto 0; width: 85%; padding: 25px;
            border-radius: 12px;
        }

        h2 { text-align: center; color: #ffb84d; margin-bottom: 20px; }

        table {
            width: 100%; border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.1);
        }

        th, td {
            padding: 10px; border: 1px solid #ffb84d; color: #fff; text-align: center;
        }

        th { background-color: rgba(255, 184, 77, 0.5); text-transform: uppercase; }

        .add-btn, .export-btn {
            background-color: #ffb84d; color: #7a1212;
            border: none; padding: 10px 15px;
            border-radius: 8px; cursor: pointer; font-weight: bold;
        }

        .btn-group { display: flex; gap: 10px; margin-bottom: 15px; }

        .action-btn {
            background: none; border: none; cursor: pointer;
            font-size: 20px; transition: 0.3s;
        }
        .action-btn.return { color: #ffb84d; }
        .action-btn.delete { color: #ff4d4d; }
        .action-btn:hover { transform: scale(1.2); }

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

    
        .popup {
            display: none; position: fixed; top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center; align-items: center;
            z-index: 200;
        }

        .popup-content {
            background: #7a1212; padding: 25px; border-radius: 12px;
            width: 400px; color: #fff; text-align: center;
        }

        .popup-content select, .popup-content input {
            width: 100%; padding: 8px; margin-top: 10px;
            border-radius: 6px; border: 1px solid #ccc;
        }

        .popup-content button {
            margin-top: 15px; padding: 8px 20px;
            border: none; border-radius: 6px;
            background-color: #ffb84d; color: #7a1212;
            font-weight: bold; cursor: pointer;
        }

        .return-btn {
            background-color: #ffb84d;
            color: #7a1212;
            border: none;
            padding: 6px 14px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .return-btn:hover {
            background-color: #ffcc66;
            transform: scale(1.05);
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
            <a href="{{ route('dashboard') }}" style="display: flex; align-items: center; gap: 20px; text-decoration: none;">
                <img src="{{ asset('images/image.png') }}" alt="Amimir Logo" class="logo-img">
                <h2 style="color:#fd8916;">Amimir Library</h2>
            </a>
        </div>
    <ul>
            <li><a href="{{ route('books.index') }}">Manage Books</a></li>
            <li><a href="{{ route('category.index')}}">Manage Categories</a></li>
            <li><a href="{{ route('member.index')}}">Manage Members</a></li>
            <li><a href="{{ route('borrow.index')}}">Manage Borrows</a></li>
            <li><a href="{{ route('profile.edit') }}">Profile</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Log Out</button>
                </form>
            </li>
    </ul>
</nav>

<div class="container">
    <h2>Borrow Management</h2>

    <div class="btn-group">
        <button class="add-btn" onclick="openPopup()">+ Add Borrow</button>
        <button class="export-btn" onclick="openExport()">Export CSV</button>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Member</th>
                <th>Book</th>
                <th>Borrow Date</th>
                <th>Returned Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrow as $loan)
            <tr>
                <td>{{ str_pad($loan->id, 5, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $loan->member->name }}</td>
                <td>{{ $loan->book->title }}</td>
                <td>{{ $loan->borrowed_at }}</td>
                <td>{{ $loan->returned_at ?? '-' }}</td>
                <td>{{ $loan->status }}</td>
                <td>
    @if($loan->status == 'Borrowed')
    <form action="{{ route('borrow.update', $loan->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('PUT')
        <input type="hidden" name="status" value="Returned">
        <button type="submit" class="return-btn">Return</button>
    </form>
    @endif
    <form action="{{ route('borrow.destroy', $loan->id) }}" method="POST"
        style="display:inline;" onsubmit="return confirm('Delete this record?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="action-btn delete">🗑</button>
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


<div class="popup" id="addPopup">
    <div class="popup-content">
        <h3>Add New Borrow</h3>
        <form id="borrowForm" method="POST" action="{{ route('borrow.store') }}">
            @csrf
            <label>Member</label>
            <select name="member_id" required>
                <option value="">-- Select Member --</option>
                @foreach($members as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>

            <label>Book</label>
            <select name="book_id" required>
                <option value="">-- Select Book --</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>

            <button type="submit">Submit</button>
            <button type="button" onclick="closePopup()">Cancel</button>
        </form>
    </div>
</div>


<div class="popup" id="exportPopup">
    <div class="popup-content">
        <h3>Export Loan Data</h3>
        <p>Download all loan records as CSV file.</p>
        <form method="GET" action="{{ route('borrow.exportCSV') }}">
            <button type="submit">Export CSV</button>
            <button type="button" onclick="closeExport()">Cancel</button>
        </form>
    </div>
</div>

<script>
    function openPopup() {
        document.getElementById('addPopup').style.display = 'flex';
    }
    function closePopup() {
        document.getElementById('addPopup').style.display = 'none';
    }

    function openExport() {
        document.getElementById('exportPopup').style.display = 'flex';
    }
    function closeExport() {
        document.getElementById('exportPopup').style.display = 'none';
    }
</script>

</body>
</html>