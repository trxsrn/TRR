// JavaScript function to retrieve and display the number of idle, active and published records
function updateRecordCounts() {
    // Use AJAX to call the PHP script and retrieve the number of idle, active and published records
    $.ajax({
      url: 'author_get_record_counts.php',
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        // Update the HTML elements that will display the total number of idle, active and published records
        $('#idle-count').text(response.idleCount);
        $('#active-count').text(response.activeCount);
        $('#published-count').text(response.publishedCount);
      }
    });
  }
  
  // Set an interval for the function to be called periodically
  setInterval(updateRecordCounts, 5000); // 5000 milliseconds = 5 seconds

  // Function to load the data from the server and update the table

  



  