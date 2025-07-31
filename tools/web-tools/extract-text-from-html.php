<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Extract Text from HTML - Free Online Tool</title>
  <meta name="description" content="Remove all HTML tags and extract plain text from your HTML code. Simple and fast HTML to text converter.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="../../assets/css/styles.css" />
  <link rel="stylesheet" href="../../assets/css/sidebar.css" />
</head>

<body>
  <?php require_once '../../includes/header.php'; ?>
  <div class="d-flex">
    <?php require_once '../../includes/sidebar.php'; ?>

    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #00373A;">
              <h5 class="mb-0">Extract Text from HTML</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="htmlInput" class="form-label">Paste Your HTML Code</label>
                <textarea id="htmlInput" class="form-control" rows="8" placeholder="Paste your HTML code here..."></textarea>
              </div>

              <button class="btn btn-primary mb-3" onclick="extractText()">Extract Text</button>

              <div class="mb-3">
                <label for="textOutput" class="form-label">Plain Text Output</label>
                <textarea id="textOutput" class="form-control" rows="6" readonly></textarea>
              </div>

              <button class="btn btn-outline-secondary" onclick="copyText()">📋 Copy to Clipboard</button>

              <div class="text-muted mt-3">
                <small>This tool removes all HTML tags and shows only clean, readable text from your HTML code.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function extractText() {
      const html = document.getElementById("htmlInput").value;
      const tempDiv = document.createElement("div");
      tempDiv.innerHTML = html;
      const text = tempDiv.textContent || tempDiv.innerText || "";
      document.getElementById("textOutput").value = text.trim();
    }

    function copyText() {
      const textArea = document.getElementById("textOutput");
      textArea.select();
      textArea.setSelectionRange(0, 99999);
      document.execCommand("copy");
      alert("Text copied to clipboard!");
    }
  </script>

  <script src="/assets/js/script.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
