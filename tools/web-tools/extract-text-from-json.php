<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Extract Text from JSON - Free Online Tool</title>
  <meta name="description"
    content="Use this free tool to extract all text and keys from your JSON data. Simple, fast, and easy-to-use JSON text extractor.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/sidebar.css" type="text/css" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .container-custom {
      max-width: 1000px;
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

  <?php require_once '../../includes/header.php'; ?>

  <div class="d-flex">
    <?php require_once '../../includes/sidebar.php'; ?>

    <div class="container py-5 container-custom">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #00373A;">
              <h5 class="mb-0">Extract Text from JSON</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="jsonInput" class="form-label">Paste your JSON below:</label>
                <textarea id="jsonInput" class="form-control" rows="10"
                  placeholder="Paste your JSON here..."></textarea>
              </div>

              <button class="btn btn-primary mb-3" onclick="extractAllText()">Extract Text</button>

              <div class="mb-3">
                <label class="form-label">Extracted Text Output</label>
                <pre id="jsonOutput" class="output-box"></pre>
                <div class="d-flex justify-content-start">
                  <button class="btn btn-outline-secondary btn-sm mt-2" onclick="copyToClipboard()">
                    <i class="bi bi-clipboard"></i> Copy to Clipboard
                  </button>
                </div>
              </div>

              <div class="text-muted mt-3">
                <small>This tool extracts all string values and keys from any JSON input, including nested structures
                  and arrays.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function extractAllText() {
      const input = document.getElementById("jsonInput").value.trim();
      const outputEl = document.getElementById("jsonOutput");
      outputEl.textContent = "";

      if (!input) {
        outputEl.textContent = "⚠️ Please enter JSON content.";
        return;
      }

      try {
        const json = JSON.parse(input);
        const result = [];

        function recurse(obj) {
          if (typeof obj === "object" && obj !== null) {
            if (Array.isArray(obj)) {
              obj.forEach(item => recurse(item));
            } else {
              for (let key in obj) {
                result.push(key);
                recurse(obj[key]);
              }
            }
          } else {
            result.push(String(obj));
          }
        }

        recurse(json);
        outputEl.textContent = result.length > 0 ? result.join("\n") : "⚠️ No text found.";
      } catch (e) {
        outputEl.textContent = "⚠️ Invalid JSON format.";
      }
    }

    function copyToClipboard() {
      const output = document.getElementById("jsonOutput").textContent;
      if (!output.trim()) {
        alert("⚠️ Nothing to copy.");
        return;
      }

      navigator.clipboard.writeText(output).then(() => {
        alert("✅ Extracted text copied to clipboard!");
      }).catch(() => {
        alert("❌ Failed to copy text.");
      });
    }
  </script>

  <script src="/assets/js/script.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
</body>

</html>
