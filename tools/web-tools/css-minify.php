<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CSS Minify Tool - Compress and Optimize Your CSS Code</title>
  <meta name="description"
    content="Minify your CSS code instantly with our free online tool. Remove spaces, comments, and line breaks to optimize your stylesheet. Fast and easy!">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="../../assets/css/styles.css" />
  <link rel="stylesheet" href="../../assets/css/sidebar.css" />
</head>

<body>


  <div class="d-flex">
    <?php require_once '../../includes/sidebar.php'; ?>

    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #00373A;">
              <h5 class="mb-0">CSS Minify Tool</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="inputCSS" class="form-label">Paste Your CSS Code</label>
                <textarea id="inputCSS" class="form-control" rows="10"
                  placeholder="Paste your CSS code here..."></textarea>
              </div>

              <div class="d-flex gap-2 mb-3">
                <button class="btn btn-success" onclick="minifyCSS()">Minify CSS</button>
                <button class="btn btn-secondary" onclick="clearFields()">Clear</button>
              </div>

              <div class="mb-3" id="outputContainer">
                <label for="minifiedCSS" class="form-label">Minified CSS Output</label>
                <textarea id="minifiedCSS" class="form-control" rows="8" readonly></textarea>
                <button class="btn btn-outline-primary mt-2" onclick="copyToClipboard()">Copy to Clipboard</button>
              </div>

              <div class="alert alert-warning mt-3" id="alertBox" style="display: none;"></div>

              <div class="mt-3 text-muted">
                <small>This tool removes whitespace, comments, and unnecessary characters to make your CSS smaller and
                  faster.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function minifyCSS() {
      const input = document.getElementById("inputCSS").value.trim();
      const outputBox = document.getElementById("outputContainer");
      const outputText = document.getElementById("minifiedCSS");
      const alertBox = document.getElementById("alertBox");

      alertBox.style.display = "none";
      outputBox.style.display = "none";

      if (input === "") {
        alertBox.textContent = "⚠️ Please enter CSS code before minifying.";
        alertBox.style.display = "block";
        return;
      }

      // Minify: remove comments, whitespace, line breaks
      let minified = input
        .replace(/\/\*[\s\S]*?\*\//g, "") // remove comments
        .replace(/\s*{\s*/g, "{")
        .replace(/\s*}\s*/g, "}")
        .replace(/\s*:\s*/g, ":")
        .replace(/\s*;\s*/g, ";")
        .replace(/\s*,\s*/g, ",")
        .replace(/\s+/g, " ")            // multiple spaces to one
        .replace(/;\}/g, "}");           // remove last semicolon

      outputText.value = minified;
    }

    function clearFields() {
      document.getElementById("inputCSS").value = "";
      document.getElementById("minifiedCSS").value = "";
      document.getElementById("alertBox").style.display = "none";
      document.getElementById("outputContainer").style.display = "none";
    }

    function copyToClipboard() {
      const textarea = document.getElementById("minifiedCSS");
      textarea.select();
      document.execCommand("copy");
      alert("Minified CSS copied to clipboard!");
    }
  </script>

  <script src="/assets/js/script.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
</body>

</html>
