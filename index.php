<?php
session_start();
include('connection.php');

// Run this only when the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_btn'])) {

    // Sanitize inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Validation
    if (!empty($name) && !empty($email) && !empty($message)) {

        $query = "INSERT INTO `students`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";
        $run = mysqli_query($conn, $query);

        if ($run) {
            $_SESSION['msg'] = [
                "type" => "success",
                "text" => "✅ Message sent successfully!"
            ];
        } else {
            $_SESSION['msg'] = [
                "type" => "error",
                "text" => "❌ Database Error: " . mysqli_error($conn)
            ];
        }

    } else {
        $_SESSION['msg'] = [
            "type" => "error",
            "text" => "⚠️ Please fill all fields."
        ];
    }

    header("Location: " . $_SERVER['PHP_SELF'] . "#contact");
    exit;
}
?>






 <style>
  
    /* ==== Base Styling ==== */
    #web-pricing {
      background: #001b29;
      color: #fff;
      font-family: "Poppins", sans-serif;
      padding: 80px 5%;
      text-align: center;
    }

    .sub-title {
      font-size: 36px;
      font-weight: 700;
      margin-bottom: 40px;
      color: #fff;
    }

    .sub-title span {
      color: #ffc107;
    }

    /* ==== Country Tabs ==== */
   /* COUNTRY TABS */
.country-tabs {
  display: flex;
  justify-content: center;
  gap: 15px;
  margin: 30px 0;
}

.country-btn {
  background: #f8f9fc;
  border: 2px solid #e0e3eb;
  border-radius: 30px;
  padding: 10px 25px;
  font-size: 16px;
  font-weight: 500;
  color: #444;
  cursor: pointer;
  transition: all 0.3s ease;
}

.country-btn:hover {
  background: #007bff;
  color: white;
  border-color: #007bff;
  box-shadow: 0 4px 12px rgba(0, 123, 255, 0.2);
}

.country-btn.active {
  background: #007bff;
  color: white;
  border-color: #007bff;
  box-shadow: 0 4px 14px rgba(0, 123, 255, 0.3);
}

/* SERVICE CHIPS */
.services-nav {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 20px;
}

.chip {
  background: #f1f3f7;
  border-radius: 25px;
  padding: 10px 20px;
  color: #333;
  font-size: 15px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
  border: 1px solid transparent;
}

.chip:hover {
  background: #007bff;
  color: white;
}

.chip.active {
  background: #007bff;
  color: white;
  box-shadow: 0 4px 14px rgba(0, 123, 255, 0.25);
}


    /* ==== Cards Grid ==== */
  .cards {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 15px;
  justify-items: center;
  align-items: stretch;
  margin: 40px auto;
  max-width: 1300px;
  padding: 0 12px;
  box-sizing: border-box;
}

/* Card base */
.card {
  background: linear-gradient(180deg,#ffffff 0%, #fbfdff 100%);
  border-radius: 18px;
  padding: 32px 22px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  text-align: center;
  height: 520px;
  width: 100%;
  box-sizing: border-box;
  position: relative;
  overflow: hidden;
  transition: box-shadow .28s ease, transform .28s ease, border-color .28s ease;
  border: 1px solid rgba(15,20,25,0.04);
}

/* Accent top bar (thin) */
.card::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 6px;
  background: linear-gradient(90deg, #00b4ff, #007bff 40%, #ffb84d 100%);
  opacity: .95;
}

/* subtle hover lift + glow (no size jump) */
.card:hover {
  transform: translateY(-6px);
  box-shadow: 0 24px 48px rgba(3, 10, 34, 0.16), 0 6px 18px rgba(3,10,34,0.08);
  z-index: 5;
}

/* Featured card (make it pop) */
.card.featured {
  border: 1px solid rgba(255, 160, 60, 0.18);
  transform: translateY(0);
}
.card.featured::after {
  content: "MOST POPULAR";
  position: absolute;
  top: 12px;
  right: -46px;
  transform: rotate(45deg);
  background: linear-gradient(90deg,#ffb84d,#ff8a00);
  color: #08121a;
  font-weight: 700;
  font-size: 12px;
  padding: 6px 64px;
  box-shadow: 0 6px 18px rgba(255,136,0,0.12);
}

/* Top / Title / Price */
.card .top { padding-top: 6px; }
.card .top h3 {
  font-size: 1.25rem;
  margin: 6px 0 10px;
  color: #08121a;
  letter-spacing: .2px;
}
.price {
  font-size: 1.9rem;
  font-weight: 800;
  color: #007bff;
  margin-bottom: 6px;
}
.note {
  font-size: .95rem;
  color: #556170;
  margin-bottom: 14px;
  line-height: 1.4;
}

/* Features: centered with icons */
.features {
  list-style: none;
  padding: 0;
  margin: 10px 0 22px;
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 8px;
  align-items: center;
}
.features li {
  width: 100%;
  display: flex;
  align-items: center;
  gap: 12px;
  justify-content: center;
  color: #2b3b46;
  font-size: .95rem;
}
.features li::before {
  content: "✓";
  display: inline-block;
  min-width: 20px;
  height: 20px;
  line-height: 20px;
  border-radius: 4px;
  background: linear-gradient(180deg,#ffd84d,#ffcc33);
  color: #08121a;
  font-weight: 700;
  font-size: 12px;
  text-align: center;
  box-shadow: 0 4px 10px rgba(0,0,0,0.06) inset;
}

/* CTA button */
.btn {
  display: inline-block;
  padding: 12px 28px;
  border-radius: 30px;
  font-weight: 700;
  text-decoration: none;
  color: #08121a;
  background: linear-gradient(90deg,#ffd84d,#ffb84d);
  box-shadow: 0 10px 30px rgba(255,184,77,0.12);
  transition: transform .18s ease, box-shadow .18s ease;
}
.btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 18px 36px rgba(255,184,77,0.18);
}

/* Footer small text */
.foot {
  color: #6d7680;
  font-size: .9rem;
  margin-top: 12px;
}

/* Make sure internal container stretches */
.card .card-inner {
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  gap: 12px;
  flex-grow: 1;
}



/* Responsive tweaks */
@media (max-width: 1200px) {
  .cards { grid-template-columns: repeat(2, 1fr); gap: 12px; max-width: 900px; }
  .card { height: auto; min-height: 480px; padding: 28px 18px; }
  .card.featured::after { right: -36px; padding: 6px 48px; font-size: 11px; }
}
@media (max-width: 700px) {
  .cards { grid-template-columns: 1fr; gap: 12px; max-width: 520px; }
  .card { min-height: auto; padding: 22px; }
  .card::before { height: 5px; }
  .card.featured::after { display: none; }
}

/* Accessibility: focus state for keyboard users */
.card:focus-within {
  outline: 3px solid rgba(0,123,255,0.12);
  outline-offset: 4px;
}

/* graphic */

:root{
    --bg:#04121a;
    --card-bg: #f7fbff;
    --accent: linear-gradient(90deg,#0ea5b7,#f59e0b);
    --yellow:#ffcb47;
    --muted:#6b7280;
    --shadow: 0 10px 30px rgba(2,6,23,0.45);
  }
  *{box-sizing:border-box}
  body{
    margin:0;
    font-family: 'Montserrat', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
    background: linear-gradient(180deg,#04121a 0%, #021725 60%);
    color:#0b1220;
    padding:48px 20px;
  }

  .wrap{
    max-width:1200px;
    margin:0 auto;
  }

  h1{
    color:#e6f7fb;
    text-align:center;
    margin:0 0 28px;
    font-size:28px;
    font-weight:700;
    letter-spacing:0.2px;
  }

  .cards{
    display:grid;
    grid-template-columns: repeat(4,1fr);
    gap:20px;
  }

  /* Responsive */
  @media (max-width:1000px){ .cards{grid-template-columns:repeat(2,1fr);} }
  @media (max-width:560px){ .cards{grid-template-columns:1fr;} h1{font-size:22px;} }

  .card{
    background:var(--card-bg);
    border-radius:14px;
    overflow:hidden;
    box-shadow:var(--shadow);
    display:flex;
    flex-direction:column;
    height:100%;
    border: 1px solid rgba(2,6,23,0.06);
  }

  .card .card-top{
    padding:22px;
    position:relative;
    background: linear-gradient(90deg, rgba(14,165,183,0.08), rgba(245,158,11,0.05));
    display:flex;
    flex-direction:column;
    gap:10px;
    align-items:flex-start;
  }

  /* rounded colored edge like the reference picture */
  .card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    right:0;
    height:8px;
    background: linear-gradient(90deg,#0288d1,#06b6d4 40%,#f59e0b 100%);
    border-top-left-radius:14px;
    border-top-right-radius:14px;
  }

  .card h3{
    margin:10px 0 0;
    font-size:18px;
    font-weight:700;
    color:#071129;
  }

  .price{
    font-size:28px;
    font-weight:800;
    color:#0288ff;
    margin-top:6px;
  }

  .note{
    margin:6px 0 0;
    color:var(--muted);
    font-size:13px;
    max-width:260px;
    line-height:1.35;
  }

  .features{
    list-style:none;
    padding:18px 22px;
    margin:0;
    flex:1 1 auto;
    display:flex;
    flex-direction:column;
    gap:12px;
  }

  .features li{
    display:flex;
    align-items:flex-start;
    gap:12px;
    color:#263044;
    font-size:14px;
  }

  .check{
    min-width:28px;
    min-height:28px;
    border-radius:6px;
    display:inline-grid;
    place-items:center;
    background:linear-gradient(180deg,#ffd47a,#ffcf4f);
    box-shadow:0 4px 8px rgba(3,10,20,0.08);
    font-weight:700;
    color:#2b2b2b;
    font-size:14px;
  }

  .bottom{
    padding:18px;
    display:flex;
    justify-content:center;
    align-items:center;
    gap:12px;
  }

  .btn{
    display:inline-block;
    text-decoration:none;
    font-weight:700;
    padding:12px 28px;
    border-radius:28px;
    background: linear-gradient(180deg,#ffd47a,#ffcf4f);
    color:#08121a;
    box-shadow: 0 8px 20px rgba(2,6,23,0.18);
    transition: transform .14s ease, box-shadow .14s ease;
  }
  .btn:hover{ transform: translateY(-4px); box-shadow: 0 18px 40px rgba(2,6,23,0.22); }

  /* small muted price under for PKR */
  .meta{
    margin-left:auto;
    color:var(--muted);
    font-size:12px;
  }

  /* little tick svg fallback style */
  .tick-svg{ width:16px; height:16px; display:block; }

  /* special highlight for premium card */
  .card.gold::before{
    background: linear-gradient(90deg,#06b6d4,#0288d1 40%,#f59e0b 100%);
  }




</style>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio Website</title>
  <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="icon" href="pic/icon.ico" type="image/x-icon">
  <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif; 
}
html {
    scroll-behavior: smooth;
}
body {
    color: #ededed;
    background: #001b29;
}

#popup-message {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 20px 40px;
  border-radius: 12px;
  font-size: 18px;
  font-weight: bold;
  text-align: center;
  z-index: 9999;
  box-shadow: 0 4px 20px rgba(0,0,0,0.3);
  animation: fadeIn 0.5s ease-in-out;
}

#popup-message.success {
  background: #28a745; /* Green */
  color: white;
}

#popup-message.error {
  background: #dc3545; /* Red */
  color: white;
}

@keyframes fadeIn {
  from {opacity: 0; transform: translate(-50%, -60%);}
  to {opacity: 1; transform: translate(-50%, -50%);}
}


.home {
    position: relative;
    width: 100%;
    height: 100vh;
    background-color: #001b29;    
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    padding: 70px 10% 0;
}

.image-container {
    text-align: center;
    
    padding: 20px; 
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.image-container img {
    width: 600px;
    height: 600px;
    border-radius: 10px;
    display: block;
    margin: 0 auto; 
}

.home-sci {
  display: flex;
  justify-content: flex-start; /* Moves icons to the left */
  align-items: center;
  gap: 25px;
  margin-top: 40px;
  margin-left: 60px; /* Adjust this value to control how far left you want it */
}

.home-sci a {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 55px;
  height: 55px;
  border: 2px solid #00eaff;
  border-radius: 50%;
  color: #00eaff;
  font-size: 24px;
  transition: all 0.4s ease;
  box-shadow: 0 0 8px #00eaff, inset 0 0 8px #00eaff;
  text-decoration: none;
}

.home-sci a:hover {
  background: #00eaff;
  color: #0a192f;
  box-shadow: 0 0 8px #00eaff;
  transform: translateY(-2px);
}

.home-content {
  text-align: left;
  align-items: flex-start;
}

.home-content h3 {
    font-size: 32px;
    font-weight: 700;
    opacity: 0;
    animation: slideBottom 0.6s ease-in-out forwards;
    animation-delay: -7s;
}

.home-content h3:nth-of-type(2){
    margin-bottom: 30px;
    animation: slideTop 1s ease forwards;
    animation-delay: .7s;
}

.home-content h3 span
{
    color: #0ef;
}

.home-content h1 {
  text-align: left;
  font-size: 60px;
  font-weight: 900;
  color: #ffffff;
  margin: 10px 0;
}


.home-content p {
    font-size: 20px;
    opacity: 0;
    animation: slideLeft 1s ease forwards;
}

/* Responsive Design for Tablets and Mobiles */
@media (max-width: 900px) {
  .home {
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    height: auto;
    padding: 50px 5%;
  }

  .home-content {
    text-align: center;
    align-items: center;
    right: 0;
    max-width: 100%;
  }

  .home-content h1 {
    font-size: 40px;
    text-align: center;
  }

  .home-content h3 {
    font-size: 22px;
  }

  .home-content p {
    font-size: 16px;
    margin: 10px 0;
  }

  .image-container {
    margin-top: 30px;
    text-align: center;
  }

  .image-container img {
    width: 280px;
    height: auto;
  }

  .home-sci {
    justify-content: center;
    margin-left: 0;
    margin-top: 25px;
    gap: 18px;
  }

  .home-sci a {
    width: 45px;
    height: 45px;
    font-size: 20px;
  }
}

/* Smaller Phones (under 500px) */
@media (max-width: 500px) {
  .home-content h1 {
    font-size: 34px;
  }

  .home-content h3 {
    font-size: 20px;
  }

  .home-content p {
    font-size: 14px;
    line-height: 1.5;
  }

  .image-container img {
    width: 220px;
  }

  .home-sci a {
    width: 40px;
    height: 40px;
    font-size: 18px;
  }
}


/* about */


.about {
  display: flex;
  justify-content: center;
  align-items: center;
  color: #fff;
  padding: 80px 20px;
  min-height: 90vh;
}

.about-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 1100px;
  width: 100%;
  gap: 50px;
  flex-wrap: wrap;
}

.about-img img {
  width: 330px;
  height: auto;
  border-radius: 15px;
  box-shadow: 0 0 25px #00e0ff;
  transition: 0.4s ease;
}

.about-img img:hover {
  transform: scale(1.05);
  box-shadow: 0 0 40px #00e0ff;
}

.about-text {
  flex: 1;
  text-align: center;   /* centers all text */
  animation: fadeInRight 1s ease forwards;
}

.about-text h2 {
  font-size: 70px;       /* made it larger */
  font-weight: 900;
  margin-bottom: 15px;
  color: #ffffff;
  text-transform: capitalize;
  letter-spacing: 1px;
}

.about-text h2 span {
  color: #00e0ff;
}

.about-text h3 {
  font-size: 30px;
  color: #00e0ff;
  margin-bottom: 25px;
  font-weight: 700;
  display: inline-block;
  position: relative;
}

.about-text p {
  font-size: 16px;
  color: #cfd9e1;
  line-height: 1.8;
  margin: 0 auto 35px auto;
  width: 75%;            /* keeps text centered but not too wide */
  text-align: center;     /* centers paragraph text */
}

/* Button center alignment */
.about-text .btn-box {
  display: inline-block;
  margin-top: 10px;
}

.btn-box {
  display: inline-block;
  padding: 10px 25px;
  background: #00e0ff;
  color: #02131f;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 600;
  transition: 0.3s;
}

.btn-box:hover {
  background: #fff;
  color: #02131f;
  box-shadow: 0 0 15px #00e0ff;
}

/* Animations */
@keyframes fadeInRight {
  0% { opacity: 0; transform: translateX(60px); }
  100% { opacity: 1; transform: translateX(0); }
}



/* Responsive */
@media (max-width: 900px) {
  .about-container {
    flex-direction: column;
    text-align: center;
  }
  .about-text {
    text-align: center;
  }
  .about-text p {
    width: 100%;
    float: none;
  }
  .about-text h2 {
    font-size: 45px;
  }
  .about-text h3 {
    font-size: 22px;
  }
  .about-img img {
    width: 260px;
  }
}


/* contact */

/* ------------------------------
   CONTACT SECTION MAIN CONTAINER
------------------------------ */
.contact {
  max-width: 1200px;
  margin: 0 auto;
  padding: 50px 20px;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
  align-items: flex-start;
  color: var(--white);
}

/* --------------------------------
   LEFT SIDE (INFO SECTION)
-------------------------------- */
.contact-left {
  display: flex;
  flex-direction: column;
  gap: 20px;
  padding: 35px;
  background: rgba(255, 255, 255, 0.05);
  border-radius: 20px;
  box-shadow: 0 8px 25px rgba(0, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
  border: 1px solid rgba(0, 255, 255, 0.2);
}

.contact-left:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 35px rgba(0, 255, 255, 0.2);
}

.main-heading {
  font-size: 50px;
  font-weight: 900;
  text-transform: capitalize;
  letter-spacing: 1px;
  text-align: center;
  color: #00e0ff; /* blue for "Contact" */
  margin-bottom: 25px;
}

.main-heading span {
  color: #ffffff; /* white for "Me" */
}







/* Heading */
.contact-left h2 {
  font-size: 70px;
  font-weight: 900;
  text-align: center;
  background: linear-gradient(90deg, var(--accent), #00e0ff);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  text-shadow: 0 0 15px rgba(0, 255, 255, 0.25);
  margin-bottom: 25px;
}

.contact-left h2 span {
  color: var(--accent);
}

/* Subheading */
.contact-left h4 {
  color: var(--accent);
  font-size: 22px;
  font-weight: 700;
  margin-bottom: 10px;
  text-transform: uppercase;
  letter-spacing: 1px;
}

/* Paragraph */
.contact-left p {
  color: var(--muted);
  font-size: 17px;
  line-height: 1.8;
  transition: color 0.3s ease;
}

.contact-left p:hover {
  color: var(--accent);
}

/* Contact Details */
.contact-list {
  margin-top: 12px;
  padding: 0;
}

.contact-list li {
  list-style: none;
  font-size: 17px;
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  gap: 12px;
  color: #9befff; /* light blue by default */
  transition: transform 0.25s ease, color 0.3s ease;
}

.contact-list li i {
  color: var(--accent);
  font-size: 22px;
  transition: transform 0.3s ease, color 0.3s ease;
}

/* Email text (links inside contact list) */
.contact-list li a {
  color: #9befff; /* light blue by default */
  text-decoration: none;
  transition: color 0.3s ease;
}

/* Hover effect — both text & icon react */
.contact-list li:hover a {
  color: #ffffff; /* white on hover */
}

.contact-list li:hover {
  transform: translateX(8px);
}

.contact-list li:hover i {
  transform: scale(1.2);
  color: #00e0ff;
}


/* --------------------------------
   RIGHT SIDE (CONTACT FORM)
-------------------------------- */
.contact-form {
  padding: 35px;
  background: rgba(255, 255, 255, 0.05);
  border-radius: 20px;
  box-shadow: 0 8px 25px rgba(0, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(0, 255, 255, 0.2);
}

.contact-form h3 {
  font-size: 30px;
  color: var(--accent);
  text-align: center;
  margin-bottom: 25px;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.contact-form form {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

/* Input & Textarea Styles */
.contact-form input,
.contact-form textarea {
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid var(--accent);
  color: var(--white);
  padding: 14px 16px;
  border-radius: 8px;
  font-size: 16px;
  outline: none;
  transition: all 0.3s ease;
}

.contact-form textarea {
  resize: vertical;
  min-height: 130px;
}

.contact-form input:focus,
.contact-form textarea:focus {
  border-color: #0ef;
  box-shadow: 0 0 12px rgba(0, 255, 255, 0.4);
}

/* Send Button */
.send {
  background: var(--accent);
  color: #001416;
  font-weight: 700;
  border: none;
  padding: 14px;
  border-radius: 8px;
  cursor: pointer;
  transition: all 0.3s ease;
  letter-spacing: 1px;
}

.send:hover {
  background: #0ef;
  transform: translateY(-3px);
  box-shadow: 0 0 15px rgba(0, 255, 255, 0.4);
}

/* ==============================
   📱 FULL CONTACT SECTION RESPONSIVE
   ============================== */

/* For large tablets and small laptops */
@media (max-width: 1024px) {
  .contact {
    grid-template-columns: 1fr;
    padding: 40px 25px;
    gap: 35px;
  }

  .contact-left,
  .contact-form {
    width: 100%;
    padding: 28px;
  }

  .contact-left h2 {
    font-size: 60px;
  }
}

/* For standard tablets and big phones */
@media (max-width: 768px) {
  .contact {
    grid-template-columns: 1fr;
    gap: 30px;
    padding: 35px 20px;
  }

  .contact-left {
    padding: 25px;
    text-align: center;
  }

  .contact-left h2 {
    font-size: 48px;
    line-height: 1.2;
  }

  .contact-left h4 {
    font-size: 20px;
  }

  .contact-left p {
    font-size: 15px;
  }

  .contact-list {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
  }

  .contact-list li {
    font-size: 15px;
    justify-content: center;
  }

  .contact-form {
    padding: 25px;
  }

  .contact-form h3 {
    font-size: 24px;
  }

  .contact-form input,
  .contact-form textarea {
    font-size: 15px;
    padding: 12px;
  }

  .send {
    width: 100%;
    font-size: 16px;
    padding: 12px;
  }
}

/* For small mobile phones */
@media (max-width: 480px) {
  .contact {
    grid-template-columns: 1fr;
    padding: 30px 15px;
    gap: 25px;
  }

  .contact-left {
    padding: 20px;
    text-align: center;
  }

  .contact-left h2 {
    font-size: 38px;
    margin-bottom: 15px;
  }

  .contact-left h4 {
    font-size: 17px;
  }

  .contact-left p {
    font-size: 14px;
  }

  .contact-list li {
    font-size: 14px;
  }

  .contact-list li i {
    font-size: 18px;
  }

  .contact-form {
    padding: 20px;
  }

  .contact-form h3 {
    font-size: 20px;
  }

  .contact-form input,
  .contact-form textarea {
    font-size: 14px;
    padding: 10px;
  }

  .send {
    font-size: 15px;
    padding: 10px;
    width: 100%;
  }
}

/* For very small screens (older phones, <360px width) */
@media (max-width: 360px) {
  .contact {
    padding: 25px 10px;
  }

  .contact-left h2 {
    font-size: 30px;
  }

  .contact-left h4 {
    font-size: 15px;
  }

  .contact-list li {
    font-size: 13px;
    gap: 8px;
  }

  .contact-form h3 {
    font-size: 18px;
  }

  .contact-form input,
  .contact-form textarea {
    font-size: 13px;
    padding: 8px;
  }

  .send {
    font-size: 14px;
    padding: 8px;
  }
}






</style>
<body>
  <header class="header">
    <a href="#" class="logo">Code Crafting Solution</a>
    <nav class="navbar">
      <a href="#home" style="--i:1" class="active">Home</a>
      <a href="#about" style="--i:2">About</a>
      <a href="#services" style="--i:3">Services</a>
      <a href="#web-pricing" style="--i:3">Pricing</a>
      <a href="#contact" style="--i:4">Contact</a>
    </nav>
<div class="menu-icon">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
  </div>

  </header>

  <!-- Home Section -->
  <section class="home" id="home">
    <div class="home-content">
      <h3>Hello, It's Me</h3>
      <h1>Muhammad Alyan</h1>
      <h3>And I'm a <span class="text"></span></h3>
      <p>Web Development is the process of designing, building, and <br>maintaining websites or web applications using technologies like HTML, CSS, JavaScript</p>

      <div class="home-sci">
        <a href="https://www.facebook.com/share/17iB6at44t/" target="_blank" rel="noreferrer">
          <i class='bx bxl-facebook'></i>
        </a>
        <a href="https://www.instagram.com/codecraftingsolution?igsh=MWp4bTRxMjA1NTd6eA==" target="_blank" rel="noreferrer">
          <i class='bx bxl-instagram'></i>
        </a>
        <a href="https://www.linkedin.com/in/muhammad-alyan-741946380?utm_source=share_via&utm_content=profile&utm_medium=member_android" target="_blank" rel="noreferrer">
          <i class='bx bxl-linkedin'></i>
        </a>
</div>


    </section>

  <!-- About Section -->
<section class="about" id="about">
  <div class="about-container">
    <div class="about-img">
 <img src="images/pic 1.png" alt="About Image">
    </div>

    <div class="about-text">
      <h2>About <span>Me</span></h2>
      <h3>Full Stack Developer!</h3>
      <p>
        A Full Stack Developer is skilled in both frontend and backend development, 
        creating responsive designs, and managing databases. I love building creative, 
        user-friendly, and efficient websites using HTML, CSS, JavaScript, and backend tools.
      </p>

      <a href="#contact" class="btn-box">More About Me</a>
    </div>
  </div>
</section>


  <!-- Services Section -->
  <section class="services" id="services">
    <div class="container">
      <h1 class="sub-title">My <span>Services</span></h1>
      <div class="services-list">
        <div>
          <i class='bx bxs-star' style='color:#0cf5e4'></i>
          <h2>Static Websites</h2>
          <p>Static websites are simple, fast, and ideal for showcasing fixed content...</p>
          <a href="#" class="read">Learn more</a>
        </div>
        <div>
          <i class='bx bxs-star' style='color:#0cf5e4'></i>
          <h2>Dynamic Websites</h2>
          <p>Dynamic websites provide interactive and personalized content...</p>
          <a href="#" class="read">Learn more</a>
        </div>
        <div>
          <i class='bx bxs-star' style='color:#0cf5e4'></i>
          <h2>Graphic Designing</h2>
          <p>Graphic design services for social media posts, brochures, flyers, etc...</p>
          <a href="#" class="read">Learn more</a>
        </div>
      </div>
    </div>
  </section>


<!-- pricing -->

    <section id="web-pricing">
  <h2 class="sub-title"><span>See More</span> Pricing</h2>

  <div class="country-tabs">
    <button class="country-btn active" data-country="usa">USA</button>
    <button class="country-btn" data-country="pakistan">Pakistan</button>
  </div>

  <div class="services-nav">
    <div class="chip active" data-service="web">Website Development</div>
    <div class="chip" data-service="graphic">Logo Designing</div>
  </div>

  
 

<!-- 🌐 Website Development Section -->
<div class="service-section active" data-service="web">
  <div class="cards">
    <!-- Basic Website -->
    <div class="card" data-usd="99" data-pkr="27990">
      <div class="card-inner">
        <div class="top">
          <h3>Basic Website Package</h3>
          <div class="price">$99</div>
          <p class="note">Perfect for personal or portfolio websites.</p>
        </div>
        <ul class="features">
          <li>Up to 3 Pages (Home, About, Contact)</li>
          <li>Fully Responsive Design</li>
          <li>Basic SEO Setup</li>
        </ul>
      </div>
      <div class="bottom">
        <a href="#contact" class="btn">Get Started</a>
      </div>
    </div>

    <!-- Startup Website -->
    <div class="card" data-usd="169" data-pkr="47785">
      <div class="card-inner">
        <div class="top">
          <h3>Startup Website Package</h3>
          <div class="price">$169</div>
          <p class="note">A great choice for startups and small businesses.</p>
        </div>
        <ul class="features">
          <li>Up to 5 Pages (Home, About, Services, Contact, Blog)</li>
          <li>Contact Form</li>
          <li>SEO Optimization (Starter Level)</li>
        </ul>
      </div>
      <div class="bottom">
        <a href="#contact" class="btn">Get Started</a>
      </div>
    </div>

    <!-- Business Website -->
    <div class="card" data-usd="389" data-pkr="109992">
      <div class="card-inner">
        <div class="top">
          <h3>Business Website Package</h3>
          <div class="price">$389</div>
          <p class="note">For growing brands needing a professional site.</p>
        </div>
        <ul class="features">
          <li>Up to 10 Custom Pages</li>
          <li>SEO Optimization</li>
          <li>Business Email Integration</li>
          <li>Blog Section & News Updates</li>
        </ul>
      </div>
      <div class="bottom">
        <a href="#contact" class="btn">Get Started</a>
      </div>
    </div>

    <!-- Professional Website -->
    <div class="card" data-usd="459" data-pkr="129785">
      <div class="card-inner">
        <div class="top">
          <h3>Professional Website Package</h3>
          <div class="price">$459</div>
          <p class="note">Built for professionals aiming to lead online</p>
        </div>
        <ul class="features">
          <li>Up to 15 Pages (Custom Layouts)</li>
          <li>Advanced SEO Optimization</li>
          <li>High-Speed Hosting</li>
          <li>Custom Contact Forms</li>
        </ul>
      </div>
      <div class="bottom">
        <a href="#contact" class="btn">Get Started</a>
      </div>
    </div>
  </div>
</div>

<!-- 🎨 Graphic Designing Section -->
<div class="service-section" data-service="graphic">
  <div class="cards">
    <!-- Basic Graphic Design -->
   <div class="card" data-usd="25" data-pkr="7068">
  <div class="card-inner">
    <div class="top">
      <h3>Basic Logo Package</h3>
      <div class="price">$25</div>
      <p class="note">Ideal for new brands needing a clean, simple logo.</p>
    </div>
    <ul class="features">
      <li>1 Custom Logo Concept</li>
      <li>2 Design Revisions</li>
      <li>High-Resolution Files (JPG, PNG)</li>
      <li>Color & Black/White Variations</li>
      <li>Delivery within 2-3 Business Days</li>
    </ul>
  </div>
  <div class="bottom">
    <a href="#contact" class="btn">Get Started</a>
  </div>
</div>

   <div class="card" data-usd="50" data-pkr="14137">
  <div class="card-inner">
    <div class="top">
      <h3>Start Up Logo Package</h3>
      <div class="price">$50</div>
      <p class="note">Ideal for new brands needing a clean, simple logo design.</p>
    </div>
    <ul class="features">
      <li>1 Custom Logo Concept</li>
      <li>High-Resolution Files</li>
      <li>Color & Black/White Variations</li>
      <li>Fast Turnaround (2–3 Business Days)</li>
      <li>100% Satisfaction Guarantee</li>
    </ul>
  </div>
  <div class="bottom">
    <a href="#contact" class="btn">Get Started</a>
  </div>
</div>

  <div class="card" data-usd="200" data-pkr="56551">
  <div class="card-inner">
    <div class="top">
      <h3>Business Logo Package</h3>
      <div class="price">$200</div>
      <p class="note">Ideal for growing brands seeking a modern and professional logo design.</p>
    </div>
    <ul class="features">
      <li>3 Custom Logo Concepts</li>
      <li>Business Card Design</li>
      <li>Delivery within 3–5 Business Days</li>
      <li>100% Satisfaction Guarantee</li>
    </ul>
  </div>
  <div class="bottom">
    <a href="#contact" class="btn">Get Started</a>
  </div>
</div>

<div class="card" data-usd="200" data-pkr="112820">
  <div class="card-inner">
    <div class="top">
      <h3>Gold Logo Package</h3>
      <div class="price">$399</div>
      <p class="note">Perfect for brands aiming for a sleek and professional logo design.</p>
    </div>
    <ul class="features">
      <li>3 Custom Logo Concepts</li>
      <li>Color, Black & White, and Transparent Background Versions</li>
      <li>Delivery within 3–5 Business Days</li>
      <li>100% Satisfaction Guarantee</li>
    </ul>
  </div>
  <div class="bottom">
    <a href="#contact" class="btn">Get Started</a>
  </div>
</div>

  <script>
    // Country toggle
    const countryBtns = document.querySelectorAll(".country-btn");
    const cards = document.querySelectorAll(".card");

    countryBtns.forEach(btn => {
      btn.addEventListener("click", () => {
        countryBtns.forEach(b => b.classList.remove("active"));
        btn.classList.add("active");

        const country = btn.dataset.country;
        cards.forEach(card => {
          const priceEl = card.querySelector(".price");
          const usd = card.dataset.usd;
          const pkr = card.dataset.pkr;
          if (country === "pakistan") {
            priceEl.textContent = `Rs ${Number(pkr).toLocaleString()}`;
          } else {
            priceEl.textContent = `$${usd}`;
          }
        });
      });
    });

    // Service category toggle
    const chips = document.querySelectorAll(".chip");
    const serviceSections = document.querySelectorAll(".service-section");

    chips.forEach(chip => {
      chip.addEventListener("click", () => {
        chips.forEach(c => c.classList.remove("active"));
        chip.classList.add("active");

        const service = chip.dataset.service;
        serviceSections.forEach(section => {
          section.classList.toggle("active", section.dataset.service === service);
        });
      });
    });
    
  </script>

  <style>
    .service-section { display: none; }
    .service-section.active { display: flex; gap: 20px; flex-wrap: wrap; }
    .chip { cursor: pointer; padding: 8px 18px; border-radius: 30px; background: #eee; transition: 0.3s; }
    .chip.active { background: #111; color: #fff; }
  </style>
</section>





  <!-- contact -->
     <section class="contact" id="contact">
    <!-- LEFT: info -->
    <div class="contact-left">
      <div class="contact-text">
        <h1 class="main-heading">Contact <span>Me</span></h1>
        <h4>Reach out to me for any inquiries or collaboration!</h4>
        <p>"Contact Me" means inviting someone to reach out for communication, collaboration.</p>

        <ul class="contact-list" aria-label="contact details">
          <li><i class='bx bx-send'></i><a href="mailto:Muhammadalyan12690@gmail.com">Muhammadalyan12690@gmail.com</a></li>
          <li><i class='bx bx-phone'></i><a href="tel:+923273712641">0327-3712641</a></li>
        </ul>
      </div>

      <div class="home-sci" aria-label="social links">
        <a href="https://www.facebook.com/share/17iB6at44t/" target="_blank" rel="noreferrer">
          <i class='bx bxl-facebook'></i>
        </a>
        <a href="https://www.instagram.com/codecraftingsolution?igsh=MWp4bTRxMjA1NTd6eA==" target="_blank" rel="noreferrer">
          <i class='bx bxl-instagram'></i>
        </a>
        <a href="https://www.linkedin.com/in/muhammad-alyan-741946380?utm_source=share_via&utm_content=profile&utm_medium=member_android" target="_blank" rel="noreferrer">
          <i class='bx bxl-linkedin'></i>
        </a>
      </div>
    </div>

    <!-- RIGHT: form -->
    <div class="contact-form">
      <h3>Send Me A Message</h3>

      <!-- keep your PHP action as you had it; server-side will handle it -->
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>#contact" method="POST" novalidate>
    <input id="name" type="text" name="name" placeholder="Your Name" required>
    <input id="email" type="email" name="email" placeholder="Your Email" required>
    <textarea id="message" name="message" placeholder="Your Message" required></textarea>
    <button type="submit" class="send" name="submit_btn">Send Message</button>
</form>

<!-- popup -->
<?php if (isset($_SESSION['msg'])) { ?>
    <div id="popup-message" class="<?= $_SESSION['msg']['type'] ?>">
        <p style="margin:0;"><?= $_SESSION['msg']['text'] ?></p>
    </div>

    <script>
      setTimeout(() => {
        let popup = document.getElementById("popup-message");
        if (popup) popup.style.display = "none";
      }, 3000);
    </script>
<?php unset($_SESSION['msg']); } ?>



 <script src="index.js"></script> 
</body>

</html>

