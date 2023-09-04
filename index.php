<!DOCTYPE html>
<html>
<head>
    <title>Chat Application</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .chat-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
        #messages {
            border: 1px solid #ccc;
            height: 300px;
            overflow-y: scroll;
            padding: 10px;
        }
        #message-box {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <h2>Chat Application</h2>
        <div id="messages"></div>
        <input type="text" id="message-box" placeholder="Type your message" />
        <button id="send-btn">Send</button>
    </div>

    <script>
        // AJAX function to load messages
        function loadMessages() {
            $.ajax({
                url: 'getMessages.php',
                type: 'GET',
                success: function(response) {
                    $('#messages').html(response);
                    scrollToBottom();
                }
            });
        }

        // AJAX function to send messages
        function sendMessage(message) {
            $.ajax({
                url: 'sendMessage.php',
                type: 'POST',
                data: { message: message },
                success: function() {
                    $('#message-box').val('');
                    loadMessages();
                }
            });
        }

        // Function to scroll to the bottom of the messages container
        function scrollToBottom() {
            $('#messages').scrollTop($('#messages')[0].scrollHeight);
        }

        // Load messages on page load
        loadMessages();

        // Event listener for send button click
        $('#send-btn').click(function() {
            var message = $('#message-box').val();
            if (message !== '') {
                sendMessage(message);
            }
        });

        // Event listener for enter key press
        $('#message-box').keypress(function(event) {
            if (event.which === 13) {
                var message = $('#message-box').val();
                if (message !== '') {
                    sendMessage(message);
                }
            }
        });

        // Refresh messages every 2 seconds
        setInterval(loadMessages, 2000);
    </script>
</body>
</html>
