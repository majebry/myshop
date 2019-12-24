<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <button onclick="myFunction()">Click Me!</button>

    <div id="result"></div>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        function myFunction() {
            axios.get('api/products/1').then(function(response) {
                document.getElementById('result').textContent = response.data.name;
            });
        }
    </script>
</body>
</html>
