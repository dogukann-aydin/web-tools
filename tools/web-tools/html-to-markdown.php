<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HTML to Markdown Converter - Free Online Tool</title>
  <meta name="description" content="Easily convert HTML code to Markdown format using our free online tool. Paste your HTML and get clean, readable Markdown output instantly.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/sidebar.css" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .container-custom {
      max-width: 1000px;
    }

    textarea {
      font-size: 14px;
    }

    .markdown-output {
      background-color: #f8f9fa;
      border: 1px solid #ced4da;
      padding: 10px;
      border-radius: 5px;
      white-space: pre-wrap;
      font-family: monospace;
      font-size: 14px;
      min-height: 150px;
    }
  </style>
</head>

<body>



  <div class="d-flex">
    <!-- Sidebar -->
    <?php require_once '../../includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="container py-5 container-custom">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #00373A;">
              <h5 class="mb-0">HTML to Markdown Converter</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="htmlInput" class="form-label">Paste Your HTML Code</label>
                <textarea id="htmlInput" class="form-control" rows="8" placeholder="Paste your HTML code here..."></textarea>
              </div>

              <button class="btn btn-primary mb-3" onclick="convertToMarkdown()">Convert to Markdown</button>

              <div class="mb-2">
                <label class="form-label">Markdown Output</label>
                <pre id="markdownOutput" class="markdown-output"></pre>
              </div>

              <button class="btn btn-outline-secondary btn-sm" onclick="copyMarkdownToClipboard()">
                <i class="bi bi-clipboard"></i> Copy to Clipboard
              </button>

              <div class="text-muted mt-3">
                <small>This tool converts your HTML code into Markdown format. Paste your code and click convert.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Turndown Library -->
  <script src="https://unpkg.com/turndown/dist/turndown.js"></script>

  <script>
    function convertToMarkdown() {
      const html = document.getElementById("htmlInput").value;
      const turndownService = new TurndownService();
      const markdown = turndownService.turndown(html);
      document.getElementById("markdownOutput").textContent = markdown;
    }

    function copyMarkdownToClipboard() {
      const output = document.getElementById("markdownOutput").textContent;
      navigator.clipboard.writeText(output)
        .then(() => alert("Markdown copied to clipboard!"))
        .catch(err => alert("Failed to copy text: " + err));
    }
  </script>

  <script src="/assets/js/script.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>
