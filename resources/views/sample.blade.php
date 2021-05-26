<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <button id='btn-print'>Print</button>
    <script>
        document.querySelector('#btn-print').addEventListener('click', () => {
            fetch('/open-app')
                .then(response => response.json())
                .then(data => console.log(data));
        });
    </script>
</body>
</html>