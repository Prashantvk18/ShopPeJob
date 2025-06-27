@include('candidate.header')
    <style>
       .container {
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .hero {
            text-align: center;
            margin-bottom: 40px;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 2.2rem;
            color: #555;
        }

        .mission, .team, .contact {
            margin-bottom: 40px;
        }

        h2 {
            font-size: 2.5rem;
            color: #333;
        }

        p {
            font-size: 1.8rem;
            color: #666;
            line-height: 1.6;
        }

        .teamMembers {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .member {
            text-align: center;
            max-width: 200px;
            margin: 10px;
        }

        .member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .member h3 {
            font-size: 2.2rem;
            margin: 10px 0;
        }

        .member p {
            font-size: 1.5rem;
            color: #777;
        }

        .contact a {
            color: #0070f3;
            text-decoration: none;
        }

        .contact a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <section class="hero">
            <h1>About Us</h1>
            <p>Your trusted partner in finding the right jobs for you!</p>
        </section>

        <section class="mission">
            <h2>Our Mission</h2>
            <p>
               Our mission is to connect hardworking individuals with job opportunities at local shops and businesses, especially those who may not have formal education or technical skills
            </p>
        </section>

        <section class="mission">
            <h2>Why We Do It</h2>
            <p>
               Millions of people struggle to find work because they don’t have high education or online presence. At the same time, small shops are always in need of staff. We're here to bridge that gap — simply, quickly, and with heart.
            </p>
        </section>

        
        <!-- <section class="team">
            <h2>Meet Our Team</h2>
            <div class="teamMembers">
                <div class="member">
                    <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Team Member">
                    <h3>John Doe</h3>
                    <p>CEO & Founder</p>
                    <p>John has over 15 years of experience in the recruitment industry and is passionate about helping people find fulfilling careers.</p>
                </div>
                <div class="member">
                    <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="Team Member">
                    <h3>Jane Smith</h3>
                    <p>Chief Marketing Officer</p>
                    <p>Jane leads our marketing efforts, bringing innovative ideas to help us reach job seekers and employers alike.</p>
                </div>
                <div class="member">
                    <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="Team Member">
                    <h3>Michael Brown</h3>
                    <p>Lead Developer</p>
                    <p>Michael oversees the technical aspects of our website, ensuring that it remains fast, secure, and user-friendly.</p>
                </div>
            </div>
        </section> -->

        <section class="contact">
            <h2>Contact Us</h2>
            <p>If you have any questions or feedback, feel free to reach out to us at 
                <a href="mailto:info@jobsite.com">info@jobsite.com</a>.
            </p>
        </section>
    </div>


@include('candidate.footer')
