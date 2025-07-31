<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JavaScript Minifier Tool - Compress Your JS Code Online</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/sidebar.css" type="text/css" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
    integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .tool-container {
      max-width: 800px;
      margin: 40px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      background-color: #fff;
    }

    .tool-container textarea {
      width: 100%;
      height: 200px;
      border-radius: 4px;
      padding: 10px;
      resize: vertical;
    }

    .tool-container .btn {
      width: 100%;
    }

    .output-container {
      margin-top: 30px;
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      background-color: #f8f9fa;
    }

    @media (max-width: 767px) {
      .tool-container textarea {
        height: auto;
        min-height: 150px;
      }
    }
  </style>
</head>

<body>

  <?php require_once '../../includes/header.php'; ?>

  <div class="d-flex">
    <?php require_once '../../includes/sidebar.php'; ?>

    <div class="flex-grow-1">
      <div class="tool-container">
        <h3 class="mb-4">JavaScript Minifier Tool</h3>
        <div class="mb-3">
          <textarea id="js-minify-text" class="form-control" placeholder="Paste your JavaScript code here..."></textarea>
        </div>
        <div class="mb-3">
          <div id="action-error" class="alert alert-danger" style="display: none;"></div>
        </div>
        <div class="mb-3">
          <button type="submit" id="js-minify-submit" class="btn btn-primary">JS Minify!</button>
        </div>

        <div id="output-container" class="output-container" style="display: none;">
          <h5>Minified JavaScript Output</h5>
          <textarea id="minified-js" class="form-control" rows="10" readonly></textarea>
          <button type="button" id="copy-to-clipboard" class="btn btn-secondary mt-3">Copy to Clipboard</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/terser@5.10.0/dist/bundle.min.js"></script>
  <script src="/assets/js/jquery.min.js" type="text/javascript"></script>
  <script src="/assets/js/script.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
  </script>

  <script>
    document.getElementById("js-minify-submit").addEventListener("click", async function () {
      const jsCode = document.getElementById("js-minify-text").value;
      const errorBox = document.getElementById("action-error");
      const outputBox = document.getElementById("output-container");

      errorBox.style.display = "none";
      outputBox.style.display = "none";

      if (jsCode.trim() === "") {
        errorBox.textContent = "Please paste your JavaScript code to minify.";
        errorBox.style.display = "block";
        return;
      }

      // Terser kelimesi geçiyorsa geçici değiştir
      const placeholder = "__Terser__TEMP__";
      const safeCode = jsCode.replace(/Terser/g, placeholder);

      try {
        const result = await Terser.minify(safeCode);
        if (result.error) throw new Error(result.error);

        const finalCode = result.code.replace(new RegExp(placeholder, "g"), "Terser");
        document.getElementById("minified-js").value = finalCode;
        outputBox.style.display = "block";
      } catch (e) {
        errorBox.textContent = "Error minifying JavaScript: " + e.message;
        errorBox.style.display = "block";
      }
    });

    document.getElementById("copy-to-clipboard").addEventListener("click", function () {
      const outputTextArea = document.getElementById("minified-js");
      outputTextArea.select();
      document.execCommand("copy");
      alert("Minified JavaScript copied to clipboard!");
    });
  </script>
</body>

</html>
