<head>



    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            display: flex;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        /* Sidebar */
        .sidebar{
            width: 250px;
            background-color: #212529;
            padding-top: 20px;
        }

        .sidebar h2{
            color: white;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a{
            display: block;
            color: white;
            text-decoration: none;
            padding: 15px 20px;
            transition: 0.3s;
        }

        .sidebar a:hover{
            background-color: #0d6efd;
            padding-left: 30px;
        }

        /* Main Content */
        .content{
            flex: 1;
            padding: 30px;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>My Panel</h2>

        <a href="#">Dashboard</a>
        <a href="#">Users</a>
        <a href="#">Products</a>
        <a href="#">Orders</a>
        <a href="#">Settings</a>
        <a href="#">Logout</a>
    </div>

</body>
