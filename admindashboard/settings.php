<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School News Management System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Toastr CSS for notifications -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        :root {
            --primary-color: #3f51b5;
            --secondary-color: #f5f7fa;
            --accent-color: #ff5722;
            --dark-color: #2c3e50;
            --light-color: #ecf0f1;
            --success-color: #4caf50;
            --danger-color: #f44336;
            --warning-color: #ff9800;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--secondary-color);
            color: var(--dark-color);
        }
        
        .news-card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            overflow: hidden;
            margin-bottom: 24px;
            position: relative;
        }
        
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }
        
        .news-header {
            background: linear-gradient(135deg, var(--primary-color), #5c6bc0);
            color: white;
            padding: 16px 24px;
            position: relative;
        }
        
        .news-badge {
            position: absolute;
            top: -10px;
            right: 20px;
            background-color: var(--accent-color);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .news-body {
            padding: 24px;
            background-color: white;
        }
        
        .news-date {
            color: #7f8c8d;
            font-size: 14px;
            margin-bottom: 12px;
        }
        
        .settings-card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            background-color: white;
            margin-bottom: 24px;
        }
        
        .settings-header {
            background-color: var(--primary-color);
            color: white;
            padding: 16px 24px;
            border-radius: 12px 12px 0 0;
        }
        
        .section-title {
            color: var(--primary-color);
            margin-bottom: 24px;
            font-weight: 600;
            position: relative;
            padding-bottom: 10px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 3px;
            background-color: var(--accent-color);
        }
        
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #3949ab;
            border-color: #3949ab;
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }
        
        .news-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 16px;
        }
        
        .category-filter {
            margin-bottom: 24px;
        }
        
        .category-btn {
            margin-right: 8px;
            margin-bottom: 8px;
            border-radius: 20px;
        }
        
        /* Animation classes */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Action buttons */
        .news-actions {
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
        
        .news-card:hover .action-btn {
            opacity: 1;
        }
        
        .edit-btn {
            background-color: var(--primary-color);
        }
        
        .delete-btn {
            background-color: var(--danger-color);
        }
        
        /* Preview image */
        .image-preview {
            max-width: 100%;
            max-height: 200px;
            display: none;
            margin-top: 10px;
            border-radius: 8px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .news-card {
                margin-bottom: 16px;
            }
        }
        
        /* Loading spinner */
        .loading-spinner {
            display: none;
            width: 3rem;
            height: 3rem;
            border: 0.25em solid rgba(63, 81, 181, 0.2);
            border-right-color: var(--primary-color);
            border-radius: 50%;
            animation: spinner 0.75s linear infinite;
            margin: 2rem auto;
        }
        
        @keyframes spinner {
            to { transform: rotate(360deg); }
        }
        
        /* Search box */
        .search-box {
            position: relative;
            margin-bottom: 20px;
        }
        
        .search-box i {
            position: absolute;
            left: 15px;
            top: 12px;
            color: #6c757d;
        }
        
        .search-box input {
            padding-left: 40px;
            border-radius: 20px;
        }
        
        /* Status indicators */
        .status-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }
        
        .status-published {
            background-color: var(--success-color);
        }
        
        .status-draft {
            background-color: var(--warning-color);
        }
        
        .status-archived {
            background-color: #9e9e9e;
        }
        
        /* Security badge */
        .security-badge {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: var(--light-color);
            padding: 10px 15px;
            border-radius: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            z-index: 100;
        }
        
        .security-badge i {
            color: var(--success-color);
            margin-right: 8px;
            font-size: 1.2rem;
        }
        
        /* Enhanced modal */
        .modal-enhanced .modal-header {
            background: linear-gradient(135deg, var(--primary-color), #5c6bc0);
            color: white;
        }
        
        /* Tag system */
        .tag {
            display: inline-block;
            background-color: #e0e0e0;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 12px;
            margin-right: 5px;
            margin-bottom: 5px;
        }
        
        /* Editor toolbar */
        .editor-toolbar {
            background-color: #f8f9fa;
            padding: 8px;
            border-radius: 5px 5px 0 0;
            border: 1px solid #dee2e6;
            border-bottom: none;
        }
        
        /* Rich text editor */
        .rich-text-editor {
            min-height: 150px;
            border: 1px solid #dee2e6;
            border-radius: 0 0 5px 5px;
            padding: 10px;
        }
        
        /* Dark mode toggle */
        .dark-mode-toggle {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 100;
        }
    </style>
</head>
<body>
    <!-- Security Badge -->
    <div class="security-badge animate__animated animate__fadeInRight">
        <i class="fas fa-shield-alt"></i>
        <span>Secure Connection • Protected System</span>
    </div>

    <!-- Dark Mode Toggle -->
    <div class="dark-mode-toggle">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="darkModeToggle">
            <label class="form-check-label" for="darkModeToggle">Dark Mode</label>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <!-- Main Content -->
            <main class="col-lg-9">
                <!-- News Section Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="section-title">School News & Announcements</h2>
                    <div>
                        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addNewsModal">
                            <i class="fas fa-plus me-2"></i>Add News
                        </button>
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#newsFilterModal">
                            <i class="fas fa-sliders-h me-2"></i>Filter
                        </button>
                    </div>
                </div>
                
                <!-- Search Box -->
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" id="newsSearch" placeholder="Search news...">
                </div>
                
                <!-- Loading Spinner -->
                <div class="loading-spinner" id="loadingSpinner"></div>
                
                <!-- News Grid -->
                <div class="row" id="newsContainer">
                    <!-- News items will be dynamically loaded here -->
                </div>
                
                <!-- Pagination -->
                <nav aria-label="News pagination" class="mt-4">
                    <ul class="pagination justify-content-center" id="pagination">
                    </ul>
                </nav>
            </main>
            
            <!-- Settings Sidebar -->
            <!-- Settings Sidebar -->
<aside class="col-lg-3">
    <div class="settings-card sticky-top" style="top: 20px;">
        <div class="settings-header">
            <h5 class="mb-0"><i class="fas fa-cog me-2"></i>School System Settings</h5>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills mb-4" id="settings-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="general-tab" data-bs-toggle="pill" data-bs-target="#general-settings" type="button">
                        <i class="fas fa-school me-1"></i> General
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="content-tab" data-bs-toggle="pill" data-bs-target="#content-settings" type="button">
                        <i class="fas fa-newspaper me-1"></i> Content
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="notifications-tab" data-bs-toggle="pill" data-bs-target="#notification-settings" type="button">
                        <i class="fas fa-bell me-1"></i> Notifications
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="security-tab" data-bs-toggle="pill" data-bs-target="#security-settings" type="button">
                        <i class="fas fa-shield-alt me-1"></i> Security
                    </button>
                </li>
            </ul>
            
            <div class="tab-content" id="settings-tabContent">
                <!-- General Settings -->
                <div class="tab-pane fade show active" id="general-settings" role="tabpanel">
                    <div class="mb-3">
                        <label for="school-name" class="form-label">School Name</label>
                        <input type="text" class="form-control" id="school-name" placeholder="Enter school name">
                    </div>
                    
                    <div class="mb-3">
                        <label for="school-logo" class="form-label">School Logo URL</label>
                        <input type="text" class="form-control" id="school-logo" placeholder="https://example.com/logo.png">
                        <small class="text-muted">Recommended size: 200x60 pixels</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="academic-year" class="form-label">Current Academic Year</label>
                        <select class="form-select" id="academic-year">
                            <option value="2023-2024">2023-2024</option>
                            <option value="2024-2025" selected>2024-2025</option>
                            <option value="2025-2026">2025-2026</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="timezone" class="form-label">Timezone</label>
                        <select class="form-select" id="timezone">
                            <option value="EST">Eastern Time (EST/EDT)</option>
                            <option value="CST">Central Time (CST/CDT)</option>
                            <option value="MST">Mountain Time (MST/MDT)</option>
                            <option value="PST" selected>Pacific Time (PST/PDT)</option>
                            <option value="GMT">GMT/UTC</option>
                        </select>
                    </div>
                    
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="maintenance-mode">
                        <label class="form-check-label" for="maintenance-mode">Maintenance Mode</label>
                    </div>
                </div>
                
                <!-- Content Settings -->
                <div class="tab-pane fade" id="content-settings" role="tabpanel">
                    <h6 class="mb-3">News Display</h6>
                    <div class="mb-3">
                        <label for="items-per-page" class="form-label">News Items per page</label>
                        <select class="form-select" id="items-per-page">
                            <option value="6">6</option>
                            <option value="12" selected>12</option>
                            <option value="24">24</option>
                            <option value="48">48</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="default-category" class="form-label">Default News Category</label>
                        <select class="form-select" id="default-category">
                            <option value="all" selected>All news</option>
                            <option value="announcements">Announcements</option>
                            <option value="events">Events</option>
                            <option value="academics">Academics</option>
                            <option value="sports">Sports</option>
                            <option value="achievements">Achievements</option>
                        </select>
                    </div>
                    
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="show-images" checked>
                        <label class="form-check-label" for="show-images">Show news images</label>
                    </div>
                    
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="show-dates" checked>
                        <label class="form-check-label" for="show-dates">Show publication dates</label>
                    </div>
                    
                    <h6 class="mb-3 mt-4">Featured Content</h6>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="show-featured" checked>
                        <label class="form-check-label" for="show-featured">Show featured news slider</label>
                    </div>
                    
                    <div class="mb-3">
                        <label for="featured-count" class="form-label">Number of featured items</label>
                        <input type="number" class="form-control" id="featured-count" min="1" max="10" value="3">
                    </div>
                </div>
                
                <!-- Notification Settings -->
                <div class="tab-pane fade" id="notification-settings" role="tabpanel">
                    <h6 class="mb-3">Notification Preferences</h6>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="email-notifications" checked>
                        <label class="form-check-label" for="email-notifications">Email notifications</label>
                    </div>
                    
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="sms-notifications">
                        <label class="form-check-label" for="sms-notifications">SMS notifications</label>
                        <small class="text-muted d-block">(Requires SMS gateway setup)</small>
                    </div>
                    
                    <h6 class="mb-3 mt-4">Notification Types</h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="news-notifications" checked>
                        <label class="form-check-label" for="news-notifications">General news</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="event-notifications" checked>
                        <label class="form-check-label" for="event-notifications">Events</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="emergency-notifications" checked>
                        <label class="form-check-label" for="emergency-notifications">Emergency alerts</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="homework-notifications">
                        <label class="form-check-label" for="homework-notifications">Homework assignments</label>
                    </div>
                    
                    <h6 class="mb-3 mt-4">Recipient Groups</h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="notify-students" checked>
                        <label class="form-check-label" for="notify-students">Students</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="notify-parents" checked>
                        <label class="form-check-label" for="notify-parents">Parents</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="notify-teachers" checked>
                        <label class="form-check-label" for="notify-teachers">Teachers</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="notify-staff">
                        <label class="form-check-label" for="notify-staff">Administrative Staff</label>
                    </div>
                </div>
                
                <!-- Security Settings -->
                <div class="tab-pane fade" id="security-settings" role="tabpanel">
                    <h6 class="mb-3">Access Control</h6>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="require-login" checked>
                        <label class="form-check-label" for="require-login">Require login to view news</label>
                    </div>
                    
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="enable-captcha">
                        <label class="form-check-label" for="enable-captcha">Enable CAPTCHA for public forms</label>
                    </div>
                    
                    <div class="mb-3">
                        <label for="session-timeout" class="form-label">Session timeout (minutes)</label>
                        <select class="form-select" id="session-timeout">
                            <option value="15">15</option>
                            <option value="30" selected>30</option>
                            <option value="60">60</option>
                            <option value="120">120</option>
                            <option value="0">Never</option>
                        </select>
                    </div>
                    
                    <h6 class="mb-3 mt-4">Content Moderation</h6>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="moderate-comments" checked>
                        <label class="form-check-label" for="moderate-comments">Moderate comments before publishing</label>
                    </div>
                    
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="filter-keywords">
                        <label class="form-check-label" for="filter-keywords">Enable keyword filtering</label>
                    </div>
                    
                    <div class="mb-3">
                        <label for="banned-keywords" class="form-label">Banned Keywords (comma separated)</label>
                        <textarea class="form-control" id="banned-keywords" rows="3" placeholder="e.g. profanity, inappropriate terms"></textarea>
                    </div>
                    
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Changing security settings may affect system accessibility
                    </div>
                </div>
            </div>
            
            <div class="d-grid gap-2 mt-4">
                <button class="btn btn-primary" id="save-settings">
                    <i class="fas fa-save me-2"></i>Save Settings
                </button>
                <button class="btn btn-outline-secondary" id="reset-settings">
                    <i class="fas fa-undo me-2"></i>Reset to Defaults
                </button>
            </div>
        </div>
    </div>
</aside>
        </div>
    </div>
    
    <!-- Add News Modal -->
    <div class="modal fade modal-enhanced" id="addNewsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add News Item</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="newsForm">
                        <input type="hidden" id="newsId" value="">
                        <div class="mb-3">
                            <label for="newsTitle" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="newsTitle" required maxlength="100">
                            <div class="form-text text-end"><span id="titleCounter">0</span>/100 characters</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="newsCategory" class="form-label">Category <span class="text-danger">*</span></label>
                                <select class="form-select" id="newsCategory" required>
                                    <option value="">Select category</option>
                                    <option value="announcements">Announcement</option>
                                    <option value="events">Event</option>
                                    <option value="academics">Academics</option>
                                    <option value="sports">Sports</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="newsDate" class="form-label">Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="newsDate" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="newsStatus" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select" id="newsStatus" required>
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="newsImage" class="form-label">Image (URL)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="newsImage" placeholder="https://example.com/image.jpg">
                                <button class="btn btn-outline-secondary" type="button" id="uploadImageBtn">
                                    <i class="fas fa-upload me-1"></i>Upload
                                </button>
                            </div>
                            <img id="imagePreview" src="#" alt="Preview" class="image-preview">
                        </div>
                        <div class="mb-3">
                            <label for="newsContent" class="form-label">Content <span class="text-danger">*</span></label>
                            <div class="editor-toolbar">
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-command="bold"><i class="fas fa-bold"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-command="italic"><i class="fas fa-italic"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-command="insertUnorderedList"><i class="fas fa-list-ul"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-command="insertOrderedList"><i class="fas fa-list-ol"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-command="createLink"><i class="fas fa-link"></i></button>
                            </div>
                            <div class="rich-text-editor" id="newsContent" contenteditable="true"></div>
                            <textarea class="form-control d-none" id="newsContentText" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tags</label>
                            <input type="text" class="form-control" id="newsTags" placeholder="Add tags separated by commas">
                            <div class="mt-2" id="tagsContainer"></div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="newsUrgent">
                            <label class="form-check-label" for="newsUrgent">Mark as urgent</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="newsFeatured">
                            <label class="form-check-label" for="newsFeatured">Featured news (show on homepage)</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveNewsBtn">
                        <span class="spinner-border spinner-border-sm d-none" id="saveSpinner" role="status" aria-hidden="true"></span>
                        Save News
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- View News Modal -->
    <div class="modal fade" id="viewNewsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewNewsTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="viewNewsContent">
                    <!-- News content will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalTitle">Confirm Action</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="confirmModalBody">
                    Are you sure you want to delete this news item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmActionBtn">
                        <span class="spinner-border spinner-border-sm d-none" id="deleteSpinner" role="status" aria-hidden="true"></span>
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title"><i class="fas fa-check-circle me-2"></i> Success</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <i class="fas fa-check-circle fa-5x text-success mb-3"></i>
                    <h4 id="successMessage">News item saved successfully!</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastr JS for notifications -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Initialize variables
            let newsData = JSON.parse(localStorage.getItem('schoolNews')) || [];
            let currentPage = 1;
            let itemsPerPage = 12;
            let currentEditId = null;
            let selectedTags = [];
            
            // Initialize the page
            loadNews();
            setupEventListeners();
            initializeRichTextEditor();
            
            // Load news items
            function loadNews() {
                showLoading(true);
                
                const startIndex = (currentPage - 1) * itemsPerPage;
                const endIndex = startIndex + itemsPerPage;
                const paginatedData = newsData.slice(startIndex, endIndex);
                
                $('#newsContainer').empty();
                
                if (paginatedData.length === 0) {
                    $('#newsContainer').html(`
                        <div class="col-12 text-center py-5">
                            <i class="fas fa-newspaper fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">No news items found</h4>
                            <p class="text-muted">Click the "Add News" button to create your first news item</p>
                        </div>
                    `);
                } else {
                    paginatedData.forEach(news => {
                        const newsCard = createNewsCard(news);
                        $('#newsContainer').append(newsCard);
                    });
                }
                
                setupPagination();
                showLoading(false);
            }
            
            // Create news card HTML
            function createNewsCard(news) {
                const badgeText = news.category === 'announcements' ? 'Announcement' : 
                                news.category === 'events' ? 'Event' : 
                                news.category === 'academics' ? 'Academics' : 'Sports';
                
                const formattedDate = formatDate(news.date);
                const statusClass = news.status === 'published' ? 'status-published' : 
                                  news.status === 'draft' ? 'status-draft' : 'status-archived';
                
                // Create tags HTML
                let tagsHtml = '';
                if (news.tags && news.tags.length > 0) {
                    tagsHtml = news.tags.map(tag => `<span class="tag">${tag}</span>`).join('');
                }
                
                return `
                    <div class="col-md-6 col-lg-4 fade-in" data-id="${news.id}">
                        <div class="news-card">
                            <div class="news-actions">
                                <button class="action-btn edit-btn" data-id="${news.id}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete-btn" data-id="${news.id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <div class="news-header">
                                <span class="news-badge">${badgeText}</span>
                                <h5>${news.title}</h5>
                            </div>
                            <div class="news-body">
                                ${news.image ? `<img src="${news.image}" alt="${news.title}" class="news-image">` : ''}
                                <div class="news-date">
                                    <i class="far fa-calendar-alt me-2"></i>${formattedDate}
                                    <span class="status-indicator ${statusClass}"></span>
                                    ${news.status.charAt(0).toUpperCase() + news.status.slice(1)}
                                </div>
                                ${tagsHtml}
                                <p class="mb-3">${truncateText(news.content, 100)}</p>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-sm btn-primary view-news" data-id="${news.id}">Read More</a>
                                    ${news.urgent ? '<span class="badge bg-danger">Urgent</span>' : ''}
                                    ${news.featured ? '<span class="badge bg-success">Featured</span>' : ''}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }
            
            // Truncate text with ellipsis
            function truncateText(text, maxLength) {
                if (text.length <= maxLength) return text;
                return text.substring(0, maxLength) + '...';
            }
            
            // Format date
            function formatDate(dateString) {
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                return new Date(dateString).toLocaleDateString('en-US', options);
            }
            
            // Setup pagination
            function setupPagination() {
                const totalPages = Math.ceil(newsData.length / itemsPerPage);
                $('#pagination').empty();
                
                if (totalPages <= 1) return;
                
                // Previous button
                $('#pagination').append(`
                    <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                        <a class="page-link" href="#" data-page="${currentPage - 1}">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                `);
                
                // Always show first page
                $('#pagination').append(`
                    <li class="page-item ${1 === currentPage ? 'active' : ''}">
                        <a class="page-link" href="#" data-page="1">1</a>
                    </li>
                `);
                
                // Show ellipsis if needed
                if (currentPage > 3) {
                    $('#pagination').append('<li class="page-item disabled"><span class="page-link">...</span></li>');
                }
                
                // Show current page and neighbors
                const startPage = Math.max(2, currentPage - 1);
                const endPage = Math.min(totalPages - 1, currentPage + 1);
                
                for (let i = startPage; i <= endPage; i++) {
                    $('#pagination').append(`
                        <li class="page-item ${i === currentPage ? 'active' : ''}">
                            <a class="page-link" href="#" data-page="${i}">${i}</a>
                        </li>
                    `);
                }
                
                // Show ellipsis if needed
                if (currentPage < totalPages - 2) {
                    $('#pagination').append('<li class="page-item disabled"><span class="page-link">...</span></li>');
                }
                
                // Always show last page if not already shown
                if (totalPages > 1 && endPage < totalPages) {
                    $('#pagination').append(`
                        <li class="page-item ${totalPages === currentPage ? 'active' : ''}">
                            <a class="page-link" href="#" data-page="${totalPages}">${totalPages}</a>
                        </li>
                    `);
                }
                
                // Next button
                $('#pagination').append(`
                    <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                        <a class="page-link" href="#" data-page="${currentPage + 1}">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                `);
            }
            
            // Initialize rich text editor
            function initializeRichTextEditor() {
                // Toolbar button actions
                $('.editor-toolbar button').click(function() {
                    const command = $(this).data('command');
                    document.execCommand(command, false, null);
                    $('#newsContent').focus();
                });
                
                // Sync content with hidden textarea
                $('#newsContent').on('input', function() {
                    $('#newsContentText').val($(this).html());
                });
            }
            
            // Setup event listeners
            function setupEventListeners() {
                // Pagination click
                $(document).on('click', '.page-link', function(e) {
                    e.preventDefault();
                    currentPage = parseInt($(this).data('page'));
                    loadNews();
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
                
                // Save news button
                $('#saveNewsBtn').click(saveNews);
                
                // Image URL preview
                $('#newsImage').on('input', function() {
                    const url = $(this).val();
                    if (url) {
                        $('#imagePreview').attr('src', url).show();
                    } else {
                        $('#imagePreview').hide();
                    }
                });
                
                // Upload image button
                $('#uploadImageBtn').click(function() {
                    // In a real implementation, this would open a file upload dialog
                    // For demo purposes, we'll simulate an upload
                    toastr.info('Image upload functionality would be implemented here');
                });
                
                // Edit button
                $(document).on('click', '.edit-btn', function() {
                    const id = parseInt($(this).data('id'));
                    editNews(id);
                });
                
                // Delete button
                $(document).on('click', '.delete-btn', function() {
                    const id = parseInt($(this).data('id'));
                    showConfirmModal('Delete News Item', 'Are you sure you want to delete this news item? This action cannot be undone.', id);
                });
                
                // View news button
                $(document).on('click', '.view-news', function(e) {
                    e.preventDefault();
                    const id = parseInt($(this).data('id'));
                    viewNews(id);
                });
                
                // Add news modal show event
                $('#addNewsModal').on('show.bs.modal', function() {
                    $('#newsForm')[0].reset();
                    $('#imagePreview').hide();
                    $('#newsContent').html('');
                    $('#newsContentText').val('');
                    $('#tagsContainer').empty();
                    selectedTags = [];
                    currentEditId = null;
                    $('#newsId').val('');
                    $('#addNewsModal .modal-title').text('Add News Item');
                });
                
                // Save settings
                $('#save-settings').click(function() {
                    itemsPerPage = parseInt($('#items-per-page').val());
                    localStorage.setItem('newsSettings', JSON.stringify({
                        itemsPerPage: itemsPerPage,
                        defaultCategory: $('#default-category').val(),
                        showImages: $('#show-images').is(':checked'),
                        showDates: $('#show-dates').is(':checked'),
                        requireLogin: $('#require-login').is(':checked'),
                        enableCaptcha: $('#enable-captcha').is(':checked'),
                        sessionTimeout: $('#session-timeout').val()
                    }));
                    showSuccess('Settings saved successfully!');
                    loadNews();
                });
                
                // Load settings
                const savedSettings = JSON.parse(localStorage.getItem('newsSettings'));
                if (savedSettings) {
                    $('#items-per-page').val(savedSettings.itemsPerPage);
                    $('#default-category').val(savedSettings.defaultCategory);
                    $('#show-images').prop('checked', savedSettings.showImages);
                    $('#show-dates').prop('checked', savedSettings.showDates);
                    $('#require-login').prop('checked', savedSettings.requireLogin);
                    $('#enable-captcha').prop('checked', savedSettings.enableCaptcha);
                    $('#session-timeout').val(savedSettings.sessionTimeout);
                    itemsPerPage = savedSettings.itemsPerPage;
                }
                
                // Search functionality
                $('#newsSearch').on('input', function() {
                    const searchTerm = $(this).val().toLowerCase();
                    if (searchTerm.length > 2) {
                        const filteredData = newsData.filter(news => 
                            news.title.toLowerCase().includes(searchTerm) || 
                            news.content.toLowerCase().includes(searchTerm) ||
                            (news.tags && news.tags.some(tag => tag.toLowerCase().includes(searchTerm)))
                        );
                        displaySearchResults(filteredData);
                    } else if (searchTerm.length === 0) {
                        loadNews();
                    }
                });
                
                // Tags input
                $('#newsTags').on('keypress', function(e) {
                    if (e.which === 13 || e.which === 44) { // Enter or comma
                        e.preventDefault();
                        const tag = $(this).val().trim();
                        if (tag && !selectedTags.includes(tag)) {
                            selectedTags.push(tag);
                            $('#tagsContainer').append(`<span class="tag">${tag} <i class="fas fa-times remove-tag" data-tag="${tag}"></i></span>`);
                            $(this).val('');
                        }
                    }
                });
                
                // Remove tag
                $(document).on('click', '.remove-tag', function() {
                    const tagToRemove = $(this).data('tag');
                    selectedTags = selectedTags.filter(tag => tag !== tagToRemove);
                    $(this).parent().remove();
                });
                
                // Title character counter
                $('#newsTitle').on('input', function() {
                    $('#titleCounter').text($(this).val().length);
                });
                
                // Dark mode toggle
                $('#darkModeToggle').change(function() {
                    $('body').toggleClass('dark-mode');
                    localStorage.setItem('darkMode', $(this).is(':checked'));
                });
                
                // Initialize dark mode
                if (localStorage.getItem('darkMode') === 'true') {
                    $('#darkModeToggle').prop('checked', true);
                    $('body').addClass('dark-mode');
                }
            }
            
            // Display search results
            function displaySearchResults(results) {
                $('#newsContainer').empty();
                
                if (results.length === 0) {
                    $('#newsContainer').html(`
                        <div class="col-12 text-center py-5">
                            <i class="fas fa-search fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">No results found</h4>
                            <p class="text-muted">Try a different search term</p>
                        </div>
                    `);
                } else {
                    results.forEach(news => {
                        const newsCard = createNewsCard(news);
                        $('#newsContainer').append(newsCard);
                    });
                }
                
                $('#pagination').empty();
            }
            
            // Save news item
            function saveNews() {
                const title = $('#newsTitle').val().trim();
                const category = $('#newsCategory').val();
                const date = $('#newsDate').val();
                const image = $('#newsImage').val().trim();
                const content = $('#newsContentText').val();
                const status = $('#newsStatus').val();
                const urgent = $('#newsUrgent').is(':checked');
                const featured = $('#newsFeatured').is(':checked');
                const tags = selectedTags;
                
                if (!title || !category || !date || !content || !status) {
                    showError('Please fill in all required fields');
                    return;
                }
                
                // Show loading spinner
                $('#saveSpinner').removeClass('d-none');
                $('#saveNewsBtn').prop('disabled', true);
                
                // Simulate API delay
                setTimeout(() => {
                    const newsItem = {
                        id: currentEditId || Date.now(),
                        title,
                        category,
                        date,
                        image,
                        content,
                        status,
                        urgent,
                        featured,
                        tags,
                        createdAt: new Date().toISOString(),
                        updatedAt: new Date().toISOString()
                    };
                    
                    if (currentEditId) {
                        // Update existing item
                        const index = newsData.findIndex(item => item.id === currentEditId);
                        if (index !== -1) {
                            newsData[index] = newsItem;
                        }
                    } else {
                        // Add new item
                        newsData.unshift(newsItem);
                    }
                    
                    // Save to localStorage
                    localStorage.setItem('schoolNews', JSON.stringify(newsData));
                    
                    // Close modal and reload news
                    $('#addNewsModal').modal('hide');
                    currentPage = 1;
                    loadNews();
                    
                    // Show success message
                    showSuccess(currentEditId ? 'News updated successfully!' : 'News added successfully!');
                    currentEditId = null;
                    
                    // Hide loading spinner
                    $('#saveSpinner').addClass('d-none');
                    $('#saveNewsBtn').prop('disabled', false);
                }, 1000);
            }
            
            // Edit news item
            function editNews(id) {
                const newsItem = newsData.find(item => item.id === id);
                if (newsItem) {
                    currentEditId = id;
                    $('#newsId').val(id);
                    $('#newsTitle').val(newsItem.title);
                    $('#titleCounter').text(newsItem.title.length);
                    $('#newsCategory').val(newsItem.category);
                    $('#newsDate').val(newsItem.date);
                    $('#newsImage').val(newsItem.image);
                    if (newsItem.image) {
                        $('#imagePreview').attr('src', newsItem.image).show();
                    }
                    $('#newsContent').html(newsItem.content);
                    $('#newsContentText').val(newsItem.content);
                    $('#newsStatus').val(newsItem.status);
                    $('#newsUrgent').prop('checked', newsItem.urgent);
                    $('#newsFeatured').prop('checked', newsItem.featured);
                    
                    // Load tags
                    if (newsItem.tags && newsItem.tags.length > 0) {
                        selectedTags = newsItem.tags;
                        $('#tagsContainer').html(
                            newsItem.tags.map(tag => `<span class="tag">${tag} <i class="fas fa-times remove-tag" data-tag="${tag}"></i></span>`).join('')
                        );
                    }
                    
                    $('#addNewsModal .modal-title').text('Edit News Item');
                    $('#addNewsModal').modal('show');
                }
            }
            
            // View news item
            function viewNews(id) {
                const newsItem = newsData.find(item => item.id === id);
                if (newsItem) {
                    $('#viewNewsTitle').text(newsItem.title);
                    
                    let content = `
                        <div class="mb-4">
                            ${newsItem.image ? `<img src="${newsItem.image}" alt="${newsItem.title}" class="img-fluid rounded mb-3">` : ''}
                            <div class="text-muted mb-3">
                                <i class="far fa-calendar-alt me-2"></i>${formatDate(newsItem.date)}
                                <span class="badge bg-primary ms-3">${newsItem.category.charAt(0).toUpperCase() + newsItem.category.slice(1)}</span>
                            </div>
                            ${newsItem.tags && newsItem.tags.length > 0 ? 
                             `<div class="mb-3">${newsItem.tags.map(tag => `<span class="tag">${tag}</span>`).join('')}</div>` : ''}
                            <div class="news-content">${newsItem.content}</div>
                        </div>
                    `;
                    
                    $('#viewNewsContent').html(content);
                    $('#viewNewsModal').modal('show');
                }
            }
            
            // Delete news item
            function deleteNews(id) {
                // Show loading spinner
                $('#deleteSpinner').removeClass('d-none');
                $('#confirmActionBtn').prop('disabled', true);
                
                // Simulate API delay
                setTimeout(() => {
                    newsData = newsData.filter(item => item.id !== id);
                    localStorage.setItem('schoolNews', JSON.stringify(newsData));
                    loadNews();
                    showSuccess('News item deleted successfully!');
                    
                    // Hide loading spinner
                    $('#deleteSpinner').addClass('d-none');
                    $('#confirmActionBtn').prop('disabled', false);
                    $('#confirmModal').modal('hide');
                }, 800);
            }
            
            // Show confirmation modal
            function showConfirmModal(title, message, id) {
                $('#confirmModalTitle').text(title);
                $('#confirmModalBody').text(message);
                $('#confirmActionBtn').off('click').on('click', function() {
                    deleteNews(id);
                });
                $('#confirmModal').modal('show');
            }
            
            // Show success modal
            function showSuccessModal(message) {
                $('#successMessage').text(message);
                $('#successModal').modal('show');
            }
            
            // Show loading spinner
            function showLoading(show) {
                if (show) {
                    $('#loadingSpinner').show();
                    $('#newsContainer').hide();
                } else {
                    $('#loadingSpinner').hide();
                    $('#newsContainer').show();
                }
            }
            
            // Show toast notification
            function showSuccess(message) {
                toastr.success(message, 'Success', {
                    positionClass: 'toast-top-right',
                    timeOut: 3000,
                    closeButton: true
                });
            }
            
            function showError(message) {
                toastr.error(message, 'Error', {
                    positionClass: 'toast-top-right',
                    timeOut: 3000,
                    closeButton: true
                });
            }
        });
    </script>
</body>
</html>