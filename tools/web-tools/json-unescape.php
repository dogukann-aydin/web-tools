<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>JSON Unescape Tool - Convert Escaped JSON to Normal Text</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="../../assets/css/sidebar.css" type="text/css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
        integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


<meta name="description" content="Use this free tool to unescape JSON. Convert escaped characters back to normal text and make your JSON readable again.">

        
    </head>

<body>


    <div class="d-flex">
        <!-- Sidebar -->

    <?php require_once '../../includes/sidebar.php'; ?>

        <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header text-white" style="background-color: #00373A;">
                        <h5 class="mb-0">JSON Unescape Tool</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="inputJSON" class="form-label">Paste Your Escaped JSON</label>
                            <textarea id="inputJSON" class="form-control" rows="8" placeholder="Paste your escaped JSON string here..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="unescapedJSON" class="form-label">Unescaped JSON Output</label>
                            <textarea id="unescapedJSON" class="form-control" rows="8" readonly></textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-success" onclick="unescapeJSON()">Unescape</button>
                            <button class="btn btn-secondary" onclick="clearFields()">Clear</button>
                            <button class="btn btn-outline-primary" onclick="copyToClipboard()">Copy</button>
                        </div>

                        <div class="mt-3 text-muted">
                            <small>This tool removes escape characters from your JSON string and converts it back to a readable format. Useful for processing JSON data.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script>
        function unescapeJSON() {
            let input = document.getElementById('inputJSON').value;

            try {
                // Perform replacements to unescape special characters
                input = input.replace(/\\\\/g, "\\")   // Unescape backslashes
                    .replace(/\\\//g, "/")            // Unescape slashes
                    .replace(/\\\b/g, "\b")          // Unescape backspace
                    .replace(/\\\f/g, "\f")          // Unescape formfeed
                    .replace(/\\\n/g, "\n")          // Unescape newline
                    .replace(/\\\r/g, "\r")          // Unescape carriage return
                    .replace(/\\\t/g, "\t")          // Unescape tab
                    .replace(/\\"/g, '"');           // Unescape double quotes

                // Parse and re-stringify the unescaped JSON
                let parsed = JSON.parse(input);
                let unescapedJSON = JSON.stringify(parsed, null, 4);  // Beautify the output

                document.getElementById('unescapedJSON').value = unescapedJSON;
            } catch (e) {
                alert("Invalid escaped JSON input.");
            }
        }

        function clearFields() {
            document.getElementById('inputJSON').value = '';
            document.getElementById('unescapedJSON').value = '';
        }

        function copyToClipboard() {
            const output = document.getElementById('unescapedJSON');
            output.select();
            output.setSelectionRange(0, 99999);  // Mobile compatibility
            document.execCommand("copy");
            alert("Unescaped JSON copied to clipboard!");
        }
    </script>

    <script src="/assets/js/script.js" language="javascript" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>


</body>

</html>