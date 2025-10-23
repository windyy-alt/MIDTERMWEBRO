member.blade

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amimir Library - Member Information</title>
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
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ffb84d;
            color: #fff;
        }

        th {
            background-color: rgba(255, 184, 77, 0.5);
            color: #fff;
            text-transform: uppercase;
        }

        .add-member-btn {
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

        form { display: none; margin-bottom: 20px; }

        .form-group { margin-bottom: 10px; }
        label { display: block; margin-bottom: 5px; color: #fff; }
        input {
            width: 100%;
            padding: 8px;
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

                .action {
            align-items: center;
            gap: 20px;
        }

        .action-btn.edit, .action-btn.delete {
            background-color: #ffb84d;
            color: #7a1212;
            border: none;
            padding: 5px 10px;
            border-radius: 7px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
        }

        .action-btn.delete {
            background-color: #c0392b;
            color: white;
        }

        .action-btn.delete:hover {
            background-color: #e74c3c;
        }

        .action-btn.edit:hover {
            background-color: #ffd27f;
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
        <h2>Member Information</h2>

        <button class="add-member-btn" onclick="toggleForm()">+ Add Member</button>

      
        <form id="addMemberForm" method="POST" action="{{ route('member.store') }}">
            @csrf
            <div id="method-field"></div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="memberName" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" id="memberEmail" required>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" id="memberPhone" required>
            </div>

            <button type="submit" class="add-btn" id="submitBtn">Save</button>
        </form>

       
        <table>
            <thead>
                <tr>
                    <th>Member ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <td>{{ str_pad($member->id, 5, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->created_at->format('Y-m-d') }}</td>
                    <td>{{ $member->updated_at->format('Y-m-d') }}</td>
                    <td class="actions">
                
                        <button type="button" class="action-btn edit"
                            onclick="editMember({{ $member->id }}, '{{ $member->name }}', '{{ $member->email }}', '{{ $member->phone }}')">Update</button>

                       
                        <form action="{{ route('member.destroy', $member->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this member?')"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete" title="Delete">Delete</button>
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
            const form = document.getElementById('addMemberForm');
            const methodField = document.getElementById('method-field');
            const submitBtn = document.getElementById('submitBtn');

            const nameInput = document.getElementById('memberName');
            const emailInput = document.getElementById('memberEmail');
            const phoneInput = document.getElementById('memberPhone');

          
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }

            form.action = "{{ route('member.store') }}";
            methodField.innerHTML = '';
            submitBtn.textContent = 'Save';

            nameInput.value = '';
            emailInput.value = '';
            phoneInput.value = '';
        }

        function editMember(id, name, email, phone) {
            const form = document.getElementById('addMemberForm');
            const methodField = document.getElementById('method-field');
            const submitBtn = document.getElementById('submitBtn');

            const nameInput = document.getElementById('memberName');
            const emailInput = document.getElementById('memberEmail');
            const phoneInput = document.getElementById('memberPhone');

         
            form.style.display = 'block';
            form.action = `/member/${id}`;
            methodField.innerHTML = '<input type="hidden" name="_method" value="PUT">';
            nameInput.value = name;
            emailInput.value = email;
            phoneInput.value = phone;
            submitBtn.textContent = 'Update';
        }
    </script>

</body>
</html>