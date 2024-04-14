document.getElementById('registrationForm').addEventListener('submit', function(event) {
    const password = document.getElementsByName('password')[0].value;
    const confirmPassword = document.getElementsByName('confirmPassword')[0].value;
    const nic = document.getElementsByName('nic')[0].value;

    // Validate NIC
    if (!validateNIC(nic)) {
        alert("Invalid NIC number. Please enter a valid NIC number.");
        event.preventDefault();
        return;
    }

    // Validate password confirmation
    if (password !== confirmPassword) {
        alert("Passwords do not match");
        event.preventDefault();
    }
});

document.getElementById('clearBtn').addEventListener('click', function() {
    document.getElementById('registrationForm').reset();
});

// NIC validation function
function validateNIC(nic) {
    // Check for 9-digit NIC followed by 'V' or 12-digit NIC
    var nicPattern = /^\d{9}[V]|^\d{12}$/;
    
    if (!nicPattern.test(nic)) {
        return false;
    }

    // Check if the last character is 'V' (for 9-digit NICs) or if it's a 12-digit NIC
    if (nic.length 0 && nic.charAt(9) !== 'V') {
        return false;
    }

    return true;
}
