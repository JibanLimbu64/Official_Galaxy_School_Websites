<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nursery Class Students</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 20px 0;
        }
        .student-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            background: white;
            margin-bottom: 25px;
        }
        .student-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        .card-header {
            background: linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 15px;
            border-bottom: none;
        }
        .card-body {
            padding: 20px;
        }
        .student-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            display: block;
            margin: -60px auto 15px;
            background: #f8f9fa;
        }
        .info-label {
            font-weight: 600;
            color: #6c757d;
            font-size: 0.85rem;
        }
        .info-value {
            font-weight: 500;
            margin-bottom: 10px;
            color: #495057;
        }
        .contact-info {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 10px;
            margin-top: 10px;
        }
        .nursery-badge {
            background: #ffc107;
            color: #212529;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            display: inline-block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-5 animate__animated animate__fadeInDown">Six Class Student</h1>
        
        <div class="row g-4">
            <!-- Student Card 1 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section A</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Aarav Sharma</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-001</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Rahul Sharma</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Priya Sharma</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">123 Green Park, New Delhi</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 9876543210</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 2 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section B</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Ananya Patel</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-002</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Vikram Patel</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Neha Patel</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">456 Rose Lane, Mumbai</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 8765432109</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 3 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section A</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Advait Joshi</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-003</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Sanjay Joshi</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Meera Joshi</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">789 Oak Street, Bangalore</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 7654321098</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 4 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section B</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Ishaan Gupta</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-004</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Rajesh Gupta</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Sunita Gupta</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">321 Maple Road, Kolkata</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 6543210987</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 5 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section A</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Myra Singh</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-005</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Vikram Singh</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Pooja Singh</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">654 Pine Avenue, Hyderabad</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 5432109876</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 6 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section B</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Vihaan Reddy</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-006</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Arjun Reddy</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Ananya Reddy</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">987 Cedar Lane, Chennai</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 4321098765</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 7 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section A</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Kiara Malhotra</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-007</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Rohan Malhotra</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Tanvi Malhotra</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">753 Birch Street, Pune</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 3210987654</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 8 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section B</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Arjun Kapoor</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-008</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Amit Kapoor</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Shreya Kapoor</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">159 Willow Road, Ahmedabad</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 2109876543</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 9 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section A</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Anika Verma</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-009</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Rahul Verma</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Priyanka Verma</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">357 Elm Street, Jaipur</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 1098765432</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 10 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section B</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Reyansh Choudhary</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-010</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Aakash Choudhary</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Neha Choudhary</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">852 Spruce Avenue, Lucknow</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 9876543211</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 11 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section A</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Avni Desai</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-011</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Rohan Desai</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Mira Desai</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">456 Oak Lane, Surat</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 8765432110</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 12 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section B</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Dhruv Mehta</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-012</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Anil Mehta</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Pooja Mehta</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">789 Maple Road, Nagpur</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 7654321109</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 13 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section A</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Ira Nair</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-013</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Vijay Nair</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Divya Nair</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">321 Pine Street, Indore</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 6543211098</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 14 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section B</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Kabir Khanna</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-014</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Rahul Khanna</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Anjali Khanna</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">654 Cedar Avenue, Bhopal</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 5432110987</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 15 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section A</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Misha Iyer</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-015</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Arvind Iyer</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Lakshmi Iyer</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">987 Birch Lane, Coimbatore</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 4321109876</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 16 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section B</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Vivaan Menon</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-016</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Praveen Menon</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Ananya Menon</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">753 Willow Road, Kochi</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 3211098765</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 17 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section A</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Zara Khan</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-017</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Imran Khan</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Fatima Khan</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">159 Spruce Street, Patna</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 2109876543</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 18 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section B</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Ayaan Bhatia</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-018</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Rajat Bhatia</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Shalini Bhatia</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">357 Elm Avenue, Chandigarh</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 1098765432</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 19 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section A</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Diya Rao</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-019</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Vikram Rao</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Priya Rao</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">852 Oak Road, Visakhapatnam</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 9876543210</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card 20 -->
            <div class="col-md-6 col-lg-3 animate__animated animate__fadeIn">
                <div class="student-card">
                    <div class="card-header">
                        <i class="fas fa-child me-2"></i> Student Profile
                    </div>
                    <img src="images/Profile.jpg" class="student-img" alt="Student Image">
                    <div class="card-body">
                        <span class="nursery-badge">Nursery - Section B</span>
                        <div>
                            <div class="info-label">Name</div>
                            <div class="info-value">Rudra Saxena</div>
                        </div>
                        <div>
                            <div class="info-label">Roll No</div>
                            <div class="info-value">NUR-020</div>
                        </div>
                        <div class="contact-info">
                            <div class="info-label">Father's Name</div>
                            <div class="info-value">Vivek Saxena</div>
                            <div class="info-label">Mother's Name</div>
                            <div class="info-value">Anjali Saxena</div>
                            <div class="info-label">Address</div>
                            <div class="info-value">456 Maple Lane, Kanpur</div>
                            <div class="info-label">Contact</div>
                            <div class="info-value">+91 8765432109</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add scroll animation
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.student-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            cards.forEach(card => {
                card.style.opacity = 0;
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.5s ease';
                observer.observe(card);
            });
        });
    </script>
</body>
</html>