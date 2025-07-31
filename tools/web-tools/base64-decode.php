<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Base64 Decode Tool - Convert Base64 to Text</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="../../assets/css/sidebar.css" type="text/css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
        integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

<meta name="description" content="Use this free tool to change Base64 code into normal text. Fast, simple, and safe for all types of content.">


        
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
            <h5 class="mb-0">Base64 Decode Tool</h5>
          </div>
          <div class="card-body">

            <div class="mb-3">
              <label for="inputText" class="form-label">Base64 Input</label>
              <textarea class="form-control" id="inputText" rows="4" placeholder="Paste your Base64 string here..."></textarea>
            </div>

            <div class="mb-3">
              <label for="decodedText" class="form-label">Decoded Output</label>
              <textarea class="form-control" id="decodedText" rows="4" readonly></textarea>
            </div>

            <div class="d-flex gap-2">
              <button class="btn btn-success" onclick="decodeBase64()">Decode</button>
              <button class="btn btn-secondary" onclick="clearFields()">Clear</button>
              <button class="btn btn-outline-primary" onclick="copyToClipboard()">Copy</button>
            </div>

            <div class="mt-3 text-muted">
              <small>This tool converts Base64 strings back to normal text. Supports all characters, including Unicode.</small>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

    </div>

     <script>
    function decodeBase64() {
      const input = document.getElementById('inputText').value;
      try {
        const decoded = decodeURIComponent(escape(atob(input)));
        document.getElementById('decodedText').value = decoded;
      } catch (e) {
        alert("Invalid Base64 string.");
      }
    }

    function clearFields() {
      document.getElementById('inputText').value = '';
      document.getElementById('decodedText').value = '';
    }

    function copyToClipboard() {
      const output = document.getElementById('decodedText');
      output.select();
      output.setSelectionRange(0, 99999);
      document.execCommand("copy");
      alert("Decoded text copied to clipboard!");
    }
  </script>

    <script src="/assets/js/script.js" language="javascript" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>


</body>

</html>