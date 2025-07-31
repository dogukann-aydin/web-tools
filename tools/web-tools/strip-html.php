<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Strip HTML Tags - Remove HTML from Text Online</title>
  <meta name="description" content="Use this free tool to remove HTML tags from any text. Paste your HTML and get clean, plain text output instantly.">

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
              <h5 class="mb-0">Strip HTML Tags</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="htmlInput" class="form-label">Paste Your HTML</label>
                <textarea id="htmlInput" class="form-control" rows="6" placeholder="Paste HTML here..."></textarea>
              </div>

              <button class="btn btn-primary mb-3" onclick="stripHtml()">Strip HTML</button>

              <div class="mb-3">
                <label for="outputText" class="form-label">Plain Text Output</label>
                <pre id="outputText" class="output-box"></pre>
                <div class="d-flex justify-content-start">
                  <button class="btn btn-outline-secondary btn-sm mt-2" onclick="copyToClipboard()">
                    <i class="bi bi-clipboard"></i> Copy to Clipboard
                  </button>
                </div>
              </div>

              <div class="text-muted mt-3">
                <small>This tool removes all HTML tags and gives you clean, plain text. Just paste your HTML and click convert.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
function stripHtml() {
  const html = document.getElementById("htmlInput").value;

  // 1. HTML yorumlarını sil
  const noComments = html.replace(/<!--[\s\S]*?-->/g, '');

  // 2. HTML etiketlerini temizle
  const tmpDiv = document.createElement("div");
  tmpDiv.innerHTML = noComments;

  // 3. Text içeriğini al
  const text = tmpDiv.textContent || tmpDiv.innerText || "";

  // 4. Sonucu ekrana yaz
  document.getElementById("outputText").textContent = text.trim();
}



    function copyToClipboard() {
      const outputText = document.getElementById("outputText").textContent;
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
