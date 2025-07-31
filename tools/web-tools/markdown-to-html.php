<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Markdown to HTML Converter - Free Online Tool</title>
  <meta name="description" content="Convert your Markdown text to clean HTML with our free online tool. Paste your Markdown and get HTML output instantly.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/sidebar.css" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .container-custom {
      max-width: 1000px;
    }

    textarea {
      font-size: 14px;
    }

    .html-output {
      font-family: monospace;
      white-space: pre-wrap;
      font-size: 14px;
    }
  </style>
</head>

<body>

  <?php require_once '../../includes/header.php'; ?>

  <div class="d-flex">
    <?php require_once '../../includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="container py-5 container-custom">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #00373A;">
              <h5 class="mb-0">Markdown to HTML Converter</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="markdownInput" class="form-label">Enter Your Markdown</label>
                <textarea id="markdownInput" class="form-control" rows="8" placeholder="Paste your markdown code here..."></textarea>
              </div>

              <button class="btn btn-primary mb-3" onclick="convertToHTML()">Convert to HTML</button>

              <div class="mb-3">
                <label for="htmlOutput" class="form-label">HTML Output</label>
                <textarea id="htmlOutput" class="form-control html-output" rows="6" readonly></textarea>
                <button class="btn btn-outline-secondary mt-2" onclick="copyToClipboard()">📋 Copy to Clipboard</button>
              </div>

              <div class="text-muted mt-3">
                <small>This tool converts Markdown text into HTML. Paste your Markdown and convert it easily.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Marked Library for Markdown to HTML -->
  <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

  <!-- JS Scripts -->
  <script>
    function convertToHTML() {
      const markdown = document.getElementById("markdownInput").value;
      const html = marked.parse(markdown);
      document.getElementById("htmlOutput").value = html;
    }

    function copyToClipboard() {
      const outputField = document.getElementById("htmlOutput");
      outputField.select();
      document.execCommand("copy");
      alert("HTML code copied to clipboard!");
    }
  </script>

  <script src="/assets/js/script.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
