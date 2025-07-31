<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IDN Decoder - Convert Punycode to Unicode</title>
  <meta name="description" content="Free online IDN decoder tool to convert Punycode domains to Unicode. Easily decode international domain names like xn--mnchen-3ya.de to readable format.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../assets/css/styles.css" />
  <link rel="stylesheet" href="../../assets/css/sidebar.css" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .container-custom {
      max-width: 800px;
    }

    textarea,
    pre {
      font-size: 14px;
    }

    .output-box {
      background-color: #f8f9fa;
      border: 1px solid #ced4da;
      padding: 10px;
      border-radius: 5px;
      white-space: pre-wrap;
      font-family: monospace;
    }
  </style>
</head>

<body>



  <div class="d-flex">
    <?php require_once '../../includes/sidebar.php'; ?>

    <div class="container py-5 container-custom">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #00373A;">
              <h5 class="mb-0">IDN Decoder (Punycode to Unicode)</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="punycodeInput" class="form-label">Enter Punycode Domain</label>
                <input type="text" id="punycodeInput" class="form-control" />
              </div>

              <button class="btn btn-primary mb-3" onclick="decodeIDN()">Decode</button>

              <div class="mb-2">
                <label class="form-label">Decoded Output (Unicode)</label>
                <pre id="decodedOutput" class="output-box"></pre>
              </div>

              <div class="mb-3">
                <button class="btn btn-secondary" onclick="copyDecoded()">📋 Copy to Clipboard</button>
              </div>

              <div class="text-muted">
                <small>This tool decodes internationalized domain names (IDNs) from Punycode format into readable Unicode characters.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Punycode JS -->
  <script src="https://cdn.jsdelivr.net/npm/punycode@2.1.1/punycode.min.js"></script>

  <script>
    function decodeIDN() {
      const input = document.getElementById("punycodeInput").value.trim();
      const outputEl = document.getElementById("decodedOutput");

      try {
        const decoded = input.split('.').map(part =>
          part.startsWith('xn--') ? punycode.decode(part.substring(4)) : part
        ).join('.');

        outputEl.textContent = decoded;
      } catch (e) {
        outputEl.textContent = "⚠️ Decoding failed: " + e.message;
      }
    }

    function copyDecoded() {
      const outputEl = document.getElementById("decodedOutput");
      const text = outputEl.textContent;
      if (!text) return;

      navigator.clipboard.writeText(text).then(() => {
        alert("Copied to clipboard!");
      }, () => {
        alert("Failed to copy.");
      });
    }
  </script>

  <script src="/assets/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
