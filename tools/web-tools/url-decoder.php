<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Online URL Decoder Tool - Decode URLs Easily</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="../../assets/css/sidebar.css" type="text/css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
        integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<meta name="description" content="Use this free URL decoder tool to turn encoded links into readable text. Fast, simple, and secure decoding for everyone.">

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
            <h5 class="mb-0">URL Decoder</h5>
          </div>
          <div class="card-body">

            <div class="mb-3">
              <label for="encodedInput" class="form-label">Encoded URL Text</label>
              <textarea class="form-control" id="encodedInput" rows="4" placeholder="Paste your encoded URL here..."></textarea>
            </div>

            <div class="mb-3">
              <label for="decodedOutput" class="form-label">Decoded Text</label>
              <textarea class="form-control" id="decodedOutput" rows="4" readonly></textarea>
            </div>

            <div class="d-flex gap-2">
              <button class="btn btn-success" onclick="decodeText()">Decode</button>
              <button class="btn btn-secondary" onclick="clearFields()">Clear</button>
              <button class="btn btn-outline-primary" onclick="copyToClipboard()">Copy</button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function decodeText() {
      const input = document.getElementById('encodedInput').value;
      try {
        const decoded = decodeURIComponent(input);
        document.getElementById('decodedOutput').value = decoded;
      } catch (e) {
        alert('Invalid encoded URL string!');
      }
    }

    function clearFields() {
      document.getElementById('encodedInput').value = '';
      document.getElementById('decodedOutput').value = '';
    }

    function copyToClipboard() {
      const output = document.getElementById('decodedOutput');
      output.select();
      output.setSelectionRange(0, 99999); // For mobile
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