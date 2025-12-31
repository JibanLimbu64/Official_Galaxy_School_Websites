<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Toastr for notifications -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        /* Previous CSS remains the same */
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            font-size: 0.7rem;
        }
        
        .student-photo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        #notificationDropdown {
            width: 300px;
        }
        
        .notification-item {
            border-left: 3px solid #007bff;
        }
        
        .unread {
            background-color: #f8f9fa;
        }
        
        /* Pulse animation for new notifications */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .pulse {
            animation: pulse 0.5s ease-in-out;
        }
        
        /* Audio controls (hidden) */
        #notificationAudio {
            display: none;
        }
        #connectionStatus {
    font-size: 0.8rem;
    padding: 5px 10px;
    border-radius: 20px;
    transition: all 0.3s ease;
}

#connectionStatus i {
    margin-right: 5px;
}

/* Animation for connection status changes */
@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

.connection-alert {
    animation: pulse 0.5s ease-in-out;
}
        #connectionAlert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            max-width: 350px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.4s ease;
        }
        
        #connectionAlert.show {
            opacity: 1;
            transform: translateY(0);
        }
        
        .connection-icon {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        .progress-bar {
            height: 3px;
            width: 100%;
            background: rgba(255,255,255,0.3);
            position: absolute;
            bottom: 0;
            left: 0;
        }
        
        .progress-bar-fill {
            height: 100%;
            width: 100%;
            background: white;
            transition: width 0.1s linear;
        }
    </style>
</head>
<body>
    <!-- Audio elements for notifications -->
    <audio id="addSound" src="https://assets.mixkit.co/sfx/preview/mixkit-positive-interface-beep-221.mp3" preload="auto"></audio>
    <audio id="deleteSound" src="https://assets.mixkit.co/sfx/preview/mixkit-alarm-digital-clock-beep-989.mp3" preload="auto"></audio>
    
    <div class="d-flex">
        <!-- Sidebar (previous code remains the same) -->
        
        <!-- Main Content -->
        <div class="main-content w-100">
            <div class="container-fluid">
                <!-- Header with notification bell -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Student Addmitted Dashboard</h2>
                    <div>
                        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                            <i class="fas fa-user-plus"></i> Add Student
                        </button>
                        <div class="dropdown d-inline-block">
                            <button class="btn btn-light position-relative" id="notificationDropdownButton" data-bs-toggle="dropdown">
                                <i class="fas fa-bell"></i>
                                <span class="notification-badge badge bg-danger rounded-pill d-none">0</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="notificationDropdownButton" id="notificationDropdown">
                                <div class="p-3 border-bottom">
                                    <h6 class="mb-0"><i class="fa-solid fa-bell"></i> Notifications</h6>
                                </div>
                                <div class="list-group" id="notificationList">
                                    <div class="text-center p-3 text-muted" id="noNotifications">
                                        No new notifications
                                    </div>
                                </div>
                                <div class="p-2 border-top text-center">
                                    <a href="#" class="text-decoration-none">View all</a>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary d-md-none ms-2" id="sidebarToggle">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Rest of your dashboard content -->
                
                <!-- Students Table Section -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Students List</h5>
                                <div>
                                    <input type="text" class="form-control form-control-sm" id="studentSearch" placeholder="Search students..." style="width: 200px; display: inline-block;">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="studentsTable">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Grade</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="studentsTableBody">
                                            <!-- Students will be loaded here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Student Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="studentForm">
                        <div class="mb-3">
                            <label for="studentName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="studentName" required>
                        </div>
                        <div class="mb-3">
                            <label for="studentGrade" class="form-label">Grade</label>
                            <select class="form-select" id="studentGrade" required>
                                <option value="">Select Grade</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 2</option>
                                <option value="Grade 3">Grade 3</option>
                                <option value="Grade 4">Grade 4</option>
                                <option value="Grade 5">Grade 5</option>
                                <option value="Grade 6">Grade 6</option>
                                <!-- <option value="Grade 6">Grade 6</option> -->
                                <option value="Grade 7">Grade 7</option>
                                <option value="Grade 8">Grade 8</option>    
                                <option value="Grade 9">Grade 9</option>
                                <option value="Grade 10">Grade 10</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="studentEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="studentEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="studentPhone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="studentPhone">
                        </div>
                        <div class="mb-3">
                            <label for="studentPhoto" class="form-label">Photo (URL)</label>
                            <input type="text" class="form-control" id="studentPhoto" placeholder="https://example.com/photo.jpg">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveStudent">Save Student</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add this modal right before the closing </body> tag, after the other modals -->
<div class="modal fade" id="admissionStatusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title">Admission Status</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="fas fa-clock fa-4x text-info mb-3"></i>
                <h4>Your admission data is pending</h4>
                <p class="lead">"<span id="pendingStudentName"></span>" will be admitted soon</p>
                <p>Administrator will review and approve this admission shortly.</p>
                <div class="progress mt-3">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="approveAdmission" style="display: none;">Approve Now</button>
            </div>
        </div>
    </div>
</div>
<!-- Add this after your Students List section -->

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirm Deletion</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this student? This action cannot be undone.</p>
                    <p class="fw-bold" id="studentToDeleteName"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete Student</button>
                </div>
            </div>
        </div>
    </div>
        <!-- Your page content here -->
    
    <!-- Connection Status Alert -->
    <div id="connectionAlert" class="alert alert-dismissible fade" role="alert">
        <span id="connectionIcon" class="connection-icon"></span>
        <span id="connectionMessage"></span>
        <div class="progress-bar">
            <div id="progressBarFill" class="progress-bar-fill"></div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<!-- Add this near your notification bell in the header -->

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery (needed for Toastr) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastr for notifications -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script>
        // Student Management System with enhanced features
        $(document).ready(function() {
            // Initialize students array (in real app, this would come from a database)
            let students = JSON.parse(localStorage.getItem('students')) || [];
            let notifications = JSON.parse(localStorage.getItem('notifications')) || [];
            let studentToDelete = null;
            
            // Audio elements
            const addSound = document.getElementById('addSound');
            const deleteSound = document.getElementById('deleteSound');
            
            // Toastr configuration
            toastr.options = {
                positionClass: "toast-top-right",
                timeOut: 3000,
                extendedTimeOut: 1000,
                closeButton: true,
                progressBar: true
            };
            
            // Load students table
            function loadStudents() {
                const tableBody = $('#studentsTableBody');
                tableBody.empty();
                
                if (students.length === 0) {
                    tableBody.append('<tr><td colspan="7" class="text-center">No students found</td></tr>');
                    return;
                }
                
                students.forEach((student, index) => {
                    tableBody.append(`
                        <tr data-id="${index}">
                            <td><img src="${student.photo || 'https://via.placeholder.com/40'}" class="student-photo" alt="${student.name}"></td>
                            <td>STU${1000 + index}</td>
                            <td>${student.name}</td>
                            <td>${student.grade}</td>
                            <td>${student.email}</td>
                            <td>${student.phone || 'N/A'}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary view-student" data-id="${index}">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger delete-student" data-id="${index}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `);
                });
                
                // Update student count card
                $('.info-card:eq(0) h2').text(students.length);
            }
            
            // Load notifications
            function loadNotifications() {
                const notificationList = $('#notificationList');
                const noNotifications = $('#noNotifications');
                
                if (notifications.length === 0) {
                    notificationList.children().not('#noNotifications').remove();
                    noNotifications.show();
                    $('.notification-badge').text('0').addClass('d-none');
                    return;
                }
                
                noNotifications.hide();
                notificationList.children().not('#noNotifications').remove();
                
                // Show only last 5 notifications
                const recentNotifications = notifications.slice(0, 5);
                recentNotifications.forEach(notification => {
                    notificationList.prepend(`
                        <a href="#" class="list-group-item list-group-item-action notification-item ${notification.unread ? 'unread' : ''}">
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">${formatTime(notification.time)}</small>
                                ${notification.unread ? '<span class="badge bg-primary">New</span>' : ''}
                            </div>
                            <p class="mb-1">${notification.message}</p>
                        </a>
                    `);
                });
                
                // Update badge count
                const unreadCount = notifications.filter(n => n.unread).length;
                const badge = $('.notification-badge');
                badge.text(unreadCount).toggleClass('d-none', unreadCount === 0);
                
                // Pulse effect if there are new notifications
                if (unreadCount > 0) {
                    badge.addClass('pulse');
                    setTimeout(() => badge.removeClass('pulse'), 500);
                }
            }
            
            // Format time for notifications
            function formatTime(dateString) {
                const date = new Date(dateString);
                return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) + 
                       ' ' + date.toLocaleDateString();
            }
            
            // Save student
            $('#saveStudent').click(function() {
                const name = $('#studentName').val();
                const grade = $('#studentGrade').val();
                const email = $('#studentEmail').val();
                const phone = $('#studentPhone').val();
                const photo = $('#studentPhoto').val();
                
                if (!name || !grade || !email) {
                    toastr.error('Please fill all required fields');
                    return;
                }
                
                const newStudent = { name, grade, email, phone, photo };
                students.push(newStudent);
                localStorage.setItem('students', JSON.stringify(students));
                
                // Create notification
                const newNotification = {
                    message: `New student added: ${name} (${grade})`,
                    time: new Date().toISOString(),
                    unread: true
                };
                notifications.unshift(newNotification);
                localStorage.setItem('notifications', JSON.stringify(notifications));
                
                // Play add sound
                addSound.currentTime = 0;
                addSound.play();
                
                // Show success message
                toastr.success('Student added successfully');
                
                // Close modal and reset form
                $('#addStudentModal').modal('hide');
                $('#studentForm')[0].reset();
                
                // Reload data
                loadStudents();
                loadNotifications();
            });
            
            // Search students
            $('#studentSearch').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                $('#studentsTableBody tr').each(function() {
                    const rowText = $(this).text().toLowerCase();
                    $(this).toggle(rowText.includes(searchTerm));
                });
            });
            
            // Delete student click handler
            $(document).on('click', '.delete-student', function() {
                const studentId = $(this).data('id');
                studentToDelete = studentId;
                const student = students[studentId];
                $('#studentToDeleteName').text(`${student.name} (${student.grade})`);
                $('#deleteConfirmModal').modal('show');
            });
            
            // Confirm deletion
            $('#confirmDelete').click(function() {
                if (studentToDelete !== null) {
                    const deletedStudent = students.splice(studentToDelete, 1)[0];
                    localStorage.setItem('students', JSON.stringify(students));
                    
                    // Create deletion notification
                    const newNotification = {
                        message: `Student deleted: ${deletedStudent.name} (${deletedStudent.grade})`,
                        time: new Date().toISOString(),
                        unread: true
                    };
                    notifications.unshift(newNotification);
                    localStorage.setItem('notifications', JSON.stringify(notifications));
                    
                    // Play delete sound
                    deleteSound.currentTime = 0;
                    deleteSound.play();
                    
                    // Show success message
                    toastr.success('Student deleted successfully');
                    
                    // Close modal
                    $('#deleteConfirmModal').modal('hide');
                    studentToDelete = null;
                    
                    // Reload data
                    loadStudents();
                    loadNotifications();
                }
            });
            
            // Mark notifications as read when dropdown is shown
            $('#notificationDropdownButton').on('click', function() {
                if (notifications.some(n => n.unread)) {
                    notifications = notifications.map(n => ({ ...n, unread: false }));
                    localStorage.setItem('notifications', JSON.stringify(notifications));
                    loadNotifications();
                }
            });
            
            // Initial load
            loadStudents();
            loadNotifications();
        });
        $('#saveStudent').click(function() {
    const name = $('#studentName').val();
    const grade = $('#studentGrade').val();
    const email = $('#studentEmail').val();
    const phone = $('#studentPhone').val();
    const photo = $('#studentPhoto').val();
    
    if (!name || !grade || !email) {
        toastr.error('Please fill all required fields');
        return;
    }
    
    const newStudent = { 
        name, 
        grade, 
        email, 
        phone, 
        photo,
        status: 'pending' // Add status field
    };
    
    // Show admission status modal
    $('#pendingStudentName').text(name);
    const statusModal = new bootstrap.Modal(document.getElementById('admissionStatusModal'));
    statusModal.show();
    
    // For demo purposes - in real app this would be set when admin approves
    setTimeout(() => {
        students.push(newStudent);
        localStorage.setItem('students', JSON.stringify(students));
        
        // Create notification
        const newNotification = {
            message: `New student added: ${name} (${grade})`,
            time: new Date().toISOString(),
            unread: true
        };
        notifications.unshift(newNotification);
        localStorage.setItem('notifications', JSON.stringify(notifications));
        
        // Play add sound
        addSound.currentTime = 0;
        addSound.play();
        
        // Show success message
        toastr.success('Student added successfully');
        
        // Close modals and reset form
        statusModal.hide();
        $('#addStudentModal').modal('hide');
        $('#studentForm')[0].reset();
        
        // Reload data
        loadStudents();
        loadNotifications();
    }, 3000); // Simulate admin approval delay
});
// Add these functions to monitor connection status
function updateConnectionStatus() {
    const statusElement = $('#connectionStatus');
    if (navigator.onLine) {
        statusElement.removeClass('bg-danger').addClass('bg-success')
            .html('<i class="fas fa-wifi"></i> Online');
    } else {
        statusElement.removeClass('bg-success').addClass('bg-danger')
            .html('<i class="fas fa-wifi-slash"></i> Offline');
    }
}

// Check connection status periodically
setInterval(updateConnectionStatus, 5000);
window.addEventListener('online', updateConnectionStatus);
window.addEventListener('offline', updateConnectionStatus);

// Initialize on page load
updateConnectionStatus();
document.addEventListener('DOMContentLoaded', function() {
    const connectionAlert = document.getElementById('connectionAlert');
    const connectionMessage = document.getElementById('connectionMessage');
    const connectionIcon = document.getElementById('connectionIcon');
    const progressBarFill = document.getElementById('progressBarFill');
    
    let autoHideTimeout;
    let progressInterval;
    let timeVisible = 0;
    const totalShowTime = 3000; // 3 seconds
    
    // Function to show alert with animation
    function showAlert() {
        connectionAlert.classList.add('show');
    }
    
    // Function to hide alert with animation
    function hideAlert() {
        connectionAlert.classList.remove('show');
        clearInterval(progressInterval);
        timeVisible = 0;
    }
    
    // Function to update connection status
    function updateConnectionStatus() {
        clearTimeout(autoHideTimeout);
        clearInterval(progressInterval);
        
        if (navigator.onLine) {
            // Online state
            connectionAlert.classList.remove('alert-danger');
            connectionAlert.classList.add('alert-success');
            connectionMessage.textContent = 'Back online! Connection restored.';
            connectionIcon.innerHTML = '<i class="fas fa-wifi"></i>';
            
            // Start progress bar
            timeVisible = 0;
            progressBarFill.style.width = '100%';
            progressInterval = setInterval(() => {
                timeVisible += 100;
                const remaining = 1 - (timeVisible / totalShowTime);
                progressBarFill.style.width = `${remaining * 100}%`;
                
                if (timeVisible >= totalShowTime) {
                    hideAlert();
                    clearInterval(progressInterval);
                }
            }, 100);
            
            showAlert();
            autoHideTimeout = setTimeout(hideAlert, totalShowTime);
        } else {
            // Offline state
            connectionAlert.classList.remove('alert-success');
            connectionAlert.classList.add('alert-danger');
            connectionMessage.textContent = 'You are offline. Some features may not work.';
            connectionIcon.innerHTML = '<i class="fas fa-plug-circle-xmark"></i>';
            progressBarFill.style.width = '100%';
            
            showAlert();
        }
    }
    
    // Initial check
    updateConnectionStatus();
    
    // Listen for online/offline events
    window.addEventListener('online', updateConnectionStatus);
    window.addEventListener('offline', updateConnectionStatus);
    
    // Close button event
    connectionAlert.querySelector('.btn-close').addEventListener('click', function() {
        hideAlert();
    });
    
    // Optional: Periodically check connection
    setInterval(updateConnectionStatus, 30000);
});

    </script>
</body>
</html>