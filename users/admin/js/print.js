function printData() {
    var printWindow = window.open('', '', 'height=600,width=800');
    printWindow.document.write('<html><head><title>Print</title>');
    printWindow.document.write('<style>');
    printWindow.document.write('@media print {');
    printWindow.document.write('    table { width: 100%; border-collapse: collapse; }');
    printWindow.document.write('    th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }');
    printWindow.document.write('    h3 { margin-top: 0; }');
    printWindow.document.write('    .no-print, .no-print ~ td { display: none; }'); // Hide both header and content of excluded columns
    printWindow.document.write('}');
    printWindow.document.write('</style>');
    printWindow.document.write('</head><body>');
    printWindow.document.write('<h3>Account List</h3>');
    printWindow.document.write('<table>');
    printWindow.document.write('<thead>');
    printWindow.document.write('<tr>');
    printWindow.document.write('<th>User Type</th>');
    printWindow.document.write('<th>ID</th>');
    printWindow.document.write('<th>Name</th>');
    printWindow.document.write('<th class="no-print">Username</th>'); // Add "no-print" class to exclude the column from printing
    printWindow.document.write('<th>Action</th>');
    printWindow.document.write('</tr>');
    printWindow.document.write('</thead>');
    printWindow.document.write('<tbody>');
    var tableRows = document.getElementById("table-data").querySelectorAll("tr");
    for (var i = 0; i < tableRows.length; i++) {
        var rowData = tableRows[i].querySelectorAll("td");
        printWindow.document.write('<tr>');
        for (var j = 0; j < rowData.length; j++) {
            if (!rowData[j].classList.contains("no-print")) { // Exclude cells with "no-print" class from printing
                printWindow.document.write('<td>' + rowData[j].innerHTML + '</td>');
            }
        }
        printWindow.document.write('</tr>');
    }
    printWindow.document.write('</tbody>');
    printWindow.document.write('</table>');
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}
