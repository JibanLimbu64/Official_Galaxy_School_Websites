<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission Form | [School Name]</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
            --danger-color: #e74c3c;
            --dark-color: #2c3e50;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }
        
        .admission-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 60px 0;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }
        
        .admission-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            opacity: 0.1;
        }
        
        .form-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            padding: 25px;
            margin-bottom: 30px;
        }
        
        .section-title {
            color: var(--primary-color);
            font-weight: 600;
            margin: 25px 0 15px;
            position: relative;
            padding-bottom: 8px;
            font-size: 1.25rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        }
        
        .form-label {
            font-weight: 500;
            color: var(--dark-color);
            font-size: 0.9rem;
        }
        
        .required-field::after {
            content: ' *';
            color: var(--danger-color);
        }
        
        .file-upload {
            border: 2px dashed #ddd;
            border-radius: 6px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .file-upload:hover {
            border-color: var(--primary-color);
            background: rgba(52, 152, 219, 0.05);
        }
        
        .file-upload i {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 8px;
        }
        
        .file-upload small {
            display: block;
            color: #6c757d;
            font-size: 0.7rem;
        }
        
        .file-preview {
            margin-top: 8px;
            display: none;
        }
        
        .file-preview img {
            max-width: 80px;
            max-height: 80px;
            border-radius: 4px;
            margin-right: 8px;
            margin-bottom: 8px;
        }
        
        .btn-submit {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 10px 25px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .animate-form {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease;
        }
        
        .animate-form.animated {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Custom modal styles */
        .admission-modal .modal-dialog {
            max-width: 500px;
        }
        
        .admission-modal .modal-content {
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }
        
        .modal-success {
            background: linear-gradient(135deg, var(--secondary-color), #27ae60);
            color: white;
            text-align: center;
            padding: 30px 15px;
        }
        
        .modal-danger {
            background: linear-gradient(135deg, var(--danger-color), #c0392b);
            color: white;
            text-align: center;
            padding: 30px 15px;
        }
        
        .modal-success i, .modal-danger i {
            font-size: 3rem;
            margin-bottom: 15px;
        }
        
        .modal-success h4, .modal-danger h4 {
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 1.5rem;
        }
        
        .form-section {
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .form-section:last-child {
            border-bottom: none;
            margin-bottom: 15px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .admission-header {
                padding: 40px 0;
            }
            
            .admission-header h1 {
                font-size: 1.8rem;
            }
            
            .form-container {
                padding: 20px;
            }
            
            .section-title {
                font-size: 1.1rem;
            }
            
            .btn-submit {
                width: 100%;
                padding: 12px;
            }
        }
        
        @media (max-width: 576px) {
            .admission-header {
                padding: 30px 0;
            }
            
            .admission-header h1 {
                font-size: 1.5rem;
            }
            
            .form-container {
                padding: 15px;
            }
            
            .section-title {
                font-size: 1rem;
                margin: 20px 0 10px;
            }
            
            .form-label {
                font-size: 0.85rem;
            }
            
            .file-upload {
                padding: 10px;
            }
            
            .file-upload i {
                font-size: 1.2rem;
            }
            
            .file-upload span {
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="admission-header text-center">
        <div class="container">
            <h1 class="animate__animated animate__fadeInDown">Student Admission Form</h1>
            <p class="animate__animated animate__fadeIn animate__delay-1s">Join [GalaxyAcademy] for quality education</p>
        </div>
    </header>

    <!-- Main Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="form-container">
                    <form id="admissionForm" action="studentdata/data.php" method="POST" novalidate>
                        <!-- Section 1: Personal Details -->
                        <div class="form-section animate-form">
                            <h3 class="section-title">1. Personal Details</h3>
                            <div class="row">
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="firstName" class="form-label required-field">First Name</label>
                                    <input type="text" class="form-control" id="firstName" required>
                                    <div class="invalid-feedback">Please provide first name</div>
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="middleName" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="middleName">
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="lastName" class="form-label required-field">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" required>
                                    <div class="invalid-feedback">Please provide last name</div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="dob" class="form-label required-field">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" required>
                                    <div class="invalid-feedback">Please select date of birth</div>
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label required-field">Gender</label>
                                    <select class="form-select" id="gender" required>
                                        <option value="" selected disabled>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <div class="invalid-feedback">Please select gender</div>
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="nationality" class="form-label required-field">Nationality</label>
                                    <input type="text" class="form-control" id="nationality" required>
                                    <div class="invalid-feedback">Please provide nationality</div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="religion" class="form-label">Religion (Optional)</label>
                                    <input type="text" class="form-control" id="religion">
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="bloodGroup" class="form-label">Blood Group (Optional)</label>
                                    <select class="form-select" id="bloodGroup">
                                        <option value="" selected disabled>Select Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label required-field">Student Photo</label>
                                    <div class="file-upload" id="photoUpload">
                                        <i class="fas fa-camera"></i>
                                        <span>Click to upload photo</span>
                                        <small>Max 2MB (JPG/PNG)</small>
                                        <input type="file" id="studentPhoto" accept="image/*" style="display: none;" required>
                                    </div>
                                    <div class="file-preview" id="photoPreview"></div>
                                    <div class="invalid-feedback">Please upload student photo</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Section 2: Contact Information -->
                        <div class="form-section animate-form">
                            <h3 class="section-title">2. Contact Information</h3>
                            <div class="row">
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="permanentAddress" class="form-label required-field">Permanent Address</label>
                                    <textarea class="form-control" id="permanentAddress" rows="3" required></textarea>
                                    <div class="invalid-feedback">Please provide permanent address</div>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="temporaryAddress" class="form-label">Temporary Address (if different)</label>
                                    <textarea class="form-control" id="temporaryAddress" rows="3"></textarea>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="phone" class="form-label required-field">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" required>
                                    <div class="invalid-feedback">Please provide valid phone number</div>
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="email" class="form-label required-field">Email ID</label>
                                    <input type="email" class="form-control" id="email" required>
                                    <div class="invalid-feedback">Please provide valid email</div>
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="alternateEmail" class="form-label">Alternate Email (Parent)</label>
                                    <input type="email" class="form-control" id="alternateEmail">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Section 3: Parent/Guardian Information -->
                        <div class="form-section animate-form">
                            <h3 class="section-title">3. Parent/Guardian Information</h3>
                            <div class="row">
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="fatherName" class="form-label required-field">Father's Name</label>
                                    <input type="text" class="form-control" id="fatherName" required>
                                    <div class="invalid-feedback">Please provide father's name</div>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="fatherCitizenship" class="form-label required-field">Father's Citizenship Number</label>
                                    <input type="text" class="form-control" id="fatherCitizenship" required>
                                    <div class="invalid-feedback">Please provide father's citizenship number</div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="fatherPhone" class="form-label required-field">Father's Phone</label>
                                    <input type="tel" class="form-control" id="fatherPhone" required>
                                    <div class="invalid-feedback">Please provide father's phone number</div>
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="fatherEmail" class="form-label">Father's Email</label>
                                    <input type="email" class="form-control" id="fatherEmail">
                                </div>
                            </div>
                            
                            <div class="row mt-4">
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="motherName" class="form-label required-field">Mother's Name</label>
                                    <input type="text" class="form-control" id="motherName" required>
                                    <div class="invalid-feedback">Please provide mother's name</div>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="motherOccupation" class="form-label required-field">Mother's Citizenship Number</label>
                                    <input type="text" class="form-control" id="motherOccupation" required>
                                    <div class="invalid-feedback">Please provide mother's occupation</div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="motherPhone" class="form-label required-field">Mother's Phone</label>
                                    <input type="tel" class="form-control" id="motherPhone" required>
                                    <div class="invalid-feedback">Please provide mother's phone number</div>
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label for="motherEmail" class="form-label">Mother's Email</label>
                                    <input type="email" class="form-control" id="motherEmail">
                                </div>
                            </div>
                            
                            <div class="row mt-4">
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="guardianName" class="form-label">Guardian's Name (if applicable)</label>
                                    <input type="text" class="form-control" id="guardianName">
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="guardianRelation" class="form-label">Relationship to Student</label>
                                    <input type="text" class="form-control" id="guardianRelation">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Section 4: Academic Information -->
                        <div class="form-section animate-form">
                            <h3 class="section-title">4. Academic Information</h3>
                            <div class="row">
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="previousSchool" class="form-label required-field">Previous School Name</label>
                                    <input type="text" class="form-control" id="previousSchool" required>
                                    <div class="invalid-feedback">Please provide previous school name</div>
                                </div>
                                <div class="col-md-3 col-12 mb-3">
                                    <label for="lastGrade" class="form-label required-field">Last Grade Completed</label>
                                    <input type="text" class="form-control" id="lastGrade" required>
                                    <div class="invalid-feedback">Please provide last grade completed</div>
                                </div>
                                <div class="col-md-3 col-12 mb-3">
                                    <label for="seekingGrade" class="form-label required-field">Grade Seeking Admission</label>
                                    <select class="form-select" id="seekingGrade" required>
                                        <option value="" selected disabled>Select Grade</option>
                                        <option value="Nursery">Nursery</option>
                                        <option value="KG">Kindergarten</option>
                                        <option value="1">Grade 1</option>
                                        <option value="2">Grade 2</option>
                                        <option value="3">Grade 3</option>
                                        <option value="4">Grade 4</option>
                                        <option value="5">Grade 5</option>
                                        <option value="6">Grade 6</option>
                                        <option value="7">Grade 7</option>
                                        <option value="8">Grade 8</option>
                                        <option value="9">Grade 9</option>
                                        <option value="10">Grade 10</option>
                                        <option value="11">Grade 11</option>
                                        <option value="12">Grade 12</option>
                                    </select>
                                    <div class="invalid-feedback">Please select grade seeking admission</div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label required-field">Transfer Certificate</label>
                                    <div class="file-upload" id="tcUpload">
                                        <i class="fas fa-file-alt"></i>
                                        <span>Upload TC (PDF/Image)</span>
                                        <small>Max 5MB</small>
                                        <input type="file" id="transferCertificate" style="display: none;" required>
                                    </div>
                                    <div class="invalid-feedback">Transfer certificate is required</div>
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label required-field">Birth Certificate</label>
                                    <div class="file-upload" id="birthCertUpload">
                                        <i class="fas fa-certificate"></i>
                                        <span>Upload Birth Certificate</span>
                                        <small>Max 5MB (PDF/Image)</small>
                                        <input type="file" id="birthCertificate" style="display: none;" required>
                                    </div>
                                    <div class="invalid-feedback">Birth certificate is required</div>
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label required-field">Previous Report Card</label>
                                    <div class="file-upload" id="reportCardUpload">
                                        <i class="fas fa-file-excel"></i>
                                        <span>Upload Report Card</span>
                                        <small>Max 5MB (PDF/Image)</small>
                                        <input type="file" id="reportCard" style="display: none;" required>
                                    </div>
                                    <div class="invalid-feedback">Report card is required</div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label">Citizenship/ID Document</label>
                                    <div class="file-upload" id="idUpload">
                                        <i class="fas fa-id-card"></i>
                                        <span>Upload ID (if needed)</span>
                                        <small>Max 5MB (PDF/Image)</small>
                                        <input type="file" id="idDocument" style="display: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Declaration -->
                        <div class="form-section animate-form">
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="declaration" required>
                                <label class="form-check-label" for="declaration">
                                    I declare that all information provided is true and accurate to the best of my knowledge. I understand that providing false information may result in cancellation of admission.
                                </label>
                                <div class="invalid-feedback">You must agree to the declaration</div>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="text-center animate-form">
                            <button type="submit" class="btn btn-primary btn-lg btn-submit">Submit Application</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade admission-modal" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-success">
                    <i class="fas fa-check-circle"></i>
                    <h4>Admission Successful!</h4>
                    <p>Your application has been submitted successfully. We will contact you shortly.</p>
                    <button type="button" class="btn btn-light mt-3" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Error Modal -->
    <div class="modal fade admission-modal" id="errorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-danger">
                    <i class="fas fa-times-circle"></i>
                    <h4>Documents Not Valid</h4>
                    <p id="errorMessage">Please check your documents and try again.</p>
                    <button type="button" class="btn btn-light mt-3" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Incomplete Form Alert -->
    <div class="modal fade admission-modal" id="incompleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h4>Form Incomplete</h4>
                    <p>Please fill all required fields properly before submitting.</p>
                    <button type="button" class="btn btn-light mt-3" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation on scroll
            const animateElements = document.querySelectorAll('.animate-form');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            animateElements.forEach(element => {
                observer.observe(element);
                
                // Random delay for staggered animation
                const randomDelay = Math.random() * 0.3;
                element.style.transitionDelay = `${randomDelay}s`;
            });

            // File upload previews
            const setupFileUpload = (uploadElementId, inputId, previewId) => {
                const uploadElement = document.getElementById(uploadElementId);
                const fileInput = document.getElementById(inputId);
                const previewElement = document.getElementById(previewId);
                
                uploadElement.addEventListener('click', () => fileInput.click());
                
                fileInput.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        const file = this.files[0];
                        
                        // Validate file type and size
                        if (inputId === 'studentPhoto' && !file.type.match('image.*')) {
                            alert('Please upload an image file (JPG/PNG)');
                            return;
                        }
                        
                        if (file.size > (inputId === 'studentPhoto' ? 2 * 1024 * 1024 : 5 * 1024 * 1024)) {
                            alert(`File size should be less than ${inputId === 'studentPhoto' ? '2MB' : '5MB'}`);
                            return;
                        }
                        
                        // Show preview
                        if (previewElement) {
                            if (file.type.match('image.*')) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    previewElement.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                                    previewElement.style.display = 'block';
                                }
                                reader.readAsDataURL(file);
                            } else {
                                previewElement.innerHTML = `<div class="alert alert-info">${file.name}</div>`;
                                previewElement.style.display = 'block';
                            }
                        }
                        
                        // Update upload element text
                        uploadElement.querySelector('span').textContent = file.name;
                    }
                });
            };
            
            setupFileUpload('photoUpload', 'studentPhoto', 'photoPreview');
            setupFileUpload('tcUpload', 'transferCertificate');
            setupFileUpload('birthCertUpload', 'birthCertificate');
            setupFileUpload('reportCardUpload', 'reportCard');
            setupFileUpload('idUpload', 'idDocument');
            
            // Form validation
            const form = document.getElementById('admissionForm');
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            const incompleteModal = new bootstrap.Modal(document.getElementById('incompleteModal'));
            
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                event.stopPropagation();
                
                // Validate birth date
                const dobInput = document.getElementById('dob');
                if (dobInput.value) {
                    const dob = new Date(dobInput.value);
                    const today = new Date();
                    const age = today.getFullYear() - dob.getFullYear();
                    
                    if (age < 3 || age > 18) {
                        document.getElementById('errorMessage').textContent = 'Student age must be between 3-18 years for admission.';
                        errorModal.show();
                        return;
                    }
                }
                
                // Validate documents
                const transferCert = document.getElementById('transferCertificate');
                const birthCert = document.getElementById('birthCertificate');
                const reportCard = document.getElementById('reportCard');
                
                if (form.checkValidity() === false) {
                    incompleteModal.show();
                } else {
                    // Simulate document validation (in real app, this would be server-side)
                    const isDocumentsValid = Math.random() > 0.3; // 70% chance of success for demo
                    
                    if (isDocumentsValid) {
                        successModal.show();
                        // In real app, you would submit the form here
                        // form.submit();
                    } else {
                        document.getElementById('errorMessage').textContent = 'One or more documents could not be validated. Please ensure all documents are clear and valid.';
                        errorModal.show();
                    }
                }
                
                form.classList.add('was-validated');
            }, false);
            
            // Phone number validation
            const phoneInputs = ['phone', 'fatherPhone', 'motherPhone'];
            phoneInputs.forEach(id => {
                const input = document.getElementById(id);
                input.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9+]/g, '');
                });
            });
        });
    </script>
</body>
</html>