<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RGB to HEX Converter - Convert RGB Color to HEX Code</title>
  <meta name="description" content="Convert your RGB color values to HEX format easily. Just enter Red, Green, and Blue values to get your HEX color code. Fast and simple tool.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="../../assets/css/styles.css" />
  <link rel="stylesheet" href="../../assets/css/sidebar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" />

  <style>
    .container-custom {
      max-width: 700px;
    }

    .color-preview {
      width: 50px;
      height: 50px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .hex-output {
      font-family: monospace;
      font-size: 1.2rem;
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
            <div class="card-header bg-dark text-white">
              <h5 class="mb-0">RGB to HEX Converter</h5>
            </div>
            <div class="card-body">
              <div class="row g-3 mb-3">
                <div class="col-md-4">
                  <label for="rValue" class="form-label">Red (0-255)</label>
                  <input type="number" id="rValue" class="form-control" min="0" max="255" placeholder="e.g. 255">
                </div>
                <div class="col-md-4">
                  <label for="gValue" class="form-label">Green (0-255)</label>
                  <input type="number" id="gValue" class="form-control" min="0" max="255" placeholder="e.g. 99">
                </div>
                <div class="col-md-4">
                  <label for="bValue" class="form-label">Blue (0-255)</label>
                  <input type="number" id="bValue" class="form-control" min="0" max="255" placeholder="e.g. 71">
                </div>
              </div>

              <div class="d-flex align-items-center gap-3 mb-3">
                <button class="btn btn-primary" onclick="convertRGBtoHEX()">Convert</button>
                <div id="colorPreview" class="color-preview"></div>
              </div>

              <div id="hexResult" class="hex-output text-success mb-3"></div>

              <div class="text-muted">
                <small>This tool converts your Red, Green, and Blue values to a HEX color code. Great for designers and developers.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function convertRGBtoHEX() {
      const r = parseInt(document.getElementById("rValue").value);
      const g = parseInt(document.getElementById("gValue").value);
      const b = parseInt(document.getElementById("bValue").value);
      const result = document.getElementById("hexResult");
      const preview = document.getElementById("colorPreview");

      if (
        isNaN(r) || isNaN(g) || isNaN(b) ||
        r < 0 || r > 255 ||
        g < 0 || g > 255 ||
        b < 0 || b > 255
      ) {
        result.textContent = "❌ Please enter valid numbers between 0 and 255.";
        result.classList.replace("text-success", "text-danger");
        preview.style.backgroundColor = "transparent";
        return;
      }

      const hex = "#" +
        r.toString(16).padStart(2, '0') +
        g.toString(16).padStart(2, '0') +
        b.toString(16).padStart(2, '0');

      result.textContent = `✅ HEX Code: ${hex.toUpperCase()}`;
      result.classList.replace("text-danger", "text-success");
      preview.style.backgroundColor = hex;
    }
  </script>

  <script src="/assets/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
