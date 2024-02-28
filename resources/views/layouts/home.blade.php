<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header style="background-color: green; height: 15vh; display: flex; align-items: center;
    justify-content: center;">
        <nav>
            <ul style="display: flex; list-style-type: none;">
                <li style="padding: 20px;"><a style="text-decoration: none; color: white" href="#">Home</a></li>
                <li style="padding: 20px;"><a style="text-decoration: none; color: white" href="#">About Us</a></li>
                <li style="padding: 20px;"><a style="text-decoration: none; color: white" href="#">Contac Us</a></li>
                <li style="padding: 20px;"><a style="text-decoration: none; color: white" href="#">Exit</a></li>
            </ul>
        </nav>
    </header>
    <section style="background-color: wuite; height: 64.5vh;">
        @yield('content')
    </section>
    <footer style="background-color: green; height: 15vh; display: flex; align-items: center; justify-content: center">
        <p style="color: white">Este el el pide de pagína de la plantilla madre</p>
    </footer>
</body>
</html>