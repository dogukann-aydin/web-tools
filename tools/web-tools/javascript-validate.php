<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JavaScript Validation Tool - Validate and Test Your JavaScript Code</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="../../assets/css/sidebar.css" type="text/css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
        integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="description" content="Use our JavaScript Validation Tool to test and validate your JavaScript code. Ensure error-free code with instant feedback and validation results.">

    <style>
        .container-custom {
            max-width: 800px;
        }

        #output {
            font-size: 14px;
            line-height: 1.6;
            padding: 10px;
            border-radius: 5px;
            margin-top: 15px;
        }

        .output-success {
            background-color: #198754;
            color: #fff;
        }

        .output-error {
            background-color: #ffc107;
            color: #212529;
        }

        .output-warning {
            background-color: #fff3cd;
            color: #856404;
        }
    </style>
</head>

<body>

    <?php require_once '../../includes/header.php'; ?>

    <div class="d-flex">
        <?php require_once '../../includes/sidebar.php'; ?>

        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm">
                        <div class="card-header text-white" style="background-color: #00373A;">
                            <h5 class="mb-0">JavaScript Validation Tool</h5>
                        </div>
                        <div class="card-body">
                            <form id="js-validation-form">
                                <div class="mb-3">
                                    <label for="inputJS" class="form-label">Paste Your JavaScript Code</label>
                                    <textarea id="inputJS" class="form-control" rows="8" placeholder="Paste your JavaScript code here..."></textarea>
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-success">Validate JavaScript</button>
                                    <button type="button" class="btn btn-secondary" onclick="clearFields()">Clear</button>
                                </div>
                            </form>

                            <div id="output" style="display: none;"></div>

                            <div class="mt-3 text-muted">
                                <small>This tool validates your JavaScript code for syntax errors. It helps ensure your code runs smoothly without issues.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/js/script.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Function to validate JavaScript code
document.getElementById('js-validation-form').addEventListener('submit', function (event) {
    event.preventDefault();

    const code = document.getElementById('inputJS').value.trim();
    const outputDiv = document.getElementById('output');

    if (code === "") {
        outputDiv.className = "output-warning";
        outputDiv.style.display = "block";
        outputDiv.innerHTML = "⚠️ Please enter JavaScript code before validating.";
        return;
    }

    try {
        new Function(code);

        outputDiv.className = "output-success";
        outputDiv.style.display = "block";
        outputDiv.innerHTML = "✅ Success! No syntax errors found.";
    } catch (error) {
        outputDiv.className = "output-error";
        outputDiv.style.display = "block";
        outputDiv.innerHTML = `<strong>⚠️ Error:</strong> ${error.message}`;
    }
});

        // Function to clear fields
        function clearFields() {
            document.getElementById('inputJS').value = '';
            document.getElementById('output').style.display = 'none';
        }
    </script>
</body>

</html>
