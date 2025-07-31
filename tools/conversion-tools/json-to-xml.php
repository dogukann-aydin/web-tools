<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Convert JSON to XML - Free Web Tool</title>
  <meta name="description" content="Easily convert JSON data into XML format. Use this free online tool to convert and copy structured data.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/sidebar.css" type="text/css" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
    integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .container-custom {
      max-width: 1000px;
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
    <!-- Sidebar -->
    <?php require_once '../../includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="container py-5 container-custom">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #00373A;">
              <h5 class="mb-0">Convert JSON to XML</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="jsonInput" class="form-label">Enter JSON</label>
                <textarea id="jsonInput" class="form-control" rows="8" placeholder='{"note": {"to": "Tove", "from": "Jani"}}'></textarea>
              </div>

              <button class="btn btn-primary mb-3" onclick="convertJsonToXml()">Convert</button>

              <div>
                <label for="xmlOutput" class="form-label">XML Output</label>
                <pre id="xmlOutput" class="output-box"></pre>
              </div>

              <button class="btn btn-outline-secondary mt-2" onclick="copyToClipboard()">📋 Copy to Clipboard</button>

              <div class="text-muted mt-3">
                <small>This tool converts valid JSON to clean and readable XML format. Make sure your JSON is properly structured.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script>
    function jsonToXml(obj, indent = "") {
      let xml = "";
      for (let key in obj) {
        if (obj.hasOwnProperty(key)) {
          let value = obj[key];
          if (typeof value === "object" && value !== null) {
            xml += `${indent}<${key}>\n` + jsonToXml(value, indent + "  ") + `${indent}</${key}>\n`;
          } else {
            xml += `${indent}<${key}>${value}</${key}>\n`;
          }
        }
      }
      return xml;
    }

    function convertJsonToXml() {
      const input = document.getElementById("jsonInput").value;
      try {
        const json = JSON.parse(input);
        const xml = jsonToXml(json);
        document.getElementById("xmlOutput").textContent = xml;
      } catch (e) {
        document.getElementById("xmlOutput").textContent = "❌ Invalid JSON input.";
      }
    }

    function copyToClipboard() {
      const output = document.getElementById("xmlOutput").textContent;
      navigator.clipboard.writeText(output).then(() => {
        alert("Copied to clipboard!");
      });
    }
  </script>

  <script src="/assets/js/script.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
</body>

</html>
