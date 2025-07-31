<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>XML to JSON Converter - Free Online Tool</title>
  <meta name="description" content="This free tool converts XML into JSON instantly and handles nested structures. Ideal for developers and data transformation tasks.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../assets/css/styles.css" />
  <link rel="stylesheet" href="../../assets/css/sidebar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

  <div class="d-flex">
    <?php require_once '../../includes/sidebar.php'; ?>

    <div class="container py-5 container-custom">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #00373A;">
              <h5 class="mb-0">XML to JSON Converter</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="xmlInput" class="form-label">Paste Your XML</label>
                <textarea id="xmlInput" class="form-control" rows="10" placeholder="Paste your XML here..."></textarea>
              </div>

              <button class="btn btn-primary mb-3" onclick="convertXmlToJson()">Convert to JSON</button>

              <div class="mb-2">
                <label for="jsonOutput" class="form-label">JSON Output</label>
                <pre id="jsonOutput" class="output-box"></pre>
              </div>

              <button class="btn btn-outline-secondary mb-3" onclick="copyToClipboard()">📋 Copy to Clipboard</button>

              <div class="text-muted mt-2">
                <small>This free tool converts XML into JSON instantly and handles nested structures. Ideal for developers and data transformation tasks.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function convertXmlToJson() {
      const xmlText = document.getElementById("xmlInput").value.trim();
      const output = document.getElementById("jsonOutput");

      if (!xmlText) {
        output.textContent = "⚠️ Please paste XML content.";
        return;
      }

      try {
        const parser = new DOMParser();
        const xmlDoc = parser.parseFromString(xmlText, "text/xml");

        const obj = xmlToJson(xmlDoc);
        output.textContent = JSON.stringify(obj, null, 2);
      } catch (e) {
        output.textContent = "⚠️ Invalid XML format.";
      }
    }

function xmlToJson(xml) {
  // metin node'uysa sadece değeri döndür
  if (xml.nodeType === 3) {
    return xml.nodeValue.trim();
  }

  const obj = {};

  // elementse ve attribute varsa ekle
  if (xml.nodeType === 1 && xml.attributes.length > 0) {
    obj["@attributes"] = {};
    for (let j = 0; j < xml.attributes.length; j++) {
      const attr = xml.attributes.item(j);
      obj["@attributes"][attr.nodeName] = attr.nodeValue;
    }
  }

  const children = Array.from(xml.childNodes).filter(n => n.nodeType === 1 || (n.nodeType === 3 && n.nodeValue.trim() !== ""));

  if (children.length === 1 && children[0].nodeType === 3) {
    return children[0].nodeValue.trim();
  }

  for (const child of children) {
    const name = child.nodeName;
    const value = xmlToJson(child);

    if (obj[name] === undefined) {
      obj[name] = value;
    } else {
      if (!Array.isArray(obj[name])) {
        obj[name] = [obj[name]];
      }
      obj[name].push(value);
    }
  }

  return obj;
}


    function copyToClipboard() {
      const text = document.getElementById("jsonOutput").textContent;
      navigator.clipboard.writeText(text).then(() => {
        alert("Copied to clipboard!");
      }).catch(err => {
        alert("Failed to copy text: " + err);
      });
    }
  </script>

  <script src="/assets/js/script.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
