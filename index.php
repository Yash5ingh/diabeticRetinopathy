<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logos/logo blue.png" type="image/x-icon">
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
            <p class='disease-note'><b>NOTE: This information is not a substitute for professional medical advice. Please consult a rheumatologist for an accurate diagnosis.</b></p>
            <h1 id='disease-title'>Ankylosing Spondylitis: Causes, Symptoms, and Treatment</h1>
            <p class='disease-para'>Ankylosing Spondylitis (AS) is a chronic inflammatory condition that primarily affects the spine, causing pain and stiffness. It is a type of arthritis that falls under the category of spondyloarthritis. AS can also affect other joints and organs in the body. <b class='disease-consult'>If you suspect you may have Ankylosing Spondylitis, it is important to consult a rheumatologist or a healthcare professional specializing in rheumatic conditions for a thorough evaluation and appropriate guidance.</b></p>

            <h2 id='disease-subtitle'>Causes of Ankylosing Spondylitis</h2>

            <p class='disease-para'>The exact cause of AS is unknown, but it is believed to be influenced by both genetic and environmental factors. It is more common in individuals who have a specific genetic marker called HLA-B27. Environmental factors such as infections may also play a role in triggering the condition.</p>

            <h2 id='disease-subtitle'>Symptoms of Ankylosing Spondylitis</h2>

            <p class='disease-para'>Common symptoms of AS include:</p>

            <ul class='disease-para'>
            <li>Chronic pain and stiffness in the lower back and hips</li>
            <li>Pain and stiffness that worsens with inactivity and improves with movement</li>
            <li>Fatigue</li>
            <li>Loss of flexibility in the spine</li>
            <li>Difficulty expanding the chest, leading to limited lung capacity</li>
            <li>Other joint pain, such as in the knees, shoulders, and ankles</li>
            <li>Eye inflammation (uveitis)</li>
            </ul>

            <div class='disease-image'>
            <img class='disease-img' src='assets\disease image\Ankylosing Spondylitis.jpg' alt='Ankylosing Spondylitis'>
            </div>

            <h2 id='disease-subtitle'>Treatment Options</h2>

            <p class='disease-para'>While there is no cure for AS, there are various treatment options available to manage symptoms and improve quality of life. These may include:</p>

            <ul class='disease-para'>
            <li>Physical therapy and exercise to improve flexibility and strength</li>
            <li>Nonsteroidal anti-inflammatory drugs (NSAIDs) to reduce pain and inflammation</li>
            <li>Biologic medications to target specific aspects of the immune system</li>
            <li>Corticosteroids to reduce inflammation</li>
            <li>Disease-modifying antirheumatic drugs (DMARDs)</li>
            </ul>

            <p class='disease-para'>It's important for individuals with AS to work closely with their healthcare providers to develop a comprehensive treatment plan tailored to their specific needs.</p>

            <h2 id='disease-subtitle'>Conclusion</h2>

            <p class='disease-para'>Ankylosing Spondylitis is a chronic condition that can significantly impact a person's quality of life. With early diagnosis and appropriate treatment, individuals with AS can effectively manage their symptoms and lead fulfilling lives. If you suspect you may have AS or are experiencing symptoms, consult a healthcare professional for a proper evaluation and guidance.</p>

            <p class='disease-para'>Remember, this blog post is for informational purposes only and should not be considered as medical advice. Always consult with a qualified healthcare provider for proper diagnosis and treatment.</p>

            </div>";


        } else if ($output == "2") {
            echo "<div id='pred-wrapper'>
            <p class='disease-note'><b>NOTE: This information is not a substitute for professional medical advice. Please consult an orthopedic specialist or a physiotherapist.</b></p>
            <h1 id='disease-title'>Sacroiliac (SI) Joint Dysfunction: Causes, Symptoms, and Treatment</h1>

            <p class='disease-para'>Sacroiliac Joint Dysfunction, often abbreviated as SI joint dysfunction, is a condition that causes pain in the sacroiliac joint - the joint connecting the lower spine and pelvis. This condition can be a source of lower back pain and discomfort. <b class='disease-consult'>If you believe you may be experiencing symptoms of SI Joint Dysfunction, it is recommended to consult with a healthcare professional, such as an orthopedic specialist or a physiotherapist, for proper evaluation and guidance.</b></p>
        
            <h2 id='disease-subtitle'>Causes of Sacroiliac Joint Dysfunction</h2>
        
            <p class='disease-para'>SI joint dysfunction can be caused by a variety of factors, including:</p>
        
            <ul class='disease-para'>
                <li>Arthritis affecting the SI joint</li>
                <li>Changes in joint alignment due to pregnancy and childbirth</li>
                <li>Repetitive stress on the SI joint, common in certain sports</li>
                <li>Inflammatory conditions affecting the SI joint</li>
            </ul>
        
            <h2 id='disease-subtitle'>Symptoms of Sacroiliac Joint Dysfunction</h2>
        
            <p class='disease-para'>Common symptoms of SI joint dysfunction include:</p>
        
            <ul class='disease-para'>
                <li>Pain in the lower back, buttocks, and thighs</li>
                <li>Pain that worsens with prolonged sitting or standing</li>
                <li>Pain that may radiate down to the legs</li>
                <li>Stiffness or a burning sensation in the pelvis</li>
                <li>Difficulty in performing activities like walking or climbing stairs</li>
            </ul>
        
            <div class='disease-image'>
                <img class='disease-img' src='assets\disease image\SI joint dysfunction.jpg' alt='Sacroiliac Joint Dysfunction'>
            </div>
        
            <h2 id='disease-subtitle'>Treatment Options</h2>
        
            <p class='disease-para'>Managing SI joint dysfunction may involve various treatment options, including:</p>
        
            <ul class='disease-para'>
                <li>Physical therapy to improve joint stability and flexibility</li>
                <li>Exercises to strengthen the muscles supporting the SI joint</li>
                <li>Application of heat or cold packs to alleviate pain and inflammation</li>
                <li>Medications like nonsteroidal anti-inflammatory drugs (NSAIDs)</li>
                <li>Injections to provide temporary relief from pain and inflammation</li>
                <li>Surgery in severe cases where conservative treatments do not provide relief</li>
            </ul>
        
            <p class='disease-para'>It is important to consult with a healthcare professional for an accurate diagnosis and to determine the most suitable treatment plan for your specific condition.</p>
        
            <h2 id='disease-subtitle'>Conclusion</h2>
        
            <p class='disease-para'>Sacroiliac Joint Dysfunction can significantly impact an individual's quality of life, but with proper diagnosis and treatment, it can be managed effectively. Early intervention and a tailored treatment plan are crucial for improving symptoms and maintaining mobility.</p>
        
            <p class='disease-para'>This blog post is for informational purposes only and should not be considered as medical advice. Always consult with a qualified healthcare provider for proper diagnosis and treatment.</p>
            </div>";
        } else {
            echo "<div id='pred-wrapper'>
            <h1 id='disease-title'>No Disease detected</h1>
            </div>";
        }

        echo "<script>window.location.href = '#pred-wrapper';</script>";
    }
    ?>


</body>

</html>