let feedbackdiv = document.getElementById("quickAddResponse");

// When the document is ready
document.addEventListener('DOMContentLoaded', function() {
    // Form submit event
    document.getElementById('quickAddForm').addEventListener('submit', function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Serialize form data
        const formData = new FormData(this);

        // Make fetch request
        fetch('src/adduser.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => {
            // Handle successful response
            if (response.ok) {
                return response.text();
            } else {
                throw new Error('Error in response');
            }
        })
        .then(response => {
            if(response.success){
                feedbackdiv.className = 'alert alert-success';
            }else{
                feedbackdiv.className = 'alert alert-danger';
            }
            // Display success message
            feedbackdiv.focus();
            feedbackdiv.innerHTML = response.message;
            document.getElementById("quickAddForm").reset();
        })
        .catch(error => {
            // Handle errors
            console.error('Error:', error);
            feedbackdiv.className = 'alert alert-danger';
            feedbackdiv.focus();
            feedbackdiv.innerHTML = 'An error occurred. Please try again.';
        });
    });
});

fetch(document)
  .then(() => {
    feedbackdiv.innerHTML = "";
    feedbackdiv.className = "";
    document.getElementById("quickAddSpinner").className = "spinner-border";
    document.getElementById("quickAddSpinner").innerHTML = '<span class="visually-hidden">Loading...</span>';
  })
  .catch(error => console.error('Error:', error))
  .finally(() => {
    document.getElementById("quickAddSpinner").className = "";
    document.getElementById("quickAddSpinner").innerHTML = "";
  });
