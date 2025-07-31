<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>JSON Escape Tool - Escape Special Characters in JSON</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="../../assets/css/sidebar.css" type="text/css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
        integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

<meta name="description" content="Use this free tool to escape special characters in your JSON data. Convert quotes, backslashes, and other characters to safe JSON format.">


        
    </head>

<body>

    <?php require_once '../../includes/header.php'; ?>

    <div class="d-flex">
        <!-- Sidebar -->

    <?php require_once '../../includes/sidebar.php'; ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header text-white" style="background-color: #00373A;">
                        <h5 class="mb-0">JSON Escape Tool</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="inputJSON" class="form-label">Paste Your JSON</label>
                            <textarea id="inputJSON" class="form-control" rows="8" placeholder="Paste your JSON string here..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="escapedJSON" class="form-label">Escaped JSON Output</label>
                            <textarea id="escapedJSON" class="form-control" rows="8" readonly></textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-success" onclick="escapeJSON()">Escape</button>
                            <button class="btn btn-secondary" onclick="clearFields()">Clear</button>
                            <button class="btn btn-outline-primary" onclick="copyToClipboard()">Copy</button>
                        </div>

                        <div class="mt-3 text-muted">
                            <small>This tool escapes special characters in your JSON data, such as quotes, backslashes, and line breaks, making it safe for use in JSON strings.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script>
        function escapeJSON() {
            const input = document.getElementById('inputJSON').value;
            try {
                // Escape JSON string by using JSON.stringify and replacing necessary characters
                const escaped = JSON.stringify(input);
                document.getElementById('escapedJSON').value = escaped;
            } catch (e) {
                alert("Invalid JSON input.");
            }
        }

        function clearFields() {
            document.getElementById('inputJSON').value = '';
            document.getElementById('escapedJSON').value = '';
        }

        function copyToClipboard() {
            const output = document.getElementById('escapedJSON');
            output.select();
            output.setSelectionRange(0, 99999);  // Mobile compatibility
            document.execCommand("copy");
            alert("Escaped JSON copied to clipboard!");
        }
    </script>
    <script src="/assets/js/script.js" language="javascript" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>


</body>

</html>