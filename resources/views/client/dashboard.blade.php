<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styleLogin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-free-6.1.2-web/css/all.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <style>
        .dashboard-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            font-family: 'Arial', sans-serif;
        }
        .dashboard-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .dashboard-header h1 {
            font-size: 2.2em;
            color: #333;
            margin: 0;
        }
        .dashboard-header p {
            color: #666;
            font-size: 1.1em;
        }
        .client-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        .info-card {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }
        .info-card i {
            font-size: 1.5em;
            color: #007bff;
            margin-bottom: 10px;
        }
        .info-card p {
            margin: 5px 0;
            color: #333;
            font-size: 1em;
        }
        .info-card p.label {
            font-weight: bold;
            color: #555;
        }
        .logout-btn {
            display: block;
            width: 200px;
            margin: 0 auto;
            padding: 12px;
            background: #007bff;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.1em;
            transition: background 0.3s;
        }
        .logout-btn:hover {
            background: #0056b3;
        }
        @media (max-width: 600px) {
            .client-info {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Welcome, {{ auth()->user()->client->first_name }} {{ auth()->user()->client->last_name }}!</h1>
            <p>Your personal travel dashboard</p>
        </div>
        <div class="client-info">
            <div class="info-card">
                <i class="fas fa-user"></i>
                <p class="label">Full Name</p>
                <p>{{ auth()->user()->client->first_name }} {{ auth()->user()->client->last_name }}</p>
            </div>
            <div class="info-card">
                <i class="fas fa-envelope"></i>
                <p class="label">Email</p>
                <p>{{ auth()->user()->email }}</p>
            </div>
            <div class="info-card">
                <i class="fas fa-phone"></i>
                <p class="label">Phone</p>
                <p>{{ auth()->user()->client->phone ?? 'Not provided' }}</p>
            </div>
            <div class="info-card">
                <i class="fas fa-calendar-alt"></i>
                <p class="label">Account Created</p>
                <p>{{ auth()->user()->created_at->format('d M Y') }}</p>
            </div>
        </div>
        <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
    </div>
    <script src="{{ asset('assets/js/mainLogin.js') }}"></script>
</body>
</html>