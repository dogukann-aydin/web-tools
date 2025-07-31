<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Convert Text to HTML Entities - Free Online Tool</title>
  <meta name="description" content="Easily convert special characters to HTML entities. Free tool to encode your text into safe HTML format.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../assets/css/styles.css" />
  <link rel="stylesheet" href="../../assets/css/sidebar.css" />
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
              <h5 class="mb-0">Convert Text to HTML Entities</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="textInput" class="form-label">Enter Your Text</label>
                <textarea id="textInput" class="form-control" rows="6" placeholder="Type or paste your text here..."></textarea>
              </div>

              <button class="btn btn-primary mb-3" onclick="convertToEntities()">Convert</button>

              <div class="mb-3">
                <label for="output" class="form-label">HTML Entities Output</label>
                <pre id="output" class="output-box"></pre>
                <div class="d-flex justify-content-start">
                  <button class="btn btn-outline-secondary btn-sm mt-2" onclick="copyToClipboard()">
                    <i class="bi bi-clipboard"></i> Copy to Clipboard
                  </button>
                </div>
              </div>

              <div class="text-muted mt-3">
                <small>This tool converts all characters in your text into their corresponding HTML entities. Useful for web-safe encoding.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function convertToEntities() {
      const input = document.getElementById("textInput").value;
      let output = '';

      for (let i = 0; i < input.length; i++) {
        const char = input[i];
        output += `&#${char.charCodeAt(0)};`;
      }

      document.getElementById("output").textContent = output;
    }

    function copyToClipboard() {
      const outputText = document.getElementById("output").textContent;
      if (!outputText.trim()) {
        alert("⚠️ Nothing to copy.");
        return;
      }

      navigator.clipboard.writeText(outputText)
        .then(() => alert("✅ Copied to clipboard!"))
        .catch(() => alert("❌ Failed to copy."));
    }
  </script>

  <script src="/assets/js/script.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
</body>

</html>
