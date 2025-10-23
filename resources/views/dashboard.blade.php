<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amimir Library - Dashboard</title>
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
      gap: 15px;
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

    .hero {
      height: 70vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      margin-top: 100px;
      z-index: 1;
    }

    .hero h1 {
      color: #ffdec2;
      font-size: 80px;
      font-family: "Libre Caslon Display", serif;
    }

    .stats {
      min-height: 70vh;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 40px;
      font-family: "Libre Caslon Display", serif;
    }

    .stat-card {
      width: 200px;
      height: 120px;
      background-color: rgba(255, 255, 255, 0.062);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 20px;
      text-align: center;
      color: #f8e3ca;
      padding-top: 20px;
      transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .stat-card:hover {
      transform: translateY(-10px);
      background-color: rgba(255, 255, 255, 0.2);
    }

    .stat-card h3 {
      font-size: 20px;
      margin-bottom: 10px;
      font-family: "Libre Caslon Display", serif;
    }

    .stat-card p {
      font-size: 28px;
      font-weight: bold;
      color: #fd8916;
      font-family: "Libre Caslon Display", serif;
    }

    footer {
      text-align: center;
      background-color: #7c1313;
      color: #fd8916;
      padding: 8px;
      width: 100%;
      font-size: 13px;
      font-family: "Libre Caslon Display", serif;
    }

    .features {
      color: #ffdec2;
      text-align: center;
      padding: 60px 80px;
      font-family: "Libre Caslon Display", serif;
    }

    .features h2 {
      margin-bottom: 30px;
      font-size: 2.2rem;
      color: #fd8916;
    }

    .features table {
      width: 100%;
      border-collapse: collapse;
      background-color: rgba(255, 255, 255, 0.104);
      border-radius: 15px;
      overflow: hidden;
    }

    .features th, .features td {
      padding: 15px 20px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.215);
    }

    .features th {
      background-color: rgba(255, 255, 255, 0.1);
      color: #fd8916;
      font-size: 1.1rem;
    }

    .features tr:hover {
      background-color: rgba(255, 255, 255, 0.1);
      transition: 0.3s;
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
      <li><a href="{{ route('category.index')}}">Manage Categories</a></li>
      <li><a href="#">Manage Members</a></li>
      <li><a href="#">Manage Borrows</a></li>
      <li><a href="{{ route('profile.edit') }}">Profile</a></li>
      <li>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
          @csrf
          <button type="submit">Log Out</button>
        </form>
      </li>
    </ul>
  </nav>

  <section class="hero">
    <h1>Welcome to Amimir Library,</h1>
    <h1>{{ Auth::user()->name ?? 'User' }}!</h1>
  </section>

  <section class="stats">
    <div class="stat-card">
        <h3>{{ $bookCount ?? 0 }}</h3>
        <p>Books</p>
    </div>
    <div class="stat-card">
        <h3>{{ $categoryCount ?? 0 }}</h3>
        <p>Categories</p>
    </div>
    <div class="stat-card">
        <h3>{{ $memberCount ?? 0 }}</h3>
        <p>Members</p>
    </div>
    <div class="stat-card">
        <h3>{{ $borrowCount ?? 0 }}</h3>
        <p>Borrow Records</p>
    </div>
  </section>

  <section class="features">
    <h2>Library Features</h2>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Feature Name</th>
          <th>Description</th>
          <th>Notes / Menu Access</th>
        </tr>
      </thead>
      <tbody>
        <tr><td>1</td><td>Book CRUD</td><td>Add, view, edit, delete book data</td><td><strong>Manage Books</strong></td></tr>
        <tr><td>2</td><td>Book Category CRUD</td><td>Add, view, edit, delete book categories</td><td><strong>Manage Categories</strong></td></tr>
        <tr><td>3</td><td>Member CRUD</td><td>Add, view, edit, delete library members</td><td><strong>Manage Members</strong></td></tr>
        <tr><td>4</td><td>Borrow CRUD</td><td>Add borrow records (relations: member + book + staff user)</td><td><strong>Manage Borrows</strong></td></tr>
        <tr><td>5</td><td>Return Book</td><td>Update borrow status from “Borrowed” → “Returned”</td><td><strong>Manage Borrows</strong> → Return button</td></tr>
        <tr><td>6</td><td>Upload Book Cover</td><td>Upload cover image for each book</td><td><strong>Manage Books</strong></td></tr>
        <tr><td>7</td><td>Book Filter & Search</td><td>Search books by title / filter by category</td><td><strong>Manage Books</strong></td></tr>
        <tr><td>8</td><td>Reports / Export Data</td><td>Export borrow records to CSV / PDF</td><td><strong>Manage Borrows</strong></td></tr>
      </tbody>
    </table>
  </section>

  <footer>
    <p>© Amimir Group | Created for ETS</p>
  </footer>
</body>
</html>
