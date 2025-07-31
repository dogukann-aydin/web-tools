<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JSON Validate Tool - Check If Your JSON is Valid</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/sidebar.css" type="text/css" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
    integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="description"
    content="Use this free tool to validate your JSON data. Check if your JSON is properly formatted and identify any errors in the structure.">
</head>

<body>

  <?php require_once '../../includes/header.php'; ?>

  <div class="d-flex">
    <?php require_once '../../includes/sidebar.php'; ?>

    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card shadow-sm">
            <div class="card-header text-dark" style="background-color: #00373A;">
              <h5 class="mb-0 text-white">JSON Validate Tool</h5>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="inputJSON" class="form-label">Paste Your JSON</label>
                <textarea id="inputJSON" class="form-control" rows="8"
                  placeholder="Paste your JSON string here..."></textarea>
              </div>

              <div class="d-flex gap-2">
                <button class="btn btn-success" onclick="validateJSON()">Validate</button>
                <button class="btn btn-secondary" onclick="clearFields()">Clear</button>
              </div>

              <!-- Alerts -->
              <div class="alert alert-success mt-3" id="validAlert" style="display: none;">
                <strong>✅ Success!</strong> Your JSON is valid.
              </div>

              <div class="alert alert-danger mt-3" id="invalidAlert" style="display: none;">
                <strong>❌ Error!</strong> Invalid JSON format. Please check your JSON structure.
              </div>

              <div class="alert alert-warning mt-3" id="warningAlert" style="display: none;">
                <strong>⚠️ Warning!</strong> Please enter JSON code before validating.
              </div>

              <div class="mt-3 text-muted">
                <small>This tool checks if your JSON string is valid. If the JSON is invalid, it will provide an error
                  message with details.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script>
    function validateJSON() {
      const input = document.getElementById('inputJSON').value.trim();
      const validAlert = document.getElementById('validAlert');
      const invalidAlert = document.getElementById('invalidAlert');
      const warningAlert = document.getElementById('warningAlert');

      // Hide all alerts first
      validAlert.style.display = 'none';
      invalidAlert.style.display = 'none';
      warningAlert.style.display = 'none';

      if (input === "") {
        warningAlert.style.display = 'block';
        return;
      }

      try {
        JSON.parse(input);
        validAlert.style.display = 'block';
      } catch (e) {
        invalidAlert.style.display = 'block';
      }
    }

    function clearFields() {
      document.getElementById('inputJSON').value = '';
      document.getElementById('validAlert').style.display = 'none';
      document.getElementById('invalidAlert').style.display = 'none';
      document.getElementById('warningAlert').style.display = 'none';
    }
  </script>

  <script src="/assets/js/script.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
  </script>
</body>

</html>
