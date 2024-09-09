
    // Function to fetch and update user statistics
    function updateUserStatistics() {
        // Fetch the total users count from the PHP script
        fetch('get_total_users.php')
            .then(response => response.json())
            .then(data => {
                const totalUsers = data.total_users;
                const activeUsers = "feature laoding"; 
                const offlineUsers = "feature loading";

                // Update the HTML elements with the fetched statistics
                document.getElementById('total-users').textContent = totalUsers;
                document.getElementById('active-users').textContent = activeUsers;
                document.getElementById('offline-users').textContent = offlineUsers;
            })
            .catch(error => {
                console.error('Error fetching total users:', error);
            });
    }

    // Call the function to update user statistics when the page loads
    window.addEventListener('load', updateUserStatistics);

