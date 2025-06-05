<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            height: 100vh;
            background: white;
        }
        
        .container {
            display: flex;
            width: 80%;
            height: 90%;
            background: white;
            margin: auto;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 5px 10px 10px rgba(0, 0, 0, 0.1);
            background-image: url(Dashboard/img/looogooo.png);
            background-repeat:no-repeat;
            
        }

        
        /* Bagian Kanan (Form Login) */
        .right-section {
            width: 60%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px 90px;
            background-color: white;
            margin-left: 500px;
        }

        .right-section h1 {
            margin-bottom: 20px;
        }

        .input-container {
            position: relative;
            width: 100%;
            max-width: 350px;
            margin-bottom: 15px;
        }

        .input-container input {
            width: 100%;
            padding: 15px;
            padding-right: 40px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f5f5f5;
            outline: none;
            font-size: 16px;
        }

        .input-container svg {
            position: absolute;
            right: 15px;
            top: 64%;
            transform: translateY(-50%);
            color: #B82132;
        }

        /* Tombol Login */
        button {
            background: #B82132;
            color: white;
            text-decoration: none;
            padding: 15px;
            border-radius: 8px;
            width: 100%;
            max-width: 350px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            display: block;
            border: none;
            margin-top: 10px;
            transition: 0.3s;
        }

        button {
            background: #9a1717;
        }

    </style>
</head>
<body>
    <div class="container">
        
        <!-- Bagian Kanan -->
        <div class="right-section">
            <h1>Login Account</h1>
            
            <form action="actionlogin.php" method="POST">
            <div class="input-container">
            <label>Username : </label>
            <input type="text" id="username" name="username">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                </svg>
            </div>

            <div class="input-container">
            <label>Password : </label>
            <input type="password" id="password" name="password">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                </svg>
            </div>
            <button type="submit" name="login">Login</button>
        </form>

        </div>
    </div>
</body>
</html>
