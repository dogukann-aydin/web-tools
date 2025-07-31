<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>XML Minify Tool - Remove Whitespace and Compress XML</title>
  <meta name="description" content="Use our free XML Minify tool to make your XML smaller. Quickly remove spaces and line breaks. Easy and fast to use.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous">
  <link rel="stylesheet" href="../../assets/css/styles.css" />
  <link rel="stylesheet" href="../../assets/css/sidebar.css" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .container-custom {
      max-width: 900px;
    }

    textarea {
      font-size: 14px;
    }
  </style>
</head>

<body>

  <?php require_once '../../includes/header.php'; ?>

  <div class="d-flex">
    <?php require_once '../../includes/sidebar.php'; ?>

    <div class="container py-5 container-custom">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #00373A;">
              <h5 class="mb-0">XML Minify Tool</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="inputXML" class="form-label">Paste Your XML Code</label>
                <textarea id="inputXML" class="form-control" rows="10" placeholder="Paste your XML code here..."></textarea>
              </div>

              <div class="d-flex gap-2 mb-3">
                <button class="btn btn-success" onclick="minifyXML()">Minify XML</button>
                <button class="btn btn-secondary" onclick="clearFields()">Clear</button>
              </div>

              <div class="mb-3" id="outputContainer">
                <label for="outputXML" class="form-label">Minified XML Output</label>
                <textarea id="outputXML" class="form-control" rows="10" readonly></textarea>
                <button class="btn btn-outline-primary mt-2" onclick="copyToClipboard()">Copy to Clipboard</button>
              </div>

              <div class="mt-3 text-muted">
                <small>This tool removes all extra spaces and line breaks from your XML code.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function minifyXML() {
      const input = document.getElementById('inputXML').value;
      const output = document.getElementById('outputXML');

      if (!input.trim()) {
        output.value = "⚠️ Please enter your XML code.";
        return;
      }

      // Minify: remove whitespace between tags and new lines
      const minified = input
        .replace(/>\s+</g, '><')
        .replace(/\s{2,}/g, ' ')
        .replace(/\n/g, '')
        .trim();

      output.value = minified;
    }

    function clearFields() {
      document.getElementById('inputXML').value = '';
      document.getElementById('outputXML').value = '';
    }

    function copyToClipboard() {
      const output = document.getElementById('outputXML');
      output.select();
      output.setSelectionRange(0, 99999);
      document.execCommand('copy');
      alert('Minified XML copied to clipboard!');
    }
  </script>

  <script src="/assets/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
</body>

</html>
