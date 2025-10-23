<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amimir Library - Profile</title>
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
            background-size: cover;
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

        nav .nav-link {
            text-decoration: none;
            display: flex;
            gap: 15px;
            align-items: center; 
        }

        nav .nav-link img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }


         nav .nav-link h2 {
            text-decoration: none;
            color: #fd8916;
            font-weight: 600;
            transition: 0.3s;
            background: none;
            border: none;
            font-size: 1.3rem;
            font-family: "Libre Caslon Display", serif;
        }

        nav .nav-link h2:hover {
            background: #fd8916;
            color: #000;
            padding: 12px 25px;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: bold;
            font-family: "Libre Caslon Display", serif;
        }


        .profile-card {
            display: flex;
            flex-direction: column; 
            background-color: #f7d9aa;
            justify-content: center;
            align-items: stretch;
            border-radius: 20px;
            padding: 40px 60px;
            max-width: 700px;
            margin: 120px auto 40px; 
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2);
        }

        form {
            width: 100%;
            margin-bottom: 20px;
        }


        .profile-title {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-bottom: 25px;
            padding-top: 5px;
            gap: 10px;
            font-weight: 850;
            font-size: 1.8rem;
            color: #5a0f00;
            text-transform: uppercase;
        }

        .profile-title img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }


        .mb-3 {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: 600;
            color: #5a2a00;
            font-size: 1rem;
            margin-bottom: 6px;
            letter-spacing: 0.3px;
        }

        input.form-control {
            width: 100%;
            padding: 10px 15px;
            border: 2px solid #7a1212;
            border-radius: 25px;
            background-color: #fffaf2;
            font-size: 0.95rem;
            transition: all 0.2s ease-in-out;
        }

        input.form-control:focus {
            outline: none;
            border-color: #ffb84c;
            box-shadow: 0 0 6px rgba(255, 184, 77, 0.6);
        }


        button {
            border-radius: 25px;
            padding: 8px 20px;
            font-weight: 600;
            border: none;
            transition: all 0.3s;
            background-color: #7c1313;
            color: #fd8916;
        }

        button:hover {
            background: #fd8916;
            color: #000;
            padding: 12px 25px;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: bold;
        }

        footer {
            text-align: center;
            background-color: #7c1313;
            color: #fd8916;
            padding: 8px;
            width: 100%;
            font-size: 13px;
        }

        .section-title {
            font-weight: 900;
            color: #7c1313;
            font-size: 1.2rem;
            margin-top: 40px;
            margin-bottom: 15px;
            text-align: left;
            position: relative;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }


        .alert {
            border-radius: 15px;
        }

        .libre-caslon-display-regular {
            font-family: "Libre Caslon Display", serif;
            font-weight: 400;
            font-style: normal;
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
        <a href="/dashboard" class="nav-link">
            <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" width="25" alt="Home"> 
            <h2>Home</h2>
        </a>
    </nav>

    <div class="profile-card">
        <div class="profile-title">
                <img src="{{ asset('images/profile.png') }}" alt="profile" class="logo-img">
            Admin Profile
        </div>

        @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
        @endif

        <h5 class="section-title">Update Profile</h5>
        <form method="POST" action="{{ route('profile.update') }}" class="mb-4">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" 
                       value="{{ old('name', $user->name) }}" required>
                @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                       value="{{ old('email', $user->email) }}" required>
                @error('email')<span class="text-danger small">{{ $message }}</span>@enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-update">Update Profile</button>
            </div>
        </form>

        <h5 class="section-title">Change Password</h5>
        <form method="POST" action="{{ route('profile.update.password') }}" class="mb-4">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="current_password">Current Password</label>
                <input type="password" name="current_password" id="current_password" class="form-control" required>
                @error('current_password')<span class="text-danger small">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                @error('password')<span class="text-danger small">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-change">Change Password</button>
            </div>
        </form>

        <h5 class="section-title">Delete Account</h5>
        <form method="POST" action="{{ route('profile.destroy') }}">
            @csrf
            @method('DELETE')

            <div class="mb-3">
                <label for="password_delete">Confirm with Password</label>
                <input type="password" name="password" id="password_delete" class="form-control" required>
                @error('password')<span class="text-danger small">{{ $message }}</span>@enderror
            </div>

            <div class="text-end">
                <button type  ="submit" class="btn btn-delete"
                        onclick="return confirm('Are you sure you want to delete your account? This cannot be undone!')">
                    Delete Account
                </button>
            </div>
        </form>
    </div>

    <footer>
        <p>© Amimir Group | Created for ETS</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>