<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Extract Text from XML - Free Online Tool</title>
  <meta name="description" content="Remove XML tags and extract plain text from your XML code. Fast and easy XML to text converter for clean content.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
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
              <h5 class="mb-0">Extract Text from XML</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="xmlInput" class="form-label">Paste Your XML Code</label>
                <textarea id="xmlInput" class="form-control" rows="8" placeholder="Paste your XML code here..."></textarea>
              </div>

              <button class="btn btn-primary mb-3" onclick="extractXMLText()">Extract Text</button>

              <div class="mb-3">
                <label for="textOutput" class="form-label">Plain Text Output</label>
                <textarea id="textOutput" class="form-control" rows="6" readonly></textarea>
              </div>

              <button class="btn btn-outline-secondary" onclick="copyText()">📋 Copy to Clipboard</button>

              <div class="text-muted mt-3">
                <small>This tool removes all XML tags and shows only readable plain text extracted from your XML code.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
  function extractXMLText() {
    const xml = document.getElementById("xmlInput").value;

    try {
      const parser = new DOMParser();
      const xmlDoc = parser.parseFromString(xml, "text/xml");

      // XML parse hatası kontrolü
      const parseError = xmlDoc.getElementsByTagName("parsererror");
      if (parseError.length > 0) {
        document.getElementById("textOutput").value = "⚠️ Invalid XML format.";
        return;
      }

      const allElements = xmlDoc.getElementsByTagName("*");
      let output = [];

      for (let i = 0; i < allElements.length; i++) {
        const el = allElements[i];
        const tagName = el.tagName;
        const text = el.textContent.trim();

        // Yalnızca child'ı olmayanlar ve boş olmayanlar
        if (text && el.children.length === 0) {
          output.push(`${tagName} ${text}`);
        }
      }

      document.getElementById("textOutput").value = output.join("\n");

    } catch (e) {
      document.getElementById("textOutput").value = "⚠️ Error parsing XML.";
    }
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
