<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>XML Prettify Tool - Beautify Your XML Code Online</title>
  <meta name="description" content="Use our free XML Prettify tool to format and beautify your XML code. Make your XML readable with proper indentation. No signup required.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
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
              <h5 class="mb-0">XML Prettify Tool</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="inputXML" class="form-label">Paste Your XML Code</label>
                <textarea id="inputXML" class="form-control" rows="10"
                  placeholder="Paste your XML code here..."></textarea>
              </div>

              <div class="d-flex gap-2 mb-3">
                <button class="btn btn-success" onclick="prettifyXML()">Prettify XML</button>
                <button class="btn btn-secondary" onclick="clearFields()">Clear</button>
              </div>

              <!-- Output is always visible -->
              <div class="mb-3" id="outputContainer">
                <label for="outputXML" class="form-label">Formatted XML Output</label>
                <textarea id="outputXML" class="form-control" rows="10" readonly></textarea>
                <button class="btn btn-outline-primary mt-2" onclick="copyToClipboard()">Copy to Clipboard</button>
              </div>

              <div class="mt-3 text-muted">
                <small>This tool formats and beautifies your raw XML. Proper indentation makes XML easier to read.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function prettifyXML() {
      const input = document.getElementById('inputXML').value;
      const output = document.getElementById('outputXML');

      if (!input.trim()) {
        output.value = "⚠️ Please paste your XML code first.";
        return;
      }

      try {
        output.value = formatXML(input);
      } catch (e) {
        output.value = "❌ Invalid XML input!";
      }
    }

    function formatXML(xml) {
      const PADDING = "  "; // 2 spaces
      xml = xml.replace(/>\s*</g, '><'); // Remove whitespace between tags
      const reg = /(>)(<)(\/*)/g;
      xml = xml.replace(reg, '$1\r\n$2$3');

      let formatted = '';
      let pad = 0;

      xml.split('\r\n').forEach((node) => {
        if (node.match(/^<\/\w/)) pad--;
        formatted += PADDING.repeat(pad) + node + '\n';
        if (node.match(/^<\w[^>]*[^\/]>$/)) pad++;
      });

      return formatted.trim();
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
      alert('Formatted XML copied to clipboard!');
    }
  </script>

  <script src="/assets/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
</body>

</html>
