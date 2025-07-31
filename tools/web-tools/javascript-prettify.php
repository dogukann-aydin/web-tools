<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>JavaScript Prettifier Tool - Format and Beautify Your JavaScript Code</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="../../assets/css/sidebar.css" type="text/css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
        integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


<meta name="description" content="Use this free tool to format and prettify your JavaScript code. Make your JavaScript readable and easier to edit with just one click.">

        
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
                        <h5 class="mb-0">JavaScript Prettifier Tool</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="inputJS" class="form-label">Paste Your JavaScript</label>
                            <textarea id="inputJS" class="form-control" rows="8" placeholder="Paste your JavaScript code here..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="prettifiedJS" class="form-label">Prettified JavaScript Output</label>
                            <textarea id="prettifiedJS" class="form-control" rows="8" readonly></textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-success" onclick="prettifyJS()">Prettify</button>
                            <button class="btn btn-secondary" onclick="clearFields()">Clear</button>
                            <button class="btn btn-outline-primary" onclick="copyToClipboard()">Copy</button>
                        </div>

                        <div class="mt-3 text-muted">
                            <small>This tool uses Prettier to format your JavaScript code. It helps make your code easier to read and edit by organizing it neatly.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    <!-- Prettier Library -->
    <script src="https://cdn.jsdelivr.net/npm/prettier@2.5.1/standalone.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prettier@2.5.1/parser-babel.js"></script>

    <script>
        function prettifyJS() {
            const input = document.getElementById('inputJS').value;

            try {
                // Use Prettier to format the JavaScript code
                const formatted = prettier.format(input, {
                    parser: "babel",  // Use babel parser for JS code
                    plugins: prettierPlugins
                });
                document.getElementById('prettifiedJS').value = formatted;
            } catch (e) {
                alert("Invalid JavaScript input.");
            }
        }

        function clearFields() {
            document.getElementById('inputJS').value = '';
            document.getElementById('prettifiedJS').value = '';
        }

        function copyToClipboard() {
            const output = document.getElementById('prettifiedJS');
            output.select();
            output.setSelectionRange(0, 99999);  // Mobile compatibility
            document.execCommand("copy");
            alert("Prettified JavaScript copied to clipboard!");
        }
    </script>
    <script src="/assets/js/script.js" language="javascript" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>


</body>

</html>