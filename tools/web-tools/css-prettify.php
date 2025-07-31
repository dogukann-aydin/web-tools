<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>CSS Prettify Tool - Format and Beautify Your CSS Code</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="../../assets/css/sidebar.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css" 
        integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/js-beautify@1.14.7/js/lib/beautify-css.min.js"></script>

    <meta name="description" content="Use our free CSS Prettify tool to clean, format, and beautify your messy CSS code. Easy to use, fast results, no signup needed.">


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
                            <h5 class="mb-0">CSS Prettifier Tool</h5>
                        </div>
                        <div class="card-body">
                            <!-- Input Area for Minified or Unformatted CSS -->
                            <div class="mb-3">
                                <label for="inputCSS" class="form-label">Paste Your CSS</label>
                                <textarea id="inputCSS" class="form-control" rows="8" placeholder="Paste minified or unformatted CSS here..."></textarea>
                            </div>

                            <!-- Output Area for Formatted CSS -->
                            <div class="mb-3">
                                <label for="outputCSS" class="form-label">Formatted CSS</label>
                                <textarea id="outputCSS" class="form-control" rows="8" readonly></textarea>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex gap-2">
                                <button class="btn btn-success" onclick="prettifyCSS()">Prettify</button>
                                <button class="btn btn-secondary" onclick="clearFields()">Clear</button>
                                <button class="btn btn-outline-primary" onclick="copyToClipboard()">Copy</button>
                            </div>

                            <div class="mt-3 text-muted">
                                <small>This tool formats and indents your CSS code. Great for improving readability and editing.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- JavaScript Functions -->
    <script>
        // Function to prettify the input CSS
        function prettifyCSS() {
            let css = document.getElementById('inputCSS').value.trim(); // Remove any leading or trailing whitespace
            try {
                const formattedCSS = css_beautify(css, {
                    indent_size: 2,
                    wrap_line_length: 80,
                    preserve_newlines: true,
                    max_preserve_newlines: 2
                });
                document.getElementById('outputCSS').value = formattedCSS;
            } catch (e) {
                alert("Invalid CSS or formatting error.");
            }
        }

        // Function to clear both input and output areas
        function clearFields() {
            document.getElementById('inputCSS').value = '';
            document.getElementById('outputCSS').value = '';
        }

        // Function to copy formatted CSS to clipboard
        function copyToClipboard() {
            const output = document.getElementById('outputCSS');
            output.select();
            output.setSelectionRange(0, 99999); // For mobile devices
            document.execCommand("copy");
            alert("Formatted CSS copied to clipboard!");
        }
    </script>

    <!-- Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
