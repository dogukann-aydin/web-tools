<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>HTML Prettify Tool - Format and Clean Your HTML</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="../../assets/css/sidebar.css" type="text/css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
        integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    
<meta name="description" content="Use this free tool to format and beautify your HTML code. Make your HTML easy to read and edit with one click.">

        
    </head>

<body>

    <?php require_once '../../includes/header.php'; ?>

    <div class="d-flex">
        <!-- Sidebar -->

    <?php require_once '../../includes/sidebar.php'; ?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card shadow-sm">
        <div class="card-header text-white" style="background-color: #00373A;">
          <h5 class="mb-0">HTML Prettify Tool</h5>
        </div>
        <div class="card-body">

          <div class="mb-3">
            <label for="inputHTML" class="form-label">Paste Your HTML</label>
            <textarea id="inputHTML" class="form-control" rows="8" placeholder="Paste minified or unformatted HTML here..."></textarea>
          </div>

          <div class="mb-3">
            <label for="outputHTML" class="form-label">Formatted HTML</label>
            <textarea id="outputHTML" class="form-control" rows="8" readonly></textarea>
          </div>

          <div class="d-flex gap-2">
            <button class="btn btn-success" onclick="prettifyHTML()">Prettify</button>
            <button class="btn btn-secondary" onclick="clearFields()">Clear</button>
            <button class="btn btn-outline-primary" onclick="copyToClipboard()">Copy</button>
          </div>

          <div class="mt-3 text-muted">
            <small>This tool formats and indents your HTML code. Great for improving readability and editing.</small>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

    </div>

    <script>
  function prettifyHTML() {
    const html = document.getElementById('inputHTML').value;
    try {
      const formatted = html_beautify(html, {
        indent_size: 2,
        wrap_line_length: 80,
        preserve_newlines: true,
        max_preserve_newlines: 2
      });
      document.getElementById('outputHTML').value = formatted;
    } catch (e) {
      alert("Invalid HTML or formatting error.");
    }
  }

  function clearFields() {
    document.getElementById('inputHTML').value = '';
    document.getElementById('outputHTML').value = '';
  }

  function copyToClipboard() {
    const output = document.getElementById('outputHTML');
    output.select();
    output.setSelectionRange(0, 99999);
    document.execCommand("copy");
    alert("Formatted HTML copied to clipboard!");
  }
</script>

<!-- Load js-beautify from CDN -->
<script src="https://cdn.jsdelivr.net/npm/js-beautify@1.14.7/js/lib/beautify-html.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/js/script.js" language="javascript" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>


</body>

</html>