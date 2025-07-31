<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HEX to RGB Converter - Change HEX Color Code to RGB</title>
  <meta name="description" content="Convert your HEX color code to RGB easily. Just paste your HEX and get the RGB result instantly. Simple and fast color converter.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous">
  <link rel="stylesheet" href="../../assets/css/styles.css" />
  <link rel="stylesheet" href="../../assets/css/sidebar.css" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
    crossorigin="anonymous" />

  <style>
    .container-custom {
      max-width: 700px;
    }

    .color-preview {
      width: 40px;
      height: 40px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    .rgb-output {
      font-family: monospace;
      font-size: 1rem;
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
              <h5 class="mb-0">HEX to RGB Converter</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="hexInput" class="form-label">Enter HEX Color Code (e.g. <code>#FF5733</code>)</label>
                <input type="text" id="hexInput" class="form-control" placeholder="#000000" />
              </div>

              <div class="d-flex align-items-center gap-3 mb-3">
                <button class="btn btn-primary" onclick="convertHexToRGB()">Convert</button>
                <div id="colorPreview" class="color-preview"></div>
              </div>

              <div id="rgbResult" class="rgb-output mb-3 text-success"></div>

              <div class="text-muted">
                <small>This tool converts your HEX color code to RGB format. Just enter your HEX code and see the result.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function convertHexToRGB() {
      const hexInput = document.getElementById("hexInput").value.trim();
      const rgbOutput = document.getElementById("rgbResult");
      const preview = document.getElementById("colorPreview");

      const hex = hexInput.replace("#", "");
      if (!/^([0-9A-Fa-f]{3}){1,2}$/.test(hex)) {
        rgbOutput.textContent = "❌ Invalid HEX code. Please use format like #FF5733.";
        rgbOutput.classList.replace("text-success", "text-danger");
        preview.style.backgroundColor = "transparent";
        return;
      }

      let r, g, b;
      if (hex.length === 3) {
        r = parseInt(hex[0] + hex[0], 16);
        g = parseInt(hex[1] + hex[1], 16);
        b = parseInt(hex[2] + hex[2], 16);
      } else {
        r = parseInt(hex.substring(0, 2), 16);
        g = parseInt(hex.substring(2, 4), 16);
        b = parseInt(hex.substring(4, 6), 16);
      }

      const rgbString = `rgb(${r}, ${g}, ${b})`;
      rgbOutput.textContent = `✅ RGB Value: ${rgbString}`;
      rgbOutput.classList.replace("text-danger", "text-success");
      preview.style.backgroundColor = rgbString;
    }
  </script>

  <script src="/assets/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
</body>

</html>
