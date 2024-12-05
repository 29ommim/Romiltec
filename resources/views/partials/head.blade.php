<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="{{ $metaTitle }}">
    <title>{{ $pageTitle }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        .menu {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            background-color: #f8f9fa;
            padding: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .menu-button {
            background-color: #0d6efd;

            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .text-button {
            color: white;
        }

        .menu-button:hover {
            background-color: #0056b3;
        }

        .centered-text {
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        #examTable {
            width: 60%;
            margin-right: 20px;
            border-collapse: collapse;
        }

        #examTable th,
        #examTable td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .input-container {
            display: flex;
            flex-direction: column;
        }

        .input-container input {
            margin-bottom: 10px;
            padding: 8px;
            width: 200px;
        }

        th {
            cursor: pointer;
        }
    </style>

</head>
