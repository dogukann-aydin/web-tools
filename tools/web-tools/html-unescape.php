<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>HTML Unescape Tool - Convert Entities to Normal Text</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="../../assets/css/sidebar.css" type="text/css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
        integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


<meta name="description" content="Turn escaped HTML into normal text. This free tool converts less than, greater than, and other symbols easily.">

        
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
            <h5 class="mb-0">HTML Unescape Tool</h5>
          </div>
          <div class="card-body">

            <div class="mb-3">
              <label for="inputText" class="form-label">Escaped HTML</label>
              <textarea class="form-control" id="inputText" rows="4" placeholder="Paste your escaped HTML here..."></textarea>
            </div>

            <div class="mb-3">
              <label for="unescapedText" class="form-label">Unescaped Output</label>
              <textarea class="form-control" id="unescapedText" rows="4" readonly></textarea>
            </div>

            <div class="d-flex gap-2">
              <button class="btn btn-success" onclick="unescapeHTML()">Unescape</button>
              <button class="btn btn-secondary" onclick="clearFields()">Clear</button>
              <button class="btn btn-outline-primary" onclick="copyToClipboard()">Copy</button>
            </div>

            <div class="mt-3 text-muted">
              <small>This tool converts HTML entities like &amp;lt;, &amp;gt;, &amp;amp;, &amp;quot;, and &amp;#39; back to readable characters.</small>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

    </div>

     <script>
    function unescapeHTML() {
      const input = document.getElementById('inputText').value;
      const temp = document.createElement("textarea");
      temp.innerHTML = input;
      document.getElementById('unescapedText').value = temp.value;
    }

    function clearFields() {
      document.getElementById('inputText').value = '';
      document.getElementById('unescapedText').value = '';
    }

    function copyToClipboard() {
      const output = document.getElementById('unescapedText');
      output.select();
      output.setSelectionRange(0, 99999); // Mobile compatibility
      document.execCommand("copy");
      alert("Unescaped text copied to clipboard!");
    }
  </script>

    <script src="/assets/js/script.js" language="javascript" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>


</body>

</html>