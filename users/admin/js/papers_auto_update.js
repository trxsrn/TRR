// JavaScript function to retrieve and display the number of to assign, to review, under review and to publish records
function updateRecordCounts() {
    // Use AJAX to call the PHP script and retrieve the number of to assign, to review, under review and to publish records
    $.ajax({
      url: 'papers_get_record_counts.php',
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        // Update the HTML elements that will display the total number of to assign, to review, under review and to publish records
        $('#toAssign-count').text(response.toAssignCount);
        $('#toReview-count').text(response.toReviewCount);
        $('#underReview-count').text(response.underReviewCount);
        $('#toPublish-count').text(response.toPublishCount);
      }
    });
  }
  
  // Set an interval for the function to be called periodically
  setInterval(updateRecordCounts, 5000); // 5000 milliseconds = 5 seconds

  // Function to load the data from the server and update the table




  