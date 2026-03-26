<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CloudCall</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'DM Sans', sans-serif;
            background-color: #0B0F19;
            color: #E5E7EB;
        }

        .font-display {
            font-family: 'Syne', sans-serif;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">

    <!-- Include Header -->
    <!-- You can use server-side include, React component, or JS to inject header.html -->
    <div id="header"></div>

    <!-- Main content -->
    <main class="flex-1 p-6">
        <!-- Page content goes here -->
    </main>

    <!-- Include Footer -->
    <div id="footer"></div>

    <script>
        async function loadHTML(id, file) {
            const res = await fetch(file);
            const text = await res.text();
            document.getElementById(id).innerHTML = text;
        }

        loadHTML('header', 'header.html');
        loadHTML('footer', 'footer.html');
    </script>
</body>

</html>