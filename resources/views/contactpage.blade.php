<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f7f6;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #336699;
            text-align: center;
        }

        .back-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #555555;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        input[type="email"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        textarea {
            height: 120px;
        }

        button[type="submit"] {
            background-color: #3ebd70;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #2ea259;
        }
    </style>
</head>
<body>
    <a href="{{route('staffhome')}}" class="back-button">Back</a>

    <h1>Contact Us</h1>
    <form action="{{route('sendEmail')}}" method="POST">
        @csrf
        <label for="email">Your Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br><br>
        <label for="description">Description:</label><br>
        <textarea name="description" id="description" rows="4" required></textarea><br><br>
        <button type="submit">Send Mail</button>
    </form>
</body>
</html>