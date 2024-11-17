<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Uploader</title>
</head>

<body>
    <h1>Upload File</h1>
    <form id="uploadForm" name="uploadForm" action="{{ route('process') }}" enctype="multipart/form-data">
        @csrf
        <label for="fileName">File Name: </label>
        <input type="text" name="fileName" id="fileName" required />
        <br />
        <label for="userFile">Select a File</label>
        <input type="file" name="userFile" id="userFile" required />
        <br />
        <button type="submit" name="submit">Submit</button>
    </form>
    <h2 id="success" style="color:green;display:none">Successfully Uploaded File</h2>
    <h2 id="error" style="color:red;display:none">Error Submitting File</h2>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#uploadForm").on("submit", function(e) {
            e.preventDefault();
            const form = $(this);
            const url = form.attr('action');
            $.ajax({
                    url,
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(data) {
                        $('#fileName').val('');
                        $('#userFile').val('');
                    }
                })
                .done(function() {
                    $('#success').css("display", "block");
                    setTimeout(() => {
                        $('#success').css("display", "none")
                    }, 5000);
                })
                .fail(function() {
                    $('#error').css("display", "block");
                    setTimeout(() => {
                        $('#error').css("display", "none")
                    }, 5000);
                });
        });
    </script>
</body>

</html>
