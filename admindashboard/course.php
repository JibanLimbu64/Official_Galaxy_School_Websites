<?php
include '../assets/php/sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Course Management</title>
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --accent-color: #2e59d9;
            --success-color: #1cc88a;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
            --dark-color: #5a5c69;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--secondary-color);
            color: var(--dark-color);
            overflow-x: hidden;
        }

        .main-content {
            width: 100%;
            padding: 20px;
        }

        .course-card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1.5rem 0 rgba(58, 59, 69, 0.2);
        }

        .course-header {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 1rem 1.5rem;
            position: relative;
        }

        .course-badge {
            position: absolute;
            top: -10px;
            right: 20px;
            background-color: var(--warning-color);
            color: #000;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .course-body {
            padding: 1.5rem;
            background-color: white;
            flex-grow: 1;
        }

        .course-footer {
            padding: 1rem 1.5rem;
            background-color: #f8f9fc;
            border-top: 1px solid #e3e6f0;
        }

        .progress {
            height: 0.5rem;
            border-radius: 0.25rem;
        }

        .progress-bar {
            background-color: var(--primary-color);
        }

        .btn-enroll {
            background-color: var(--success-color);
            color: white;
            border: none;
        }

        .btn-enroll:hover {
            background-color: #17a673;
            color: white;
        }

        .btn-view {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }

        .btn-view:hover {
            background-color: var(--accent-color);
            color: white;
        }

        .section-title {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-weight: 600;
            position: relative;
            padding-bottom: 0.5rem;
            text-align: center;
        }

        .section-title:after {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: 0;
            width: 60px;
            height: 3px;
            background-color: var(--accent-color);
        }

        .nav-pills .nav-link.active {
            background-color: var(--primary-color);
        }

        .nav-pills .nav-link {
            color: var(--dark-color);
        }

        .course-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .floating-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.3);
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s;
        }

        .floating-btn:hover {
            transform: scale(1.1);
            background-color: var(--accent-color);
        }

        /* Animation classes */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Action buttons */
        .course-actions {
            position: absolute;
            top: 10px;
            left: 10px;
            display: flex;
            gap: 5px;
        }

        .action-btn {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            opacity: 0;
            transition: all 0.3s;
        }

        .course-card:hover .action-btn {
            opacity: 1;
        }

        .edit-btn {
            background-color: var(--primary-color);
        }

        .delete-btn {
            background-color: var(--danger-color);
        }

        /* PDF Download Button */
        .btn-pdf {
            background-color: #e74a3b;
            color: white;
        }

        .btn-pdf:hover {
            background-color: #c82333;
            color: white;
        }

        /* Enrollment Form */
        .enrollment-form {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .main-content {
                padding: 15px;
            }
            
            .course-card {
                margin-bottom: 1rem;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 10px;
            }
            
            .course-header h5 {
                font-size: 1.1rem;
            }
            
            .course-body p {
                font-size: 0.9rem;
            }
            
            .nav-pills .nav-link {
                padding: 0.5rem 0.75rem;
                font-size: 0.85rem;
            }
            
            .floating-btn {
                width: 50px;
                height: 50px;
                font-size: 20px;
                bottom: 20px;
                right: 20px;
            }
        }

        @media (max-width: 576px) {
            .section-title {
                font-size: 1.3rem;
                margin-bottom: 1rem;
            }
            
            .course-header {
                padding: 0.75rem 1rem;
            }
            
            .course-body {
                padding: 1rem;
            }
            
            .course-footer {
                padding: 0.75rem 1rem;
            }
            
            .course-footer .btn {
                font-size: 0.8rem;
                padding: 0.25rem 0.5rem;
            }
            
            .modal-dialog {
                margin: 0.5rem auto;
            }
        }

        /* Center alignment additions */
        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem 0;
        }

        .empty-state i {
            margin-bottom: 1rem;
        }

        .pagination {
            flex-wrap: wrap;
            justify-content: center;
        }

        .modal-content {
            margin: 1rem auto;
        }

        .text-center-md {
            text-align: center;
        }

        @media (min-width: 768px) {
            .text-center-md {
                text-align: left;
            }
        }

        /* Card content alignment */
        .course-content {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .course-footer {
            margin-top: auto;
        }

        /* Form center alignment */
        .form-center {
            max-width: 800px;
            margin: 0 auto;
        }

        /* Tab center alignment */
        .nav-pills {
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <?php
        get_sidebar("course", "")
        ?>
        <div class="main-content">
            <div class="container-fluid py-4">
                <div class="row justify-content-center">
                    <!-- Main Content -->
                    <main class="col-lg-10 col-xl-9">
                        <!-- Courses Section Header -->
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
                            <h2 class="section-title">School Courses</h2>
                            <div class="mt-3 mt-md-0">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
                                    <i class="fas fa-filter me-2"></i>Filter
                                </button>
                            </div>
                        </div>

                        <!-- Courses Tabs -->
                        <ul class="nav nav-pills mb-4 justify-content-center" id="coursesTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="all-courses-tab" data-bs-toggle="pill"
                                    data-bs-target="#all-courses" type="button">All Courses</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="my-courses-tab" data-bs-toggle="pill"
                                    data-bs-target="#my-courses" type="button">My Courses</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="completed-tab" data-bs-toggle="pill"
                                    data-bs-target="#completed-courses" type="button">Completed</button>
                            </li>
                        </ul>

                        <!-- Courses Tab Content -->
                        <div class="tab-content" id="coursesTabContent">
                            <!-- All Courses Tab -->
                            <div class="tab-pane fade show active" id="all-courses" role="tabpanel">
                                <div class="row" id="coursesContainer">
                                    <!-- Courses will be loaded here -->
                                </div>

                                <!-- Pagination -->
                                <nav aria-label="Courses pagination" class="mt-4">
                                    <ul class="pagination justify-content-center" id="pagination">
                                    </ul>
                                </nav>
                            </div>

                            <!-- My Courses Tab -->
                            <div class="tab-pane fade" id="my-courses" role="tabpanel">
                                <div class="row" id="myCoursesContainer">
                                    <!-- Enrolled courses will be loaded here -->
                                </div>
                            </div>

                            <!-- Completed Courses Tab -->
                            <div class="tab-pane fade" id="completed-courses" role="tabpanel">
                                <div class="row" id="completedCoursesContainer">
                                    <!-- Completed courses will be loaded here -->
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>

            <!-- Floating Action Button -->
            <div class="floating-btn" id="addCourseBtn" title="Add Course">
                <i class="fas fa-plus"></i>
            </div>
        </div>
    </div>

    <!-- Add/Edit Course Modal -->
    <div class="modal fade" id="courseModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add New Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="courseForm" class="form-center">
                        <input type="hidden" id="courseId">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="courseTitle" class="form-label">Course Title*</label>
                                <input type="text" class="form-control" id="courseTitle" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="courseCode" class="form-label">Course Code*</label>
                                <input type="text" class="form-control" id="courseCode" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="department" class="form-label">Department*</label>
                                <select class="form-select" id="department" required>
                                    <option value="">Select Department</option>
                                    <option value="science">Science</option>
                                    <option value="humanities">Humanities</option>
                                    <option value="mathematics">Mathematics</option>
                                    <option value="languages">Languages</option>
                                    <option value="arts">Arts</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="level" class="form-label">Level*</label>
                                <select class="form-select" id="level" required>
                                    <option value="">Select Level</option>
                                    <option value="beginner">Beginner</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="advanced">Advanced</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="instructor" class="form-label">Instructor*</label>
                                <input type="text" class="form-control" id="instructor" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="duration" class="form-label">Duration (weeks)*</label>
                                <input type="number" class="form-control" id="duration" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="courseImage" class="form-label">Course Image URL</label>
                            <input type="text" class="form-control" id="courseImage"
                                placeholder="https://example.com/image.jpg">
                            <small class="text-muted">Leave blank to use default image</small>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description*</label>
                            <textarea class="form-control" id="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="syllabus" class="form-label">Syllabus</label>
                            <textarea class="form-control" id="syllabus" rows="3"></textarea>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="featured">
                            <label class="form-check-label" for="featured">Featured Course</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveCourseBtn">Save Course</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Course Detail Modal -->
    <div class="modal fade" id="courseDetailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="courseDetailTitle">Course Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="courseDetailContent">
                    <!-- Course details will be loaded here -->
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="enrollBtn">Enroll Now</button>
                    <button type="button" class="btn btn-pdf" id="downloadPdfBtn">
                        <i class="fas fa-file-pdf me-1"></i> Download PDF
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Enrollment Form Modal -->
    <div class="modal fade" id="enrollmentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enrollment Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="enrollmentForm" class="form-center">
                        <input type="hidden" id="enrollmentCourseId">
                        <div class="mb-3">
                            <label for="studentName" class="form-label">Full Name*</label>
                            <input type="text" class="form-control" id="studentName" required>
                        </div>
                        <div class="mb-3">
                            <label for="studentEmail" class="form-label">Email*</label>
                            <input type="email" class="form-control" id="studentEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="studentPhone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="studentPhone">
                        </div>
                        <div class="mb-3">
                            <label for="studentId" class="form-label">Student ID</label>
                            <input type="text" class="form-control" id="studentId">
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="submitEnrollmentBtn">Submit Enrollment</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Action</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="confirmModalBody">
                    Are you sure you want to delete this course?
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title text-center w-100"><i class="fas fa-check-circle me-2"></i> Success</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <i class="fas fa-check-circle fa-5x text-success mb-3"></i>
                    <h4 id="successMessage">Operation completed successfully!</h4>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Initialize jsPDF
        const { jsPDF } = window.jspdf;

        $(document).ready(function () {
            // Initialize variables
            let courses = JSON.parse(localStorage.getItem('schoolCourses')) || [];
            let enrolledCourses = JSON.parse(localStorage.getItem('enrolledCourses')) || [];
            let students = JSON.parse(localStorage.getItem('students')) || [];
            let currentPage = 1;
            let itemsPerPage = 6;
            let currentEditId = null;
            let deleteCourseId = null;
            let currentViewCourseId = null;

            // Initialize the page
            loadCourses();
            loadEnrolledCourses();
            loadCompletedCourses();
            updateProgressSummary();
            setupEventListeners();

            // Load all courses
            function loadCourses() {
                const startIndex = (currentPage - 1) * itemsPerPage;
                const endIndex = startIndex + itemsPerPage;
                const paginatedData = courses.slice(startIndex, endIndex);

                $('#coursesContainer').empty();

                if (paginatedData.length === 0) {
                    $('#coursesContainer').html(`
                        <div class="col-12 empty-state">
                            <i class="fas fa-book-open fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">No courses available</h4>
                            <p class="text-muted">Click the "+" button to add a new course</p>
                        </div>
                    `);
                } else {
                    paginatedData.forEach(course => {
                        const courseCard = createCourseCard(course);
                        $('#coursesContainer').append(courseCard);
                    });
                }

                setupPagination();
            }

            // Create course card HTML
            function createCourseCard(course) {
                const isEnrolled = enrolledCourses.some(ec => ec.id === course.id && !ec.completed);
                const isCompleted = enrolledCourses.some(ec => ec.id === course.id && ec.completed);

                return `
                    <div class="col-md-6 col-lg-4 fade-in" data-id="${course.id}">
                        <div class="course-card">
                            <div class="course-actions">
                                <button class="action-btn edit-btn" data-id="${course.id}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete-btn" data-id="${course.id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <div class="course-header">
                                ${course.featured ? '<span class="course-badge">Featured</span>' : ''}
                                <h5 class="text-center-md">${course.title}</h5>
                                <small class="text-center-md">${course.code}</small>
                            </div>
                            <div class="course-body">
                                ${course.image ? `<img src="${course.image}" alt="${course.title}" class="course-image">` :
                        `<img src="https://source.unsplash.com/random/600x400/?${course.department}" alt="${course.title}" class="course-image">`}
                                <p class="text-muted">${course.description.substring(0, 100)}...</p>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="badge bg-secondary">${course.department}</span>
                                    <span class="badge ${getLevelBadgeClass(course.level)}">${course.level}</span>
                                </div>
                            </div>
                            <div class="course-footer d-flex justify-content-between align-items-center">
                                <small class="text-muted"><i class="fas fa-chalkboard-teacher me-1"></i> ${course.instructor}</small>
                                ${isCompleted ?
                        '<span class="badge bg-success">Completed</span>' :
                        isEnrolled ?
                            '<span class="badge bg-primary">Enrolled</span>' :
                            `<button class="btn btn-sm btn-enroll enroll-btn" data-id="${course.id}">
                                        <i class="fas fa-user-plus me-1"></i> Enroll
                                    </button>`}
                                <button class="btn btn-sm btn-view view-btn" data-id="${course.id}">
                                    <i class="fas fa-eye me-1"></i> View
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }

            // Get badge class based on level
            function getLevelBadgeClass(level) {
                switch (level) {
                    case 'beginner': return 'bg-info';
                    case 'intermediate': return 'bg-warning text-dark';
                    case 'advanced': return 'bg-danger';
                    default: return 'bg-secondary';
                }
            }

            // Setup pagination
            function setupPagination() {
                const totalPages = Math.ceil(courses.length / itemsPerPage);
                $('#pagination').empty();

                if (totalPages <= 1) return;

                // Previous button
                $('#pagination').append(`
                    <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                        <a class="page-link" href="#" data-page="${currentPage - 1}">Previous</a>
                    </li>
                `);

                // Page numbers
                for (let i = 1; i <= totalPages; i++) {
                    $('#pagination').append(`
                        <li class="page-item ${i === currentPage ? 'active' : ''}">
                            <a class="page-link" href="#" data-page="${i}">${i}</a>
                        </li>
                    `);
                }

                // Next button
                $('#pagination').append(`
                    <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                        <a class="page-link" href="#" data-page="${currentPage + 1}">Next</a>
                    </li>
                `);
            }

            // Load enrolled courses
            function loadEnrolledCourses() {
                const myCourses = enrolledCourses.filter(course => !course.completed)
                    .map(ec => {
                        const course = courses.find(c => c.id === ec.id);
                        if (course) {
                            return {
                                ...course,
                                enrollmentData: ec
                            };
                        }
                        return null;
                    })
                    .filter(c => c !== null);

                $('#myCoursesContainer').empty();

                if (myCourses.length === 0) {
                    $('#myCoursesContainer').html(`
                        <div class="col-12 empty-state">
                            <i class="fas fa-book fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">No enrolled courses</h4>
                            <p class="text-muted">Enroll in courses to see them here</p>
                        </div>
                    `);
                } else {
                    myCourses.forEach(course => {
                        const courseCard = createEnrolledCourseCard(course);
                        $('#myCoursesContainer').append(courseCard);
                    });
                }
            }

            // Create enrolled course card
            function createEnrolledCourseCard(course) {
                const progress = course.enrollmentData.progress || 0;
                const student = students.find(s => s.id === course.enrollmentData.studentId);

                return `
                    <div class="col-md-6 fade-in" data-id="${course.id}">
                        <div class="course-card">
                            <div class="course-header">
                                <h5 class="text-center-md">${course.title}</h5>
                                <small class="text-center-md">${course.code}</small>
                            </div>
                            <div class="course-body">
                                ${course.image ? `<img src="${course.image}" alt="${course.title}" class="course-image">` :
                        `<img src="https://source.unsplash.com/random/600x400/?${course.department}" alt="${course.title}" class="course-image">`}
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="badge bg-secondary">${course.department}</span>
                                    <span class="badge ${getLevelBadgeClass(course.level)}">${course.level}</span>
                                </div>
                                ${student ? `
                                <div class="mb-2">
                                    <small class="text-muted">Student:</small>
                                    <p>${student.name} (${student.email})</p>
                                </div>
                                ` : ''}
                                <div class="mb-2">
                                    <small class="text-muted">Progress</small>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: ${progress}%"></div>
                                    </div>
                                    <small class="float-end">${progress}%</small>
                                </div>
                            </div>
                            <div class="course-footer d-flex justify-content-between align-items-center">
                                <small class="text-muted"><i class="fas fa-chalkboard-teacher me-1"></i> ${course.instructor}</small>
                                <button class="btn btn-sm btn-primary view-btn" data-id="${course.id}">
                                    <i class="fas fa-eye me-1"></i> Continue
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }

            // Load completed courses
            function loadCompletedCourses() {
                const completed = enrolledCourses.filter(course => course.completed)
                    .map(ec => {
                        const course = courses.find(c => c.id === ec.id);
                        if (course) {
                            return {
                                ...course,
                                enrollmentData: ec
                            };
                        }
                        return null;
                    })
                    .filter(c => c !== null);

                $('#completedCoursesContainer').empty();

                if (completed.length === 0) {
                    $('#completedCoursesContainer').html(`
                        <div class="col-12 empty-state">
                            <i class="fas fa-trophy fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">No completed courses</h4>
                            <p class="text-muted">Complete your enrolled courses to see them here</p>
                        </div>
                    `);
                } else {
                    completed.forEach(course => {
                        const courseCard = createCompletedCourseCard(course);
                        $('#completedCoursesContainer').append(courseCard);
                    });
                }
            }

            // Create completed course card
            function createCompletedCourseCard(course) {
                const student = students.find(s => s.id === course.enrollmentData.studentId);

                return `
                    <div class="col-md-6 fade-in" data-id="${course.id}">
                        <div class="course-card">
                            <div class="course-header">
                                <h5 class="text-center-md">${course.title}</h5>
                                <small class="text-center-md">${course.code}</small>
                            </div>
                            <div class="course-body">
                                ${course.image ? `<img src="${course.image}" alt="${course.title}" class="course-image">` :
                        `<img src="https://source.unsplash.com/random/600x400/?${course.department}" alt="${course.title}" class="course-image">`}
                                <div class="d-flex justify-content-between mb-3">
                                    <span class="badge bg-secondary">${course.department}</span>
                                    <span class="badge ${getLevelBadgeClass(course.level)}">${course.level}</span>
                                </div>
                                ${student ? `
                                <div class="mb-3">
                                    <small class="text-muted">Student:</small>
                                    <p>${student.name} (${student.email})</p>
                                </div>
                                ` : ''}
                                <div class="text-center">
                                    <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i> Completed</span>
                                </div>
                            </div>
                            <div class="course-footer d-flex justify-content-between align-items-center">
                                <small class="text-muted"><i class="fas fa-chalkboard-teacher me-1"></i> ${course.instructor}</small>
                                <button class="btn btn-sm btn-primary view-btn" data-id="${course.id}">
                                    <i class="fas fa-eye me-1"></i> View
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }

            // Update progress summary
            function updateProgressSummary() {
                const total = courses.length;
                const enrolled = enrolledCourses.filter(c => !c.completed).length;
                const completed = enrolledCourses.filter(c => c.completed).length;

                $('#totalCourses').text(total);
                $('#enrolledCount').text(enrolled);
                $('#completedCount').text(completed);

                const enrolledPercent = total > 0 ? Math.round((enrolled / total) * 100) : 0;
                const completedPercent = enrolled > 0 ? Math.round((completed / enrolled) * 100) : 0;

                $('#enrolledProgress').css('width', `${enrolledPercent}%`);
                $('#completedProgress').css('width', `${completedPercent}%`);
            }

            // Setup event listeners
            function setupEventListeners() {
                // Pagination click
                $(document).on('click', '.page-link', function (e) {
                    e.preventDefault();
                    currentPage = parseInt($(this).data('page'));
                    loadCourses();
                });

                // Add course button
                $('#addCourseBtn').click(function () {
                    $('#courseForm')[0].reset();
                    $('#courseId').val('');
                    $('#modalTitle').text('Add New Course');
                    $('#courseModal').modal('show');
                });

                // Save course button
                $('#saveCourseBtn').click(saveCourse);

                // Edit button
                $(document).on('click', '.edit-btn', function (e) {
                    e.stopPropagation();
                    const id = parseInt($(this).data('id'));
                    editCourse(id);
                });

                // Delete button
                $(document).on('click', '.delete-btn', function (e) {
                    e.stopPropagation();
                    const id = parseInt($(this).data('id'));
                    showConfirmModal('Delete Course', 'Are you sure you want to delete this course?', id);
                });

                // Confirm delete
                $('#confirmDeleteBtn').click(function () {
                    if (deleteCourseId) {
                        deleteCourse(deleteCourseId);
                        $('#confirmModal').modal('hide');
                    }
                });

                // View button
                $(document).on('click', '.view-btn', function () {
                    const id = parseInt($(this).data('id'));
                    viewCourseDetails(id);
                });

                // Enroll button
                $(document).on('click', '.enroll-btn', function () {
                    const id = parseInt($(this).data('id'));
                    $('#enrollmentCourseId').val(id);
                    $('#enrollmentForm')[0].reset();
                    $('#enrollmentModal').modal('show');
                });

                // Submit enrollment
                $('#submitEnrollmentBtn').click(submitEnrollment);

                // Enroll button in detail modal
                $('#enrollBtn').click(function () {
                    const id = parseInt($(this).data('id'));
                    $('#enrollmentCourseId').val(id);
                    $('#enrollmentForm')[0].reset();
                    $('#courseDetailModal').modal('hide');
                    $('#enrollmentModal').modal('show');
                });

                // Download PDF button
                $('#downloadPdfBtn').click(downloadCoursePdf);

                // Apply filters
                $('#applyFilters').click(applyFilters);
            }

            // Save course
            function saveCourse() {
                const title = $('#courseTitle').val();
                const code = $('#courseCode').val();
                const department = $('#department').val();
                const level = $('#level').val();
                const instructor = $('#instructor').val();
                const duration = $('#duration').val();
                const image = $('#courseImage').val();
                const description = $('#description').val();
                const syllabus = $('#syllabus').val();
                const featured = $('#featured').is(':checked');

                if (!title || !code || !department || !level || !instructor || !duration || !description) {
                    alert('Please fill in all required fields');
                    return;
                }

                const course = {
                    id: currentEditId || Date.now(),
                    title,
                    code,
                    department,
                    level,
                    instructor,
                    duration: parseInt(duration),
                    image,
                    description,
                    syllabus,
                    featured,
                    createdAt: new Date().toISOString()
                };

                if (currentEditId) {
                    // Update existing course
                    const index = courses.findIndex(c => c.id === currentEditId);
                    if (index !== -1) {
                        courses[index] = course;
                    }
                } else {
                    // Add new course
                    courses.unshift(course);
                }

                // Save to localStorage
                localStorage.setItem('schoolCourses', JSON.stringify(courses));

                // Close modal and reload courses
                $('#courseModal').modal('hide');
                currentPage = 1;
                loadCourses();
                updateProgressSummary();

                // Show success message
                showSuccessModal(currentEditId ? 'Course updated successfully!' : 'Course added successfully!');
                currentEditId = null;
            }

            // Edit course
            function editCourse(id) {
                const course = courses.find(c => c.id === id);
                if (course) {
                    currentEditId = id;
                    $('#courseId').val(id);
                    $('#courseTitle').val(course.title);
                    $('#courseCode').val(course.code);
                    $('#department').val(course.department);
                    $('#level').val(course.level);
                    $('#instructor').val(course.instructor);
                    $('#duration').val(course.duration);
                    $('#courseImage').val(course.image);
                    $('#description').val(course.description);
                    $('#syllabus').val(course.syllabus);
                    $('#featured').prop('checked', course.featured);

                    $('#modalTitle').text('Edit Course');
                    $('#courseModal').modal('show');
                }
            }

            // Delete course
            function deleteCourse(id) {
                courses = courses.filter(c => c.id !== id);
                enrolledCourses = enrolledCourses.filter(ec => ec.id !== id);
                localStorage.setItem('schoolCourses', JSON.stringify(courses));
                localStorage.setItem('enrolledCourses', JSON.stringify(enrolledCourses));
                loadCourses();
                loadEnrolledCourses();
                loadCompletedCourses();
                updateProgressSummary();
                showSuccessModal('Course deleted successfully!');
            }

            // Show confirmation modal
            function showConfirmModal(title, message, id) {
                $('#confirmModal .modal-title').text(title);
                $('#confirmModalBody').text(message);
                deleteCourseId = id;
                $('#confirmModal').modal('show');
            }

            // View course details
            function viewCourseDetails(id) {
                const course = courses.find(c => c.id === id);
                if (course) {
                    currentViewCourseId = id;
                    const isEnrolled = enrolledCourses.some(ec => ec.id === id);
                    const isCompleted = enrolledCourses.some(ec => ec.id === id && ec.completed);

                    $('#courseDetailTitle').text(course.title);
                    $('#enrollBtn').data('id', id);

                    // Update enroll button based on enrollment status
                    if (isCompleted) {
                        $('#enrollBtn').removeClass('btn-primary').addClass('btn-success').html('<i class="fas fa-check-circle me-1"></i> Completed');
                        $('#enrollBtn').prop('disabled', true);
                    } else if (isEnrolled) {
                        $('#enrollBtn').removeClass('btn-primary').addClass('btn-info').html('<i class="fas fa-bookmark me-1"></i> Enrolled');
                        $('#enrollBtn').prop('disabled', true);
                    } else {
                        $('#enrollBtn').removeClass('btn-success btn-info').addClass('btn-primary').html('<i class="fas fa-user-plus me-1"></i> Enroll Now');
                        $('#enrollBtn').prop('disabled', false);
                    }

                    // Create course details content
                    let content = `
                        <div class="row">
                            <div class="col-md-6">
                                ${course.image ? `<img src="${course.image}" alt="${course.title}" class="img-fluid rounded mb-3">` :
                            `<img src="https://source.unsplash.com/random/800x600/?${course.department}" alt="${course.title}" class="img-fluid rounded mb-3">`}
                                <div class="d-flex justify-content-between mb-3">
                                    <span class="badge bg-secondary">${course.department}</span>
                                    <span class="badge ${getLevelBadgeClass(course.level)}">${course.level}</span>
                                </div>
                                <div class="mb-3">
                                    <h6>Course Code</h6>
                                    <p>${course.code}</p>
                                </div>
                                <div class="mb-3">
                                    <h6>Instructor</h6>
                                    <p><i class="fas fa-chalkboard-teacher me-2"></i>${course.instructor}</p>
                                </div>
                                <div class="mb-3">
                                    <h6>Duration</h6>
                                    <p><i class="fas fa-clock me-2"></i>${course.duration} weeks</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Description</h5>
                                <p>${course.description}</p>
                                
                                <h5 class="mt-4">Syllabus</h5>
                                ${course.syllabus ? `<p>${course.syllabus.replace(/\n/g, '<br>')}</p>` : '<p>No syllabus available.</p>'}
                                
                                ${isEnrolled ? `
                                <div class="mt-4">
                                    <h5>Your Progress</h5>
                                    <div class="progress mb-3" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: ${enrolledCourses.find(ec => ec.id === id).progress || 0}%"></div>
                                    </div>
                                    <p class="text-end">${enrolledCourses.find(ec => ec.id === id).progress || 0}% Complete</p>
                                </div>
                                ` : ''}
                            </div>
                        </div>
                    `;

                    $('#courseDetailContent').html(content);
                    $('#courseDetailModal').modal('show');
                }
            }

            // Submit enrollment
            function submitEnrollment() {
                const courseId = parseInt($('#enrollmentCourseId').val());
                const name = $('#studentName').val();
                const email = $('#studentEmail').val();
                const phone = $('#studentPhone').val();
                const studentId = $('#studentId').val();

                if (!name || !email) {
                    alert('Please fill in all required fields');
                    return;
                }

                // Create or find student
                let student = students.find(s => s.email === email);
                if (!student) {
                    student = {
                        id: Date.now(),
                        name,
                        email,
                        phone,
                        studentId,
                        enrolledAt: new Date().toISOString()
                    };
                    students.push(student);
                    localStorage.setItem('students', JSON.stringify(students));
                }

                // Check if already enrolled
                if (enrolledCourses.some(ec => ec.id === courseId && ec.studentId === student.id)) {
                    showSuccessModal('You are already enrolled in this course!');
                    $('#enrollmentModal').modal('hide');
                    return;
                }

                // Enroll student
                enrolledCourses.push({
                    id: courseId,
                    studentId: student.id,
                    enrolledAt: new Date().toISOString(),
                    progress: 0,
                    completed: false
                });

                localStorage.setItem('enrolledCourses', JSON.stringify(enrolledCourses));

                // Close modal and refresh
                $('#enrollmentModal').modal('hide');
                loadCourses();
                loadEnrolledCourses();
                updateProgressSummary();
                showSuccessModal('Enrollment successful!');
            }

            // Download course PDF
            function downloadCoursePdf() {
                if (!currentViewCourseId) return;

                const course = courses.find(c => c.id === currentViewCourseId);
                if (!course) return;

                const doc = new jsPDF();

                // Add title
                doc.setFontSize(20);
                doc.setTextColor(40);
                doc.text(course.title, 105, 20, { align: 'center' });

                // Add course code
                doc.setFontSize(14);
                doc.setTextColor(100);
                doc.text(`Course Code: ${course.code}`, 105, 30, { align: 'center' });

                // Add department and level
                doc.setFontSize(12);
                doc.text(`Department: ${course.department}`, 20, 45);
                doc.text(`Level: ${course.level}`, 20, 55);
                doc.text(`Instructor: ${course.instructor}`, 20, 65);
                doc.text(`Duration: ${course.duration} weeks`, 20, 75);

                // Add description
                doc.setFontSize(12);
                doc.setTextColor(40);
                doc.text('Description:', 20, 90);
                const descriptionLines = doc.splitTextToSize(course.description, 170);
                doc.text(descriptionLines, 20, 100);

                // Add syllabus if available
                if (course.syllabus) {
                    doc.addPage();
                    doc.setFontSize(14);
                    doc.text('Course Syllabus', 105, 20, { align: 'center' });
                    doc.setFontSize(10);
                    const syllabusLines = doc.splitTextToSize(course.syllabus, 170);
                    doc.text(syllabusLines, 20, 30);
                }

                // Save the PDF
                doc.save(`${course.code}_${course.title.replace(/\s+/g, '_')}.pdf`);
            }

            // Apply filters
            function applyFilters() {
                const department = $('#departmentFilter').val();
                const level = $('#levelFilter').val();

                let filteredCourses = JSON.parse(localStorage.getItem('schoolCourses')) || [];

                if (department !== 'all') {
                    filteredCourses = filteredCourses.filter(course => course.department === department);
                }

                if (level !== 'all') {
                    filteredCourses = filteredCourses.filter(course => course.level === level);
                }

                courses = filteredCourses;
                currentPage = 1;
                loadCourses();
            }

            // Show success modal
            function showSuccessModal(message) {
                $('#successMessage').text(message);
                $('#successModal').modal('show');
            }
        });
    </script>
</body>

</html>