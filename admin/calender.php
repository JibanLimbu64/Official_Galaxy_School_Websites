<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepali Calendar 2082 with Festivals</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        :root {
            --holiday-red: #e63946;
            --primary-color: #3a86ff;
            --secondary-color: #8338ec;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .calendar-container {
            max-width: 1000px;
            margin: 30px auto;
            animation: fadeInUp 0.8s ease-out;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
            background: white;
        }
        
        .calendar-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }
        
        .calendar-header h2 {
            margin: 0;
            font-weight: 700;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }
        
        .year-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }
        
        .month-header {
            background-color: #f1faee;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            border-bottom: 2px solid #a8dadc;
        }
        
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            padding: 15px;
        }
        
        .day-header {
            text-align: center;
            font-weight: bold;
            padding: 10px 5px;
            background-color: #a8dadc;
            color: #1d3557;
            border-radius: 5px;
        }
        
        .calendar-day {
            padding: 10px 5px;
            text-align: center;
            border-radius: 5px;
            min-height: 60px;
            display: flex;
            flex-direction: column;
            background-color: #f1faee;
            transition: all 0.2s;
            cursor: pointer;
        }
        
        .calendar-day:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
        
        .holiday {
            background-color: var(--holiday-red);
            color: white;
            font-weight: bold;
        }
        
        .holiday .date-nepali {
            color: white;
        }
        
        .date-english {
            font-size: 0.8em;
            color: #457b9d;
        }
        
        .date-nepali {
            font-size: 1.1em;
            font-weight: bold;
            color: #1d3557;
        }
        
        .holiday-name {
            font-size: 0.7em;
            margin-top: 3px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .empty-day {
            background-color: transparent;
        }
        
        .legend {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            padding: 15px;
            background-color: #f1faee;
            border-radius: 10px;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9em;
        }
        
        .legend-color {
            width: 20px;
            height: 20px;
            border-radius: 3px;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .month-container {
            margin-bottom: 30px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .today {
            border: 2px solid #3a86ff;
            position: relative;
        }
        
        .today::after {
            content: "Today";
            position: absolute;
            top: 2px;
            right: 2px;
            background-color: #3a86ff;
            color: white;
            font-size: 0.6em;
            padding: 1px 4px;
            border-radius: 3px;
        }
        
        /* Modal Styles */
        .festival-modal .modal-content {
            border-radius: 15px;
            overflow: hidden;
            border: none;
        }
        
        .festival-header {
            background: linear-gradient(135deg, var(--holiday-red), #c1121f);
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .festival-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #ffd166;
        }
        
        .festival-body {
            padding: 25px;
            text-align: center;
        }
        
        .festival-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #1d3557;
        }
        
        .festival-message {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .festival-greeting {
            font-style: italic;
            color: var(--secondary-color);
            font-weight: bold;
            margin-top: 15px;
        }
        
        .festival-image {
            max-width: 200px;
            margin: 0 auto 20px;
            display: block;
            border-radius: 10px;
        }
         .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .navbar-nav .nav-link {
            padding: 0.5rem 1rem;
        }
    </style>
</head>
<body>
     <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Galaxy Academy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fas fa-info-circle"></i> About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-newspaper"></i> News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user-graduate"></i> Admission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-school"></i> Class</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-calendar-alt"></i> Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-images"></i> Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-envelope"></i> Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid py-4">
        <div class="calendar-container">
            <div class="calendar-header">
                <h2><i class="fas fa-calendar-alt me-2"></i>Nepali Calendar 2082 BS</h2>
                <div class="year-nav">
                    <button class="btn btn-sm btn-outline-light"><i class="fas fa-chevron-left"></i> 2081</button>
                    <span class="fs-5 fw-bold">2082 BS</span>
                    <button class="btn btn-sm btn-outline-light">2083 <i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
            
            <div class="p-4">
                <!-- Legend -->
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-color" style="background-color: var(--holiday-red);"></div>
                        <span>Public Holiday</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background-color: #f1faee; border: 1px solid #ccc;"></div>
                        <span>Normal Day</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background-color: #f1faee; border: 2px solid #3a86ff;"></div>
                        <span>Today</span>
                    </div>
                </div>
                
                <!-- Calendar Months -->
                <div id="calendar-months" class="mt-4">
                    <!-- Months will be inserted here by JavaScript -->
                </div>
            </div>
        </div>
    </div>

    <!-- Festival Wishes Modal -->
    <div class="modal fade festival-modal" id="festivalModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="festival-header">
                    <div class="festival-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h3 id="modalFestivalName">Festival Name</h3>
                </div>
                <div class="festival-body">
                    <img src="" alt="Festival Image" class="festival-image img-fluid" id="modalFestivalImage">
                    <div class="festival-title" id="modalFestivalTitle">Happy Festival!</div>
                    <div class="festival-message" id="modalFestivalMessage">
                        Wishing you and your family a wonderful celebration filled with joy and happiness!
                    </div>
                    <div class="festival-greeting" id="modalFestivalGreeting">
                        शुभकामना छ!
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Nepali calendar data for 2082 BS with festival details
        const nepaliCalendar2082 = {
            months: [
                {
                    name: "Baisakh",
                    days: 31,
                    startDay: 0, // Sunday (0 = Sunday, 1 = Monday, etc.)
                    holidays: {
                        1: {
                            name: "Nepali New Year",
                            message: "Wishing you a prosperous and joyful Nepali New Year 2082! May this new year bring happiness, success, and good health to you and your family.",
                            greeting: "नयाँ बर्ष २०८२ को शुभकामना!",
                            icon: "fa-calendar-star",
                            image: "calenderimages/R.jpg"
                        },
                        15: {
                            name: "Labour Day",
                            message: "Honoring the contributions of workers everywhere. Wishing all workers a happy and well-deserved Labour Day!",
                            greeting: "श्रम दिवसको शुभकामना!",
                            icon: "fa-hammer",
                            image: "calenderimages/Labour.jpg"
                        }
                    }
                },
                {
                    name: "Jestha",
                    days: 31,
                    startDay: 2,
                    holidays: {
                        15: {
                            name: "Ganatantra Diwas",
                            message: "Celebrating the establishment of democracy in Nepal. Happy Republic Day to all Nepali people!",
                            greeting: "गणतन्त्र दिवसको शुभकामना!",
                            icon: "fa-flag",
                            image: "calenderimages/g.jpg"
                        },
                        29: {
                            name: "Sagarmatha Day",
                            message: "Celebrating the world's highest peak and Nepali mountaineering achievements. Happy Sagarmatha Day!",
                            greeting: "सगरमाथा दिवसको शुभकामना!",
                            icon: "fa-mountain",
                            image: "calenderimages/saga.jpg"
                        }
                    }
                },
                {
                    name: "Ashad",
                    days: 32,
                    startDay: 5,
                    holidays: {
                        15: {
                            name: "Dahi Chiura Khane Din",
                            message: "Enjoy the traditional yogurt and beaten rice on this special day. May Lord Krishna bless you with happiness!",
                            greeting: "दही चिउरा खाने दिनको शुभकामना!",
                            icon: "fa-utensils",
                            image: "calenderimages/D.jpg"
                        }
                    }
                },
                {
                    name: "Shrawan",
                    days: 31,
                    startDay: 1,
                    holidays: {
                        3: {
                            name: "Guru Purnima",
                            message: "Honoring our teachers and mentors. Wishing you a blessed Guru Purnima filled with gratitude and wisdom.",
                            greeting: "गुरु पूर्णिमाको शुभकामना!",
                            icon: "fa-chalkboard-teacher",
                            image: "calenderimages/guru.jpg"
                        }
                    }
                },
                {
                    name: "Bhadra",
                    days: 31,
                    startDay: 4,
                    holidays: {
                        5: {
                            name: "Janai Purnima, Rakshya Bandhan",
                            message: "Celebrating the sacred thread festival and sibling love. May this Rakhi strengthen your bonds with loved ones.",
                            greeting: "जनै पूर्णिमा र रक्षा बन्धनको शुभकामना!",
                            icon: "fa-hands-helping",
                            image: "https://via.placeholder.com/200x150/FF33A1/FFFFFF?text=Rakhi"
                        },
                        19: {
                            name: "Gai Jatra",
                            message: "Remembering departed souls with humor and festivities. Happy Gai Jatra!",
                            greeting: "गाई जात्राको शुभकामना!",
                            icon: "fa-cow",
                            image: "https://via.placeholder.com/200x150/33FFBD/FFFFFF?text=Gai+Jatra"
                        },
                        24: {
                            name: "Krishna Janmashtami",
                            message: "Celebrating the birth of Lord Krishna. May his blessings be with you always!",
                            greeting: "श्री कृष्ण जन्माष्टमीको शुभकामना!",
                            icon: "fa-baby",
                            image: "https://via.placeholder.com/200x150/5733FF/FFFFFF?text=Janmashtami"
                        }
                    }
                },
                {
                    name: "Ashoj",
                    days: 30,
                    startDay: 0,
                    holidays: {
                        1: {
                            name: "Prajatantra Diwas",
                            message: "Celebrating Democracy Day in Nepal. Wishing all Nepalis a meaningful Democracy Day!",
                            greeting: "प्रजातन्त्र दिवसको शुभकामना!",
                            icon: "fa-vote-yea",
                            image: "https://via.placeholder.com/200x150/33FF57/FFFFFF?text=Democracy+Day"
                        },
                        7: {
                            name: "Fulpati",
                            message: "The seventh day of Dashain when flowers and leaves are brought to honor Goddess Durga.",
                            greeting: "फूलपातीको शुभकामना!",
                            icon: "fa-leaf",
                            image: "https://via.placeholder.com/200x150/57FF33/FFFFFF?text=Fulpati"
                        },
                        8: {
                            name: "Maha Asthami",
                            message: "The eighth day of Dashain, dedicated to the worship of Goddess Kali.",
                            greeting: "महा अष्टमीको शुभकामना!",
                            icon: "fa-pray",
                            image: "https://via.placeholder.com/200x150/FF5733/FFFFFF?text=Maha+Asthami"
                        },
                        9: {
                            name: "Maha Navami",
                            message: "The ninth day of Dashain when weapons and vehicles are worshipped.",
                            greeting: "महा नवमीको शुभकामना!",
                            icon: "fa-shield-alt",
                            image: "https://via.placeholder.com/200x150/3357FF/FFFFFF?text=Maha+Navami"
                        },
                        10: {
                            name: "Vijaya Dashami",
                            message: "The most important day of Dashain when elders give tika and blessings to younger ones.",
                            greeting: "विजया दशमीको हार्दिक शुभकामना!",
                            icon: "fa-hands",
                            image: "https://via.placeholder.com/200x150/FF3333/FFFFFF?text=Dashain+Tika"
                        },
                        15: {
                            name: "Kojagrat Purnima",
                            message: "The full moon night when people stay awake and worship Goddess Laxmi.",
                            greeting: "कोजाग्रत पूर्णिमाको शुभकामना!",
                            icon: "fa-moon",
                            image: "https://via.placeholder.com/200x150/33A1FF/FFFFFF?text=Kojagrat"
                        }
                    }
                },
                {
                    name: "Kartik",
                    days: 29,
                    startDay: 2,
                    holidays: {
                        2: {
                            name: "Laxmi Puja",
                            message: "Worshipping Goddess Laxmi for prosperity and wealth. May your home be filled with abundance!",
                            greeting: "लक्ष्मी पूजाको शुभकामना!",
                            icon: "fa-rupee-sign",
                            image: "https://via.placeholder.com/200x150/FFD700/FFFFFF?text=Laxmi+Puja"
                        },
                        3: {
                            name: "Gobardhan Puja",
                            message: "Celebrating the day when Lord Krishna lifted Govardhan Hill to protect villagers.",
                            greeting: "गोवर्धन पूजाको शुभकामना!",
                            icon: "fa-mountain",
                            image: "https://via.placeholder.com/200x150/8B4513/FFFFFF?text=Gobardhan"
                        },
                        4: {
                            name: "Bhai Tika",
                            message: "Celebrating the special bond between brothers and sisters. Happy Bhai Tika!",
                            greeting: "भाइटीकाको हार्दिक शुभकामना!",
                            icon: "fa-heart",
                            image: "https://via.placeholder.com/200x150/FF1493/FFFFFF?text=Bhai+Tika"
                        },
                        15: {
                            name: "Chhath",
                            message: "Worshipping the Sun God for wellbeing and prosperity. Happy Chhath Puja!",
                            greeting: "छठ पूजाको शुभकामना!",
                            icon: "fa-sun",
                            image: "https://via.placeholder.com/200x150/FF8C00/FFFFFF?text=Chhath"
                        }
                    }
                },
                {
                    name: "Mangsir",
                    days: 30,
                    startDay: 4,
                    holidays: {
                        15: {
                            name: "Udhauli Parva",
                            message: "Celebrating the migration season of birds and the harvest festival of the Kirat community.",
                            greeting: "उधौली पर्वको शुभकामना!",
                            icon: "fa-dove",
                            image: "https://via.placeholder.com/200x150/228B22/FFFFFF?text=Udhauli"
                        }
                    }
                },
                {
                    name: "Poush",
                    days: 29,
                    startDay: 6,
                    holidays: {
                        15: {
                            name: "Maghe Sankranti",
                            message: "Marking the winter solstice and the beginning of longer days. Enjoy sesame sweets and yam!",
                            greeting: "माघे संक्रान्तिको शुभकामना!",
                            icon: "fa-snowflake",
                            image: "https://via.placeholder.com/200x150/4682B4/FFFFFF?text=Maghe+Sankranti"
                        }
                    }
                },
                {
                    name: "Magh",
                    days: 30,
                    startDay: 1,
                    holidays: {
                        11: {
                            name: "Sonam Lhosar",
                            message: "Celebrating the Tamu (Gurung) New Year. Wishing you happiness and prosperity in the new year!",
                            greeting: "सोनाम ल्होसारको शुभकामना!",
                            icon: "fa-calendar-alt",
                            image: "https://via.placeholder.com/200x150/FF6347/FFFFFF?text=Sonam+Lhosar"
                        },
                        15: {
                            name: "Maha Shivaratri",
                            message: "The great night of Lord Shiva. May Lord Shiva bless you with peace and happiness!",
                            greeting: "महा शिवरात्रिको शुभकामना!",
                            icon: "fa-om",
                            image: "https://via.placeholder.com/200x150/000000/FFFFFF?text=Shivaratri"
                        }
                    }
                },
                {
                    name: "Falgun",
                    days: 30,
                    startDay: 3,
                    holidays: {
                        8: {
                            name: "Prajatantra Diwas",
                            message: "Commemorating the people's movement day in Nepal. Happy Democracy Day!",
                            greeting: "प्रजातन्त्र दिवसको शुभकामना!",
                            icon: "fa-fist-raised",
                            image: "https://via.placeholder.com/200x150/FF0000/FFFFFF?text=Prajatantra"
                        },
                        15: {
                            name: "Fagu Purnima (Holi)",
                            message: "The festival of colors! Wishing you a vibrant and joyful Holi with your loved ones!",
                            greeting: "होलीको रंगमंग शुभकामना!",
                            icon: "fa-paint-brush",
                            image: "https://via.placeholder.com/200x150/FF00FF/FFFFFF?text=Holi"
                        }
                    }
                },
                {
                    name: "Chaitra",
                    days: 30,
                    startDay: 5,
                    holidays: {
                        9: {
                            name: "Ghode Jatra",
                            message: "The horse racing festival in Kathmandu. Wishing you an exciting Ghode Jatra!",
                            greeting: "घोडे जात्राको शुभकामना!",
                            icon: "fa-horse",
                            image: "https://via.placeholder.com/200x150/8B0000/FFFFFF?text=Ghode+Jatra"
                        },
                        15: {
                            name: "Ram Nawami",
                            message: "Celebrating the birth of Lord Rama. Happy Ram Nawami!",
                            greeting: "राम नवमीको शुभकामना!",
                            icon: "fa-book",
                            image: "https://via.placeholder.com/200x150/4169E1/FFFFFF?text=Ram+Nawami"
                        }
                    }
                }
            ],
            // English date mapping for the first day of Baisakh 2082
            englishStartDate: new Date(2025, 3, 13) // April 13, 2025 (0 = January)
        };

        // Function to generate calendar for all months
        function generateCalendar() {
            const calendarMonths = document.getElementById('calendar-months');
            calendarMonths.innerHTML = '';
            
            let currentEnglishDate = new Date(nepaliCalendar2082.englishStartDate);
            
            nepaliCalendar2082.months.forEach((month, monthIndex) => {
                const monthContainer = document.createElement('div');
                monthContainer.className = 'month-container';
                
                // Month header
                const monthHeader = document.createElement('div');
                monthHeader.className = 'month-header';
                monthHeader.textContent = `${month.name} 2082`;
                monthContainer.appendChild(monthHeader);
                
                // Day headers
                const dayNames = ['आइत', 'सोम', 'मंगल', 'बुध', 'बिही', 'शुक्र', 'शनि'];
                const dayHeaders = document.createElement('div');
                dayHeaders.className = 'calendar-grid';
                
                dayNames.forEach(day => {
                    const dayHeader = document.createElement('div');
                    dayHeader.className = 'day-header';
                    dayHeader.textContent = day;
                    dayHeaders.appendChild(dayHeader);
                });
                
                monthContainer.appendChild(dayHeaders);
                
                // Calendar days
                const calendarGrid = document.createElement('div');
                calendarGrid.className = 'calendar-grid';
                
                // Add empty cells for days before the start day
                for (let i = 0; i < month.startDay; i++) {
                    const emptyDay = document.createElement('div');
                    emptyDay.className = 'empty-day';
                    calendarGrid.appendChild(emptyDay);
                }
                
                // Add days of the month
                for (let day = 1; day <= month.days; day++) {
                    const calendarDay = document.createElement('div');
                    calendarDay.className = 'calendar-day';
                    
                    // Check if it's a holiday
                    if (month.holidays[day]) {
                        calendarDay.classList.add('holiday');
                        // Add data attributes for modal
                        calendarDay.dataset.festivalName = month.holidays[day].name;
                        calendarDay.dataset.festivalMessage = month.holidays[day].message;
                        calendarDay.dataset.festivalGreeting = month.holidays[day].greeting;
                        calendarDay.dataset.festivalIcon = month.holidays[day].icon;
                        calendarDay.dataset.festivalImage = month.holidays[day].image;
                    }
                    
                    // Check if it's today (for demo purposes, we'll mark Baisakh 1 as today)
                    if (monthIndex === 0 && day === 1) {
                        calendarDay.classList.add('today');
                    }
                    
                    // Nepali date
                    const nepaliDate = document.createElement('div');
                    nepaliDate.className = 'date-nepali';
                    nepaliDate.textContent = day;
                    calendarDay.appendChild(nepaliDate);
                    
                    // English date
                    const englishDate = document.createElement('div');
                    englishDate.className = 'date-english';
                    englishDate.textContent = formatEnglishDate(currentEnglishDate);
                    calendarDay.appendChild(englishDate);
                    
                    // Holiday name
                    if (month.holidays[day]) {
                        const holidayName = document.createElement('div');
                        holidayName.className = 'holiday-name';
                        holidayName.textContent = month.holidays[day].name;
                        calendarDay.appendChild(holidayName);
                    }
                    
                    calendarGrid.appendChild(calendarDay);
                    
                    // Increment English date
                    currentEnglishDate.setDate(currentEnglishDate.getDate() + 1);
                }
                
                monthContainer.appendChild(calendarGrid);
                calendarMonths.appendChild(monthContainer);
            });
            
            // Add click event listeners to holiday days
            document.querySelectorAll('.holiday').forEach(day => {
                day.addEventListener('click', function() {
                    showFestivalModal(
                        this.dataset.festivalName,
                        this.dataset.festivalMessage,
                        this.dataset.festivalGreeting,
                        this.dataset.festivalIcon,
                        this.dataset.festivalImage
                    );
                });
            });
        }
        
        // Show festival modal with wishes
        function showFestivalModal(name, message, greeting, icon, image) {
            const modal = new bootstrap.Modal(document.getElementById('festivalModal'));
            
            // Set modal content
            document.getElementById('modalFestivalName').textContent = name;
            document.getElementById('modalFestivalTitle').textContent = `Happy ${name}!`;
            document.getElementById('modalFestivalMessage').textContent = message;
            document.getElementById('modalFestivalGreeting').textContent = greeting;
            
            // Set icon
            const iconElement = document.querySelector('.festival-icon i');
            iconElement.className = `fas ${icon}`;
            
            // Set image (using placeholder for demo)
            document.getElementById('modalFestivalImage').src = image;
            document.getElementById('modalFestivalImage').alt = name;
            
            // Show modal
            modal.show();
        }
        
        // Format English date as "Apr 13"
        function formatEnglishDate(date) {
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            return `${months[date.getMonth()]} ${date.getDate()}`;
        }
        
        // Auto-open the calendar when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            generateCalendar();
            
            // For demo purposes, scroll to Baisakh (first month)
            document.querySelector('.month-container')?.scrollIntoView({
                behavior: 'smooth'
            });
            
            // Auto-open today's holiday (Baisakh 1 in this demo)
            setTimeout(() => {
                const todayHoliday = document.querySelector('.today.holiday');
                if (todayHoliday) {
                    todayHoliday.click();
                }
            }, 1000);
        });
    </script>
</body>
</html>