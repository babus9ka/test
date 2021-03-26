
<head>
    <title>Send an email</title>
</head>
<body>
<center>
    <h4 class="sent-notification"></h4>
    <form id="myForm" >
        <h2>Send Email</h2>

        <label>Name</label>
        <input id="name" name="name" type="text" placeholder="Enter Name">
        <br><br>
        <label>Email</label>
        <input id="email" name="email" type="text" placeholder="Enter Email">
        <br><br>
        <label>Subject</label>
        <input id="subject" name="subject" type="text" placeholder="Enter Subject">
        <br><br>
        <p>Message</p>
        <textarea id="body" name="body" rows="5" placeholder="Type Message"></textarea>
        <br><br>
        <button type="submit" onclick="sendEmail()" value="Send an Email" >Submit</button>
    </form>
</center>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    function sendEmail(){
        let name = $("#name");
        let email = $("#email");
        let subject = $("#subject");
        let body = $("#body");

        if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)){
            $.ajax({
                url: 'sendEmail.php',
                method:'POST',
                dataType: 'json',
                data:{
                    name: name.val(),
                    email: email.val(),
                    subject: subject.val(),
                    body: body.val(),
                }, success: function (response) {
                    $('#myForm')[0].reset();
                    $('.sent-notification').text("Message sent successfully.");
                }
            });

        }
    }
    function isNotEmpty(caller){
        if (caller.val() == ""){
            caller.css('border', '1px solid red');
            return false;

        } else {
            caller.css('border', '');
            return true;

        }
    }
</script>
</body>
</html>
