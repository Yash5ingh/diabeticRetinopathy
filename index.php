<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logos/drLogo.png" type="image/x-icon">
    <title>Home</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php include "nav.html";  ?>

    <div id="inp-flex">
        <div class="inp-wrapper">
            <div class="inp-container">
                <h1>Upload a file here</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="upload-container">
                        <div class="border-container">
                            <label for="upload" id="drop-area">
                                <input type="file" name="file" accept=".jpg, .png" id="upload" hidden>
                                <img id="preview" src="" alt="Preview"
                                    style="display:none; max-width:100%; max-height:100%;">
                                <div id="drop-area-text">
                                    <p>Drag and drop image here.</p>
                                </div>
                            </label>
                        </div>
                    </div>
                    <input type="submit" id="submit" name="submit">
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('drop-area').addEventListener('dragover', function (e) {
            e.preventDefault();
            this.classList.add('dragover');
        });

        document.getElementById('drop-area').addEventListener('dragleave', function (e) {
            e.preventDefault();
            this.classList.remove('dragover');
        });

        document.getElementById('drop-area').addEventListener('drop', function (e) {
            e.preventDefault();
            this.classList.remove('dragover');
            var file = e.dataTransfer.files[0];
            var uploadInput = document.getElementById('upload');
            uploadInput.files = e.dataTransfer.files;
            var dropAreaText = document.getElementById('drop-area-text');
            dropAreaText.innerHTML = '<p>File selected: ' + file.name + '</p>';

            var preview = document.getElementById('preview');
            preview.style.display = 'inline-block';
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        });
    </script>

    <?php
    if (isset($_POST['submit'])) {
        // echo "<pre>";
        // print_r($_FILES['file']);
        // echo "</pre>";
    
        $img = 'test.jpg';

        move_uploaded_file($_FILES['file']['tmp_name'], $img);

        $command = "python predict.py " . escapeshellarg($img);
        $output = shell_exec($command);

        if ($output == "1") {
            echo "<div id='pred-wrapper'>
            <h1 id='disease-title'>Mild DR</h1>
            </div>";
        }
        else if ($output == "2") {
            echo "<div id='pred-wrapper'>
            <h1 id='disease-title'>Moderate DR</h1>
            </div>";
        }
        else if ($output == "3") {
            echo "<div id='pred-wrapper'>
            <h1 id='disease-title'>Severe</h1>
            </div>";
        }
        else if ($output == "4") {
            echo "<div id='pred-wrapper'>
            <h1 id='disease-title'>Proliferative DR</h1>
            </div>";
        }
        else {
            echo "<div id='pred-wrapper'>
            <h1 id='disease-title'>No Disease detected</h1>
            </div>";
        }

        echo "<script>window.location.href = '#pred-wrapper';</script>";
    }
    ?>


</body>

</html>