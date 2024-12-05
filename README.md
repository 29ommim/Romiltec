<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Romiltec Hiring Test - Laravel APIs</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #333;
        }

        h1 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 20px;
            color: #4CAF50;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 15px;
            color: #2196F3;
        }

        ul {
            margin-left: 20px;
        }

        li {
            margin-bottom: 10px;
        }

        .goal-list, .terminology-list, .endpoints-list {
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 5px;
        }

        .goal-list li, .terminology-list li, .endpoints-list li {
            padding-left: 10px;
        }

        .important {
            color: #FF5722;
            font-weight: bold;
        }

        footer {
            text-align: center;
            margin-top: 50px;
            font-size: 14px;
            color: #888;
        }

        .footer-text {
            color: #555;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Romiltec Hiring Test</h1>

        <h2>Project Overview</h2>
        <p>
            This is a Laravel API-based application designed to handle exam transcripts, where users can manage their exam records according to their role.
        </p>

        <h2>Terminology</h2>
        <ul class="terminology-list">
            <li><strong>User:</strong> A user will have an email and a password.</li>
            <li><strong>Exam:</strong> An exam is composed of a title, a date, and a vote. A user can have more than one exam, but cannot take the same exam multiple times.</li>
            <li><strong>Role:</strong> Users can have two possible roles: <strong>admin</strong> or <strong>supervisor</strong>.</li>
        </ul>

        <h2>Goals</h2>
        <ul class="goal-list">
            <li><strong>Private endpoint (admin):</strong> to create new exams.</li>
            <li><strong>Private endpoint (supervisor):</strong> to assign a vote for an exam related to a user.</li>
            <li><strong>Private endpoint (user):</strong> to view your exams.</li>
            <li><strong>Public endpoint:</strong> to view the list of available exams. The exams can be sorted (by date) and filtered by title or date.</li>
        </ul>

        <h2>How to Proceed</h2>
        <ul>
            <li>Feel free to use the standard Laravel authentication system.</li>
            <li>Unit tests and feature tests are mandatory.</li>
            <li>The usage of a linter is not mandatory but highly appreciated.</li>
            <li>Upload your code to a GitHub repository.</li>
        </ul>

        <footer>
            <p class="footer-text">For more details, refer to the project repository.</p>
        </footer>
    </div>

</body>
</html>