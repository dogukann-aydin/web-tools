<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Free URL Parser Tool - Split Any URL into Parts</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="../../assets/css/sidebar.css" type="text/css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
        integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <meta name="description" content="Use this free online tool to break any URL into parts like protocol, domain, path, and query. Easy and fast to use.">


    </head>

<body>



    <div class="d-flex">
        <!-- Sidebar -->

    <?php require_once '../../includes/sidebar.php'; ?>


     <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card shadow-sm">
          <div class="card-header text-white" style="background-color: #00373A;">
            <h5 class="mb-0">URL Parser</h5>
          </div>
          <div class="card-body">

            <div class="mb-3">
              <label for="urlInput" class="form-label">Enter URL</label>
              <input type="text" id="urlInput" class="form-control" placeholder="https://www.example.com/path?query=value#hash" />
            </div>

            <button class="btn btn-success mb-4" onclick="parseURL()">Parse URL</button>

            <div id="resultFields" class="row row-cols-1 row-cols-md-2 g-3"></div>

          </div>
        </div>
      </div>
    </div>
  </div>


    </div>

      <script>
    function parseURL() {
      const url = document.getElementById("urlInput").value;
      let parsed;
      try {
        parsed = new URL(url);
      } catch (e) {
        alert("Invalid URL format!");
        return;
      }

      const result = {
        "protocol": parsed.protocol.replace(":", ""),
        "username": parsed.username || "",
        "password": parsed.password || "",
        "hostname": parsed.hostname,
        "port": parsed.port || "",
        "full host": parsed.host,
        "userinfo": parsed.username ? parsed.username + (parsed.password ? ":" + parsed.password : "") : "",
        "authority": parsed.host,
        "origin": parsed.origin,
        "domain": getDomain(parsed.hostname),
        "subdomain": getSubdomain(parsed.hostname),
        "tld": getTLD(parsed.hostname),
        "pathname": parsed.pathname,
        "directory": getDirectory(parsed.pathname),
        "filename": getFilename(parsed.pathname),
        "suffix": getSuffix(parsed.pathname),
        "query": parsed.search.replace(/^\?/, ""),
        "hash": parsed.hash.replace(/^#/, ""),
        "fragment": parsed.hash.replace(/^#/, ""),
        "resource": parsed.pathname + parsed.search + parsed.hash
      };

      renderResult(result);
    }

    function getDomain(hostname) {
      const parts = hostname.split('.');
      return parts.length >= 2 ? parts.slice(-2).join('.') : hostname;
    }

    function getSubdomain(hostname) {
      const parts = hostname.split('.');
      return parts.length > 2 ? parts.slice(0, -2).join('.') : "";
    }

    function getTLD(hostname) {
      const parts = hostname.split('.');
      return parts.length >= 1 ? parts[parts.length - 1] : "";
    }

    function getDirectory(pathname) {
      const parts = pathname.split('/');
      return parts.length > 2 ? '/' + parts.slice(1, -1).join('/') : '';
    }

    function getFilename(pathname) {
      const parts = pathname.split('/');
      const last = parts.pop() || parts.pop(); // in case it ends with '/'
      return last || '';
    }

    function getSuffix(pathname) {
      const filename = getFilename(pathname);
      const dotIndex = filename.lastIndexOf('.');
      return dotIndex !== -1 ? filename.slice(dotIndex + 1) : '';
    }

    function renderResult(obj) {
      const container = document.getElementById("resultFields");
      container.innerHTML = "";
      for (const [key, value] of Object.entries(obj)) {
        const col = document.createElement("div");
        col.className = "col";
        col.innerHTML = `
          <div class="card h-100">
            <div class="card-body">
              <h6 class="card-title text-muted">${key}</h6>
              <p class="card-text"><code>${value || '<empty>'}</code></p>
            </div>
          </div>
        `;
        container.appendChild(col);
      }
    }
  </script>

    <script src="/assets/js/script.js" language="javascript" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>


</body>

</html>