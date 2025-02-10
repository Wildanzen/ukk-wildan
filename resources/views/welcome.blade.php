<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Landing Page</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6e45e2, #88d3ce);
            color: #fff;
            overflow-x: hidden;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        header a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s;
        }

        header a:hover {
            color: #ff007f;
        }

        .hero {
            text-align: center;
            padding: 50px 20px;
            position: relative;
            animation: fadeIn 1.5s ease;
        }

        .hero img {
            max-width: 100%;
            height: auto;
            animation: bounce 2s infinite;
        }

        .hero h1 {
            font-size: 3em;
            margin: 20px 0;
        }

        .hero p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .hero .cta {
            background-color: #ff007f;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .hero .cta:hover {
            background-color: #e60073;
            transform: scale(1.1);
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 50px 20px;
        }

        .card {
            background: white;
            color: #333;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin: 20px;
            width: 300px;
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s;
            animation: slideIn 0.8s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            max-width: 100%;
            height: 150px;
            object-fit: cover;
            animation: fadeIn 1s ease;
        }

        .card h3 {
            margin: 20px 0 10px;
            font-size: 1.5em;
        }

        .card p {
            padding: 0 15px 20px;
            font-size: 1em;
        }

        .testimonials {
            background: #fff;
            color: #333;
            padding: 50px 20px;
            text-align: center;
        }

        .testimonials h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .testimonial {
            margin: 20px auto;
            max-width: 800px;
            font-style: italic;
        }

        .testimonial-author {
            margin-top: 10px;
            font-weight: bold;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-20px);
            }

            60% {
                transform: translateY(-10px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateX(-50px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <header>
        <h2>LOGO</h2>
        <nav>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
            <a href="#community">Community</a>
        </nav>
    </header>

    <section class="hero">
        <img src="https://via.placeholder.com/600x300" alt="E-learning Animation">
        <h1>Welcome to E-Learning Industry</h1>
        <p>Learn from the best instructors with interactive lessons and resources. Our platform is designed to empower
            students to achieve their educational goals efficiently and effectively.</p>
        <a href="/login" class="cta">Get Started Now!</a>

    </section>

    <section class="cards">
        <div class="card">
            <img src="https://via.placeholder.com/300x150" alt="Interactive Courses">
            <h3>Interactive Courses</h3>
            <p>Engage with lessons and exercises to build your skills and deepen your understanding.</p>
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/300x150" alt="Expert Instructors">
            <h3>Expert Instructors</h3>
            <p>Learn from industry leaders and seasoned professionals with real-world experience.</p>
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/300x150" alt="Flexible Learning">
            <h3>Flexible Learning</h3>
            <p>Study at your own pace anytime, anywhere with our intuitive platform.</p>
        </div>
    </section>

    <section class="cards">
        <div class="card">
            <img src="https://via.placeholder.com/300x150" alt="Student Support">
            <h3>Student Support</h3>
            <p>Get guidance and support from our dedicated team, available 24/7 to assist you.</p>
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/300x150" alt="Certification">
            <h3>Certification</h3>
            <p>Earn certificates to showcase your achievements and enhance your career prospects.</p>
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/300x150" alt="Community Access">
            <h3>Community Access</h3>
            <p>Connect and collaborate with other learners worldwide through our vibrant community.</p>
        </div>
    </section>

    <section class="testimonials">
        <h2>What Our Students Say</h2>
        <div class="testimonial">
            "This platform has revolutionized the way I learn. The interactive courses and expert guidance have been
            invaluable."
            <div class="testimonial-author">- Alex Johnson</div>
        </div>
        <div class="testimonial">
            "Flexible learning schedules and excellent support make this platform the best choice for my studies. Highly
            recommended!"
            <div class="testimonial-author">- Maria Rodriguez</div>
        </div>
        <div class="testimonial">
            "I achieved my certification with ease, thanks to the well-structured courses and amazing instructors."
            <div class="testimonial-author">- James Lee</div>
        </div>
    </section>

</body>

</html>
