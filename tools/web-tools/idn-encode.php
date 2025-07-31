<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IDN Encoder - Convert Unicode to Punycode</title>
  <meta name="description" content="Easily convert internationalized domain names (IDN) to Punycode using this free online IDN encoder tool. Supports non-ASCII characters like ü, ç, ñ.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../assets/css/styles.css" />
  <link rel="stylesheet" href="../../assets/css/sidebar.css" />
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
              <h5 class="mb-0">IDN Encoder (Unicode to Punycode)</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="domainInput" class="form-label">Enter Unicode Domain</label>
                <input type="text" id="domainInput" class="form-control"/>
              </div>

              <button class="btn btn-primary mb-3" onclick="encodeIDN()">Encode</button>

              <div class="mb-2">
                <label class="form-label">Encoded Output (Punycode)</label>
                <pre id="output" class="output-box"></pre>
              </div>

              <div class="mb-3">
                <button class="btn btn-secondary" onclick="copyOutput()">📋 Copy to Clipboard</button>
              </div>

              <div class="text-muted">
                <small>This tool converts internationalized domain names (IDNs) like münchen.de into ASCII-compatible Punycode such as xn--mnchen-3ya.de.</small>
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
    function encodeIDN() {
      const input = document.getElementById("domainInput").value.trim();
      const outputEl = document.getElementById("output");

      try {
        const encoded = input.split('.').map(part =>
          /[^\x00-\x7F]/.test(part) ? 'xn--' + punycode.encode(part) : part
        ).join('.');

        outputEl.textContent = encoded;
      } catch (e) {
        outputEl.textContent = "⚠️ Encoding failed: " + e.message;
      }
    }

    function copyOutput() {
      const outputEl = document.getElementById("output");
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
