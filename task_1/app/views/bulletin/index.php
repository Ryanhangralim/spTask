<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin Board</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .error {
            color: red;
        }
        textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:disabled {
            background-color: #aaa;
        }
        .message {
            border-top: 1px solid #000;
            padding: 10px 0;
            margin: 5px 0;
        }
        .message:last-child {
            border-bottom: 1px solid #000;
        }
        .timestamp {
            color: gray;
            font-size: 0.8em;
        }
    </style>
</head>
<body>

<div class="container">
    <form id="bulletinForm">
        <div class="error" id="errorMsg">Your message must be 10 to 200 characters long</div>
        <textarea id="messageInput" placeholder="Must be filled in"></textarea>
        <button type="submit" id="submitBtn">Submit</button>
    </form>

    <div id="messages">
        <?php foreach ($data['message'] as $message) :  ?>
        <div class="message">
            <p><?= $message['content']; ?></p>
            <p class="timestamp"><?= $message['created_at'];?></p>
        </div>
        <?php endforeach;?>
    </div>
</div>

</body>
</html>
