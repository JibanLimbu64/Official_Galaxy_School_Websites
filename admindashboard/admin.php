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
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        :root {
            --sidebar-bg: #343a40;
            --sidebar-color: #fff;
            --sidebar-active-bg: #007bff;
            --sidebar-hover-bg: #495057;
        }
        
        body {
            overflow-x: hidden;
        }
        
        /* Sidebar styling */
        .sidebar {
            height: 100vh;
            background: var(--sidebar-bg);
            color: var(--sidebar-color);
            position: fixed;
            transition: all 0.3s;
            z-index: 1000;
        }
        
        .sidebar .nav-link {
            color: var(--sidebar-color);
            margin-bottom: 5px;
            border-radius: 5px;
            padding: 10px 15px;
        }
        
        .sidebar .nav-link:hover {
            background: var(--sidebar-hover-bg);
        }
        
        .sidebar .nav-link.active {
            background: var(--sidebar-active-bg);
        }
        
        .sidebar .nav-link i {
            margin-right: 10px;
        }
        
        /* Admin profile */
        .admin-profile {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .admin-profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid rgba(255,255,255,0.2);
            margin-bottom: 10px;
        }
        
        /* Main content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }
        
        /* Cards */
        .info-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
        }
        
        .info-card .card-icon {
            font-size: 2rem;
            margin-bottom: 15px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }
            
            .sidebar.active {
                margin-left: 0;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .main-content.active {
                margin-left: 250px;
            }
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar w-250">
            <div class="admin-profile">
                <img src="../images/logo.png" alt="Admin Photo">
                <h5>GalaxyAcademy</h5>
                <p class="text-muted">School Administrator</p>
            </div>
            <nav class="nav flex-column p-3">
                <a href="#" class="nav-link active">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="newstudent.php" class="nav-link">
                    <i class="fas fa-users"></i> Students
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-chalkboard-teacher"></i> Teachers
                </a>
                <a href="course.php" class="nav-link">
                    <i class="fas fa-book"></i> Courses
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-calendar-alt"></i> Schedule
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-file-invoice-dollar"></i> Fees
                </a>
                <a href="messages.php#" class="nav-link">
                    <i class="fas fa-envelope"></i> Messages
                </a>
                <a href="settings.php" class="nav-link">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <a href="../authentication/Login.php" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content w-100">
            <div class="container-fluid">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>School Dashboard</h2>
                    <button class="btn btn-primary d-md-none" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                
                <!-- Info Cards -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card info-card bg-primary text-white">
                            <div class="card-body text-center">
                                <i class="fas fa-users card-icon"></i>
                                <h5>Total Students</h5>
                                <h2>0</h2>
                                <!-- <p class="mb-0">+12% from last month</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card info-card bg-success text-white">
                            <div class="card-body text-center">
                                <i class="fas fa-chalkboard-teacher card-icon"></i>
                                <h5>Total Teachers</h5>
                                <h2>0</h2>
                                <!-- <p class="mb-0">+3 new this month</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card info-card bg-warning text-dark">
                            <div class="card-body text-center">
                                <i class="fas fa-book card-icon"></i>
                                <h5>Courses</h5>
                                <h2>0</h2>
                                <!-- <p class="mb-0">5 new this year</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card info-card bg-info text-white">
                            <div class="card-body text-center">
                                <i class="fas fa-graduation-cap card-icon"></i>
                                <h5>Graduates</h5>
                                <h2>0</h2>
                                <!-- <p class="mb-0">Class of 2023</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Charts Row -->
                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5>Student Enrollment Trends</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="enrollmentChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Class Distribution</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="classChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Activity -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Recent Activity</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Activity</th>
                                                <th>User</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2023-06-15</td>
                                                <td>New student registration</td>
                                                <td>John Doe</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                            </tr>
                                            <tr>
                                                <td>2023-06-14</td>
                                                <td>Course update</td>
                                                <td>Math Department</td>
                                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                                            </tr>
                                            <tr>
                                                <td>2023-06-12</td>
                                                <td>Fee payment</td>
                                                <td>Sarah Smith</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                            </tr>
                                            <tr>
                                                <td>2023-06-10</td>
                                                <td>Teacher onboarding</td>
                                                <td>HR Department</td>
                                                <td><span class="badge bg-info">In Progress</span></td>
                                            </tr>
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

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
            document.querySelector('.main-content').classList.toggle('active');
        });
        
        // Enrollment Chart
        const enrollmentCtx = document.getElementById('enrollmentChart').getContext('2d');
        const enrollmentChart = new Chart(enrollmentCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: '2023 Enrollment',
                    data: [120, 190, 170, 220, 250, 280, 310, 290, 350, 400, 380, 420],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: '2022 Enrollment',
                    data: [90, 120, 150, 180, 210, 240, 270, 250, 290, 330, 300, 350],
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        
        // Class Distribution Chart
        const classCtx = document.getElementById('classChart').getContext('2d');
        const classChart = new Chart(classCtx, {
            type: 'doughnut',
            data: {
                labels: ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6'],
                datasets: [{
                    data: [120, 115, 130, 125, 110, 105],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    }
                }
            }
        });
    </script>
</body>
</html>