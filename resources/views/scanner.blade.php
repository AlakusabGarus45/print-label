<!DOCTYPE html>
<html>
<head>
    <title>Barcode Scanner System</title>

    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            text-align: center;
        }

        .container {
            width: 800px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        input {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .counter {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #2196f3;
            color: white;
        }

        tbody tr:nth-child(even) {
            background: #f2f2f2;
        }

        .status {
            margin-top: 10px;
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>📦 Barcode Scanner System</h2>
    <button onclick="exportTableToCSV()">Export CSV</button>

    <input type="text" id="barcodeInput" placeholder="Scan barcode here..." autofocus />

    <div class="counter">
        Total Scans: <span id="count">0</span>
    </div>

    <p class="status" id="status">Ready to scan...</p>

    <table>
        <thead>
            <tr>
                <th>SN</th>
                <th>IMEI</th>
                <th>Model Name</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody id="tableBody"></tbody>
    </table>
</div>

<script>
let input = document.getElementById("barcodeInput");
let tableBody = document.getElementById("tableBody");
let status = document.getElementById("status");
let countEl = document.getElementById("count");

let queue = [];
let processing = false;

let scanCount = 0;

setInterval(() => {
    input.focus();
}, 300);

input.addEventListener("keydown", function(e) {
    if (e.key === "Enter") {
        let code = input.value.trim();
        input.value = "";

        if (code !== "") {
            queue.push(code);
            processQueue();
        }
    }
});

function processQueue() {
    if (processing || queue.length === 0) return;

    processing = true;

    let imei = queue.shift();

    status.innerText = "Scanning: " + imei;

    fetchModel(imei).then(modelName => {
        addToTable(imei, modelName);

        status.innerText = modelName
            ? "Found: " + modelName
            : "Not found in DB";

        setTimeout(() => {
            processing = false;
            processQueue();
        }, 100);
    });
}

async function fetchModel(imei) {
    try {
        let res = await fetch("/get-model", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ imei: imei })
        });

        let data = await res.json();
        return data.model_name ?? null;

    } catch (error) {
        console.error(error);
        return null;
    }
}

function addToTable(imei, model) {
    scanCount++;
    countEl.innerText = scanCount;

    let row = document.createElement("tr");

    row.innerHTML = `
        <td>${scanCount}</td>
        <td>${imei}</td>
        <td>${model ?? "Not found"}</td>
        <td>${new Date().toLocaleTimeString()}</td>
    `;

    tableBody.appendChild(row);

    row.scrollIntoView({ behavior: "smooth", block: "end" });

    row.style.background = "#c8f7c5";
    setTimeout(() => {
        row.style.background = "";
    }, 800);

}

function exportTableToCSV() {
    let table = document.querySelector("table");
    let rows = table.querySelectorAll("tr");
    let csv = [];

    rows.forEach(row => {
        let cols = row.querySelectorAll("td, th");
        let rowData = [];

        cols.forEach(col => {
            rowData.push(col.innerText);
        });

        csv.push(rowData.join(","));
    });

    let csvFile = new Blob([csv.join("\n")], { type: "text/csv" });
    let downloadLink = document.createElement("a");

    downloadLink.download = "table-data.csv";
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.style.display = "none";

    document.body.appendChild(downloadLink);
    downloadLink.click();
}
</script>

</body>
</html>
