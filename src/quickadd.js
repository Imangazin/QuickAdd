let feedbackdiv = document.getElementById("quickAddResponse");

// When the document is ready
document.addEventListener('DOMContentLoaded', function() {
    // Form submit event
    document.getElementById('quickAddForm').addEventListener('submit', function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Serialize form data
        const formData = new FormData(this);

        //spinner
        feedbackdiv.innerHTML = "";
        feedbackdiv.className = "";
        document.getElementById("quickAddSpinner").className = "spinner-border";
        document.getElementById("quickAddSpinner").innerHTML = '<span class="visually-hidden">Loading...</span>';
        // Make fetch request
        fetch('src/adduser.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => {
            // Handle successful response
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Error in response');
            }
        })
        .then(response => {
            //hide spinner
            document.getElementById("quickAddSpinner").className = "";
            document.getElementById("quickAddSpinner").innerHTML = "";
            //define feedback class
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
            //hide spinner
            document.getElementById("quickAddSpinner").className = "";
            document.getElementById("quickAddSpinner").innerHTML = "";
        });
    });
});
